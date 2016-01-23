<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id'     =>  env('FB_CLIENT_ID'),
        'client_secret' =>  env('FB_SECRET'),
        'redirect'      =>  'https://lockedornot-jolitagrazyte.c9users.io/login/facebook',
    ],

    'google' => [
        'client_id'     => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_SECRET'),
        'redirect'      => 'http://lockdrnot.local.com/login/google'
    ],


];
