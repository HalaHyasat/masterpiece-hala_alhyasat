<?php

namespace App\Http\Controllers;

use App\CommentUser;
use App\Connection;
use App\Post;
use App\PostUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        return redirect("profile/$user_id");
    }

    public function show($id)
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', '!=', $user_id)->get();
        $user = User::find($id);
        $posts = Post::where('user_id', $id)->get();
        $PostUser = PostUser::all()->where('user_id', '=', $user_id);
        $CommentUser = CommentUser::all()->where('user_id', '=', $id);
        $connections = Connection::all()->where('user_id', '==', $id);
        $connections2= Connection::all()->where('friend_id', '==', $id);

        $relation = false;
        foreach ($connections as $connection){
            if ($connection->friend_id == $user_id) {
                $relation = $connection->id;
            }
        }
        foreach ($connections2 as $connection){
            if ($connection->user_id == $user_id) {
                $relation = $connection->id;
            }
        }
//        dd($relation);
        return view('client.profile', compact('users', 'user', 'relation', 'posts', 'PostUser', 'CommentUser', 'connections', 'connections2'));
    }

    public function edit($id)
    {
        $var = new Connection();
        $var->user_id = Auth::user()->id;
        $var->friend_id = $id;
        $var->save();
        return back();
    }

    public function destroy($id)
    {
        $connection = Connection::find($id);
        $connection->delete();
        return back();
    }

    public function editProfile()
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', '!=', $user_id)->get();
        return view('client.editProfile', compact('users' ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if (!empty(request()->image)){
            $user = User::find($id);
            $imageName= $user-> image;
            if ($imageName != 'default.png'){
                File::delete(public_path('assets/images/avatars/'.$imageName));
            }
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('assets/images/avatars'), $imageName);
        }
        else {
            $user = User::find($id);
            $imageName= $user-> image;
        }

        $user = User::find($id);
        $user->name =  $request->get('name');
        $user->image = $imageName;
        $user->save();

        return redirect("/profile/$id")->with('success', 'Your information updated!');
    }


}
