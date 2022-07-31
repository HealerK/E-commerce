<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function addToProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('quantity');
        if (Auth::id()) {
            $product_check = Product::where('id', $product_id)->first();
            if ($product_check) {
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return redirect()->back()->with('status', 'This cart is already exists');
                } else {
                    $cart = new Cart();
                    $cart->user_id = Auth::id();
                    $cart->prod_id = $product_id;
                    $cart->prod_qty = $product_qty;
                    $cart->save();
                    return redirect()->back()->with('status', 'Successfully added new cart!');
                }
            }
        } else {
            return redirect('login');
        }
    }

    public function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', [
            'cartItems' => $cartItems
        ]);
    }

    public function cartDelete(Cart $cart_id)
    {
        $cart_id->delete();

        return redirect()->back()->with('status', 'Delete Successfully!');
    }

    public function updatecart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');
        if (Auth::check()) {
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $product_qty;
                $cart->update();

                return response()->json(['status','Quantity Updatae!']);
            }
        }
    }
}
