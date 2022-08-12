<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')
        ->get();
        return view('posts.index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if ($request->image !== Null) {
        // ディレクトリ名
        $dir = 'image';
        // アップロードしたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();
        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir,$file_name);
        // ファイル情報をDBに保存

        $image = new Image;
        $image->image = base64_encode(file_get_contents($request->image));
        $image->save();
        Post::create([
            "title" => $request->title,
            "category_id" => $request->category,
            "body" => $request->body,
            "user_id" => Auth::user()->id,
            "image_id" => Image::orderBy('id','desc')
            ->first()
            ->id,
        ]);
        return redirect()->to('/posts');
        }
        Post::create([
            "title" => $request->title,
            "category_id" => $request->category,
            "body" => $request->body,
            "user_id" => Auth::user()->id,
        ]);
        return redirect()->to('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show() {
        $posts = Post::where('user_id',Auth::user()->id)
        ->orderBy('created_at','desc')
        ->get();
        // dd($posts);
        return view('posts.show',['posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $post = Post::findOrFail($request->id);
        // dd($post);
        return view('posts.edit',[
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        Post::where('id',$request->post_id)
        ->update([
            'title' => $request->title,
            'body'  => $request->body
        ]);

        return redirect('/posts/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        // dd($request->id);
        $post=Post::find($request->id)->delete();
        // dd($post);
        return redirect('/posts/show');
    }
}
