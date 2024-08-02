<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_size extends Model
{
    use HasFactory;
    protected $table = 'product_size';
    protected $fillable = [
        "product_id",
        "size_id",
        "stock",
    ];

    public function oder_item(){
        return $this->hasmany(Order_item::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function size(){
        return $this->belongsTo(Size::class);
    }
}
