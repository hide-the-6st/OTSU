<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Otsu;

class OtsuController extends Controller
{
    public function otsu(Post $post, Request $request){
      $otsu = Otsu::create(['user_id' => $request->user_id, 'post_id' => $post->id]);

      $otsuCount = count(Otsu::where('post_id', $post->id)->get());

      return response()->json(['otsuCount' => $otsuCount]);
    }

    public function unotsu(Post $post, Request $request){
      $otsu = Otsu::where('user_id', $request->user_id)->where('post_id', $post->id)->first();
      $otsu->delete();
      
      $otsuCount = count(Otsu::where('post_id', $post->id)->get());

      return response()->json(['otsuCount' => $otsuCount]);
    }
}
