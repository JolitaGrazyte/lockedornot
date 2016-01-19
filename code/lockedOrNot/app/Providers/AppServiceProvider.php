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
        if(Auth::guest()){

            return redirect()->to($this->redirectPath);
        }

        $user = Auth::user();

        $unlocked_devices = $user->devices()->unlocked();
        $device_status  =   $unlocked_devices->count() == 0 ? 'locked' : 'unlocked';

        $no_device = empty($user->devices) && is_null($user->devices);

             view()->composer(['partials.nav-right', 'profile.edit-form'], function($view) use($no_device){

                 $view->with('no_device', $no_device);
             });


        view()->composer(['partials.nav', 'profile.index'], function($view) use($user){

            $view->with('auth', $user);
        });

        view()->composer(['partials.sidebar', 'layouts.dashboard'], function($view) use($device_status){

            $view->with('auth', $device_status);
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
