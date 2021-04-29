<?php

namespace App\Http\Controllers;

use App\Chat;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index(){
        return redirect("chat/0");
    }

    public function show($id){
        $user_id = Auth::user()->id;
        $users = User::where('id', '!=', $user_id)->get();
        $friend_id = $id;
        $friendChat = User::where('id', $id)->get();
        $query = "SELECT * FROM chats WHERE ((sender=$user_id and receiver=$friend_id) or (receiver=$user_id and sender=$friend_id))";
        $chats = DB::select($query);
//        dd($chats);
        return view('client.chat', compact('users', 'friend_id', 'friendChat', 'chats' ));
    }

    public function store(Request $request)
    {
            request()->validate([
                'content' => 'required',
            ]);

            $id = $request->input('friend_id');
            $var = new Chat();
            $var->content = $request->input('content');
            $var->sender = Auth::user()->id;
            $var->receiver = $id;
            $var->save();
            return redirect("/chat/$id");

    }

}
