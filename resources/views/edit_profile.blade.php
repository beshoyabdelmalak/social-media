@extends('layouts.master')

@section('title')
    Edit Profile
@endsection

@section('content')
    <div class="container emp-profile">
        <form method="post" enctype="multipart/form-data" action="{{route('edit')}}">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="/uploads/avatars/{{Auth::user()->image}}" alt="profile-image"/>
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head m-b-30">
                        <h5>
                            {{Auth::user()->username}}
                        </h5>
                    </div>
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row m-b-10">
                                <div class="col-md-6">
                                    <label for="username">Username</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"" name="username" value="{{Auth::user()->username}}" >
                                    @error('username')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-6">
                                    <label for="first_name">First Name</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"" name="first_name" value="{{Auth::user()->first_name}}" >
                                    @error('first_name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-6">
                                    <label for="last_name">Last Name</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"" name="last_name" value="{{Auth::user()->last_name}}">
                                    @error('last_name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"" name="email" value="{{Auth::user()->email}}" >
                                    @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-6">
                                    <label for="password">Password</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"" name="password" >
                                    @error('password')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row m-b-10">
                                <div class="col-md-6">
                                    <label for="password_confirmation">Confirm Password</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"" name="password_confirmation">
                                    @error('password_confirmation')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-md-2">
                    <button type="submit" class=" btn btn-primary w-100">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection