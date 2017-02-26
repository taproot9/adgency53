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

    'paypal' => [
        'client_id' => 'AUEH7Cg7wOEnv4PkyIwKCvM0Zca4mqdJtM1uykikRpAAi__X-bD-6YBkXkZW-ZxT_UFkZWqPumOs8om_',
        'secret' => 'EI24_W_qVtAtUnlKfgipYGvXf8P46cqQWQI1CVURbQbt_Grrg9IpZ_ITgESncjtnwHDICoPMlQua9QQ_'

    ],

];
