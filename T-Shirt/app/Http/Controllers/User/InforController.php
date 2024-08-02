<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\User;
use App\Models\Product_size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InforController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::id());
        $customers = Customer::where("user_id", $user->id)->orderByDesc('created_at')->get();
        $orders = Order::get();
        $order_items = Order_item::get();
        return view('user.infor.content', [
            'title' => 'thông tin cá nhân',
            'user' => $user,
            'customers' => $customers,
            'orders' => $orders,
            'order_items' => $order_items,
        ]);
    }
    public function show(Order $order)
    {
        $order_items = Order_item::where('order_id', $order->id)->get();
        $orders = Order::find($order->id);
        return view('user.infor.order_detail', [
            'title' => 'Chi tiết đơn hàng',
            'order_items' => $order_items,
            'orders' => $orders,
        ]);
    }

    public function order_cancel($id)
    {
        $order = Order::find($id);
        $order->status = 3;
        $order->save();

        $orderItems = Order_item::where('order_id', $id)->get();
        foreach ($orderItems as $orderItem) {
            $productSize = Product_size::find($orderItem->product_size_id);
            if ($productSize) {
                $productSize->stock += $orderItem->quantity;
                $productSize->save();
            }
        }

        return redirect()->back()->with('success','Bạn đã hủy đơn hàng thành công');
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $user = User::find(Auth::id());
        $user->name = $data["name"];
        $user->email = $data["email"];
        $user->save();

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
    }

    public function password_update(Request $request)
    {
        $data = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ],
        [
            'password.min' => 'mật khẩu phải có ít nhất 8 ký tự',
            'password.confirmed' => 'mật khẩu xác nhận không chính xác'
        ]);

        $user = User::find(Auth::id());
        if (!Hash::check($data["current_password"], $user->password)) {
            return redirect()->back()->with('error', 'Mật khẩu hiện tại không chính xác!');
        } 
        else {
            $user->password = Hash::make($data["password"]);
            $user->save();
        }
        
        return redirect()->back()->with('success', 'Thay đổi mật khẩu thành công!');
    }
}
