@extends('layouts.adminLayout')
@section('title')
View Posts
@endsection
@section('content')

    <div class="pro-head">
        <h2>Posts</h2>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row" >
        @foreach($posts as $post)
            <div class="col-lg-6">
                <div class="card" style="background: white; padding: 2rem; margin-bottom: 3rem">
                    <img class="card-img-top" alt="" style="height:300px" src={{asset("assets/images/post/$post->media")}} >
                    <div class="card-body">
                        <h2 class="card-title" style="margin-top: 1rem; margin-bottom: 1rem;">{{$post->page->name}}</h2>
                        <div id="article_body" class="card-text" style="   overflow: hidden;
                                    text-overflow: ellipsis;
                                    display: -webkit-box;
                                    line-height: 25px;
                                    height: 100px;
                                    -webkit-line-clamp: 6;
                                    -webkit-box-orient: vertical; ">

                            {!! $post->content !!}
                        </div>
                    </div>
                    <div class="card-body" style="display: flex; flex-direction: row; margin-top: 1rem">
                        <a href="{{route('admin.managePost.edit', $post->id)}}" class="card-link text-warning">Edit</a>

                        <form action="{{ route('admin.managePost.destroy', $post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="card-link text-danger" style="border: none; background: none">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div style="display: flex; justify-content: center">
        {{$posts->links()}}
    </div>
@endsection
