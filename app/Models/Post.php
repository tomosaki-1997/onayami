<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;protected $table = 'posts';

    public function user() {
       return $this->belongsTo('App\Models\User');
   }

//追加
   public function nices() {
       return $this->hasMany('App\Models\Good');
   }

   protected $fillable = ['title', 'content'];

  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function comments()
  {
      return $this->hasMany(Comment::class);
  }


}
