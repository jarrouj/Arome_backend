<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function add_size(Request $request , $id)
    {
        $size = new Size;

        $size->size = $request->size;
        $size->price = $request->price;
        $size->points = $request->points;
        $size->qty_tq = $request->qty_tq;

        //assigned the product id from the params id
        $size->product_id = $id;

        $size->save();

        return redirect()->back()->with('message' , 'Size Added');

    }

    public function update_size(Request $request , $id)
    {
        $size = Size::find($id);

        $size->size = $request->size;
        $size->price = $request->price;
        $size->points = $request->points;
        $size->qty_tq = $request->qty_tq;

        $size->save();

        return redirect()->back()->with('message' , 'Size Updated');

    }

    public function delete_size($id)
    {
        $size = Size::find($id);

        $size->delete();

        return redirect()->back()->with('message' , 'Size Deleted');

    }
}
