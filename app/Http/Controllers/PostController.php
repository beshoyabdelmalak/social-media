<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;


class PostController extends Controller{


    public function index(){
        $posts = Post::OrderBy('created_at', 'desc')->get();
        $likes = Like::select('post_id', 'like')->where("user_id", auth()->id())->get();
        return view('dashboard',compact('posts', 'likes'));
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

    public function likePost(Request $request){
        $isLike = $request['isLike'] == 'true';
        $post = Post::find($request['post_id']);
        if (!$post){
            return response()->json(["error"=>"Something went wrong"],422);
        }
        $like = Like::where('post_id', $request['post_id'])->where('user_id', auth()->id())->first();
        if ($like){
            if($like->like == $isLike){
                $like->delete();
            }
            $like->update(['like' => $isLike]);
        }else{
            $like = new Like();
            $like->user_id = auth()->id();
            $like->post_id = $request['post_id'];
            $like->like = $isLike;
            $like->save();
        }
    }
    public static function isLiked($post_id, $likes){
        foreach ($likes as $like){
            if ($like->post_id == $post_id && $like->like)
                return true;
        }
        return false;
    }
    public static function isDisliked($post_id, $likes){
        foreach ($likes as $like){
            if ($like->post_id == $post_id && !$like->like)
                return true;
        }
        return false;
    }

    public static function time($created_at){
        $x =  strtotime(date("Y-m-d H:i:s")) - (strtotime($created_at));
        if ($x < 60)
            return round($x) ." " . "sec";
        $x = $x /60;
        if ($x < 60)
            return round($x)." " . "min";
        $x = $x /60;
        if ($x < 24)
            return round($x) ." " . "hr";
        $x = $x /24;
        if ($x < 7)
            return round($x) ." " . "days";
        $x = $x /7;
        if ($x < 31)
            return round($x) ." " . "week";
        $x = $x /31;
        if ($x < 12)
            return round($x)." "  . "month";
        $x = $x /12;
        return round($x)  ." " . "year";
    }
}