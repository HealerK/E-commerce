<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CheckController extends Controller
{
    public function checkout()
    {
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartItems as $item) {
            if (!Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()) {
                $removeItem =  Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id);
                $removeItem->delete();
            }
            $cartItems = Cart::where('user_id', Auth::id())->get();
            return view('frontend.checkout', [
                'cartItems' => $cartItems
            ]);
        }
    }
}
