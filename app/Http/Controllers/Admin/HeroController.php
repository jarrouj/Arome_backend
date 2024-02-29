<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class HeroController extends Controller
{
    public function show_hero(){
        $hero = Hero::latest()->paginate(10);
        return view('admin.hero.show_hero',compact('hero'));
    }

    public function add_hero(Request $request){

        $hero = new hero;

        $img = $request->img;


        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('hero', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('hero/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('hero/' . $imgname));

            $hero->img = $imgname;
        }

        $hero->titleen = $request->titleen;
        $hero->titlear = $request->titlear;
        $hero->serviceen = $request->serviceen;
        $hero->servicear = $request->servicear;

        $hero->save();


        return redirect()->back()->with('message','Hero Added');

    }

    public function update_hero(Request $request,$id){
        $hero = Hero::find($id);

        $img = $request->img;


        if($img)
        {
            $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

            //Save the original image
            $request->img->move('hero', $imgname);

            //change the image quality using Intervention Image
            $img = Image::make(public_path('hero/' . $imgname));

            $img->encode($img->extension, 10)->save(public_path('hero/' . $imgname));

            $hero->img = $imgname;
        }


        $hero->titleen = $request->titleen;
        $hero->titlear = $request->titlear;
        $hero->serviceen = $request->serviceen;
        $hero->servicear = $request->servicear;


        $hero->save();

        return redirect('/admin/show_hero')->with('message', 'Hero Updated');


    }



    public function delete_hero($id){
        $hero = hero::find($id);

        $hero->delete();

        return redirect()->back()->with('message', 'Hero Deleted');
    }
}
