<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'google' => [
       'client_id' => '192535710651-vfmpplujt3e6kr0kr9204cqskano714g.apps.googleusercontent.com',
       'client_secret' => 'CMuskA8CTk2RHjpaiWWdc858',
        'redirect' => 'https://salty-castle-74378.herokuapp.com/auth/google/callback', //This must be same as your API callback address
    ],
    'facebook' => [
       'client_id' => '119683385379654',
       'client_secret' => 'e94f1350364458105de08bf2e9b6d873',
        'redirect' => 'https://salty-castle-74378.herokuapp.com/auth/facebook/callback', //This must be same as your API callback address
    ],

];
