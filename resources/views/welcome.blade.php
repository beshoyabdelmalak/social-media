@extends ('layouts.master')

@section('title')
    Social Media
@endSection

@section('content')
<div class="row m-0 mt-5 justify-content-center" >
    <div class="col-md-4">
        <h5>Sign Up</h5>
        <form action="{{route('signup')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class= "form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="John" value="{{Request::old('first_name')}}">
                @error('first_name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Last_name">Last Name</label>
                <input type="text" class= "form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Doe" value="{{Request::old('last_name')}}">
                @error('last_name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="signup_email">Email</label>
                <input type="text" class= "form-control @error('signup_email') is-invalid @enderror" name="signup_email" placeholder="John@example.com" value="{{Request::old('signup_email')}}">
                @error('signup_email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="signup_password">Password</label>
                <input type="password" class= "form-control @error('signup_password') is-invalid @enderror" name="signup_password">
                @error('signup_password')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="signup_password_confirmation">Confirm Password</label>
                <input type="password" class= "form-control @error('signup_password_confirmation') is-invalid @enderror" name="signup_password_confirmation">
                @error('signup_password_confirmation')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class= "btn btn-primary" value="Submit">Submit</button>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <h5>Sign In</h5>
        @if(Session::has('msg'))
            <div class="alert alert-danger">{{Session::get('msg')}}</div>
        @endif
        <form action="{{route('signin')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class= "form-control @error('email') is-invalid @enderror" name="email" placeholder="John@example.com">
                @error('email')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class= "form-control @error('password') is-invalid @enderror" name="password">
                @error('password')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class= "btn btn-primary" value="Submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@endSection