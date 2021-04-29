<?php

namespace App\Http\Controllers;

use App\CommentUser;
use App\Page;
use App\Post;
use App\PostUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $users = User::where('id', '!=', $user_id)->get();
        $courses = Page::where('user_id', '=', 0)->get();
        $limit = 0;
        return view('client.courses', compact('users', 'courses', 'limit'));
    }
    public function show($id)
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', '!=', $user_id)->get();
        $posts = Post::where('page_id', '=', $id)->get();
        $PostUser = PostUser::all()->where('user_id', '=', $user_id);
        $CommentUser = CommentUser::all()->where('user_id', '=', $user_id);
        $page = Page::find($id);

        return view('client.course', compact('users', 'page', 'posts', 'PostUser', 'CommentUser'));
    }
}
