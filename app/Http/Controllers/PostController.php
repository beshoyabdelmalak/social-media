<?php

namespace App\Http\Controllers;

use App\Post;
use http\Env\Response;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


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

    public function deletePost($id){
        $post = Post::where('id', $id)->first();
        if($post && Auth::user() == $post->user){
            $post->delete();
            return redirect()->back()->with('msg', 'post was deleted successfully');
        }

        return redirect()->route('dashboard');

    }
    public function editPost(Request $request){
        $post = Post::where('id', $request['id'])->first();
        $validator  = Validator::make($request->all(),[
            "body" => 'required'
        ]);
        if( $validator->fails() )
        {
            return response()->json($validator->errors(),422);
        }

        if($post && Auth::user() == $post->user) {
            $post->body = $request['body'];
            $post->update();
            //return redirect()->back()->with('msg', 'post was deleted successfully');

        }

        return response()->json($post);


    }
}