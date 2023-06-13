<?php

use App\Models\Cart_item;
use App\Models\product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_item_product', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->foreignIdFor(Cart_item::class, 'cart_item_id')->nullable()->cascadeOnDelete();
            $table->foreignIdFor(product::class, 'product_id')->nullable()->cascadeOnDelete();
            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_products');

    }
};
