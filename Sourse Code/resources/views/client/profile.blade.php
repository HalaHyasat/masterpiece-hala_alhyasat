@extends('layouts.clientLayout')
@section('title')
{{$user->name}} Profile
@endsection
@section('content')
    <div class="mcontainer">

        <div class="profile user-profile bg-white rounded-2xl -mt-4">


            <div class="profiles_banner">
                <img src={{asset("assets/images/avatars/profile-cover.jpg")}} alt="">
                <div class="profile_action absolute bottom-0 right-0 space-x-1.5 p-3 text-sm z-50 hidden lg:flex">
                    @if(Auth::user()->id == $user->id)

                    <a href="/editProfile" class="flex items-center justify-center h-8 px-3 rounded-md bg-gray-700 bg-opacity-70 text-white space-x-1.5">
                        <ion-icon name="create-outline" class="text-xl"></ion-icon>
                        <span> Edit </span>
                    </a>

                    @endif
                </div>
            </div>
            <div class="profiles_content">

                <div class="profile_avatar">
                    <div class="profile_avatar_holder">
                        <img src={{asset("assets/images/avatars/$user->image")}} alt="">
                    </div>
                    <div class="icon_change_photo" hidden> <ion-icon name="camera" class="text-xl"></ion-icon> </div>
                </div>


                <div class="profile_info" style="text-align: center">
                    <h1>{{$user->name}}</h1>
                    <p>{{$user->email}}</p>
                </div>

            </div>
            @if(Auth::user()->id != $user->id)


            @if(!$relation)
                <div class="flex justify-between lg:border-t flex-col-reverse lg:flex-row">
                    <nav class="cd-secondary-nav pl-2 is_ligh -mb-0.5 border-transparent">
                        <ul>
                            <li><a href="{{ route('profile.edit', $user->id)}}"><i class="uil-user-plus"> Add Friend </i></a></li>
                        </ul>
                    </nav>
                </div>

            @else
                <div class="flex justify-between lg:border-t flex-col-reverse lg:flex-row">
                    <nav class="cd-secondary-nav pl-2 is_ligh -mb-0.5 border-transparent">
                        <ul>
                                <form action="{{ route('profile.destroy', $relation)}}" method="POST">
                                    @method('DELETE')
                                    @csrf

                                    <li><button type="submit"><a href=""><i class="uil-user-minus">Delete</i></a></button> </li>
                                </form>
                        </ul>
                    </nav>
                </div>
            @endif
            @endif


        </div>

        <div class="lg:flex lg:mt-8 mt-4 lg:space-x-8">
            <div class="space-y-5 flex-shrink-0 lg:w-7/12">

                @if ($message = Session::get('success'))
                    <div style="background-color: #d4edda; padding: 0.5rem; border-radius:5px ">
                        {{ $message }}
                    </div>
                @endif

                @if($posts->count())
                @foreach($posts as $post)

                    <div class="bg-white shadow border border-gray-100 rounded-lg dark:bg-gray-900 lg:mx-0 uk-animation-slide-bottom-small">

                        <!-- post header-->
                        <div class="flex justify-between items-center lg:p-4 p-2.5">
                            <div class="flex flex-1 items-center space-x-4">
                                <a href="#">
                                    <img src="{{asset('assets/images/avatars/'.$post->user->image)}}" class="bg-gray-200 border border-white rounded-full w-10 h-10">
                                </a>
                                <div class="flex-1 font-semibold capitalize">
                                    <a href="#" class="text-black"> {{ $post->user->name }}</a>
                                    <div class="text-gray-700 flex items-center space-x-2" style="font-size: 10px">{{$post->created_at->format('d.M.y | h:i')}} <span>&nbsp;{{$post->created_at->format('a')}} </span> <ion-icon name="people"></ion-icon></div>
                                </div>
                            </div>
                            <div>

                                @if(Auth::user()->id == $post->user->id or Auth::user()->id == 0)

                                    <a href="#"> <i class="icon-feather-more-horizontal text-2xl hover:bg-gray-200 rounded-full p-2 transition -mr-1 dark:hover:bg-gray-700"></i> </a>

                                @endif
                                <div class="bg-white w-56 shadow-md mx-auto p-2 mt-12 rounded-md text-gray-500 hidden text-base border border-gray-100 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                                     uk-drop="mode: click;pos: bottom-right;animation: uk-animation-slide-bottom-small">

                                    <ul class="space-y-1">
                                        <li>
                                            <a href="{{ route('home.edit', $post->id)}}" class="flex items-center px-3 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md dark:hover:bg-gray-800">
                                                <i class="uil-edit-alt mr-1"></i>  Edit Post
                                            </a>
                                        </li>

                                        <li>
                                            <hr class="-mx-2 my-2 dark:border-gray-800">
                                        </li>
                                        <li>

                                            <form action="{{ route('home.destroy', $post->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="flex items-center px-3 py-2 text-red-500 hover:bg-red-100 hover:text-red-500 rounded-md dark:hover:bg-red-600">
                                                    <i class="uil-trash-alt mr-1"></i>  Delete
                                                </button>
                                            </form>


                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="p-3 border-b dark:border-gray-700">

                            {!! $post->content !!}
                        </div>
                        <div uk-lightbox>
                            <a href='{{asset("assets/images/post/$post->media")}}'>
                                <img src='{{asset("assets/images/post/$post->media")}}' alt="" class="max-h-96 w-full object-cover">
                            </a>
                        </div>


                        <div class="p-4 space-y-3">

                            <div class="flex space-x-4 lg:font-bold">

                                <form action="/home" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <button type="submit" name="form3" class="flex items-center space-x-2">
                                        <div class="p-2 rounded-full text-black lg:bg-gray-100">
                                            @php
                                                $liked = false;
                                            @endphp
                                            @foreach($PostUser as $postUser)
                                                @if ($postUser->post_id == $post->id)
                                                    @php
                                                        $liked = true;
                                                    @endphp
                                                    @break
                                                @endif
                                            @endforeach
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="{{$liked ? 'blue' : 'currentColor'}}" width="22" height="22" class="dark:text-gray-100">
                                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                            </svg>
                                        </div>
                                        <div> Like</div>
                                    </button>
                                </form>
                                <a href="#" class="flex items-center space-x-2">
                                    <div class="p-2 rounded-full text-black lg:bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" width="22" height="22" class="dark:text-gray-100">
                                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div> Comment</div>
                                </a>


                            </div>
                            <div class="flex items-center space-x-3 pt-2">
                                @if($post->UserLikes->count())
                                    <div class="flex items-center">
                                        <img src="{{asset('assets/images/avatars/'.$post->UserLikes->first()->image)}}" alt="" class="w-8 h-8 rounded-full border-2 border-white dark:border-gray-900">
                                    </div>
                                @endif

                                <div class="dark:text-gray-100">
                                    <strong> {{$post->UserLikes->count() ? 'Liked by '.$post->UserLikes->first()->name : 'No likes yet'}}</strong> <strong> {{$post->UserLikes->count()-1 > 0 ? 'and '.($post->UserLikes->count()-1 .' Others') : ''}}</strong>
                                </div>

                            </div>

                            <div class="border-t py-4 space-y-4 dark:border-gray-600">

                                @if($post->comments->count())
                                    @foreach($post->comments as $comment)
                                        <div class="flex">
                                            <div class="w-10 h-10 rounded-full relative flex-shrink-0">
                                                <img src="{{asset('assets/images/avatars/'.$comment->user->image)}}" alt="" class="absolute h-full rounded-full w-full">
                                            </div>
                                            <div>
                                                <div class="flex items-center">

                                                    <div>
                                                        <b class="ml-2">{{$comment->user->name}}</b>
                                                    </div>
                                                    <div class="text-gray-700 py-2 px-3 rounded-md bg-gray-100 relative lg:ml-5 ml-2 lg:mr-12  dark:bg-gray-800 dark:text-gray-100">
                                                        <p class="leading-6">
                                                            {{$comment->content}}
                                                        </p>
                                                        <div class="absolute w-3 h-3 top-3 -left-1 bg-gray-100 transform rotate-45 dark:bg-gray-800"></div>
                                                    </div>
                                                </div>
                                                <div class="text-sm flex items-center space-x-3 mt-2">
                                                    @php
                                                        $loved = false;
                                                    @endphp
                                                    @foreach($CommentUser as $commentUser)
                                                        @if ($commentUser->comment_id == $comment->id)
                                                            @php
                                                                $loved = true;
                                                            @endphp
                                                            @break
                                                        @endif
                                                    @endforeach

                                                    <form action="/home" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                                        <button type="submit" name="form4" class={{$loved ? "text-red-600" : "text-black-50"}}> <i class="uil-heart"></i> Love </button>
                                                    </form>

                                                    <span> {{$comment->created_at->format('d.M.y | h:i')}} </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>


                            <div class="bg-gray-100 rounded-full relative dark:bg-gray-800 border-t">
                                <form action="/home" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <input name="comment" placeholder="Add your Comment.." class="bg-transparent max-h-10 shadow-none px-5">
                                </form>

                            </div>

                        </div>

                    </div>
                @endforeach

                @else



                    <div class="p-3 border-b dark:border-gray-700">

                        There is no post published yet!

                    </div>

                @endif


            </div>
            <div class="lg:w-4/12 space-y-6">

                <div class="widget border-t pt-4">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h4 class="text-2xl -mb-0.5 font-semibold"> Friends </h4>
                            <p> {{$connections->count() + $connections2->count()}} Friends</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-3 text-gray-600 font-semibold">


                        @foreach($connections as $connection)
                        <a href="{{ route('profile.show', $connection->friend->id)}}">
                            <div class="avatar relative rounded-md overflow-hidden w-full h-24 mb-2">
                                <img src='{{asset("assets/images/avatars/".$connection->friend->image)}}' alt="" class="w-full h-full object-cover absolute">
                            </div>
                            <div style="text-align: center; font-size: 12px"> {{$connection->friend->name}} </div>
                        </a>
                        @endforeach

                            @foreach($connections2 as $connection)
                                <a href="{{ route('profile.show', $connection->user->id)}}">
                                    <div class="avatar relative rounded-md overflow-hidden w-full h-24 mb-2">
                                        <img src='{{asset("assets/images/avatars/".$connection->user->image)}}' alt="" class="w-full h-full object-cover absolute">
                                    </div>
                                    <div style="text-align: center; font-size: 12px"> {{$connection->user->name}} </div>
                                </a>
                            @endforeach

                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
