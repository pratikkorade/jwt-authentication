<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    protected $fillable = ['email','password'];
    protected $table = 'users';
}
