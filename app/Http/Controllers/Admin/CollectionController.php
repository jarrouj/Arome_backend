<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CollectionController extends Controller
{
    public function show_collection()
    {
        $collection = Collection::latest()->paginate(10);

        return view('admin.collection.show_collection' , compact('collection'));
    }

    public function add_collection(Request $request)
    {
        $collection = new Collection;

        $img = $request->img;


        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('collection', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('collection/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('collection/' . $imgname));

            $collection->img = $imgname;
        }

        $collection->name = $request->name;

        $collection->save();

        return redirect()->back()->with('message' , 'Collection Added');
    }

    public function update_collection(Request $request , $id)
    {
        $collection = Collection::find($id);

        $img = $request->img;


        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('collection', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('collection/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('collection/' . $imgname));

            $collection->img = $imgname;
        }

        $collection->name = $request->name;

        $collection->save();

        return redirect()->back()->with('message' , 'Collection Updated');

    }

    public function delete_collection_with_associate($id)
    {
        $collection = Collection::find($id);

        $categories = Category::where('collection_id', $id)->get();

        foreach ($categories as $category) {
            $products = Product::where('category_id', $category->id)->get();
            foreach ($products as $product) {
                $product->delete();
            }
            $category->delete();
        }

        $collection->delete();
        return redirect()->back()->with('message' , 'Collection Deleted');
    }

    public function delete_collection($id)
    {
        $collection = Collection::find($id);

        $collection->delete();

        return redirect()->back()->with('message' , 'Collection Deleted');

    }


}
