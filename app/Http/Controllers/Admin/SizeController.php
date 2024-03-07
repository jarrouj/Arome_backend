<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function add_size(Request $request)
    {
        $size = new Size;

        $size->product_id = $request->product_id;
        $size->size       = $request->size;
        $size->price      = $request->price;
        $size->points     = $request->points;
        $size->qty_tq     = $request->qty_tq;

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
