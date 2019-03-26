<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\LoginModel as LoginModel;

class SignInController extends Controller
{
    public function signIn(){
        $email = Input::get('email');
        $password = Input::get('password');
            if (Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect('/');
            }
            else {        
                return "Wrong Credentials";
            }
        
    }
}
