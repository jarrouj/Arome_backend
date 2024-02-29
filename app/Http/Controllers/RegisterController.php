<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
       $user = new User;

        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect('/admin');
    }
}
