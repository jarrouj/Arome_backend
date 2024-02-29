<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function show_service()
    {
        $service = Service::latest()->paginate(10);

        return view('admin.service.show_service', compact('service'));
    }

    public function add_service(Request $request)
    {
        $service = new service;

        $icon=$request->icon;

        if($icon)
        {
            $iconname = Str::random(20) . '.' . $icon->getClientOriginalExtension();

            //Save the original image
            $request->icon->move('service', $iconname);

            //change the image quality using Intervention Image
            $icon = Image::make(public_path('service/' . $iconname));

            $icon->encode($icon->extension, 10)->save(public_path('service/' . $iconname));

            $service->icon = $iconname;
        }



        $service->titleen = $request->titleen;
        $service->titlear = $request->titlear;
        $service->texten = $request->texten;
        $service->textar = $request->textar;

        $service->save();


        return redirect()->back()->with('message','Service Added');


    }

    public function update_service($id)
    {
        $service = service::find($id);

        return view('admin.service.update_service', compact('service'));
    }

    public function update_service_confirm(Request $request, $id)
    {
        $service = service::find($id);

        $icon=$request->icon;

        if($icon)
        {
            $logoname = Str::random(20) . '.' . $icon->getClientOriginalExtension();

            //Save the original image
            $request->icon->move('service', $logoname);

            //change the image quality using Intervention Image
            $img2 = Image::make(public_path('service/' . $logoname));
            $img2->save(public_path('service/' . $logoname));

            $service->icon = $logoname;
        }

        $service->titleen = $request->titleen;
        $service->titlear = $request->titlear;
        $service->texten = $request->texten;
        $service->textar = $request->textar;

        $service->save();


        return redirect('/admin/show_service')->with('message','Service Updated');

    }

    public function delete_service($id)
    {
        $service = service::find($id);


        $service->delete();

        return redirect()->back()->with('message', 'Service Deleted');
    }


}
