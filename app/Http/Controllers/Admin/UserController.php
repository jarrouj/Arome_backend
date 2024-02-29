<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show_user()
    {
        $user = user::latest()->paginate(10);

        return view('admin.user.show_users', compact('user'));
    }

    public function update_user($id)
    {
        $user = user::find($id);

        return view('admin.user.update_user', compact('user'));
    }

    public function update_user_confirm(Request $request, $id)
    {
        $user = user::find($id);

        $user->f_name = $request->f_name;
        $user->f_name = $request->f_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;

        $user->save();

        return redirect('/admin/show_user')->with('message', 'User Updated');
    }

    public function delete_user($id)
    {
        $user = user::find($id);

        $user->delete();

        return redirect()->back()->with('message', 'User Deleted');
    }
}
