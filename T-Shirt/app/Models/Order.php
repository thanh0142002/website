<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $table = "orders";
    protected $fillable = [
        "user_id", "customer_id", "status","total_price","total_quantity","created_at","updated_at"
    ] ;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function Order_item(){
        return $this->hasMany(Order_item::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
