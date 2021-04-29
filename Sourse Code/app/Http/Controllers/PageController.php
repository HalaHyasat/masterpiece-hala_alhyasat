<?php

namespace App\Http\Controllers;

use App\CommentUser;
use App\Page;
use App\Post;
use App\PostUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        $users = User::where('id', '!=', $user_id)->get();
        $pages = Page::where('user_id', '!=', 0)->get();
        $limit = 0;
        $myPages = false;
        $allPages = true;
        return view('client.pages', compact('users', 'pages', 'limit', 'myPages', 'allPages'));
    }

    public function show($id)
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', '!=', $user_id)->get();
        $posts = Post::where('page_id', '=', $id)->get();
        $PostUser = PostUser::all()->where('user_id', '=', $user_id);
        $CommentUser = CommentUser::all()->where('user_id', '=', $user_id);
        $page = Page::find($id);

        return view('client.page', compact('users', 'page', 'posts', 'PostUser', 'CommentUser'));
    }

    public function store(Request $request)
    {
        if ($request->has('addPage')) {
            request()->validate([
                'name' => 'required|unique:pages',
                'desc' => 'required|min:20',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

                $imageName = time() . '.' . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('assets/images/pages'), $imageName);

                $var = new Page();
                $var->name = $request->input('name');
                $var->image = $imageName;
                $var->user_id = Auth::user()->id;
                $var->desc = $request->input('desc');
                $var->save();

            return redirect('/pages')->with('success', 'Your page created successfully.');
        }

        if ($request->has('form1')) {
            request()->validate([
                'content' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if (!empty(request()->image)) {
                $imageName = time() . '.' . request()->image->getClientOriginalExtension();
                request()->image->move(public_path('assets/images/post'), $imageName);

                $var = new Post();
                $var->content = $request->input('content');
                $var->media = $imageName;
                $var->user_id = Auth::user()->id;
                $var->page_id = $request->input('id');
                $var->save();
            } else {
                $var = new Post();
                $var->content = $request->input('content');
                $var->user_id = Auth::user()->id;
                $var->page_id = $request->input('id');
                $var->save();
            }

            return back()->with('success', 'Your post published successfully.');
        }

        else{
            $user_id = Auth::user()->id;
            $users = User::where('id', '!=', $user_id)->get();
            $pages = Page::where('user_id', '=', $user_id)->get();
            $limit = 0;
            $myPages = true;
            $allPages = false;
            return view('client.pages', compact('users', 'pages', 'limit', 'myPages', 'allPages'));
        }
    }

    public function create()
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', '!=', $user_id)->get();

        return view('client.addPage', compact('users'));
    }
    }
