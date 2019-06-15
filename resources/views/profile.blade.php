@extends('layouts.master')

@section('title')
    Profile
@endsection

@section('content')
    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-3">
                <div class="profile-img">
                    <img src="/uploads/avatars/{{$user->image}}" alt="profile-image"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{$user->username}}
                    </h5>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>username</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$user->username}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>First Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$user->first_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Last Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$user->last_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$user->email}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @if(count($user->posts) > 0)
                            @foreach($user->posts as $post )
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
                                            <a href="#" class ="edit" data-post-id="{{$post->id}}">Edit</a> |
                                            <a href="#" class ="delete" data-post-id="{{$post->id}}">Delete</a> |
                                        @endif
                                    </div>
                                    <hr>
                                </div>
                            @endforeach
                        @else
                            <div class = "post">
                                <p class="font-italic"> No Posts yet </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <a class="profile-edit-btn btn" href="{{route('update')}}">Edit Profile</a>
            </div>
        </div>
    </div>

    @endsection