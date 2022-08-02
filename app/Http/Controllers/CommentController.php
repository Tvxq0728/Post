<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function index(Request $request) {
        $id = $request->id;
        $post = Post::where('id',$id)->first();
        // dd($post);
        return view('comment.comment')->with([
            'post'=> $post,
        ]);
    }

    public function create(Request $request) {
      $id = $request->id;
      return view('comment.create')->with(['id'=>$id]);
    }

    public function store(Request $request) {
      Comment::create([
        'post_id' => $request->post_id,
        'commenter' => $request->commenter,
        'comment' => $request->comment
      ]);
      $post = Post::where('id',$request->post_id)->first();
      $comment_count = $post->comment_count + 1;
      // dd($comment_count);
      Post::where('id',$request->post_id)->first()->update([
        'comment_count' => $comment_count,
      ]);
      $post = Post::where('id',$request->post_id)->first();
      // dd($post);
      return view('comment.comment')->with([
        'post' => $post,
      ]);
    }
}
