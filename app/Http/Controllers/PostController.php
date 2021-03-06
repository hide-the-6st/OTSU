<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
use App\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Otsu;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(3);
        //$posts->load('user');

        return view('posts.index', [
          'posts' => $posts,
        ]);
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

        $image = $request->file('files');

        if($request->hasFile('files') && $image->isValid()){
          $file_name = $image->getClientOriginalName();
          $path = $image->storeAs('public', $file_name, ['disk' => 'local']);
          $path = asset("storage/$file_name");
        }else{
          $path = null;
        }

        $post = new Post;
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->image = $path;

        $post->save();

        return redirect()->route('posts.index')->with('status', '新しく投稿しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      $post->load('user', 'comment', 'otsus');
      $userAuth = \Auth::user();

      $defaultCount = count($post->otsus);
      $defaultOtsu = $post->otsus->where('user_id', $userAuth->id);
      if(count($defaultOtsu) == 0){
        $defaultOtsu == false;
      }else{
        $defaultOtsu == true;
      }
        return view('posts.show', [
          'post' => $post,
          'userAuth' => $userAuth,
          'defaultOtsu' => $defaultOtsu,
          'defaultCount' => $defaultCount,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $image = $request->file('files');

      if($request->hasFile('files') && $image->isValid()){
        $file_name = $image->getClientOriginalName();
        $path = $request->file('files')->storeAs('public', $file_name);
        $path = Storage::url($path);
      }

        $post = Post::findOrFail($id);
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->content = $request->content;
        if($request->hasFile('files')){
          $post->image = $path;
        }
        $post->save();

        return redirect()->route('posts.index')->with('status', '投稿を編集しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('status', '投稿を削除しました。');
    }
}
