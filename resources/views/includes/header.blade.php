<nav class="navbar sticky-top navbar-expand navbar-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="{{route('dashboard')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        </ul>
{{--        <form class="form-inline my-2 my-lg-0">--}}
{{--        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--        </form>--}}
        @if(auth()->user())
            <div class="navbar-nav">
                <img class="profile-img-header" src="/uploads/avatars/{{$post->user->image}}" alt="profile-image"/>
                <a class="nav-item nav-link" href="{{route('profile')}}">Account</a>
                <a class="nav-item nav-link" href="{{route('logout')}}">Logout</a>
            </div>
        @endif
    </div>
</nav>