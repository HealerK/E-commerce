<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function ordershow()
    {
        $order = Order::all();
        return view('admin.order.order',[
            'order' => $order
        ]);
    }

    public function orderstore()
    {
        $orderItems = Cart::where('user_id', Auth::id())->get();
        $total = 0;
        $trackNo = rand(1,100);
        foreach ($orderItems as $item) {
            $total += $item->prod_qty * $item->products->selling_price;
        }
        $order = new Order();
        $order->tracking_no = $trackNo;
        $order->total_price = $total;
        $order->save();

        return redirect('/')->with('status','Order is successfully!');
    }
    public function orderview()
    {   
        $cartItems = Cart::all();
        return view('admin.order.order_view',[
            'cartItems' => $cartItems
        ]);
    }
}
