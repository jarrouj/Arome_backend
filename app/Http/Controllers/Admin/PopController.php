<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pop;
use Illuminate\Http\Request;

class PopController extends Controller
{
    public function show_pop(){

        $pop = Pop::latest()->paginate(10);

        return view('admin.pop.show_pop',compact('pop'));
    }

    public function add_pop(Request $request){

        $pop = new Pop;

        $pop->color  = $request->color;
        $pop->titleen = $request->titleen;
        $pop->titlear = $request->titlear;

        $pop->save();

        return redirect()->back()->with('message','Pop Added');

    }

    public function update_pop(Request $request,$id){

        $pop = pop::find($id);

        $pop->color = $request->color;
        $pop->titleen = $request->titleen;
        $pop->titlear = $request->titlear;

        $pop->save();

        return redirect()->back()->with('message','Pop Updated');

    }

    public function delete_pop($id){
        $pop = pop::find($id);

        $pop->delete();

        return redirect()->back()->with('message','Pop Deleted');

    }
}
