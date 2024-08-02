<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order_item;
use App\Models\Cart_user;
use Illuminate\Support\Facades\Auth;

class CartUserController extends Controller
{
    public function index()
    {
        // return view("user.cart.content",["title"=> "Shop quần áo"]);
        // Truy vấn tất cả order_items của người dùng hiện tại

        // $order_items = Order_item::where('user_id', Auth::id())->get();
        // $total_quantity = $order_items->sum('quantity');
        // $total_price = $order_items->sum('price');

        // return view('user.cart.content', [
        //     'order_items' => $order_items,
        //     'total_quantity' => $total_quantity,
        //     'total_price' => $total_price,
        //     'title' => 'Shop quần áo'
        // ]);

        $cart_users = Cart_user::where('user_id', Auth::id())->get();
        $total_quantity = $cart_users->sum('quantity');
        $total_price = $cart_users->sum('price');
        $total_price_sale = $cart_users->sum('price_sale');

        return view('user.cart.content', [
            'cart_users' => $cart_users,
            'total_quantity' => $total_quantity,
            'total_price_sale' => $total_price_sale,
            'title' => 'Shop quần áo'
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        $cart_user = Cart_user::find($id);

        if ($cart_user) {
            $cart_user->delete();
            return redirect()->back()->with('success', 'Xóa sản phẩm thành công!');
        }

        return redirect()->back()->with('error', 'Xóa sản phẩm thất bại!');
    }
}
