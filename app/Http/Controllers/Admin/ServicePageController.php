<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Servicepage;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ServicePageController extends Controller
{
    public function show_service_page(){

        $service_page = Servicepage::find(1);

        return view('admin.service_page.show_service_page',compact('service_page'));
    }

    public function update_service_page(Request $request,$id){

        $service_page = Servicepage::find(1);


        $img1 = $request->img1;


        if($img1)
        {
            $img1name = Str::random(20) . '.' . $img1->getClientOriginalExtension();

            //Save the original image
            $request->img1->move('service_page', $img1name);

            //change the image quality using Intervention Image
            $img1 = Image::make(public_path('service_page/' . $img1name));

            $img1->encode($img1->extension, 10)->save(public_path('service_page/' . $img1name));

            $service_page->img1 = $img1name;
        }

        $img2 = $request->img2;


        if($img2)
        {
            $img2name = Str::random(20) . '.' . $img2->getClientOriginalExtension();

            //Save the original image
            $request->img2->move('service_page', $img2name);

            //change the image quality using Intervention Image
            $img2 = Image::make(public_path('service_page/' . $img2name));

            $img2->encode($img2->extension, 10)->save(public_path('service_page/' . $img2name));

            $service_page->img2 = $img2name;
        }

        $img3 = $request->img3;


        if($img3)
        {
            $img3name = Str::random(20) . '.' . $img3->getClientOriginalExtension();

            //Save the original image
            $request->img3->move('service_page', $img3name);

            //change the image quality using Intervention Image
            $img3 = Image::make(public_path('service_page/' . $img3name));

            $img3->encode($img3->extension, 10)->save(public_path('service_page/' . $img3name));

            $service_page->img3 = $img3name;
        }


        $img4 = $request->img4;


        if($img4)
        {
            $img4name = Str::random(20) . '.' . $img4->getClientOriginalExtension();

            //Save the original image
            $request->img4->move('service_page', $img4name);

            //change the image quality using Intervention Image
            $img4 = Image::make(public_path('service_page/' . $img4name));

            $img4->encode($img4->extension, 10)->save(public_path('service_page/' . $img4name));

            $service_page->img4 = $img4name;
        }


        $service_page->titleen = $request->titleen;
        $service_page->titlear = $request->titlear;

        $service_page->save();

        return redirect()->back()->with('message','Service Page Updated');

    }


}
