<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class WishlistController extends Controller
{
    public function wishshow()
    {
        $wishlists = Wishlist::all();
        return view('frontend.wishlist', [
            'wishlists' => $wishlists
        ]);
    }

    public function wishstore(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Product::find($prod_id)) {
                $wish = new Wishlist();
                $wish->user_id = Auth::id();
                $wish->prod_id = $prod_id;
                $wish->save();
                return response()->json(['stauts' => 'Wishlist added Successfully!']);
            } else {
                return response()->json(['status' => 'Product doesnot exti!']);
            }
        } else {
            return response()->json(['status' => 'Login to continue']);
        }
    }

    public function wishDelete(Wishlist $wish_id)
    {
        $wish_id->delete();
        return redirect()->back()->with('status', 'Delete Successfully!');
    }

    public function addtoCart(Request $request)
    {
        $product_id = $request->input('prod_id');
        $product_qty = $request->input('prod_qty');
        if (Auth::id()) {
            $product_check = Product::where('id', $product_id)->first();
            if ($product_check) {
                if (Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status'=> $product_check->name .'This cart is already exists']);
                } else {
                    $cart = new Cart();
                    $cart->user_id = Auth::id();
                    $cart->prod_id = $product_id;
                    $cart->prod_qty = $product_qty;
                    $cart->save();
                    return response()->json(['status'=> $product_check->name .'Added to cart']);
                }
            }
        } else {
            return response()->json(['status'=> "Login to continue."]);
        }
    }
}
