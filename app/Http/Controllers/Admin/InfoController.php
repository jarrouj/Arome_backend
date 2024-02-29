<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;


use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class InfoController extends Controller
{
    public function show_info(){
        $info = Info::latest()->paginate(10);
        return view('admin.info.show_info',compact('info'));
    }

    public function add_info(Request $request){

        $info = new Info;

        $img = $request->img;


        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('info', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('info/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('info/' . $imgname));

            $info->img = $imgname;
        }

        $info->texten = $request->texten;
        $info->textar = $request->textar;

        $info->save();


        return redirect()->back()->with('message','Info Added');

    }

    public function update_info(Request $request,$id){
        $info = info::find($id);

        $img = $request->img;


        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('info', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('info/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('info/' . $imgname));

            $info->img = $imgname;
        }


        $info->texten = $request->texten;
        $info->textar = $request->textar;


        $info->save();

        return redirect('/admin/show_info')->with('message', 'info Updated');


    }



    public function delete_info($id){
        $info = info::find($id);

        $info->delete();

        return redirect()->back()->with('message', 'Info Deleted');
    }
}
