@extends('layouts.clientLayout')
@section('title')
Edit Post
@endsection
@section('content')


<div style="margin-top: 5rem">
    -
    <div
        class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-lg p-0 lg:w-5/12 relative shadow-2xl uk-animation-slide-bottom-small">

        <div class="text-center py-4 border-b">
            <h3 class="text-lg font-semibold"> Edit Post </h3>
            <a href="/home" class="uk-modal-close-default bg-gray-100 rounded-full p-2.5 m-1 right-2" type="button" uk-close uk-tooltip="title: Close ; pos: bottom ;offset:7"></a>
        </div>
        <form action="{{ route('home.update', $post->id)}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            {{ csrf_field() }}
            <input type="hidden" name="previous" value={{url()->previous()}}>

            <div class="flex flex-1 items-start space-x-4 p-5">
                @php
                $image = Auth::user()->image;
                @endphp
                <img src='{{asset("assets/images/avatars/$image")}}'
                     class="bg-gray-200 border border-white rounded-full w-11 h-11">
                <div class="flex-1 pt-2">
                    <textarea name="content" class="uk-textare text-black shadow-none focus:shadow-none text-xl font-medium resize-none" style="margin-top: -1rem" rows="5"
                              placeholder="What's Your Mind ? {{Auth::user()->name}}!">{!! $post->content !!}</textarea>
                    @if ($errors->has('content'))
                        <div style="color: red">{{ $errors->first('content') }}</div>
                    @endif
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
            @if ($errors->has('image'))
                <div style="color: red">{{ $errors->first('image') }}</div>
            @endif
            <input name="image" type="file" id="choose-file" style="display: none;" />

            <div class="flex items-center w-full justify-between p-3 border-t">


                <div class="flex space-x-2">
                    <button type="submit" name="form1" class="bg-blue-600 flex h-9 items-center justify-center rounded-md text-white px-5 font-medium">
                        Update </button>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection
