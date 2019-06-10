<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Merchant Code
    |--------------------------------------------------------------------------
    |
    | The Merchant Code provided by iPay88 and use
    | to uniquely identify the Merchant.
    |
    | Maximum length of 20 characters
    |
     */

    'MerchantCode' => env('IPAY88_MERCHANT_CODE', null),

    /*
    |--------------------------------------------------------------------------
    | Merchant Key
    |--------------------------------------------------------------------------
    |
    | Provided by iPay88 OPSG and share between iPay88 and merchant only
    |
     */

    'MerchantKey' => env('IPAY88_MERCHANT_KEY', null),

    /*
    |--------------------------------------------------------------------------
    | Currency
    |--------------------------------------------------------------------------
    |
    | Currency - default value
    |
     */

    'Currency' => 'MYR',

    /*
    |--------------------------------------------------------------------------
    | Charset
    |--------------------------------------------------------------------------
    |
    | Charset - default value
    |
    | Encoding type:
    |    ISO-8859-1 – English
    |    UTF-8 – Unicode
    |    GB2312 – Chinese Simplified
    |    GD18030 – Chinese Simplified
    |    BIG5 – Chinese Traditional
    |
     */

    'Charset' => 'UTF-8',

    /*
    |--------------------------------------------------------------------------
    | URL for requests to the payment system
    |--------------------------------------------------------------------------
    |
    | sandbox - for testing
    |
     */

    'sandbox_url' => 'https://payment.ipay88.com.my/ePayment/entry.asp',

    /*
    |--------------------------------------------------------------------------
    | URL for requests to the payment system
    |--------------------------------------------------------------------------
    |
    | realise - for real data
    |
     */

    'realise_url' => 'https://payment.ipay88.com.my/ePayment/entry.asp',
];
