<?php
$domain = config('app.domain');
return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => [
        'api/*',
        'sanctum/csrf-cookie',
        'login',
        'logout',
    ],

    'allowed_methods' => ['GET', 'POST'],

    'allowed_origins' => [],

    'allowed_origins_patterns' => [
        config('app.env') !== 'local'
            ? "~\Ahttps?://{$domain}(/.*)?\z~"
            : "~\Ahttps?://{$domain}:3000(/.*)?\z~"
    ],

    'allowed_headers' => ['Authorization, X-XSRF-TOKEN, Content-Type'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
