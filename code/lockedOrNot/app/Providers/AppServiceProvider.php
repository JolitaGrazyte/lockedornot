<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    protected $redirectPath =   '/';
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        $no_device = true;
        if(Auth::guest()){

            return redirect()->to($this->redirectPath);
        }

        $user = Auth::user();

        $no_device = is_null($user->devices);

             view()->composer(['partials.nav-right', 'profile.edit-form', 'home.index'], function($view) use($no_device){

                 $view->with('no_device', $no_device);
             });


        view()->composer(['partials.nav', 'profile.index'], function($view) use($user){

            $view->with('auth', $user);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(
//            '\Auth0\Login\Contract\Auth0UserRepository',
//            '\Auth0\Login\Repository\Auth0UserRepository');

    }
}
