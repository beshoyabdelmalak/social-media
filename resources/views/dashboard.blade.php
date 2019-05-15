@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <div class="row m-0">
        @include('includes.error')
        <div class="col-md-6 offset-md-3 create-post m-t-20 m-b-10">
            <form method="post" action="{{route('post.create')}}" class="row m-0 m-t-10">
                @csrf
                <textarea name="body" placeholder="What's in your mind ?" class="w-100"></textarea>
                <button type="submit" class="btn m-t-5 m-b-5">create</button>
            </form>
        </div>
        <div class=" col-md-6 offset-md-3 posts p-t-15">
            @foreach($posts as $post )
                <div class = "post">
                    <p class="font-italic"> {{$post->user->first_name}} </p>
                    <article>
                        {{$post->body}}
                    </article>
                    <div class="info">
                        on {{$post->created_at}}
                    </div>
                    <div class="interaction">
                        <a href="#">Like</a> |
                        <a href="#">Dislike</a>
                        @if (Auth::user() == $post->user)
                        |
                        <a href="#" method = "PUT">Edit</a> |
                        <a href="{{route('deletePost', ['id'=> $post->id])}}" >Delete</a> |
                        @endif
                    </div>
                    <hr>
            @endforeach
            </div>
        </div>
    </div>
@endsection