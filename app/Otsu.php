<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;

class Otsu extends Model
{
  protected $fillable = [
    'id', 'user_id', 'post_id',
  ];

  public function post()
    {
        return $this->belongsTo(\App\Post::class, 'post_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }
}
