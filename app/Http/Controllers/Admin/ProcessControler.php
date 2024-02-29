<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Process;
use Illuminate\Http\Request;

class ProcessControler extends Controller
{
    public function show_process(){
        $process = Process::latest()->paginate(10);

        return view('admin.process.show_process',compact('process'));
    }

    public function add_process(Request $request){

        $process = new Process;

        $process->titleen = $request->titleen;
        $process->titlear = $request->titlear;
        $process->texten = $request->texten;
        $process->textar = $request->textar;
        $process->worden = $request->worden;
        $process->wordar = $request->wordar;

        $process->save();


        return redirect()->back()->with('message','Process Added');

    }

    public function update_process(Request $request, $id)
    {
        $process = process::find($id);


        $process->titleen = $request->titleen;
        $process->titlear = $request->titlear;
        $process->texten = $request->texten;
        $process->textar = $request->textar;
        $process->worden = $request->worden;
        $process->wordar = $request->wordar;

        $process->save();

        return redirect()->back()->with('message', 'Process Updated');
    }

    public function delete_process($id){

        $process = process::find($id);

        $process->delete();

        return redirect()->back()->with('message', 'Process Deleted');
    }
}
