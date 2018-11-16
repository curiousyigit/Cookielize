<?php
return [
    /*
    |--------------------------------------------------------------------------
    | trigger_path
    |--------------------------------------------------------------------------
    |
    | This is the path that will trigger the locale/language change. It should 
    | contain a "{locale}" parameter which will be replaced by the locale code 
    | while linking. This path starts from the root of your application url.
    |
    | Example 1: '/languages/{locale}'
    | When linked: http://www.yourwebsite.com/languages/en
    | 
    | Example 2: '/{locale}'
    | When linked: https://www.yourwebsite.com/en
    |
    */
    'trigger_path' => '/languages/{locale}',





    /*
    |--------------------------------------------------------------------------
    | redirect_after_change_to
    |--------------------------------------------------------------------------
    |
    | This is the url to redirect to after changing the locale.
    |
    | 'back' : Redirect back to the page from which the request came
    | '\' : Redirect back to your public root
    | 
    | You can also put any other url or path.
    |
    */
    'redirect_after_change_to' => 'back',





    /*
    |--------------------------------------------------------------------------
    | fallback_path
    |--------------------------------------------------------------------------
    |
    | Sometimes, when 'back' is selected above in 'redirect_after_change_to',
    | the back url might be a link back to the trigger path. This will cause
    | an endless loop and will eventually trigger a 'too many redirects' error.
    | To prevent such a thing when this happens, the user will be redirected to 
    | this path instead.
    |
    */
    'fallback_path' => '/',





    /*
    |--------------------------------------------------------------------------
    | unsupported_language_action
    |--------------------------------------------------------------------------
    |
    | What to do when the requested language is not supported? By default, it
    | will throw a 404 page not found exception(When 404 is entered). 
    | Alternatively, you can enter a path to redirect to.
    | For example: '/pages/not-supported'
    |
    */
    'unsupported_language_action' => '404',




    /*
    |--------------------------------------------------------------------------
    | supported_languages
    |--------------------------------------------------------------------------
    |
    | This is an array of supported languages respresented by their 2 letter
    | code. The application locale will be set to the selected one from these.
    |
    */
    'supported_languages' => ['en', 'ar'],
];