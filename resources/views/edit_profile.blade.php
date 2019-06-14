@extends('layouts.master')

@section('title')
    Edit Profile
@endsection

@section('content')
    <div class="container emp-profile">
        <form method="post" enctype="multipart/form-data" action="{{route('update')}}">
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
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="first_name">First Name</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="first_name" value="{{Auth::user()->first_name}}" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Kshiti Ghelani</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>kshitighelani@gmail.com</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>123 456 7890</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Profession</label>
                                </div>
                                <div class="col-md-6">
                                    <p>Web Developer and Designer</p>
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