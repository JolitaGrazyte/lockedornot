<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Contracts\Auth\Guard;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
//use Laravel\Socialite\Facades\Socialite;
use App\AuthenticateUserListener;
use App\AuthenticateUser;

class AuthController extends Controller implements AuthenticateUserListener
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath =   '/dashboard';

    /**
     * Create a new authentication controller instance.
     * @param Guard $auth
     */
    public function __construct( Guard $auth )
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'device_nr' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'device_nr' => $data['device_nr'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }



    /**
     * Register with some social provider, like facebook, google+.
     *
     * @param AuthenticateUser $authenticateUser
     * @param Request $request
     * @param null $provider
     * @return mixed
     */
    public function social_register( AuthenticateUser $authenticateUser, Request $request, $provider = null) {

        return $authenticateUser->execute($request->has('code'), $this, $provider);

    }


    /**
     * @param $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userHasBeenRegistered($user) {

        return redirect('dashboard');
    }
}
