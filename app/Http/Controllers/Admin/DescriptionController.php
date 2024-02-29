<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Description;
use App\Models\Project;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    public function show_description(){
        $description = Description::latest()->paginate(10);

        $project = Project::all();

        return view('admin.description.show_description',compact('description','project'));
    }

    public function add_description(Request $request){

        $description = new Description;


        $description->project_id = $request->project_id;

        if ($request->project_id == -1)
        {
            return redirect()->back()->with('error', 'You have to pick a category');
        }
        else{

            $project = Project::where('id', '=', $request->project_id)->first();



            $description->project_nameen = $project->nameen;
            $description->project_namear = $project->namear;
            $description->titleen = $request->titleen;
            $description->titlear = $request->titlear;
            $description->texten = $request->texten;
            $description->textar = $request->textar;

            $description->save();


            return redirect()->back()->with('message','Description Added');
        }




    }

    public function update_description($id){

        $description = Description::find($id);
        $project = Project::all();


        return view('admin.description.update_description',compact('description','project'));

    }

    public function update_description_confirm(Request $request,$id){

        $description = Description::find($id);


        if ($request->project_id == -1)
        {
            return redirect()->back()->with('error', 'You have to pick a category');
        }
        else{

            $project = Project::where('id', '=', $request->project_id)->first();



            $description->project_nameen = $project->nameen;
            $description->project_namear = $project->namear;
            $description->titleen = $request->titleen;
            $description->titlear = $request->titlear;
            $description->texten = $request->texten;
            $description->textar = $request->textar;

            $description->save();


            return redirect('/admin/show_description')->with('message','Description Updated');
        }


    }



    public function delete_description($id){
        $description = Description::find($id);

        $description->delete();

        return redirect()->back()->with('message', 'Description Deleted');
    }
}
