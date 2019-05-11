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
            <div class = "post">
                <p class="font-italic"> MAX </p>
                <article>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede
                    mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean
                    vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                </article>
                <div class="info">
                    at 14:53
                </div>
                <div class="interaction">
                    <a href="#">Like</a> |
                    <a href="#">Dislike</a> |
                    <a href="#">Edit</a> |
                    <a href="#">Delete</a> |
                </div>
                <hr>
            </div>
            <div class = "post">
                <p class="font-italic"> MAX </p>
                <article>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede
                    mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean
                    vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                </article>
                <span class="date">at 14:53 </span>
                <hr>
            </div>
            <div class = "post">
                <p class="font-italic"> MAX </p>
                <article>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede
                    mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean
                    vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                </article>
                <span class="date">at 14:53 </span>
                <hr>
            </div>
        </div>
    </div>
@endsection