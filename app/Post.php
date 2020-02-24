<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    protected $fillable = [
    'id', 'user_id', 'title', 'content',
  ];

  public function user(){
    return $this->belongsTo(\App\User::class, 'user_id');
  }
}
