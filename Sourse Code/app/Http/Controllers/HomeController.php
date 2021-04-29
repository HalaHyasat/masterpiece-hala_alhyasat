<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentUser;
use App\Post;
use App\PostUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $posts = Post::where('page_id', '=', 0)->orderBy('created_at', 'desc')->limit(3)->get();
        $user_id = Auth::user()->id;
        $users = User::where('id', '!=', $user_id)->get();
        $PostUser = PostUser::all()->where('user_id', '=', $user_id);
        $CommentUser = CommentUser::all()->where('user_id', '=', $user_id);
        return view('client.feed', compact('posts', 'PostUser', 'users', 'CommentUser'));
    }

    public function store(Request $request)
    {
        if ($request->has('form1')) {
        request()->validate([
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

            if (!empty(request()->image)){
                $imageName = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('assets/images/post'), $imageName);

                $var = new Post();
                $var->content = $request->input('content');
                $var->media = $imageName;
                $var->user_id = Auth::user()->id;
                $var->save();
            }

            else {
                $var = new Post();
                $var->content = $request->input('content');
                $var->user_id = Auth::user()->id;
                $var->save();
            }


        return back()->with('success', 'Your post published successfully.');
    }

        elseif ($request->has('form2')) {
            $user_id = Auth::user()->id;
            $users = User::where('id', '!=', $user_id)->get();
            $PostUser = PostUser::all()->where('user_id', '=', $user_id);
            $CommentUser = CommentUser::all()->where('user_id', '=', $user_id);
            $limit = $request->input('limit')+3;
            $posts = Post::where('page_id', '=', 0)->orderBy('created_at', 'desc')->limit($limit)->get();
            return view('client.feed', compact('posts', 'PostUser','users', 'CommentUser'));
        }

        elseif ($request->has('form4')){
            $likes = CommentUser::all();
            $user_id = Auth::user()->id;
            $comment_id = $request->input('comment_id');

            $found = false;

            foreach ($likes as $like){
                if ($like->user_id == $user_id and $like->comment_id == $comment_id )
                {$found = true;
                break;
                }
            }

            if (!$found){
                $var = new CommentUser();
                $var->comment_id = $comment_id;
                $var->user_id = $user_id;
                $var->save();
                }

            else{
                $var = CommentUser::all()->where('user_id' ,'=' ,$user_id)->where('comment_id', '=', $comment_id);
                $like_id = $var->first()->id;
                $liked = CommentUser::find($like_id);
                $liked->delete();
            }
            return back();
        }

        elseif ($request->has('form3')){
            $likes = PostUser::all();
            $user_id = Auth::user()->id;
            $post_id = $request->input('post_id');

            $found = false;

            foreach ($likes as $like){
                if ($like->user_id == $user_id and $like->post_id == $post_id )
                {$found = true;
                    break;
                }
            }

            if (!$found){
                $var = new PostUser();
                $var->post_id = $post_id;
                $var->user_id = $user_id;
                $var->save();
            }

            else{
                $var = PostUser::all()->where('user_id' ,'=' ,$user_id)->where('post_id', '=', $post_id);
                $like_id = $var->first()->id;
                $liked = PostUser::find($like_id);
                $liked->delete();
            }
            return back();
        }

        else{
            request()->validate([
                'comment' => 'required',
            ]);

            $var = new Comment();
            $var->content = $request->input('comment');
            $var->user_id = Auth::user()->id;
            $var->post_id = $request->input('post_id');
            $var->save();
            return back()->with('success', 'Your comment added successfully.');
        }

    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return back()->with('success', 'Your post deleted!');
    }

    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $users = User::where('id', '!=', $user_id)->get();
        $post = Post::find($id);
        if ($post->user_id == Auth::user()->id){
        return view('client.editPost', compact('post','users' ));
        }
        else{
        return back()->with('error', 'Your not allowed to edit this post!');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if (!empty(request()->image)){
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('assets/images/post'), $imageName);

            $post = Post::find($id);
            $post->content =  $request->get('content');
            $post->media = $imageName;
            $post->save();
        }

        else {
            $post = Post::find($id);
            $post->content =  $request->get('content');
            $post->save();
        }

        $previous=request()->previous;
        return redirect($previous)->with('success', 'Your post updated!');
    }

    public function redirect(){
        return redirect('/home');
    }

    public function search()
    {
        $word = request()->search_input;
//        $services = Service::where('service_name', 'like', "%$word%")->paginate(6);
//        return view("Public.services", ['services' => $services, 'searched' => $word]);

        $posts = Post::where('page_id', '=', 0)->where('content', 'like', "%$word%")->get();
        $user_id = Auth::user()->id;
        $users = User::where('id', '!=', $user_id)->get();
        $PostUser = PostUser::all()->where('user_id', '=', $user_id);
        $CommentUser = CommentUser::all()->where('user_id', '=', $user_id);
        return view('client.feed', compact('posts', 'PostUser', 'users', 'CommentUser'));
    }
}
