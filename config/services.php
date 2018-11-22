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
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'sendgrid' => [
        'api_key' => env('SENDGRID_API_KEY'),
    ],

    'firebase' => [
        'api_key' => 'AIzaSyCpXRv-PxAY9OwuFuSraEd7BJo8owv_6Z8', // Only used for JS integration
        'auth_domain' => 'food-delivery-app-e7995.firebaseapp.com', // Only used for JS integration
        'database_url' => 'https://food-delivery-app-e7995.firebaseio.com',
        'secret' => 'secret',
        'storage_bucket' => 'food-delivery-app-e7995.appspot.com', // Only used for JS integration
    ],

];
