<?php
/**
 * Configuration settings used by all of the examples.
 *
 * Specify your eBay application keys in the appropriate places.
 *
 * Be careful not to commit this file into an SCM repository.
 * You risk exposing your eBay application keys to more people than intended.
 */
return [
    'credentials' => [
        'devId' => env('EBAY_DEV_ID'),
        'appId' => env('EBAY_CLIENT_ID'),
        'certId' => env('EBAY_CLIENT_SECRET'),
    ],
    'authToken' => env('EBAY_AUTH_TOKEN'),
    'oauthUserToken' => '',
    'ruName' => env('EBAY_CLIENT_RUNAME')
];
