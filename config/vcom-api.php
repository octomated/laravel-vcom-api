<?php

// config for Octomated/VcomApi
return [
    'url' => env('MC_VCOM_API_URL', 'https://api.meteocontrol.de'),
    'username' => env('MC_VCOM_API_USERNAME'),
    'password' => env('MC_VCOM_API_PASSWORD'),
    'api_key' => env('MC_VCOM_API_KEY'),
    'auth_mode' => env('MC_VCOM_API_AUTH_MODE', 'oauth'),
];
