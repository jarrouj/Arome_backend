<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmsController extends Controller
{
    public function dash()
    {
        $user =  User::latest()->paginate(5);
        return view('admin.home' , compact('user'));
    }
}
