<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


get('/', ['as' => 'home',       function () {
    return view('home.index');
}]);


// Password reset
Route::controllers([
    'password' => 'Auth\PasswordController',
]);


// Registration routes...
get('auth/register',            ['as' => 'register',        'uses' => 'Auth\AuthController@getRegister' ]);
post('auth/register',           ['as' => 'post-register',   'uses' => 'Auth\AuthController@postRegister' ]);
get('login/{provider}',         ['as' => 'social-register', 'uses' => 'Auth\AuthController@social_register']);



// Authentication routes...
get('auth/login',       ['as' => 'login',            'uses' => 'Auth\AuthController@getLogin']);
post('auth/login',      ['as' => 'post-login',       'uses' => 'Auth\AuthController@postLogin']);
get('logout',           ['as' => 'logout',           'uses' => 'Auth\AuthController@getLogout']);


get('nglogin', function(){
    return view('nglogin');
});
Route::group(['middleware' => 'auth'], function()
{

    resource('profile', 'ProfileController');

    get('profile', function(){
        return redirect()->to('how-i\'m-doing');
    });

    get('{name}/personal-stats',    ['as' => 'personal-stats',  'uses' => 'StatsController@personalStats']);
    get('how-i\'m-doing',           ['as' => 'how-im-doing',    'uses' => 'StatsController@index']);

    get('update-login-info/{name}', ['as' => 'edit-login',      'uses' => 'ProfileController@editMyLogin']);
    post('update-login/{user}',     ['as' => 'update-login',    'uses' => 'ProfileController@updateMyLogin']);

    //get state: locked or not on web-page
    get('device-state/{id}', 'DeviceController@response');

//    get('{name}/{week}', ['as' => 'mostly-checked-per-week', 'uses' => 'StatsController@personalStats']);
//    get('{name}/{month}',['as' => 'mostly-checked-per-month', 'uses' => 'StatsController@personalStats']);
    get('{name}/mostly-checked-per/{week}', ['as' => 'mostly-checked-filter', 'uses' => 'StatsController@index']);
    get('{name}/mostly-checked-per/{month}/{i}/{s}', ['as' => 'filter-interval-plus', 'uses' => 'StatsController@index']);
    get('{name}/mostly-checked-per/{year}/{i}/{s}', ['as' => 'filter-interval-minus', 'uses' => 'StatsController@index']);

});


//get('stats', ['as' => 'stats', 'uses' => 'StatsController@index']);


Route::group(['prefix' => 'api'], function()
{
    resource('authenticate',    'AuthenticateController', ['only' => ['index']]);
    post('authenticate',        'AuthenticateController@authenticate');
    //    get('lockedornot',    'DeviceController@jsonResponse');
    get('lockedornot',          'DeviceController@getState');

    //Todo: check, this is not working!
    post('signup', 'AuthenticateController@register');

});

Route::group(['prefix' => 'api', 'middleware' => 'auth'], function()
{
    get('stats',                'StatsController@json_stats');
    get('personal-stats/{id}',  'StatsController@personal_stats_json');
    get('month-stats/{id}',     'StatsController@monthly_stats_json');
    get('punch-stats/{id}',     'StatsController@punch_stats_json');
    get('am-stats/{id}',        'StatsController@am_stats');

});


//Pusher real time notifications
get('/bridge/{device_nr}/{id}', 'DeviceController@putState');


//get('/broadcast', function() {
//    event(new DeviceStateChanged('Broadcasting in Laravel using Pusher!'));
//
//    return view('welcome');
//});
//
//get('form', function(){
//   return view('auth.step-register');
//});