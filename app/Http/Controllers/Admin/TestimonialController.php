<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function show_testimonial(){

        $testimonial = Testimonial::latest()->paginate(10);

        return view('admin.testimonial.show_testimonial',compact('testimonial'));
    }

    public function add_testimonial(Request $request){

        $testimonial = new Testimonial;

        $testimonial->texten = $request->texten;
        $testimonial->textar = $request->textar;

        $testimonial->save();
        return redirect()->back()->with('message','Testimonial Added');

    }

    public function update_testimonial(Request $request,$id){

        $testimonial = Testimonial::find($id);


        $testimonial->texten = $request->texten;
        $testimonial->textar = $request->textar;

        $testimonial->save();
        return redirect()->back()->with('message','Testimonial Updated');

    }

    public function delete_testimonial($id){

        $testimonial = Testimonial::find($id);


        $testimonial->delete();

        return redirect()->back()->with('message','Testimonial Desleted');


    }
}
