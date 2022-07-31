<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.category', [
            "categories" => $categories
        ]);
    }

    public function create()
    {
        return view('admin.category.add_category');
    }

    public function store(Request $request)
    {
        $category = new Category;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . "." . $ext;
            $file->move('asset/upload/category/', $fileName);
            $category->image = $fileName;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_description');
        $category->save();

        return redirect('/category')->with('status', 'Category Added Successfully!');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit_category',[
            'category' => $category
        ]);
    }

    public function update(Request $request,Category $category){
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE ? '1' : '0';
        $category->popular = $request->input('popular') == TRUE ? '1' : '0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_description');

        if($request->hasFile('image')){
            $path = 'asset/upload/category/' . $category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . "." . $ext;
            $file->move('asset/upload/category/', $fileName);
            $category->image = $fileName;
        }
        $category->save();
        
        return redirect('/category')->with('stauts','Your updated is successfully!');
    }

    public function destroy(Category $category){
        $path = 'asset/upload/category/' . $category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();

        return redirect('/category')->with('status','You delete a category successfully!');
    }
}
