<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Session;
use App\Http\Controllers\Controller;
use App\LoginModel as LoginModel;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }  

    public function register() {
        
         if (!(Input::has('username','email','password','confirmpassword'))){
             abort(400, 'Invalid Input');
         }
         $data = Input::only('username','email','password','confirmpassword');
 
         $returnData = [
             'message' => '',
             'data' => null
         ];
              
             $data = [ 
                'username'=> Input::get('username'),
                 'email'=> Input::get('email'),
                 'password'=> bcrypt(Input::get('password')),
                 'confirmpassword'=> bcrypt(Input::get('confirmpassword'))
             ];    
 
             $validator = Validator::make($data, [   
                'username' =>'required',
                 'email' => 'required|email|unique:info',
                 'password' => 'required',
                 'confirmpassword' => 'required'

                 //'g-captcha-response' => 'required|captcha'
             ]);
                
             $mr = LoginModel::create($data);
 
         
             return redirect('login');         
             
             if($mr){
 
                 return response()->json(['status'=>true, 'message'=>'', 'data' => $mr->toArray()], 200);
 
             }else{
                 
                 return response()->json([],500);
             }
     }
  
}   
     
