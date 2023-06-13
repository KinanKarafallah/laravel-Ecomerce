<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_item extends Model
{
    use HasFactory;
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function products() {
/*         return $this->belongsToMany(Product::class)->with('cart_item_id'); */
        return $this->belongsToMany(product::class, 'cart_item_product', 'cart_item_id', 'product_id'); // works

        
    }
}
