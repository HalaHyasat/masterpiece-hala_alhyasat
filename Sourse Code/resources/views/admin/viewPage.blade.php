@extends('layouts.adminLayout')
@section('title')
View Pages
@endsection
@section('content')

    <div class="pro-head">
        <h2>Pages</h2>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @foreach($pages as $page)


        <div class="col-md-4">
            <div class="user-marorm" style="overflow: hidden">
                <div style="display: flex; justify-content: center">

                <img src="{{asset('assets/images/pages/'.$page->image)}}" style="height: 13rem">
                </div>
                <div class="malorm-bottom" >
                    <h4>Name: {{$page->name}}</h4>
                    <h4>Publisher: {{$page->user->name}}</h4>
                    <p style="width: 90%;">"{{$page->desc}}"</p>
                    <ul class="malorum-icons">
                        <li>
                            <form action="{{ route('admin.managePage.destroy', $page->id)}}" method="post">
                                @csrf
                                @method('DELETE')

                                <a><i class="fa fa-trash-o text-danger"> </i>
                                    <div class="tooltip "><span>Delete</span></div>
                                </a>
                                <button style="background: none; border: none" type="submit" class="text-danger">Delete</button>
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    @endforeach
    <div style="margin-left: 45%">
    {{$pages->links()}}
    </div>


@endsection
