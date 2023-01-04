<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::orderBy('created_at','desc')->paginate(10);
      $user = auth()->user();
      return view('review.index', compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('review.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // 投稿バリデーション
      $inputs = $request->validate([
        'seller_name' => 'required|max:255',
        'reviewScore' => 'required',
        'title' => 'required|max:255',
        'product_name' => 'required|max:255',
        'body' => 'required|max:1000'
      ]);
      // 投稿を保存
      $post = new Post();
      $post->user_id = auth()->user()->id;
      $post->seller_name = $request->seller_name;
      $post->reviewScore = $request->reviewScore;
      $post->title = $request->title;
      $post->product_name = $request->product_name;
      $post->body = $request->body;
      $post->save();
      return redirect()->route('review.create')->with('message', 'レビューを投稿しました！');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $user = auth()->user();
        return view('review.edit', compact('post', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 投稿バリデーション
        $inputs = $request->validate([
          'seller_name' => 'required|max:255',
          'reviewScore' => 'required',
          'title' => 'required|max:255',
          'product_name' => 'required|max:255',
          'body' => 'required|max:1000'
        ]);
        // 投稿を保存
        $post = Post::find($id);
        $post->user_id = auth()->user()->id;
        $post->seller_name = $request->seller_name;
        $post->reviewScore = $request->reviewScore;
        $post->title = $request->title;
        $post->product_name = $request->product_name;
        $post->body = $request->body;
        $post->save();
        return redirect()->route('review.edit', $post)->with('message', 'レビューを更新しました！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);
      $post->delete();
      return redirect()->route('review.index')->with('message', '投稿を削除しました');
    }
}
