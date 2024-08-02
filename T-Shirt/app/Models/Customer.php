<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "customers";
    protected $fillable = [
        "user_id","name","phone","city","district","address","notes",
    ] ;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function order(){
        return $this->hasOne(Order::class);
    }
}
