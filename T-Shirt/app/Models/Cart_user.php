<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_user extends Model
{
    use HasFactory;

    protected $table = "cart_users";
    protected $fillable = [
        "user_id",
        "product_id",
        "quantity",
        "price",
        "price_sale",
    ] ;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product_size(){
        return $this->belongsTo(Product_size::class);
    }
}
