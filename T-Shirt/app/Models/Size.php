<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product_detail;

class Size extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // public function product_details()
    // {
    //     return $this->hasMany(Product_detail::class);
    // }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_size')->withPivot('stock');
    }

}
