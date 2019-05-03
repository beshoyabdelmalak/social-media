@extends ('layouts.master')

@section('title')
    Social Media
@endSection

@section('content')
<div class="row m-0 mt-5 justify-content-center" >
    <div class="col-md-4">
        <h5>Sign Up</h5>
        <form method="post" action='#'>
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class= "form-control" name="first_name" placeholder="John">
            </div>
            <div class="form-group">
                <label for="Last_name">Last Name</label>
                <input type="text" class= "form-control" name="last_name" placeholder="Doe">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class= "form-control" name="email" placeholder="John@example.com">
            </div>
            <div class="form-group">
                <label for="password">Passowrd</label>
                <input type="password" class= "form-control" name="password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class= "form-control" name="confirm_password">
            </div>
            <div class="form-group">
                <input type="submit" class= "btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <h5>Sign In</h5>
        <form method="post" action="#">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class= "form-control" name="email" placeholder="John@example.com">
            </div>
            <div class="form-group">
                <label for="password">Passowrd</label>
                <input type="password" class= "form-control" name="password">
            </div>
            <div class="form-group">
                <input type="submit" class= "btn btn-primary" value="Submit">
            </div>
        </form>
    </div>
</div>
@endSection