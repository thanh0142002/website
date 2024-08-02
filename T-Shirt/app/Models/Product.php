<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'menu_id',
        'color_id',
        'clothes_id',
        'price',
        'price_sale',
        'sale_off',
        'description',
        'content',
        'active',
        'thumb'
    ];

    public function menu()
    {
        return $this->hasOne(Menu::class, "id", "menu_id");
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class ,'product_size')->withPivot('stock');
    }

    // public function oder_item()
    // {
    //     return $this->hasMany(Order_item::class);
    // }
    
    public function color(){
        return $this->belongsTo(Color::class);
    }

    public function clothes()
    {
        return $this->belongsTo(Clothes::class);
    }
}
