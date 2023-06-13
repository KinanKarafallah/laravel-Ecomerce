<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'total_price','status','created_at','updated_at','created_by','updated_by','products'
   
    ];
    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function order_items()
    {
        return $this->hasMany(Order_items::class);
    }
}
