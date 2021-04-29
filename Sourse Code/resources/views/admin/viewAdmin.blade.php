@extends('layouts.adminLayout')
@section('title')
View Admins
@endsection
@section('content')

    <div class="pro-head">
        <h2>Admins</h2>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div class="product-block">
        @foreach($admins as $admin)
            <div class="col-md-3 product-grid">
                <div class="product-items">
                    <div class="project-eff">
                        <img class="img-responsive" src={{asset("admin_assets/images/avatars/$admin->image")}} alt="" style="width: 100%">
                    </div>
                    <div class="produ-cost" style="background: #2a41e7; text-align: center">
                        <h4>{{$admin->name}}</h4>
                        <h5>{{$admin->email}}</h5>
                        <div style="margin-top: 1rem; display: flex; flex-direction: row; justify-content: center">
                            <a href="{{route('admin.manageAdmin.edit', $admin->id)}}"><button class="btn btn-warning" style="margin: 5px">Edit</button></a>

                            <form action="{{ route('admin.manageAdmin.destroy', $admin->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" style="margin: 5px">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="clearfix"> </div>
    </div>

@endsection
