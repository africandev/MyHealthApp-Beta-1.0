<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;

class SocialAuthFacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback()
    {
       
    }
}
