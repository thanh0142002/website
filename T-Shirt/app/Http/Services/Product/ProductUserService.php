<?php

namespace App\Http\Services\Product;
use App\Models\Product;
use App\Models\Menu;
use Illuminate\Support\Str;

class ProductUserService{

    public function get()
    {
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')->orderByDesc('id')->limit(12)->get();
    }
}