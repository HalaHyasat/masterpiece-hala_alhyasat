@extends('layouts.clientLayout')
@section('title')
{{$page->name}} Page
@endsection
@section('content')
    <div class="mcontainer">

        <div class="profile is_group bg-white rounded-2xl -mt-4">

            <div class="profiles_banner">
                <img src={{asset("assets/images/pages/group-cover-1.jpg")}} alt="">
            </div>
            <div class="profiles_content">
                <div class="profile_avatar">
                    <div class="profile_avatar_holder">
                        <img src="{{asset('assets/images/pages/'.$page->image)}}" alt="">
                    </div>
                    <div class="icon_change_photo" hidden> <ion-icon name="camera" class="text-xl"></ion-icon> </div>
                </div>
                <div class="profile_info">
                    <h1> {{$page->name}} </h1>
                </div>

            </div>

        </div>

        <div class="lg:flex lg:mt-8 mt-4 lg:space-x-8">
            <div class="lg:w-8/12 space-y-7">
                @if ($message = Session::get('success'))
                    <div style="background-color: #d4edda; padding: 0.5rem; border-radius:5px ">
                        {{ $message }}
                    </div>
                @endif


                @if ($errors->has('content'))
                    <div style="background-color: #f8d7da; padding: 0.5rem; border-radius:5px ">
                        {{ $errors->first('content') }}
                    </div>
                @endif

                @if ($errors->has('image'))
                    <div style="background-color: #f8d7da; padding: 0.5rem; border-radius:5px ">
                        {{ $errors->first('image') }}
                    </div>
                @endif

                @if ($errors->has('comment'))
                    <div style="background-color: #f8d7da; padding: 0.5rem; border-radius:5px ">
                        {{ $errors->first('comment') }}
                    </div>
                @endif

                <div class="bg-white shadow border border-gray-100 rounded-lg dark:bg-gray-900 lg:mx-0 p-4" uk-toggle="target: #create-post-modal">
                    <div class="flex space-x-3">
                        <img src='{{asset("assets/images/avatars/".Auth::user()->image)}}' class="w-10 h-10 rounded-full">
                        <input placeholder="What's Your Mind ? {{Auth::user()->name}}!" class="bg-gray-100 hover:bg-gray-200 flex-1 h-10 px-6 rounded-full">
                    </div>
                    <div class="grid grid-flow-col pt-3 -mx-1 -mb-1 font-semibold text-sm">
                        <div class="hover:bg-gray-100 flex items-center p-1.5 rounded-md cursor-pointer">
                            <svg class="bg-blue-100 h-9 mr-2 p-1.5 rounded-full text-blue-600 w-9 -my-0.5 hidden lg:block" data-tippy-placement="top" title="Tooltip" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Photo
                        </div>
                    </div>
                </div>



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

                                @if(Auth::user()->id == $post->user->id)

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



            </div>
            <div class="lg:w-4/12 flex-shirink-0">

                <div class="bg-white rounded-md shadow-sm border p-5">

                    <h1 class="block text-xl font-bold"> About  </h1>

                    <div class="space-y-4 mt-3">

                        <div class="flex items-center space-x-3">
                            <ion-icon name="alert-circle" class="bg-gray-100 p-1.5 rounded-full text-xl"></ion-icon>
                            <div class="flex-1">
                                <div> {{$page->desc}} </div>
                            </div>
                        </div>


                        <div class="flex items-center space-x-3">
                            <ion-icon name="mail-open" class="bg-gray-100 p-1.5 rounded-full text-xl"></ion-icon>
                            <div class="flex-1">
                                <div>  <a href="{{url('/profile/'.$page->user->id)}}" class="text-blue-500">{{$page->user->name}}</a> </div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-3">
                            <ion-icon name="mail-open" class="bg-gray-100 p-1.5 rounded-full text-xl"></ion-icon>
                            <div class="flex-1">
                                <div>  <a href="#" class="text-blue-500">{{$page->user->email}}</a> </div>
                            </div>
                        </div>

                    </div>


                </div>

                <div class="widget border-t pt-6">
                    <div class="flex items-center justify-between mb-2">
                        <div>
                            <h4 class="text-xl -mb-0.5 font-semibold">  Related Pages </h4>
                        </div>
                        <a href="/pages" class="text-blue-600 ">See all</a>
                    </div>
                    <div>
                        @foreach($page->user->pages as $related)
                            @if($related->id != $page->id)
                                <a href="{{ route('pages.show', $related->id)}}">
                        <div class="flex items-center space-x-4 hover:bg-gray-100 rounded-md -mx-2 p-2">
                            <div class="w-14 h-14 flex-shrink-0 rounded-md relative">
                                <img src="{{asset('assets/images/pages/'.$related->image)}}" class="absolute w-full h-full inset-0 rounded-md" alt="">
                            </div>
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold capitalize"> {{$related->name}}  </h3>
                                <div class="text-sm text-gray-500 -mt-0.5" style="text-overflow: ellipsis;  width: 17em; white-space: nowrap; overflow: hidden;"> {{$related->desc}}</div>
                            </div>
                        </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- Craete post modal -->

    <div id="create-post-modal" class="create-post" uk-modal>
        <div
            class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-lg p-0 lg:w-5/12 relative shadow-2xl uk-animation-slide-bottom-small">

            <div class="text-center py-4 border-b">
                <h3 class="text-lg font-semibold"> Create Post </h3>
                <button class="uk-modal-close-default bg-gray-100 rounded-full p-2.5 m-1 right-2" type="button" uk-close uk-tooltip="title: Close ; pos: bottom ;offset:7"></button>
            </div>
            <form action="/pages" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input name="id" type="hidden" value="{{$page->id}}">
                <div class="flex flex-1 items-start space-x-4 p-5">
                    <img src='{{asset("assets/images/avatars/".Auth::user()->image)}}'
                         class="bg-gray-200 border border-white rounded-full w-11 h-11">
                    <div class="flex-1 pt-2">
                    <textarea name="content" class="uk-textare text-black shadow-none focus:shadow-none text-xl font-medium resize-none" style="margin-top: -1rem" rows="5"
                              placeholder="What's Your Mind ? {{Auth::user()->name}}!">{{old('content')}}</textarea>
                    </div>

                </div>

                <label for="choose-file" id="choose-file-label" class="bsolute bottom-0 p-4 space-x-4 w-full" style="cursor: pointer">
                    <div class="flex bg-gray-50 border border-purple-100 rounded-2xl p-3 shadow-sm items-center">
                        <div class="lg:block hidden"> Add to your post </div>
                        <div class="flex flex-1 items-center lg:justify-end justify-center space-x-2">

                            <svg class="bg-blue-100 h-9 p-1.5 rounded-full text-blue-600 w-9 cursor-pointer" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>


                        </div>
                    </div>
                </label>
                <input name="image" type="file" id="choose-file" style="display: none;" />



                <div class="flex items-center w-full justify-between p-3 border-t">


                    <div class="flex space-x-2">
                        <button type="submit" name="form1" class="bg-blue-600 flex h-9 items-center justify-center rounded-md text-white px-5 font-medium">
                            Share </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
