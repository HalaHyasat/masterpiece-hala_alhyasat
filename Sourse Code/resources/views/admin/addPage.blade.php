@extends('layouts.adminLayout')
@section('title')
Add Page
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row" style="display: flex; justify-content: center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-title"  style="background: #010101; color: white; margin: 0; padding: 1rem">
                        <h2 class="text-center title-2">Create Page</h2>
                    </div>
                    <div class="card-body" style="background: white; padding: 3rem">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <form action="/admin/managePage" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="control-label mb-1">Page Name</label>
                                <input  name="name" type="text" class="form-control" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="desc" class="control-label mb-1">Page Description</label>
                                <textarea  name="desc" class="form-control">{{ old('desc') }}</textarea>
                                @if ($errors->has('desc'))
                                    <div class="text-danger">{{ $errors->first('desc') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="image" class="control-label mb-1">Page Image</label>
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


