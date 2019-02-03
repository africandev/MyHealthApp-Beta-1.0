<?php

namespace App\Http\Controllers\Auth;

use App\User; //User Model
use App\Countries; //Countries Model
use App\Http\Controllers\Controller;
//Dependencies from Laravel Package
use Illuminate\Http\Request; 
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RedirectsUsers;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $country = Countries::all();
        return view('auth.register')->with('country', $country);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/my/brandnew';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $message = array(
            'firstname.required' => 'Vous devez entrer votre prénom',
            'lastname.required' => 'Vous devez entrer votre prénom',
            'email.required' => 'Une adresse email est requise',
            'country.required' => 'Veuillez sélectionner votre pays',
            'gender.required' => 'Veuillez entrer votre genre',
        );
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country' => ['required'],
            'indicator' => ['integer'],
            'phone' => ['required'],
            'gender' => ['required'],
            'password' => ['required','string'],
        ], $message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $language = 'fr';
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'country' => $data['country'],
            'indicator' => $data['indicator'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'role' => '1',
            'language' => $language,
            'password' => Hash::make($data['password']),
        ]);
    }
}
