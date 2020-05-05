<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class LoginController extends Controller
{
    public function login(Request $request) {
    	try {
    		$validator = Validator::make($request->all(), [
	            'email' => 'required|email',
	            'name'  => 'required|string'
	        ]);

	        if ($validator->fails()) {
	            return $this->sendError(__('validation.failed'), $validator->errors(), 400);
	        }

	        $user = User::firstorcreate(Arr::only($request->all(), ['name', 'email']));
	        $user->api_token = Str::random(60);
	        $user->save();

	        return $this->sendResponse(__('auth.login_success'), [
	            'user' => $user
	        ]);
    	} catch(\Exception $e) {
    		return $this->sendError(__('lables.something_went_wrong'), null, 400);
    	}
    }
}
