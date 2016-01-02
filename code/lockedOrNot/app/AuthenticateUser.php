<?php

namespace App;

use Laravel\Socialite\Contracts\Factory as Socialite;
use Illuminate\Contracts\Auth\Guard;
use App\Repositories\UserRepository;
use App\Http\Requests\SocialRegister;


class AuthenticateUser {

    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var Socialite
     */
    private $socialite;
    /**
     * @var Guard
     */
    private $auth;

    /**
     * @param UserRepository $user
     * @param Socialite $socialite
     * @param Guard $auth
     * @param SocialRegister $request
     */
    public function __construct( UserRepository $user, Socialite $socialite, Guard $auth, SocialRegister $request){

        $this->users        = $user;
        $this->socialite    = $socialite;
        $this->auth         = $auth;

    }

    /**
     * @param $hasCode
     * @param $listener
     * @param $social_provider
     * @return mixed
     */
    public function execute( $hasCode, AuthenticateUserListener $listener, $social_provider ){

//        dd($hasCode);
        if(!$hasCode) return $this->getAuthorizationFirst($social_provider);

        $user = $this->users->findByEmailOrCreate($this->getSocialUser($social_provider));

        if(!$user){

            Session::flash('message', "Something went wrong!");
            Session::flash('alert-class', 'error');

        }
        $this->auth->login($user, true);

//        event(new \App\Events\UserEvent($user->full_name));

        return $listener->userHasBeenRegistered($user);
    }

    /**
     * @param $social_provider
     * @return mixed
     */
    public function getAuthorizationFirst($social_provider){

        return $this->socialite->driver($social_provider)->redirect();
    }

    /**
     * @param $social_provider
     * @return \Laravel\Socialite\Contracts\User
     */
    private function getSocialUser($social_provider)
    {
        return $this->socialite->driver($social_provider)->user();
    }

}