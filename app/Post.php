<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Comment;
use App\Otsu;

class Post extends Model
{

    protected $guarded = array('id');

    protected $fillable = [
      'user_id', 'title', 'content', 'image',
  ];

  public function user(){
    return $this->belongsTo(\App\User::class, 'user_id');
  }

  public function comment(){
    return $this->hasMany(\App\Comment::class, 'post_id', 'id');
  }

  public function otsus(){
    return $this->hasMany(\App\Otsu::class, 'post_id', 'id');
  }
}
