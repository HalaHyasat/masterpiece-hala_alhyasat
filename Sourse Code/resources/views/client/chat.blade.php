@extends('layouts.clientLayout')
@section('title')
    Chat
@endsection
@section('content')

        <span uk-toggle="target: .message-content;" class="fixed left-0 top-36 bg-red-600 z-10 py-1 px-4 rounded-r-3xl text-white"> Users</span>

        <div class="messages-container">
            <div class="messages-container-inner">


                <div class="messages-inbox">
                    <div class="messages-headline">
                        <div class="input-with-icon" hidden>
                            <input id="autocomplete-input" type="text" placeholder="Search">
                            <i class="icon-material-outline-search"></i>
                        </div>
                        <h2 class="text-2xl font-semibold">Chats</h2>
                        <span class="absolute icon-feather-edit mr-4 text-xl uk-position-center-right cursor-pointer"></span>
                    </div>
                    <div class="messages-inbox-inner" data-simplebar>
                        <ul>

                            @foreach(Auth::user()->connections as $friend)
                                <li class={{$friend->friend->id == $friend_id ? "active-message" : ""}}>
                                    <a href="{{ route('chat.show', $friend->friend->id)}}">
                                        <div class="message-avatar"><i class="status-icon status-offline"></i><img src='{{asset("assets/images/avatars/".$friend->friend->image)}}' alt=""></div>

                                        <div class="message-by">
                                            <div class="message-by-headline">
                                                <h5>{{$friend->friend->name}}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach

                            @foreach(Auth::user()->connection as $friend)
                                    <li class={{$friend->user->id == $friend_id ? "active-message" : ""}}>
                                        <a href="{{ route('chat.show', $friend->user->id)}}">
                                            <div class="message-avatar"><i class="status-icon status-offline"></i><img src='{{asset("assets/images/avatars/".$friend->user->image)}}' alt=""></div>

                                            <div class="message-by">
                                                <div class="message-by-headline">
                                                    <h5>{{$friend->user->name}}</h5>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                            @endforeach


                        </ul>
                    </div>
                </div>


                <div class="message-content">

                    <div class="messages-headline">

                            <h4>{{$friendChat->first()->name}} </h4>

                    </div>

                    <div class="message-content-scrolbar" data-simplebar>

                        <!-- Message Content Inner -->
                        <div class="message-content-inner">

                        @foreach($chats as $chat)

                            @if($chat->sender == Auth::user()->id)
                                <div class="message-bubble me">
                                    <div class="message-bubble-inner">
                                        @php
                                        $image = Auth::user()->image;
                                        @endphp
                                        <div class="message-avatar"><img src={{asset("assets/images/avatars/$image")}} alt=""></div>
                                        <div class="message-text"><p>{{$chat->content}}</p>
                                            <p style="font-size: 8px; color: lightgray">{{$chat->created_at}}</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            @else

                                <div class="message-bubble">
                                    <div class="message-bubble-inner">
                                        @php
                                            $image = $friendChat->first()->image;
                                        @endphp
                                        <div class="message-avatar"><img src={{asset("assets/images/avatars/$image")}} alt=""></div>
                                        <div class="message-text"><p>{{$chat->content}}</p>
                                            <p style="font-size: 8px; color: darkgray">{{$chat->created_at}}</p>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            @endif

                        @endforeach
                        <!-- Message Content Inner / End -->

                        <!-- Reply Area -->
                            <form action="/chat" method="POST">
                        <div class="message-reply">
                                @csrf
                                <input name="friend_id" type="hidden" value="{{$friend_id}}">
                            <textarea name="content" cols="1" rows="1" placeholder="Your Message"></textarea>
                            <button type="submit" class="button ripple-effect">Send</button>
                        </div>
                            </form>

                    </p>

                </div>


            </div>
        </div>

@endsection
