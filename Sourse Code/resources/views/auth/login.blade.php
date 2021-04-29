@extends('layouts.app')
@section('title')
{{$title}}
@endsection

@section('content')
    <div class="lg:p-12 max-w-xl lg:my-0 my-12 mx-auto p-6 space-y-">
        <form action="{{ $loginRoute }}" method="POST" class="lg:p-10 p-6 space-y-3 relative bg-white shadow-xl rounded-md">
            @csrf
            <h1 class="lg:text-2xl text-xl font-semibold mb-6">{{ $title }}</h1>



            <div>
                <label class="mb-0"> Email Address </label>
                <input name="email" type="email" placeholder="Info@example.com" value="{{ old('email') }}" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                @if ($errors->has('email'))
                    <div class="pb-5 text-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div>
                <label class="mb-0"> Password </label>
                <input name="password" type="password" placeholder="******" class="bg-gray-100 h-12 mt-2 px-3 rounded-md w-full">
                @if ($errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <div>
                <button type="submit" class="bg-blue-600 font-semibold p-2 mt-5 rounded-md text-center text-white w-full">
                    Login</button>
            </div>
        </form>


    </div>

@endsection





