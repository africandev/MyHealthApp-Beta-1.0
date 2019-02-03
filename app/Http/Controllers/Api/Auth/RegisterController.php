<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;
use GuzzleHttp\Client as Theclient;

class RegisterController extends Controller {

    private $client;

	public function __construct(){
		$this->client = Client::find(1);
    }

    public function register(Request $request){
    	$this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'unique:users,email',
            'gender' => 'required|max:1',
            'country' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

    	$user = User::create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'indicator' => $request['indicator'],
            'phone' => $request['phone'],
            'gender' => $request['gender'],
            'country' => $request['country'],
            'password' => Hash::make($request['password'])
        ]);

    // Is this $request the same request? I mean Request $request? Then wouldn't it mess the other $request stuff? Also how did you pass it on the $request in $proxy? Wouldn't Request::create() just create a new thing?

        $request->request->add([
            'grant_type' => 'password',
            'client_id' => '2',
            'client_secret' => 'X7dXxXzAqF7hDoSPhpazvW2PediDFXMGiLXe88ti',
            'username' => $request['email'],
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

        /*$params = [
    		'grant_type' => 'password',
    		'client_id' => '4',
            'client_secret' => 'DjoDv15a8n6tx0C1bFiKg5VbOe5fSJIdRN3islmn',
            'username' => $request['email'],
            'password' => $request['password'],
    		'scope' => '*'
        ];

        $request->request->add($params);

        $proxy = Request::create('oauth/token', 'POST');

        return Route::dispatch($proxy);*/

        /*$http = new Theclient;

        $response = $http->post('http://127.0.0.1:8000/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => '4',
                'client_secret' => 'DjoDv15a8n6tx0C1bFiKg5VbOe5fSJIdRN3islmn',
                'username' => $request['email'],
                'password' => $request['password'],
                'scope' => '*'
            ],
        ]);

        return json_decode((string) $response->getBody(), true);*/

}
