<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show_category()
    {
        $category = Category::latest()->paginate(10);
        $collections = Collection::all();

        return view('admin.category.show_category' , compact('category' , 'collections'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->collection_id = $request->collection_id;
        $category->name          = $request->name;

        $category->save();

        return redirect()->back()->with('message' , 'Category Added');
    }

    public function update_category(Request $request , $id)
    {
        $category = Category::find($id);

        $category->collection_id = $request->collection_id;
        $category->name          = $request->name;

        $category->save();

        return redirect()->back()->with('message' , 'Category Updated');

    }
    public function  delete_category($id)
    {

        $category = Category::find($id);
        $product  = Product::where('category_id' , '=' , $id);

        $product->delete();
        $category->delete();

        return redirect()->back()->with('message' , 'Category Deleted');
    }

}
