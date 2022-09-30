<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';

    protected $fillable = [
        'title',
        'content',
    ];
    use HasFactory;

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function good() {
        return $this->hasMany('App\Models\Good');
    }
    
    public function getUser() {
        return User::id($this->user_id);

    }
}
