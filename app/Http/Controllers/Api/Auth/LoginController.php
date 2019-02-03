<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\Client;
use Route;

class LoginController extends Controller
{

    private $client;

    public function _construct(){
        $this->client = Client::find(1);
    }


    public function login(Request $request){

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $request->request->add([
            'grant_type' => 'password',
            'client_id' => '2',
            'client_secret' => 'qUbNhaUGxkxQFi1dZiUG47C5IltUwDOeTb7gvtqf',
            'username' => $request['username'],
            'password' => $request['password'],
            'scope' => '*'
        ]);

        // Fire off the internal request.
        $token = Request::create(
            'oauth/token',
            'POST'
        );
        return \Route::dispatch($token);
    }

    public function refresh (Request $request){

        $this->validate($request, [
    		'refresh_token' => 'required'
    	]);


        $request->request->add([
            'grant_type' => 'refresh_token',
            'client_id' => '2',
            'client_secret' => 'qUbNhaUGxkxQFi1dZiUG47C5IltUwDOeTb7gvtqf',
            'username' => $request['username'],
            'password' => $request['password'],
        ]);

        // Fire off the internal request.
        $token = Request::create(
            'oauth/token',
            'POST'
        );
        return \Route::dispatch($token);

    }

    public function logout (Request $request){

        $accessToken = Auth::user()->token();
    	DB::table('oauth_refresh_tokens')
    		->where('access_token_id', $accessToken->id)
    		->update(['revoked' => true]);
        $accessToken->revoke();

        return response()->json([], 204);

    }
}

