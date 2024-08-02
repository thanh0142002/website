<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart_user;
use Illuminate\Http\Request;
use App\Models\Product_size;
use App\Models\Product;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ProductUserController extends Controller
{

    public function index()
    {
        // $product_details = Product_detail::with('product', 'size', 'color')->get();
        // return view("user.product.content",["title"=> "Shop quần áo"], compact("product_details"));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // $product = Product::create($request->all());
        $data = $request->validate([
            "size_id" => "required",
            "quantity" => ["required", "integer"],
            "product_id" => "required",
            "price" => "required",
            "price_sale" => "required",
        ], [
            "size_id.required" => "Vui lòng chọn size",
        ]);
        $product_size = Product_size::where('product_id', $data['product_id'])
            ->where('size_id', $data['size_id'])
            ->first();

        // $order_item = Order_item::where("user_id", Auth::id())
        //     ->where('product_size_id', $product_size->id)
        //     ->first();

        // if ($product_size->stock < $data["quantity"]) {
        //     return redirect()->back()->with('error', 'số lượng tồn kho không đủ');;
        // } 
        // else if (!$request->input('size_id')){
        //     return redirect()->back()->with('error', 'Vui lòng chọn size');
        // }
        // else {
        //     if ($order_item) {
        //         $order_item->quantity += $data["quantity"];
        //         $order_item->price = $data["price"] * $order_item->quantity;
        //         $order_item->save();
        //     } else {
        //         $order_item = new Order_item();
        //         $order_item->user_id = Auth::id();
        //         $order_item->quantity = $data["quantity"];
        //         $order_item->price = $data["quantity"] * $data["price"];
        //         $order_item->product_size_id = $product_size->id;
        //         $order_item->save();
        //     }
        // }

        $cart_user = Cart_user::where("user_id", Auth::id())
            ->where('product_size_id', $product_size->id)
            ->first();

        if (!$request->input('size_id')) {
            return redirect()->back()->withErrors(['error' => 'Vui lòng chọn Size']);
        } else if ($product_size->stock < (int)$data["quantity"]) {
            return redirect()->back()->withErrors(['error' => 'Số lượng tồn kho của kích cỡ này chỉ còn lại: ' . $product_size->stock . '']);
        } else {
            if ($cart_user) {
                $cart_user->quantity += $data["quantity"];
                if ($cart_user->quantity > $product_size->stock) {
                    return redirect()->back()->withErrors(['error' => 'Số lượng tồn kho của kích cỡ này chỉ còn lại: ' . $product_size->stock . '']);
                } else {
                    $cart_user->price = $data["price"] * $cart_user->quantity;
                    $cart_user->price_sale = $data["price_sale"] * $cart_user->quantity;
                    $cart_user->save();
                }
            } else {
                $cart_user = new Cart_user();
                $cart_user->user_id = Auth::id();
                $cart_user->quantity = $data["quantity"];
                $cart_user->price = $data["quantity"] * $data["price"];
                $cart_user->price_sale = $data["quantity"] * $data["price_sale"];
                $cart_user->product_size_id = $product_size->id;
                $cart_user->save();
            }
        }
        return redirect()->route('cart.content');
    }

    public function show(Product $product)
    {
        $product = Product::with('sizes')->findOrFail($product->id);
        $comments = Comment::where('product_id',$product->id)->orderByDesc('created_at')->get();
        $user = User::find(Auth::id());
        return view("user.product.content", [
            "title" => "Shop quần áo",
            'products' => $product,
            'comments' => $comments,
            'user' => $user,
        ]);
    }

    public function comment(Request $request, $id){
        $data = $request->validate([
            'content' => 'required',
            'rate' => 'required',
        ],
        [
            'content.required' => 'Vui lòng viết bình luận của bạn',
            'rate.required' => 'Bạn đánh giá chúng tôi mấy sao?'
        ]);
        $comment = new Comment();
        $comment->product_id = $id;
        $comment->user_id = Auth::id();
        $comment->content = $data['content'];
        $comment->rate = $data['rate'];
        $comment->save();

        return redirect()->back();
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
