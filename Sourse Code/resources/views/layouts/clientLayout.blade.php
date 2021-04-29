<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.foxthemes.net/socialitev2.0/feed.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Mar 2021 14:42:49 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href={{asset("assets/images/favicon.png")}} rel="icon" type="image/png">

    <!-- Basic Page Needs
        ================================================== -->
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Socialite is - Professional A unique and beautiful collection of UI elements">

    <!-- icons
    ================================================== -->
    <link rel="stylesheet" href={{asset("assets/scss/icons.html")}}>

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href={{asset("assets/css/style.css")}}>
    <link rel="stylesheet" href={{asset("assets/css/icons.css")}}>

    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">

</head>
<body>




<div id="wrapper" class='{{isset($friend_id) ? 'is-collapse is-active' : ""}}'>

    <!-- Header -->
    <header>
        <div class="header_wrap">
            <div class="header_inner mcontainer">
                <div class="left_side">
                    @if(!isset($friend_id))
                    <span class="slide_menu" uk-toggle="target: #wrapper ; cls: is-collapse is-active">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3 4h18v2H3V4zm0 7h12v2H3v-2zm0 7h18v2H3v-2z" fill="currentColor"></path></svg>
                        </span>
                    @endif

                    <div id="logo">
                        <a href="/home">
                            <img src={{asset("assets/images/logo.png")}} alt="">
                            <img src={{asset("assets/images/logo-mobile.png")}} class="logo_mobile" alt="">
                        </a>
                    </div>
                </div>

                <!-- search icon for mobile -->
                <div class="header-search-icon" uk-toggle="target: #wrapper ; cls: show-searchbox"> </div>
                <div class="header_search">
{{--                    <input value="" type="text" class="form-control" placeholder="Search for Friends , Videos and more.." autocomplete="off">--}}
                    <form action="/search" method="POST" class="search-model-form">
                        @method('POST')
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="search_input" id="search-input" placeholder="Search here.." autocomplete="on">
                    </form>
                    <i class="uil-search-alt"></i>
                </div>

                <div class="right_side">

                    <div class="header_widgets">
                        <a href="/" class="is_link">  Home  </a>

                        <!-- Message -->
                        <a href="#" class="is_icon">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                            </svg>
                        </a>
                        <div uk-drop="mode: click" class="header_dropdown is_message">
                            <div  class="dropdown_scrollbar" data-simplebar>
                                <div class="drop_headline">
                                    <h4>Messages </h4>
                                </div>
                                <ul>

                                    @foreach(Auth::user()->connection as $friend)

                                        <li>
                                            <a href="{{ route('chat.show', $friend->user->id)}}">
                                                <div class="drop_avatar"> <img src='{{asset("assets/images/avatars/".$friend->user->image)}}' style="height: 45px" alt="">
                                                </div>
                                                    <div style="padding: 0.5rem"> {{$friend->user->name}} </div>
                                            </a>
                                        </li>


                                    @endforeach

                                        @foreach(Auth::user()->connections as $friend)

                                            <li>
                                                <a href="{{ route('chat.show', $friend->friend->id)}}">
                                                    <div class="drop_avatar"> <img src='{{asset("assets/images/avatars/".$friend->friend->image)}}' style="height: 45px" alt="">
                                                    </div>
                                                        <div style="padding: 0.5rem">  {{$friend->friend->name}} </div>
                                                </a>
                                            </li>

                                        @endforeach

                                </ul>
                            </div>
                        </div>


                        <a href="#">
                            @php
                            $image = Auth::user()->image;
                            @endphp
                            <img src={{asset("assets/images/avatars/$image")}} class="is_avatar" alt="">
                        </a>
                        <div uk-drop="mode: click;offset:5" class="header_dropdown profile_dropdown">

                            <a href={{ route('profile.show', Auth::user()->id)}} class="user">
                                <div class="user_avatar">
                                    <img src={{asset("assets/images/avatars/$image")}} alt="" style="height: 45px">
                                </div>
                                <div class="user_name">
                                    <div> {{Auth::user()->name}} </div>
                                    <span> {{Auth::user()->email}} </span>
                                </div>
                            </a>
                            <hr class="border-gray-100">
                            <a href="/editProfile">
                                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path></svg>
                                My Account
                            </a>
                            <a href="/pages">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z"  clip-rule="evenodd" />
                                </svg>
                                Manage Pages
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                Log Out
                            </a>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </header>

    <!-- sidebar -->
    <div class="sidebar">
        <div class="sidebar_header">
            <img src={{asset("assets/images/logo.png")}} alt="">
            <img src={{asset("assets/images/logo-icon.html")}} class="logo-icon" alt="">

            <span class="btn-mobile" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></span>

        </div>

        <div class="sidebar_inner" data-simplebar>

            <ul>
                <li class="{{request()->getRequestUri() == '/home' ? 'active': ''}}"><a href="/home">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-blue-600">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        <span> Feed </span> </a>
                </li>
                <li class="{{(request()->getRequestUri() == '/pages' or request()->getRequestUri() == '/pages/#') ? 'active': ''}}"><a href="/pages">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-yellow-500">
                            <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path>
                        </svg>
                        <span> Pages </span> </a>
                </li>


                <li class="{{request()->getRequestUri() == '/courses' ? 'active': ''}}"><a href="/courses">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="text-green-500">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                        </svg>
                        <span> Course</span></a>
                </li>

            </ul>


            <hr>


            <h3 class="text-lg mt-3 font-semibold ml-2 is-title"> All Users </h3>

            <div class="contact-list mt-2 ml-1">
                @foreach($users as $user)
                        <a href="{{ route('profile.show', $user->id)}}">
                            <div class="contact-avatar">
                                <img src={{asset("assets/images/avatars/$user->image")}} alt="">
                            </div>
                            <div class="contact-username"> {{$user->name}}</div>
                        </a>
                @endforeach


            </div>

            <br>
            <br>


        </div>

    </div>

    <!-- Main Contents -->
    <div class="main_content">
        @yield('content')
    </div>

</div>



<!-- open chat box -->
@if(!isset($friend_id))
<div uk-toggle="target: #offcanvas-chat" class="start-chat">
    <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
    </svg>
</div>
@endif

<div id="offcanvas-chat" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar bg-white p-0 w-full lg:w-80">


        <div class="relative pt-5 px-4">

            <h3 class="text-2xl font-bold mb-2"> Chats </h3>

            <div class="absolute right-3 top-4 flex items-center">

                <button class="uk-offcanvas-close  px-2 -mt-1 relative rounded-full inset-0 lg:hidden blcok"
                        type="button" uk-close></button>

                <a href="#" uk-toggle="target: #search;animation: uk-animation-slide-top-small">
                    <ion-icon name="search" class="text-2xl hover:bg-gray-100 p-1 rounded-full"></ion-icon>
                </a>
                <a href="#">
                    <ion-icon name="cog" class="text-2xl hover:bg-gray-100 p-1 rounded-full"></ion-icon>
                </a>
                <a href="#">
                    <ion-icon name="ellipsis-vertical" class="text-2xl hover:bg-gray-100 p-1 rounded-full"></ion-icon>
                </a>

            </div>


        </div>

        <div class="absolute bg-white z-10 w-full -mt-5 lg:mt-0 transform translate-y-1.5 py-2 border-b items-center flex"
             id="search" hidden>
            <input type="text" placeholder="Search.." class="flex-1">
            <ion-icon name="close-outline" class="text-2xl hover:bg-gray-100 p-1 rounded-full mr-4 cursor-pointer"
                      uk-toggle="target: #search;animation: uk-animation-slide-top-small"></ion-icon>
        </div>

        <nav class="cd-secondary-nav border-b extanded mb-2">
            <ul uk-switcher="connect: #chats-tab; animation: uk-animation-fade">
                <li class="uk-active"><a class="active" href="#0"> Contacts </a></li>
            </ul>
        </nav>

        <div class="contact-list px-2 uk-switcher" id="chats-tab">

            <div>

                @foreach(Auth::user()->connection as $friend)

                <a href="{{ route('chat.show', $friend->user->id)}}">
                    <div class="contact-avatar">
                        <img src='{{asset("assets/images/avatars/".$friend->user->image)}}' alt="">
                    </div>
                    <div class="contact-username"> {{$friend->user->name}}</div>
                </a>

                @endforeach

                    @foreach(Auth::user()->connections as $friend)

                        <a href="{{ route('chat.show', $friend->friend->id)}}">
                            <div class="contact-avatar">
                                <img src='{{asset("assets/images/avatars/".$friend->friend->image)}}' alt="">
                                    </div>
                            <div class="contact-username">  {{$friend->friend->name}}</div>
                        </a>

                    @endforeach

            </div>


        </div>
    </div>
</div>



<!-- Javascript
================================================== -->
<script src={{asset("assets/js/jquery-3.3.1.min.js")}}></script>
<script src={{asset("assets/js/uikit.js")}}></script>
<script src={{asset("assets/js/simplebar.js")}}></script>
<script src={{asset("assets/js/custom.js")}}></script>
<script src={{asset("assets/js/bootstrap-select.min.js")}}></script>

</body>

</html>
