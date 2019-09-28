<?php

namespace App\Http\Controllers;

use App\Post;
use http\Env\Response;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;


class PostController extends Controller{


    public function index(){
        $posts = Post::OrderBy('created_at', 'desc')->get();
        return view('dashboard',compact('posts'));
    }


    /**
     * @param Request $request
     */
    public function createPost(Request $request){

        $attributes = $request->validate([
           "body" => "required| max:1000"
        ]);

        $attributes['user_id'] = auth()->id();

        $msg = 'Error: Post cannot be created' ;

        if(Post::create($attributes)) {
            $msg = "Post created successfully";
        }
        return redirect()->route('dashboard')->with(['msg'=> $msg]);
    }

    public function deletePost(Request $request){
        $post = Post::where('id', $request['id'])->first();
        if($post && Auth::user() == $post->user){
            $post->delete();
            return response()->json(["msg"=>"Post deleted successfully"]);
        }

        return response()->json(["error"=>"Something went wrong"],422);

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
            return redirect()->back()->with('msg', 'post was updated successfully');
        }

        return response()->json(["error"=>"Something went wrong"],422);


    }
}