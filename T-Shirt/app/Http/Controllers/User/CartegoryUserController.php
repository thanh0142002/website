<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Clothes;
use App\Models\Product_size;
use Illuminate\Http\Request;

class CartegoryUserController extends Controller
{
    public function index()
    {
        return view("user.cartegory.content_nam", ["title" => "Shop quần áo"]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // $menuId = $request->menu_id; // Lấy menu_id từ request hoặc URL

        // // Kiểm tra giá trị sắp xếp từ request
        // $sort = $request->input('sort');
        // if ($sort == 'asc') {
        //     $products = Product::where('menu_id', $menuId)->orderBy('price', 'asc')->get();
        // } elseif ($sort == 'desc') {
        //     $products = Product::where('menu_id', $menuId)->orderBy('price', 'desc')->get();
        // } else {
        //     $products = Product::where('menu_id', $menuId)->get();
        // }

        // // Trả về view với các sản phẩm đã sắp xếp
        // return view('your_view_name', compact('products', 'menu'));
    }

    public function show(Request $request, Menu $menu_id)
    {
        $query = Product::where('menu_id', $menu_id->id);
        $sort = $request->input('sort');
        $size_ids = $request->input('size_id', []);
        $color_ids = $request->input('color_id', []);
        $clothes_ids = $request->input('clothes_id', []);
        $price_ranges = $request->input('price_range',[]);
        $search = $request->input('search');

        if ($sort == 'asc') {
            $query->orderBy('price_sale', 'asc');
        } elseif ($sort == 'desc') {
            $query->orderBy('price_sale', 'desc');
        } else {
            $query->orderByDesc('id');
        }
        if (!empty($size_ids)) {
            $query->whereHas('sizes', function ($q) use ($size_ids) {
                $q->whereIn('size_id', $size_ids)->where('stock', '>', 0);
            });
        }
        if (!empty($color_ids)) {
            $query->whereIn('color_id', $color_ids);
        }
        if (!empty($clothes_ids)) {
            $query->whereIn('clothes_id', $clothes_ids);
        }
        if (!empty($price_ranges)) {
            $query->where(function ($query) use ($price_ranges) {
                foreach ($price_ranges as $price_range) {
                    list($min_price, $max_price) = explode('-', $price_range);
                    if ($max_price) {
                        $query->orWhereBetween('price_sale', [(float)$min_price, (float)$max_price]);
                    } else {
                        $query->orWhere('price_sale', '>=', (float)$min_price);
                    }
                }
            });
        }
        if ($search){
            $query->where('name', 'like', '%'. $search .'%');
        }

        $products = $query->get();
        $sizes = Size::get();
        $colors = Color::get();
        $clothes = Clothes::get();

        return view("user.cartegory.content", [
            "title" => "shop quần áo",
            "menu" => $menu_id,
            "products" => $products,
            "sizes" => $sizes,
            "colors" => $colors,
            "clothes" => $clothes,
        ]);
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
