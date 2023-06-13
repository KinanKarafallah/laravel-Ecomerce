<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'title','image','description','price','created_at','created_by','updated_by','deleted_by','status'
   
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
    public function cart_items() {
/*         return $this->belongsToMany(Cart_item::class)->with('cart_item_id'); */
        return $this->belongsToMany(Cart_item::class, 'cart_item_product', 'cart_item_id', 'product_id'); // works
    }
}
