<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Strategy;
use Illuminate\Http\Request;

class StrategyController extends Controller
{
    public function show_strategy(){

        $strategy = Strategy::latest()->paginate(10);

        return view('admin.strategy.show_strategy',compact('strategy'));
    }

    public function add_strategy(Request $request){

        $strategy = new Strategy;

        $strategy->titleen = $request->titleen;
        $strategy->titlear = $request->titlear;
        $strategy->texten = $request->texten;
        $strategy->textar = $request->textar;

        $strategy->save();

        return redirect()->back()->with('message','Strategy Added');

    }

    public function update_strategy(Request $request,$id){

        $strategy = Strategy::find($id);

        $strategy->titleen = $request->titleen;
        $strategy->titlear = $request->titlear;
        $strategy->texten = $request->texten;
        $strategy->textar = $request->textar;

        $strategy->save();

        return redirect()->back()->with('message','Strategy Updated');


    }

    public function delete_strategy($id){

        $strategy = Strategy::find($id);

        $strategy->delete();

        return redirect()->back()->with('message','Strategy Deleted');

    }


}
