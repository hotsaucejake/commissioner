<?php

return [

    /*
     ***************************************************************************
     * Sleeper API Authentication
     ***************************************************************************
     *
     * Authentication key and secret for iVita Financial API.
     * None is required yet, for future use.
     *
     */
    'auth' => [
        'key'    => env('SLEEPER_KEY', ''),
        'secret' => env('SLEEPER_SECRET', ''),
    ],
    /*
     ***************************************************************************
     * API URLS
     ***************************************************************************
     *
     * Coinigy API endpoints
     *
     */
    'urls' => [
        'api' => 'https://api.sleeper.app/',
    ],
];
