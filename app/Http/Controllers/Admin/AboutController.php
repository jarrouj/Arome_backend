<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\About_img;
use App\Models\About_point;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AboutController extends Controller
{
    public function show_about()
    {
        $about      = About::find(1);
        $aboutImage = About_img::latest()->paginate(10);
        $aboutPoint = About_point::latest()->paginate(10);

        return view('admin.about.show_about' , compact('about' , 'aboutImage' , 'aboutPoint'));
    }

    public function add_about_point(Request $request)
    {
        $aboutPoint = new About_point;

        $aboutPoint->title = $request->title;
        $aboutPoint->subtitle = $request->subtitle;

        $img = $request->imgpoint;


        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->imgpoint->move('aboutpoint', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('aboutpoint/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('aboutpoint/' . $imgname));

            $aboutPoint->img = $imgname;
        }

        $aboutPoint->save();

        return redirect()->back()->with('message' , 'About Point Added');
    }

    public function add_about_img(Request $request)
    {
        $aboutImage = new About_img();

        $img = $request->img;


        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('aboutimage', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('aboutimage/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('aboutimage/' . $imgname));

            $aboutImage->img = $imgname;
        }

        $aboutImage->save();


        return redirect()->back()->with('message' , 'About Point Added');
    }

    public function update_about($id)
    {
        $about      = About::find($id);
        $aboutImage = About_img::find($id);
        $aboutPoint = About_point::find($id);

        return view('admin.about.update_about' , compact('about' , 'aboutImage' , 'aboutPoint'));
    }

    public function update_about_confirm(Request $request , $id)
    {
        $about      = About::find($id);
        $aboutImage = About_img::find($id);
        $aboutPoint = About_point::find($id);

        //About Data
        $about->text = $request->text;
        $about->title = $request->title;
        $about->subtitle = $request->subtitle;

        $about->save();

        //About Image Data
        $img = $request->img;


        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('aboutimage', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('aboutimage/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('aboutimage/' . $imgname));

            $aboutImage->img = $imgname;
        }

        $aboutImage->save();

        //About Point Data
        $img = $request->imgpoint;


        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->imgpoint->move('aboutpoint', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('aboutpoint/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('aboutpoint/' . $imgname));

            $aboutPoint->img = $imgname;
        }

        $aboutPoint->title    = $request->titlepoint;
        $aboutPoint->subtitle = $request->subtitlepoint;

        $aboutPoint->save();

        return redirect('/admin/show_about')->with('message' , 'About Updated');

    }
}
