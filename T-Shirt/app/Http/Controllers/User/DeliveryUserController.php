<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order_item;
use App\Models\Order;
use App\Models\Cart_user;
use App\Models\Customer;
use App\Models\Voucher;
use App\Models\Product_size;
use Illuminate\Support\Facades\Auth;

class DeliveryUserController extends Controller
{
    public function index(Request $request)
    {
        $price_sale = 0;
        $voucher = Voucher::find($request->input('voucher_id'));

        // Truy vấn tất cả cart_users của người dùng hiện tại
        $cart_users = Cart_user::where('user_id', Auth::id())->get();
        $total_price = $cart_users->sum('price');
        $total_price_sale = $cart_users->sum('price_sale');

        if (!empty($request->input('voucher_id'))) {
            $discount = ($total_price_sale * $voucher->sale_off) / 100;
            $price_sale = min($discount, $voucher->maximum);
            $total_price_sale = $total_price_sale - $price_sale;
        }
        return view('user.delivery.content', [
            'cart_users' => $cart_users,
            'total_quantity' => $cart_users->sum('quantity'),
            'total_price' => $total_price,
            'total_price_sale' => $total_price_sale,
            'price_sale' => $price_sale,
            'voucher' => $voucher,
            'vouchers' => Voucher::orderByDesc('created_at')->get(),
            'title' => 'Shop quần áo',
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'district' => 'required',
            'address' => 'required',
            'notes' => 'nullable',
            'total_quantity' => 'required',
            'total_price' => 'required',
            'total_price_sale' => 'required',
            'btn' => 'nullable',
            'redirect' => 'nullable',
        ], [
            'name.required' => 'vui lòng nhập tên của bạn',
            'phone.required' => 'vui lòng nhập số điện thoại',
            'city.required' => 'vui lòng nhập tên thành phố',
            'district.required' => 'vui lòng nhập tên quận/huyện',
            'address.required' => 'vui lòng nhập địa chỉ',
        ]);


        function generateUniqueRandomNumber($length = 10)
        {
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomNumber = '';

            // Kết hợp thời gian hiện tại để tăng tính ngẫu nhiên và duy nhất
            $timestamp = time();
            $randomNumber .= $timestamp;

            // Tạo phần số ngẫu nhiên
            for ($i = strlen($timestamp); $i < $length; $i++) {
                $randomNumber .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomNumber;
        }

        // Sử dụng hàm để tạo mã số ngẫu nhiên không bị trùng lặp
        $uniqueRandomNumber = generateUniqueRandomNumber();
        //dung isset(& & & &...) so sánh các dữ liệu trong customer nếu == thì dùng find để lấy ra bản đầu tiên và order sẽ trỏ đến id của customer đó
        $customer = new Customer();
        $customer->user_id = Auth::id();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->city = $request->city;
        $customer->district = $request->district;
        $customer->address = $request->address;
        $customer->notes = $request->notes;
        $customer->save();

        $order = new Order();
        $order->id = $uniqueRandomNumber;
        $order->customer_id = $customer->id;
        $order->total_price = $request->total_price;
        if ($request->total_price_sale < 2000000) {
            $order->total_price_sale = $request->total_price_sale + 25000;
        } else {
            $order->total_price_sale = $request->total_price_sale;
        }
        $order->total_quantity = $request->total_quantity;
        $order->save();

        $getcart_users = Cart_user::where('user_id', Auth::id())->get();
        foreach ($getcart_users as $getcart_user) {
            $order_item = new Order_item();
            $order_item->product_size_id = $getcart_user->product_size_id;
            $order_item->order_id = $order->id;
            $order_item->quantity = $getcart_user->quantity;
            $order_item->price = $getcart_user->price;
            $order_item->price_sale = $getcart_user->price_sale;
            $order_item->save();
        }

        // $cart_user = Cart_user::where('user_id', Auth::id());
        // $cart_users = $cart_user->get();
        foreach ($getcart_users as $cart_user) {
            // $productSizeId = $cart_user->product_size_id;
            // $productSize = Product_size::find($productSizeId);
            // $productSize->stock -= $cart_user->quantity;
            // $productSize->save();
            $cart_user->delete();
        }
        if (isset($_POST['btn'])) {
            $orderItems = Order_item::where('order_id', $order->id)->get();
            foreach ($orderItems as $orderItem) {
                $productSize = Product_size::find($orderItem->product_size_id);
                if ($productSize) {
                    $productSize->stock -= $orderItem->quantity;
                    $productSize->save();
                }
            }

            return redirect()->back()->with('success', 'Đơn hàng của bạn đã được gửi đến chúng tôi');
        } else {
            $data = $request->all();
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://127.0.0.1:8000/user/payment-result";
            $vnp_TmnCode = "PJV8PM9T"; //Mã website tại VNPAY 
            $vnp_HashSecret = "G0D8L5VV3IPRLKGU3VHVHYYPBN1IMP8U"; //Chuỗi bí mật

            $vnp_TxnRef = $order->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này
            $vnp_OrderInfo = "Thanh toán hóa đơn";
            $vnp_OrderType = "T-style Shop";
            $vnp_Amount = $data['total_price_sale'] * 100;
            $vnp_Locale = "VN";
            $vnp_BankCode = "NCB";
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            );
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
