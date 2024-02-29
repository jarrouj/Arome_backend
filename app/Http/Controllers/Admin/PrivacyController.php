<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Privacy;


class PrivacyController extends Controller
{
    public function show_privacy()
    {
        $privacy = Privacy::latest()->paginate(10);

        return view('admin.privacy.show_privacy' , compact('privacy'));
    }

    public function add_privacy(Request $request)
    {
        $privacy = new Privacy;

        $privacy->text = $request->text;
        $privacy->title = $request->title;

        $privacy->save();

        return redirect()->back()->with('message' , 'privacy Added');
    }

    public function update_privacy(Request $request , $id)
    {
        $privacy = Privacy::find($id);

        $privacy->text = $request->text;
        $privacy->title = $request->title;

        $privacy->save();

        return redirect()->back()->with('message' , 'privacy Updated');
    }

    public function delete_privacy($id)
    {
        $privacy = Privacy::find($id);

        $privacy->delete();

        return redirect()->back()->with('message' , 'privacy Deleted');
    }

}
