@foreach($posts as $post )
    <div class = "post">
        <div class="row p-l-10 p-r-10">
            <div class="col-md-1 col-lg-1 col-sm-1 col-1 p-0">
                <img class="profile-img-dashboard" src="/uploads/avatars/{{$post->user->image}}" alt="profile-image"/>
            </div>
            <div class="col-md-2 col-lg-1 col-2 col-sm-1 name">
                <p class="font-italic m-0 p-t-4"> {{$post->user->first_name}} </p>
            </div>
            <div class="info col-md-3 col-lg-2 col-sm-3 col-3">
                {{\App\Http\Controllers\PostController::time($post->created_at)}}
            </div>
        </div>
        <article class="m-t-5">
            {{$post->body}}
        </article>

        <div class="m-t-5 btn-group btn-group-toggle">
            <button type="button" class="btn btn-light liked buttons @if(\App\Http\Controllers\PostController::isLiked($post->id, $likes)) is-active-liked @endif" data-post-id="{{$post->id}}"><i class="material-icons icon">thumb_up</i><span class="post-buttons">Like</span></button>
            <button type="button" class="btn btn-light disliked buttons @if(\App\Http\Controllers\PostController::isdisliked($post->id, $likes)) is-active-disliked @endif" data-post-id="{{$post->id}}"><i class="material-icons icon" style="margin-top:2px;">thumb_down</i><span class="post-buttons">Dislike</span></button>
            @if (auth()->id() == $post->user->id)
                <button type="button" class="btn btn-light edit" data-post-id="{{$post->id}}"><span class="post-buttons m-b-5">Edit</span></button>
                <button type="button" class="btn btn-light delete" data-post-id="{{$post->id}}"><span class="post-buttons m-b-5">Delete</span></button>
            @endif
        </div>

        <hr>
    </div>
@endforeach