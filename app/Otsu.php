<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otsu extends Model
{
  protected $fillable = [
    'id', 'user_id', 'post-id',
  ];

  public function otsu(){
    return $this->hasMany(\App\Post::class, '');
  }
}
