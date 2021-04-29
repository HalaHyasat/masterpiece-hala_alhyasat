@extends('layouts.clientLayout')
@section('title')
Pages
@endsection
@section('content')
    <div class="mcontainer">

        <div class="lg:flex lg:space-x-10">

            <div class="lg:w-2/3">
                <div class="flex justify-between relative md:mb-4 mb-3">
                    <div class="flex-1">
                        <h2 class="text-3xl font-semibold"> Pages </h2>
                        <nav class="cd-secondary-nav border-b md:m-0 -mx-4">
                                <form action="/pages" method="POST" style="display: inline-block">
                                    @csrf
                            <ul>
                                <li class="{{$allPages ? 'active': ''}}"><a href="/pages" class="lg:px-2"> All pages </a></li>
                                @if(Auth::user()->id != 0)
                                <li class="{{$myPages ? 'active': ''}}"><a href="#" class="lg:px-2"><button type="submit"> My pages</button></a></li>
                                @endif
                            </ul>
                                </form>
                        </nav>
                    </div>

                    @if(Auth::user()->id != 0)
                    <a  href="{{ route('pages.create')}}"  class="flex items-center justify-center h-9 lg:px-5 px-2 rounded-md bg-blue-600 text-white space-x-1.5 absolute right-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="md:block hidden"> Create </span>
                    </a>
                    @endif
                </div>

                <div class="relative" uk-slider="finite: true">
                    <div class="uk-slider-container px-1 py-3">
                        <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-child-width-1-2 uk-grid-small uk-grid">
                            @foreach($pages as $page)
                                <li>
                                <a href="{{ route('pages.show', $page->id)}}">
                                    <img src="{{asset('assets/images/pages/'.$page->image)}}" class="w-full h-48 rounded-lg shadow-sm object-cover">
                                    <div class="pt-2">
                                        <h4 class="text-lg font-semibold"> {{$page->name}}  </h4>
                                        <p class="text-sm" style="text-overflow: ellipsis;  width: 10em; white-space: nowrap; overflow: hidden;">{{$page->desc}} </p>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>

                        <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                           href="#" uk-slider-item="previous"> <i class="icon-feather-chevron-left"></i></a>
                        <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                           href="#" uk-slider-item="next"> <i class="icon-feather-chevron-right"></i></a>

                    </div>
                </div>

                <br>

            </div>
            <div class="lg:w-1/3 w-full">

                <div uk-sticky="media @m ; offset:80 ; bottom : true">

                    <div class="my-2 flex items-center justify-between pb-2">
                        <div>
                            <h2 class="text-2xl font-semibold">Top Pages</h2>
                        </div>
                    </div>

                    <div>

                        @foreach($pages as $page)

                                @if ($limit < 7)
                            <div class="flex items-center space-x-4 rounded-md -mx-2 p-2">
                                <div class="w-14 h-14 flex-shrink-0 rounded-md relative">
                                    <img src="{{asset('assets/images/pages/'.$page->image)}}" class="absolute w-full h-full inset-0 rounded-md" alt="">
                                </div>
                                <div class="flex-1">
                                    <a href="{{ route('pages.show', $page->id)}}" class="text-lg font-semibold capitalize"> {{$page->name}} </a>
                                    <div class="text-sm text-gray-500 mt-0.5" style="text-overflow: ellipsis;  width: 20em; white-space: nowrap; overflow: hidden;"> {{$page->desc}}</div>

                                </div>
                            </div>
                                @endif

                            @php
                                $limit = $limit+1;
                            @endphp
                        @endforeach


                    </div>


                </div>

            </div>

        </div>


    </div>

@endsection
