@extends('layouts.master')

@section('title')
    'Home'
@endsection

@section('content')
    <div class="row m-0">
        <div class="col-md-6 offset-md-3 create-post m-t-20 m-b-10">
            <h5 class="m-t-5">create post</h5>
            <form method="" action="" class="row m-0">
                @csrf
                <textarea name="body" placeholder="What's in your mind ?" class="w-100"></textarea>
                <button type="submit" class="btn m-t-5 m-b-5">create</button>
            </form>
        </div>
    </div>
@endsection