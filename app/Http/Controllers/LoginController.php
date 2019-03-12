<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function socialLogin(\SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb) {
        /* Check for required inputs */
        if (!(Input::has('first_name', 'last_name', 'email') &&
                (Input::has('facebook_id') || Input::has('google_id')))) {
            abort(400, 'Invalid Input');
        }
        /* Check for required inputs */

        /* Variables */
        $data = Input::only('first_name', 'last_name', 'dob', 'email', 'facebook_id', 'google_id');
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
        /* Variables */

        /* Validate facebook_id with ID retrieved from Facebook based on Access Token */
        if (Input::get('facebook_id')) {
            unset($data['google_id']);
            try {
                $response = $fb->get('/me?fields=id', Input::get('facebook_token'));
            } catch (\FacebookExceptions\FacebookSDKException $e) {
                throw new ApiException(Lang::get('apiStatusCodes.access_denied'), 401);
            }

            if ($response->getDecodedBody()['id'] != Input::get('facebook_id')) {
                throw new ApiException(Lang::get('apiStatusCodes.access_denied'), 401);
            }

            $data['facebook_id'] = $data['facebook_id'];
            $data['facebook_token'] = Input::get('facebook_token');
        } else if (Input::get('google_id')) {
            unset($data['facebook_id']);
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
            /* Validate facebook_id with ID retrieved from Facebook based on Access Token */
            $playerData = $this->player->findByEmail(Input::get('email'));
            /* Validate Data */
            $messages = $this->player->messages();
            $rules = $this->player->rules();
            $rules['password'] = 'sometimes' . ($rules['password'] ? '|' . $rules['password'] : '');
            if ($playerData) {
                unset($rules['email']);
            }
            unset($rules['password_confirmation']);
            $validator = Validator::make($data, $rules, $messages);
            /* Validate Data */

            if ($validator->fails()) { // validation failed
                abort(400, $validator->errors()->first());
            }

            if (!$playerData) {
                $playerData = $this->player->create($data);
            } else {
                $playerData = $this->player->update($playerData->id, $data);
            }
            Auth::player()->loginUsingId($playerData->id); // set player as logged in
            \Session::save();

            $returnData['data'] = [$this->player->view($playerData->id)];

            return response()->json($returnData);
        }

    }
}
