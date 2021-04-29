@extends('layouts.adminLayout')
@section('title')
Add Post
@endsection
@section('content')
    <div class="container-fluid" >
        <div class="row" style="display: flex; justify-content: center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-title"  style="background: #010101; color: white; margin: 0; padding: 1rem">
                        <h2 class="text-center title-2">Add Post</h2>
                    </div>
                    <div class="card-body" style="background: white; padding: 3rem; margin-bottom: 3rem">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <form action="/admin/managePost" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="course" class="control-label mb-1">Course Name</label>
                                <select  name="course" class="form-control">
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="content" class="control-label mb-1">Post Content</label>
                                <textarea id='article-ckeditor' name ="content" class="form-control">{{old('content')}}</textarea>
                                @if ($errors->has('content'))
                                    <div class="text-danger">{{ $errors->first('content') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="image" class="control-label mb-1">Post Image</label>
                                <input  name="image" type="file" class="form-control">
                                @if ($errors->has('image'))
                                    <div class="text-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div>

                            <div style="display: flex; justify-content: center">
                                <button id="payment-button" type="submit" class="btn btn-lg" style="background: #2a41e7; color:white; width: 50%"  name="submit">Add
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
