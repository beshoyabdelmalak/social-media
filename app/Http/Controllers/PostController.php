<?php

namespace App\Http\Controllers;

use App\Post;
use http\Env\Response;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller{
    /**
     * @param Request $request
     */
    public function createPost(Request $request){

        //todo vaidation
        $request->validate([
           "body" => "required| max:1000"
        ]);
        //save the new post
        $post = new Post();
        $post->body = $request['body'];

        $msg = 'Error: Post cannot be created' ;
        if(Auth::user()->posts()->save($post)) {
            $msg = "Post created successfully";
        }
        return redirect()->route('dashboard')->with(['msg'=> $msg]);
    }

    public function dashboard(){
        $posts = Post::OrderBy('created_at', 'desc')->get();
        return view('dashboard',compact('posts'));
    }
}