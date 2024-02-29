<?php

namespace App\Http\Controllers\Admin;

use App\Models\Promo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function show_promo()
    {
        $promo = Promo::latest()->paginate(10);

        return view('admin.promo.show_promo' , compact('promo'));
    }

    public function add_promo(Request $request)
    {
        $promo = new Promo;

        $promo->name = $request->name;
        $promo->promo = $request->promo;
        $promo->discount = $request->discount;
        $promo->active = $request->active;

        $promo->save();

        return redirect()->back()->with( 'message' , 'Promo Added');
    }

    public function update_promo(Request $request , $id)
    {
        $promo = Promo::find($id);

        $promo->name = $request->name;
        $promo->promo = $request->promo;
        $promo->discount = $request->discount;
        $promo->active = $request->active;

        $promo->save();

        return redirect()->back()->with( 'message' , 'Promo Updated');
    }

    public function delete_promo($id)
    {
        $promo = Promo::find($id);

        $promo->delete();

        return redirect()->back()->with('message' , 'Promo Deleted');
    }
}
