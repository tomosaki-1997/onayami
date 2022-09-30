<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    protected $table = 'goods';

    use HasFactory;

    protected $fillable = ['content_id','user_id'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function content() {
        return $this->belongsTo('App\Models\Content');
    }
}
