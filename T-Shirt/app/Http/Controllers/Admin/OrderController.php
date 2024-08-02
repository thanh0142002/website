<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Cart_user;
use App\Models\Order_item;
use App\Models\Product_size;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $order = Order::orderByDesc('created_at')->get();
        return view('admin.orders.list', [
            'title' => 'Đơn hàng',
            'orders' => $order,
        ]);
    }

    public function show(Order $order)
    {
        $order_items = Order_item::where('order_id', $order->id)->get();
        return view('admin.orders.detail', [
            'title' => 'Chi tiết đơn hàng',
            'order_items' => $order_items,
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required'
        ]);
        if ($data['status'] == 3){
            $orderItems = Order_item::where('order_id', $id)->get();
            foreach ($orderItems as $orderItem) {
                $productSize = Product_size::find($orderItem->product_size_id);
                if ($productSize) {
                    $productSize->stock += $orderItem->quantity;
                    $productSize->save();
                }
            }
            $order = Order::findOrFail($id);
            $order->status = $data['status'];
            $order->save();
        }
        elseif ($data['status'] == 2) {
            $order = Order::findOrFail($id);
            $order->status = $data['status'];
            $order->payment = 'Đã thanh toán';
            $order->save();
        }else{
            $order = Order::findOrFail($id);
            $order->status = $data['status'];
            $order->save();
        }

        // Chuyển hướng lại trang danh sách đơn hàng
        return redirect()->back()->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
    }

    public function destroy($id)
    {
        $order = Order::find($id);

        if ($order) {
            $order->delete();
            return redirect()->back()->with('success', 'Xóa đơn hàng thành công!');
        }

        return redirect()->back()->with('error', 'Xóa đơn hàng thất bại!');
    }
}
