<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Smell;
use Illuminate\Http\Request;

class SmellController extends Controller
{
    public function add_smell(Request $request)
    {
        $smell = new Smell;

        $smell->smell      = $request->smell;
        $smell->product_id = $request->product_id;

        $smell->save();

        return redirect()->back()->with('message' , 'Smell Added');
    }
    public function update_smell(Request $request , $id)
    {
        $smell = Smell::find($id);

        $smell->smell = $request->smell;

        $smell->save();

        return redirect()->back()->with('message' , 'Smell Updated');
    }

    public function delete_smell($id)
    {
        $smell = Smell::find($id);

        $smell->delete();

        return redirect()->back()->with('message' , 'Smell Deleted');

    }
}
