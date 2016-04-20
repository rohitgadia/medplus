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
        'client_id' => '836258996520576',
        'client_secret' => 'ed56d36f0120e71a9c7544b7d3a07d09',
        'redirect' => 'http://www.medplus.dev/OAuth/f/Callback',
    ],
    'twitter' => [
        'client_id' => 'PPu79L8LvxbJHkVbN1PZAgjC1',
        'client_secret' => 'UnzSQR7pkZN1wWcESWwyAaWZKBF7kx4LEBdufXZnq360UWNOxx',
        'redirect' => 'http://www.medplus.dev/OAuth/t/Callback',
    ],
    'google' => [
        'client_id' => '200767709641-vf0q2pop6vbhn4t6ikdcavv4hv1dutrn.apps.googleusercontent.com',
        'client_secret' => 'IwIQ231GGYdxxCXSB2xowDw8',
        'redirect' => 'http://www.medplus.dev/OAuth/g/Callback',
    ],
];
