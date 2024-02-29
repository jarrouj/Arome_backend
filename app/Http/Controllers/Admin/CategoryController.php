<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show_Category(){

        $category = Category::latest()->paginate(10);

        return view('admin.category.show_category',compact('category'));
    }

    public function add_Category(Request $request){

        $category = new Category;

        $category->titleen = $request->titleen;
        $category->titlear = $request->titlear;

        $category->save();

        return redirect()->back()->with('message','Category Added');

    }



    public function delete_Category($id){

        $category = Category::find($id);

        $category->delete();

        return redirect()->back()->with('message','Category Deleted');

    }

}
