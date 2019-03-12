<?php

namespace App\Http\Controllers;

use Illuminate\Exceptions\Handler;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use Validator;
use JWTFactory;
use App\User;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class APILoginController extends Controller
{
     /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('jwt', ['except' => ['login','index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
            }
        $credentials = $request->only('email', 'password');
       /* without database */
        // $user =new User;
        // $user->email='pratik.korade@tacto.in';
        // $user->password='password1';
      
        // if(($credentials['email']==$user->email)&&($credentials['password']==$user->password))
        // {   $ktoken=JWTAuth::fromUser($user);
        //     return response()->json(compact('ktoken'));
        // }


        try {
            $customClaim = ['key' => 'value'];
            if (! $token = JWTAuth::attempt($credentials,$customClaim)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }
    
    public function token()
    {   
        try{
        if(JWTAuth::parseToken()->authenticate())
        {
            return response()->json(['error' => false, 'status' => 200, 'message'=>'token is correct','jwt'=>JWTAuth::getPayload()->get('key')]);
        }
        } catch (TokenExpiredException $e) {
            return response()->json(['code' => $e->getStatusCode(), 'message' => $e->getMessage()], 401);
        } catch (TokenInvalidException $e) {
            return response()->json(['code' => $e->getStatusCode(), 'message' => $e->getMessage()], 401);
        } catch (JWTException $e) {
            return response()->json(['code' => $e->getStatusCode(), 'message' => $e->getMessage()], 401);
        } catch (PayloadException $e) {
            return response()->json(['code' => $e->getStatusCode(), 'message' => $e->getMessage()], 401);
        } catch (Exception $e) {
            return response()->json(['code' => $e->getStatusCode(), 'message' => $e->getMessage()], 401);
        }
        if(!empty($token)) {
            return response()->json(['error' => false, 'status' => 200, 'token' => $token]);
        } else {
            return response()->json(['error' => true, 'status' => 404, 'message' => 'Token not found']);
        }
    }

    // public function refresh()
    // {
    //     return $this->respondWithToken(auth()->refresh());
    // }

    public function logout() {
        try {
            $token = JWTAuth::getToken();
            if ($token) {
                JWTAuth::invalidate($token);
            }
            return response()->json(['message' => 'Successfully logged out']);
        } catch (TokenExpiredException $e) {
            return response()->json(['code' => $e->getStatusCode(), 'message' =>'Token Is Expired' ], 401);
        } catch (TokenInvalidException $e) {
            return response()->json(['code' => $e->getStatusCode(), 'message' => 'Token Is Invalid '], 401);
        } catch (JWTException $e) {
            return response()->json(['code' => $e->getStatusCode(), 'message' => $e->getMessage()], 401);
        } catch (InvalidClaimException $e) {
            return response()->json(['code' => $e->getStatusCode(), 'message' => $e->getMessage()], 401);
        } catch (Exception $e) {
            return response()->json(['code' => $e->getStatusCode(), 'message' => $e->getMessage()], 401);
        }
    }
}
