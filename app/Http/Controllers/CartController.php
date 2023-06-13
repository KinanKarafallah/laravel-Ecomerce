<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Models\Cart_item;
use App\Models\CartProducts;
use App\Models\Order;
use App\Models\Order_items;
use App\Models\product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\PaymentEvent;
use Stripe;

class CartController extends Controller
{
    public function add_to_cart(Request $request )
    {
        $product = Product::findOrFail($request->input('product_id'));
        Cart::add($product->id, $product->title, 1, $product->price ,0 ,['image' => $product->image,'description'=>$product->description]);
        Cart::setGlobalTax(2);
        return back()->with('message', 'Product added successfully'); 
    }


    public function show_cart()
    {   
       /*  dd(Cart::content()); */  
       return view('cart.view');
    }


    public function updateQty(Request $request , $rowId)
    {
        Cart::update($rowId, $request->input('qty'));
        return back();
    }


    public function delete_cart_product($id)
    {
        Cart::remove($id);
        return back()->with('message','item deleted successfully');
    }

    
    public function checkout(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $cart_item = Cart::content();
        $tax=floatval(Cart::tax());
/*         dd($cart_item[0]->products[0]); */
        $lineItems = [] ;
        if($cart_item != null){
            $user = $request->user();
            $orderData = [
                'total_price' => Cart::total(),
                'status' => OrderStatus::Unpaid,
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ];
            /* dd($orderData); */
            $order = Order::create($orderData);
            foreach($cart_item as $item){
                
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $item->name,
                            /* 'images' => [$item->options->has('image') ? asset('uploads/products/' . $item->options->image ) : ''], */
                        ],
                        'unit_amount' => $item->price * 100 ,
                    ],
                    'quantity' => $item->qty, // cart->quantity
                ];

                $orderItemData =[
                    'order_id'=>$order->id,
                    'product_id'=>$item->id,
                    'quantity'=>$item->qty,
                    'unit_price'=>$item->price,
                ];
                Order_items::create($orderItemData);
            }
            $session = \Stripe\Checkout\Session::create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('checkout.success', [], true) . '?session_id={CHECKOUT_SESSION_ID}'.'&order_id='.$order->id,
                'cancel_url' => route('checkout.failure', [], true),
            ]);
            return redirect($session->url);
        }

    }   
    public function succsess(Request $request)
    {
        \Stripe\Stripe::setApiKey(getenv('STRIPE_SECRET'));
        $user = $request->user();
        
        $session_id = $request->get('session_id');
        /* dd($session_id);
        dd($request->all()); */
        $session = \Stripe\Checkout\Session::retrieve($session_id);
        if (!$session) {
            Order::where('created_by',$user->id)->where('id',$request->get('order_id'))->update(['status' => OrderStatus::Failed]);
            return view('checkout.failure', ['message' => 'Invalid Session ID']);
        }else{
            Cart::destroy();
            Order::where('created_by',$user->id)->where('id',$request->get('order_id'))->update(['status' => OrderStatus::Paid]);
            $order=Order::where('created_by',$user->id)->findOrFail($request->get('order_id'));
            event(new PaymentEvent($order,$user));
            return view('checkout.success',['order'=>$order]);
        }

    } 
    public function failure(Request $request)
    {
        dd($request->all());
    } 

}