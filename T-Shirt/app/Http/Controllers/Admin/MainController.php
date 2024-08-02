<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Product;
use App\Models\Product_size;
use App\Models\User;
use App\Models\Voucher;

class MainController extends Controller
{
    public function index()
    {

        $menus = Menu::get();
        $product = Product::get();
        $order = Order::where('payment', 'Đã thanh toán')->get();
        $user = User::get();
        $stock = Product_size::get();
        $voucher = Voucher::get();
        $comment = Comment::get();
        $total_menus = $menus->count();
        $total_product = $product->count();
        $total_order = $order->count();
        $total_price = $order->sum('total_price');
        $total_price_sale = $order->sum('total_price_sale');
        $total_user = $user->count();
        $total_voucher = $voucher->count();
        $total_comment = $comment->count();
        $total_stock = $stock->sum('stock');
        return view("admin.home",
            [
                'title' => 'Trang quản trị',
                'total_menus' => $total_menus,
                'total_product' => $total_product,
                'total_order' => $total_order,
                'total_price' => $total_price,
                'total_price_sale' => $total_price_sale,
                'total_user' => $total_user,
                'total_stock' => $total_stock,
                'total_voucher' => $total_voucher,
                'total_comment' => $total_comment,
            ]
        );
    }
}
