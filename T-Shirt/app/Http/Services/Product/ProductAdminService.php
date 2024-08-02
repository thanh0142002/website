<?php

namespace App\Http\Services\Product;

use App\Models\Product;
use App\Models\Menu;
use App\Models\Color;
use App\Models\Clothes;
use App\Models\Size;
use Illuminate\Support\Str;

class ProductAdminService
{

    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    public function getColor()
    {
        return Color::get();
    }
    public function getClothes()
    {
        return Clothes::get();
    }

    public function getsize()
    {
        return Size::get();
    }

    public function getAll()
    {
        return Product::with('menu')->orderByDesc("id")->paginate(10);
    }

    public function create($request)
    {

    }
    public function update($request, $menu)
    {

    }
}