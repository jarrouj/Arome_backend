<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Date;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class CmsController extends Controller
{
    public function dash()
    {
        $user =  User::latest()->paginate(5);
        return view('admin.home', compact('user'));
    }


    public function filterDate(Request $request)
    {
        $fromDate = $request->input('start_date');
        $toDate = $request->input('end_date');


        session()->put('selected_date_range', [$fromDate, $toDate]);

        // $session = session()->get('selected_date_range', []);

        // dd($session);

        return redirect()->back();
    }
}
