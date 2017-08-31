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

    'facebook' => [
        'client_id' => '176313692799071',
        'client_secret' => '4f6f28a225943e84442204d86556d7e0',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '14182152482-o2birgl4ebjt8idb0vclnbtpstdbg751.apps.googleusercontent.com',
        'client_secret' => 'wEGzS6yu7MlrcXiMifgmRU8o',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],
];
