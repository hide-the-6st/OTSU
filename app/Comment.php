<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $fillable = [
      'user_id', 'post_id', 'comment',
    ];

    public function user(){
      return $this->belongsTo(\App\User::class, 'user_id');
    }

}
