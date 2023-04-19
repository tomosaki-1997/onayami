<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;



class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable =
    [
        'name',
        'email',
        'password',
        'image',
        'prof',
        'role',
    ];
    use HasFactory;


    public function content() {
        return $this->hasMany('App\Models\User');
    }

    public function good() {
        return $this->hasMany('App\Models\Good');
    }

    public function roles() {
            return $this->belongsToMany('App\Models\Role');
        }
}
