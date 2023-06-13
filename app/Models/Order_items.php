<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_id','product_id','created_at','updated_at','quantity','unit_price',
   
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
