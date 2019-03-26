<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    protected $fillable = ['username','email','password','confirmpassword'];
    protected $table = 'users';
}
