<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "order_id",
        "product_size_id",
        "quantity",
        "price",
    ];

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    public function product_size(){
        return $this->belongsTo(Product_size::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
