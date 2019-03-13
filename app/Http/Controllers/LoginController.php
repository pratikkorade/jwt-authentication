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

class LoginController extends Controller
{
    public function socialLogin() {
        if (!(Input::has('first_name', 'last_name', 'email') && (Input::has('google_id')))){
            abort(400, 'Invalid Input');
        }
        $data = Input::only('first_name', 'last_name', 'dob', 'email','google_id');
        $data['is_active'] = 1;  // Activate user
        if (!empty($data['dob'])) {
            $data['dob'] = date('Y-m-d', strtotime($data['dob']));
        } else {
            $data['dob'] = date('Y-m-d', strtotime('1970-01-01'));
        }

        $returnData = [
            'message' => '',
            'data' => null
        ];
            if (Input::get('google_id')) {
                $token = null;
                if (Input::has('code')) {
                    try {
                        $token = \Google::getClient()->authenticate(Input::get('code'), true);
                    } catch (\Google_Auth_Exception $e) {
                        throw new ApiException(Lang::get('apiStatusCodes.access_denied'), 401);
                    }
                } else {
                    $token = Input::get('google_token');
                }

            $data['google_id'] = $data['google_id'];
            $data['google_token'] = $token;
           
        }   
            $data = [ 
                'email'=> Input::get('email'),
                'password'=> Input::get('password')
            ];    

            $validator = Validator::make($data, [
                'email' => 'required|email|unique:info',
                'password' => 'required',
                'g-captcha-response' => 'required|captcha'
            ]);
               
            $mr = LoginModel::create($data);

            Session::put('success', 'Youe Request Submited Successfully..!!');
            return redirect()->back();         
            
            if($mr){

                return response()->json(['status'=>true, 'message'=>'', 'data' => $mr->toArray()], 200);

            }else{
                
                return response()->json([],500);
            }
     }
}

     