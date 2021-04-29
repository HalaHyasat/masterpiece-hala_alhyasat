<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.viewUser', compact('users'));
    }

    public function create()
    {
        return view('admin.addUser');
    }


    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->image)){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('assets/images/avatars/'), $imageName);
        }
        else {
            $imageName= 'default.png';
        }


        $var = new User();
        $var->name = $request->input('name');
        $var->email = $request->input('email');
        $var->password = Hash::make($request->input('password'));
        $var->image = $imageName;
        $var->save();
        return back()->with('success', 'User created successfully.');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        if ($user->image != 'default.png'){
            File::delete(public_path('assets/images/avatars/'.$user->image));
        }
        $user->delete();
        return back()->with('success', 'User deleted!');
    }
}
