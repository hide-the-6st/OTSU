<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Comment;


class CommentController extends Controller
{
    public function create()
    {
        $q = \Request::query();
        return view('comments.create',[
          'post_id' => $q['post_id'],
        ]);
    }

    public function store(CommentRequest $request)
    {
      $comment = new Comment;
      $input = $request->only($comment->getFillable());
      $comment = $comment->create($input);

      return redirect('/posts/'.$comment->post_id);
    }
}
