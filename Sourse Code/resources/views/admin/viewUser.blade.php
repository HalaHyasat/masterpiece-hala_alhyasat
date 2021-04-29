@extends('layouts.adminLayout')
@section('title')
View Users
@endsection
@section('content')
    <div class="pro-head">
        <h2>Users</h2>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @foreach($users as $user)
        <div class="col-md-4 compose" style="margin-bottom: 2rem">
            <div class="mail-profile">
                <div class="mail-pic">
                    <a href="#"><img src={{asset("assets/images/avatars/$user->image")}} alt="" style="height:80px; width:80px; border-radius: 50%;"></a>
                </div>
                <div class="mailer-name">
                    <h5><a href="#">{{$user->name}}</a></h5>
                    <h6><a href="#">{{$user->email}}</a></h6>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="compose-bottom">
                <nav class="nav-sidebar">
                    <ul class="nav tabs">
                        <li class="">
                            <form action="{{ route('admin.manageUser.destroy', $user->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a><i class="fa fa-trash-o"></i><button style="background: none; border: none" type="submit" class="text-danger">Delete</button></a>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    @endforeach
@endsection
