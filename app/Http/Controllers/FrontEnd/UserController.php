<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function add_user(Request $request)
{
    $f_name = $request->f_name;
    $l_name = $request->l_name;
    $address = $request->address;
    $email = $request->email;
    $phone = $request->phone;


    $userData = [
        // 'user_id' => $user->id,
        'f_name' => $f_name,
        'l_name' => $l_name,
        'address' => $address,
        'email' => $email,
        'phone' => $phone,
        'points' => 0
    ];
    $request->session()->put('userData', $userData);

    return response()->json($userData);
}


public function get_userInfo()
{
    $userInfo = session()->get('userData', []);

    return response()->json(['user_data' => $userInfo]);
}

}
