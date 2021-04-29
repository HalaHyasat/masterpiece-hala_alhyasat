@extends('layouts.clientLayout')
@section('title')
Edit Profile
@endsection
@section('content')


    <div style="margin-top: 5rem">
        @if ($errors->has('content'))
            <div style="background-color: #f8d7da; padding: 0.5rem; border-radius:5px ">
                {{ $errors->first('content') }}
            </div>
        @endif
        <div
            class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical rounded-lg p-0 lg:w-5/12 relative shadow-2xl uk-animation-slide-bottom-small">

            <div class="text-center py-4 border-b">
                <h3 class="text-lg font-semibold"> Edit Profile </h3>
                <a href="/home" class="uk-modal-close-default bg-gray-100 rounded-full p-2.5 m-1 right-2" type="button" uk-close uk-tooltip="title: Close ; pos: bottom ;offset:7"></a>
            </div>
            <form action="{{ route('profile.update', Auth::user()->id)}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                {{ csrf_field() }}
                <div class="p-5">

                    <div class="flex-1 pt-2">
                        <label class="mb-0"> Name </label>
                        <input name="name" placeholder="Username" value="{{ Auth::user()->name }}" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                        @if ($errors->has('name'))
                            <div style="color: red">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="flex-1 pt-2">
                        <label for="choose-file" class="bg-gray-100"
                               style="
                                  padding: 8px;
                                  border: 1px solid #e3e3e3;
                                  border-radius: 5px;
                                  border: 1px solid #ccc;
                                  display: inline-block;
                                  padding: 6px 12px;
                                  cursor: pointer;"
                               id="choose-file-label">
                            Change your image
                        </label>
                        <input name="image" type="file" id="choose-file" style="display: none;" />
                    </div>

                <div>
                    <button type="submit" class="bg-blue-600 font-semibold p-2 mt-5 rounded-md text-center text-white w-full">
                        Update</button>
                </div>
                </div>
            </form>
        </div>
    </div>
@endsection
