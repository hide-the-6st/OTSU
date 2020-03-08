<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;

class Post extends Model
{

    protected $guarded = array('id');

    protected $fillable = [
      'user_id', 'title', 'content',
  ];

  /*public static $rules = array(
    'user_id' => 'required',
    'name' => 'required',
    'content' => 'text|required',
  );*/

  public function user(){
    return $this->belongsTo(\App\User::class, 'user_id');
  }

  public function comment(){
    return $this->hasMany(\App\Comment::class,'post_id', 'id');
  }
}
