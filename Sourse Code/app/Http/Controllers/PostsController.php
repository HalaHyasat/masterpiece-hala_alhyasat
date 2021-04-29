<?php

namespace App\Http\Controllers;

use App\Page;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', 0)->orderBy("created_at","desc")->paginate(2);
        return view('admin.viewPost', compact('posts'));
    }

    public function create()
    {
        $courses = Page::where('user_id', 0)->get();
        return view('admin.addPost', compact('courses'));
    }


    public function store(Request $request)
    {
        request()->validate([
            'course' => 'required',
            'content' => 'required|min:25',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $var = new Post();
        if (!empty(request()->image)) {
            $imageName = time() . '.' . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('assets/images/post/'), $imageName);
            $var->media = $imageName;
        }
        $var->page_id = $request->input('course');
        $var->content = $request->input('content');
        $var->user_id = 0;
        $var->save();
        return back()->with('success', 'Post created successfully.');
    }

    public function edit($id){
        $post = Post::find($id);
        $courses = Page::where('user_id', 0)->get();
        return view('admin.editPost', compact('post', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course' => 'required',
            'content' => 'required|min:25',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->image)){
            $post = Post::find($id);
            $imageName= $post-> image;
            File::delete(public_path('assets/images/post/'.$imageName));
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('assets/images/post/'), $imageName);
        }
        else {
            $post = Post::find($id);
            $imageName= $post->media;
        }

        $post = Post::find($id);
        $post->content =  $request->get('content');
        $post->page_id = $request->get('course');
        $post->media = $imageName;
        $post->save();

        return redirect('admin/managePost')->with('success', 'Post updated!');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        File::delete(public_path('assets/images/post/'.$post->image));

        $post->delete();
        return back()->with('success', 'Post deleted!');
    }

}
