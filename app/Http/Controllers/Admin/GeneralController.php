<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function show_general()
    {
        $general = General::find(1);

        return view('admin.general.show_general' , compact('general'));

    }

    public function update_general($id)
    {
        $general = General::find($id);

        return view('admin.general.update_general' , compact('general'));

    }

    public function update_general_confirm(Request $request , $id)
    {
        $general = General::find($id);

        $general->api                 = $request->api;
        $general->info_guide          = $request->info_guide;
        $general->shipping_cost       = $request->shipping_cost;
        $general->shipping_text       = $request->shipping_text;
        $general->additional_info     = $request->additional_info;
        $general->subscriber_discount = $request->subscriber_discount;
        $general->new_user            = $request->new_user;
        $general->pixel               = $request->pixel;
        $general->meta_script         = $request->meta_script;

        $general->save();

        return redirect('/admin/show_general')->with('message' , 'General Updated');
    }


}
