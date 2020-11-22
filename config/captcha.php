<?php if (!class_exists('CaptchaConfiguration')) { return; }

// BotDetect PHP Captcha configuration options
// more details here: https://captcha.com/doc/php/captcha-options.html
// ----------------------------------------------------------------------------

return [
    /*
    |--------------------------------------------------------------------------
    | Captcha configuration for example page
    |--------------------------------------------------------------------------
    */
    'ExampleCaptcha' => [
        'UserInputID' => 'CaptchaCode',
        'CodeLength' => 4,
        'ImageWidth' => 250,
        'ImageHeight' => 50,
    ],

    /*
    |--------------------------------------------------------------------------
    | Captcha configuration for contact page
    |--------------------------------------------------------------------------
    */
    'ContactCaptcha' => [
        'UserInputID' => 'CaptchaCode',
        'CodeLength' => CaptchaRandomization::GetRandomCodeLength(4, 6),
        'ImageStyle' => ImageStyle::AncientMosaic,
    ],

    /*
    |--------------------------------------------------------------------------
    | Captcha configuration for login page
    |--------------------------------------------------------------------------
    */
    'LoginCaptcha' => [
        'UserInputID' => 'CaptchaCode',
        'CodeLength' => CaptchaRandomization::GetRandomCodeLength(4, 6),
        'ImageStyle' => [
            ImageStyle::Rough,
            ImageStyle::Split,
            ImageStyle::Graffiti,
        ],
        'CodeStyle' => CodeStyle::Alphanumeric,
    ],

    /*
    |--------------------------------------------------------------------------
    | Captcha configuration for register page
    |--------------------------------------------------------------------------
    */
    'RegisterCaptcha' => [
        'UserInputID' => 'CaptchaCode',
        'CodeLength' => CaptchaRandomization::GetRandomCodeLength(4, 7),
        'CodeStyle' => CodeStyle::Alphanumeric,
    ],

    /*
    |--------------------------------------------------------------------------
    | Captcha configuration for reset password page
    |--------------------------------------------------------------------------
    */
    'ResetPasswordCaptcha' => [
        'UserInputID' => 'CaptchaCode',
        'CodeLength' => 6,
        'CustomLightColor' => '#9966FF',
        'CodeStyle' => CodeStyle::Alphanumeric,
    ],

    // Add more your Captcha configuration here...
];
