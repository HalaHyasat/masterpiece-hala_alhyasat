@extends('layouts.adminLayout')
@section('title')
Add Admin
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row" style="display: flex; justify-content: center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-title"  style="background: #010101; color: white; margin: 0; padding: 1rem">
                        <h2 class="text-center title-2">Create Admin</h2>
                    </div>
                    <div class="card-body" style="background: white; padding: 3rem">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <form action="/admin/manageAdmin" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Admin Name</label>
                                <input  name="name" type="text" class="form-control" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label mb-1">Admin Email</label>
                                <input  name="email" type="email" class="form-control" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <div class="text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label mb-1">Admin Password</label>
                                <input  name="password" type="password" class="form-control" value="{{ old('password') }}">
                                @if ($errors->has('password'))
                                    <div class="text-danger">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image" class="control-label mb-1">Admin Image</label>
                                <input  name="image" type="file" class="form-control">
                            </div>
                            <div style="display: flex; justify-content: center">
                                <button id="payment-button" type="submit" class="btn btn-lg" style="background: #2a41e7; color:white; width: 50%" name="submit">Add
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


