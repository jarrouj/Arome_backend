<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Serviceslider;
use Illuminate\Http\Request;


use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ServiceSliderController extends Controller
{
    public function show_service_slider(){

        $service_slider = Serviceslider::latest()->paginate(10);

        return view('admin.service_slider.show_service_slider',compact('service_slider'));

    }

    public function add_service_slider(Request $request){

        $service_slider = new Serviceslider;

        $icon = $request->icon;


        if($icon)
        {
            $iconname = Str::random(20) . '.' . $icon->getClientOriginalExtension();

            //Save the original image
            $request->icon->move('service_slider', $iconname);

            //change the image quality using Intervention Image
            $icon = Image::make(public_path('service_slider/' . $iconname));

            $icon->encode($icon->extension, 10)->save(public_path('service_slider/' . $iconname));

            $service_slider->icon = $iconname;
        }

        $img = $request->img;


        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('service_slider', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('service_slider/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('service_slider/' . $imgname));

            $service_slider->img = $imgname;
        }


        $service_slider->titleen = $request->titleen;
        $service_slider->titlear = $request->titlear;

        $service_slider->save();

        return redirect()->back()->with('messgae','Service Slider Added');


    }

    public function update_service_slider(Request $request,$id){

        $service_slider=Serviceslider::find($id);

        $icon = $request->icon;


        if($icon)
        {
            $iconname = Str::random(20) . '.' . $icon->getClientOriginalExtension();

            //Save the original image
            $request->icon->move('service_slider', $iconname);

            //change the image quality using Intervention Image
            $icon = Image::make(public_path('service_slider/' . $iconname));

            $icon->encode($icon->extension, 10)->save(public_path('service_slider/' . $iconname));

            $service_slider->icon = $iconname;
        }

        $img = $request->img;


        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('service_slider', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('service_slider/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('service_slider/' . $imgname));

            $service_slider->img = $imgname;
        }


        $service_slider->titleen = $request->titleen;
        $service_slider->titlear = $request->titlear;

        $service_slider->save();

        return redirect()->back()->with('messgae','Service Slider Updated');


    }


    public function delete_service_slider($id){

        $service_slider = Serviceslider::find($id);

        $service_slider->delete();

        return redirect()->back()->with('message', 'Service Slider Deleted');
    }


}
