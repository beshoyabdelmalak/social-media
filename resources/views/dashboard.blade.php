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
                    <div class="row p-l-10 p-r-10">
                        <div class="col-md-1 p-0">
                            <img class="profile-img-dashboard" src="/uploads/avatars/{{$post->user->image}}" alt="profile-image"/>
                        </div>
                        <div class="col-md-7 p-0">
                            <p class="font-italic m-0 p-t-4"> {{$post->user->first_name}} </p>
                        </div>
                    </div>
                    <article>
                        {{$post->body}}
                    </article>
                    <div class="info">
                        on {{$post->created_at}}
                    </div>
                    <div class="interaction btn-group btn-group-toggle">

                        <button type="button" class="btn btn-light liked"><i class="material-icons icon">thumb_up</i><span class="post-buttons">Like</span></button>
                        <button type="button" class="btn btn-light disliked"><i class="material-icons icon" style="margin-top:2px;">thumb_down</i><span class="post-buttons">Dislike</span></button>
                        @if (Auth::user() == $post->user)
                        |
                        <a href="#" class ="edit" data-post-id="{{$post->id}}">Edit</a> |
                        <a href="#" class ="delete" data-post-id="{{$post->id}}">Delete</a> |
                        @endif
                    </div>
                    <hr>
            @endforeach
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" >Edit Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <textarea name="body" id="body" class="form-control"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Edit</button>
            </div>
        </div>
    </div>
</div>

    <script>
        var token = "{{Session::token()}}";
    </script>
@endsection