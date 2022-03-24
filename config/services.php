<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'github' => [
        'client_id' => '129b6747ca8e5751b0a9',
        'client_secret' => '6143b26dcbfc8aa43ce66ba1b556e49b02041906',
        'redirect' => 'http://127.0.0.1:8000/auth/callback',
    ],

    'google' => [
        'client_id' => '322719925140-bohdpipggoddrikj81v1g06gc16a3djc.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => '493929995489376',
        'client_secret' => 'e4592653765aa0099ebc3b5415b3e3bd',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

];
