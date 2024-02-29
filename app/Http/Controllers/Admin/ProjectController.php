<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    public function show_project(){

        $project = Project::latest()->paginate(10);

        $category = category::all();

        return view('admin.project.show_project',compact('project', 'category'));
    }

    public function add_project(Request $request){

        $project = new Project;


        $project->category_id = $request->category_id;

        if ($request->category_id == -1)
        {
            return redirect()->back()->with('error', 'You have to pick a category');
        }
        else
        {
            $category = category::where('id', '=', $request->category_id)->first();

            $project->category_nameen = $category->titleen;
            $project->category_namear = $category->titlear;

            $project->color = $request->color;
            $project->nameen = $request->nameen;
            $project->namear = $request->namear;
            $project->texten = $request->texten;
            $project->textar = $request->textar;
            $project->dateen = $request->dateen;
            $project->datear = $request->datear;
            $project->clienten = $request->clienten;
            $project->clientar = $request->clientar;

            $img = $request->img;

            if($img)
            {
                $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

                //Save the original image
                $request->img->move('project', $imgname);

                //change the image quality using Intervention Image
                $img = Image::make(public_path('project/' . $imgname));

                $img->encode($img->extension, 10)->save(public_path('project/' . $imgname));

                $project->img = $imgname;
            }

            $project->save();

            return redirect()->back()->with('message','Project Added');
        }

    }

    public function update_project($id){

        $project = project::find($id);

        $category = category::all();


        return view('admin.project.update_project',compact('project','category'));

    }

    public function update_project_confirm(Request $request,$id){

        $project = project::find($id);


        $project->category_id = $request->category_id;

        if ($request->category_id == -1)
        {
            return redirect()->back()->with('error', 'You have to pick a category');
        }
        else
        {
            $category = category::where('id', '=', $request->category_id)->first();

            $project->category_nameen = $category->titleen;
            $project->category_namear = $category->titlear;

            $project->color = $request->color;
            $project->nameen = $request->nameen;
            $project->namear = $request->namear;
            $project->texten = $request->texten;
            $project->textar = $request->textar;
            $project->dateen = $request->dateen;
            $project->datear = $request->datear;
            $project->clienten = $request->clienten;
            $project->clientar = $request->clientar;

            $img = $request->img;

            if($img)
            {
                $imgname = Str::random(20) . '.' . $img->getClientOriginalExtension();

                //Save the original image
                $request->img->move('project', $imgname);

                //change the image quality using Intervention Image
                $img = Image::make(public_path('project/' . $imgname));

                $img->encode($img->extension, 10)->save(public_path('project/' . $imgname));

                $project->img = $imgname;
            }

            $project->save();

            return redirect('/admin/show_project')->with('message','Project Updated');
        }



    }



    public function delete_Project($id){
        $project = project::find($id);

        $project->delete();

        return redirect()->back()->with('message', 'project Deleted');
    }
}
