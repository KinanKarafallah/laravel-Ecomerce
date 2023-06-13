<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_items;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Product as StripeProduct;

class OrderController extends Controller
{
    public function index(Request $request){
        $orders=Order::where('created_by',auth()->user()->id)->when($request->has('status'), function ($q) use ($request) {
            return $q->where('status',$request->get('status'));
        })->latest()->paginate(5);
        
        return view('order.orders',['orders'=>$orders]);
    }

    public function showOrderProduct($id){
        $order=Order::findOrFail($id);
        $orderProducts=Order_items::where('order_id',$id)->get();
        foreach($orderProducts as $orderProduct){
            $productsDetail[]=product::findOrFail($orderProduct->product_id);
        }
        return view('order.orderDetail',['orderProducts'=>$orderProducts,'order'=>$order,'productsDetail'=>$productsDetail]);
    }
}
