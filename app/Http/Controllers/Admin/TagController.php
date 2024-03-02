<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show_tag()
    {
        $tag = Tag::latest()->paginate(10);

        return view('admin.tag.show_tag' , compact('tag'));
    }

    public function add_tag(Request $request)
    {
        $tag = new Tag;

        $tag->name = $request->name;
        $tag->color = $request->color;

        $tag->save();

        return redirect()->back()->with('message' , 'Tag Added');
    }

    public function update_tag(Request $request , $id)
    {
       $tag = Tag::find($id);

       $tag->name = $request->name;
       $tag->color = $request->color;

       $tag->save();

       return redirect()->back()->with('message' , 'Tag Updated');
    }

    public function delete_tag($id)
    {
        $tag = Tag::find($id);

        $tag->delete();

        return redirect()->back()->with('message' , 'Tag Deleted');

    }
}
