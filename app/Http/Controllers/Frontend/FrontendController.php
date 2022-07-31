<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $products = Product::where('trending','1')->take(15)->get();
        $categories = Category::where('popular','1')->get();
        return view('frontend.front',[
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function category(){
        $categories = Category::where('status','1')->get();
        return view('frontend.front_category',[
            'categories' => $categories
        ]);
    }

    public function viewcategory($slug){
        if(Category::where('slug',$slug)->exists()){
            $category = Category::where('slug',$slug)->first();
            $products = Product::where('category_id',$category->id)->where('status','0')->get();
            return view('frontend.product.index',[
                'category' => $category,
                'products' => $products
            ]);
        }else{
            redirect('/')->with('status','Your slug does not exit');
        }
    }
    public function viewproduct($cat_slug,$product_slug)
    {
        if(Category::where('slug',$cat_slug)->exists()){
            if(Product::where('slug',$product_slug)->exists()){
                $products = Product::where('slug',$product_slug)->first();
                return view('frontend.product.view',[
                    'products' => $products
                ]);
            }else{
                return redirect('/')->with('status','Your product is not found!');
            }
        }else{
            return redirect('/')->with('status','Your category is not found!');
        }
    }
}
