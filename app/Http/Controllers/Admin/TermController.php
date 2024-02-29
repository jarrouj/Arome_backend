<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Term;

class TermController extends Controller
{
    public function show_term()
    {
        $term = Term::latest()->paginate(10);

        return view('admin.term.show_term' , compact('term'));
    }

    public function add_term(Request $request)
    {
        $term = new Term;

        $term->text = $request->text;
        $term->title = $request->title;

        $term->save();

        return redirect()->back()->with('message' , 'Term Added');
    }

    public function update_term(Request $request , $id)
    {
        $term = Term::find($id);

        $term->text = $request->text;
        $term->title = $request->title;

        $term->save();

        return redirect()->back()->with('message' , 'Term Updated');
    }

    public function delete_term($id)
    {
        $term = Term::find($id);

        $term->delete();

        return redirect()->back()->with('message' , 'Term Deleted');
    }

}
