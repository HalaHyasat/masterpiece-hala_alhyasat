<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Chat;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminIndex()
    {
        $users = User::count();
        $posts = Post::where('user_id', 0)->count();
        $chats = Chat::where('receiver', 0)->count() +  Chat::where('sender', 0)->count();
        return view('admin.index', compact('users', 'posts', 'chats'));
    }

    public function index()
    {
        $admins = Admin::where('type', 'admin')->get();
        return view('admin.viewAdmin', compact('admins'));
    }

    //index in admin side
    public function create(){
        return view('admin.addAdmin');
    }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:4',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //if the image input filled store the image to the images folder in public and in the database if not put a default image
        if (!empty(request()->image)){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('admin_assets/images/avatars'), $imageName);
        }
        else {
            $imageName= 'default.png';
        }

        $var = new Admin();
        $var->name = $request->input('name');
        $var->email = $request->input('email');
        $var->password = Hash::make($request->input('password'));
        $var->image = $imageName;
        $var->save();
        return back()->with('success', 'Admin created successfully.');
    }

    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('admin.editAdmin', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //if the image input filled put a new image and delete the previous one from the images folder else put the same image which stored in the database
        if (!empty(request()->image)){
            $admin = Admin::find($id);
            $imageName= $admin-> image;
            if ($imageName != 'default.png'){
                File::delete(public_path('admin_assets/images/avatars/'.$imageName));
            }
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
//            request()->image->move(public_path('assets/images/avatars'), $imageName);
            request()->image->move(public_path('admin_assets/images/avatars'), $imageName);
        }
        else {
            $admin = Admin::find($id);
            $imageName= $admin-> image;
        }

        $admin = Admin::find($id);
        $admin->name =  $request->get('name');
        $admin->email = $request->get('email');
        $admin->password = Hash::make($request->get('password'));
        $admin->image = $imageName;
        $admin->save();

        return redirect('admin/manageAdmin')->with('success', 'Admin updated!');
    }

    public function destroy($id)
    {

        //delete the image from the folder if it is anything but keep it if it is the default image
        $admin = Admin::find($id);
        if ($admin->image != 'default.png'){
            File::delete(public_path('admin_assets/images/avatars/'.$admin->image));
        }
        $admin->delete();
        return back()->with('success', 'Admin deleted!');
    }
}

