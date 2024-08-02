<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product_size;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        if (isset($_GET['vnp_SecureHash'])) {

            $orderItems = Order_item::where('order_id', $_GET['vnp_TxnRef'])->get();
            foreach ($orderItems as $orderItem) {
                $productSize = Product_size::find($orderItem->product_size_id);
                if ($productSize) {
                    $productSize->stock -= $orderItem->quantity;
                    $productSize->save();
                }
            }

            $order = Order::find($_GET['vnp_TxnRef']);
            $order->payment = "Đã thanh toán";
            $order->save();
            return view('user.payment.content', [
                'title' => 'Shop quần áo',
            ]);
        } else {
            return view('user.payment.content', [
                'title' => 'Shop quần áo',
            ]);
        }
    }
}
