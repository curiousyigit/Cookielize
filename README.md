# Cookielize 
This package adds changing locale/language functionality to your laravel app using cookies.

## How it works
When a user visits a "trigger" url, the package sends back a cookie with the requested locale. Then, a middleware checks this cookie and changes the app locale accordingly.

## Installation
Installation is straightforward, setup is similar to every other Laravel Package.

**1. Install via composer**
```
composer require fedasoft/cookielize
```

**2. Define the Service Provider and alias**  
**Note:** You can skip this step if you are using laravel 5.5 and above as this package supports "**auto-discovery**".  

If you are using Laravel 5.0 - 5.4 then you need to add a provider and alias. Inside of your `config/app.php` define a new service provider.
```
'providers' => [
	//  other providers

	hopefeda\Cookielize\CookielizeServiceProvider::class,
];
```

Then we want to define an alias in the same `config/app.php` file.
```
'aliases' => [
	// other aliases

	'Cookielize' => hopefeda\Cookielize\facades\CookielizeFacade::class,
];
```

**3. Publish Config File**  
The config file allows you to override default settings of this package to meet your specific needs. It also allows you to change the supported languages list.

To generate a config file type this command into your terminal:
```
php artisan vendor:publish --tag=cookielize
```
This generates a config file at config/cookielize.php.

## Usage
This package is very easy to use. Once installed, when a user visits the "trigger" url(which by default is www.yourwebsite.com/languages/en, <--where en is the language code.) the application locale for them is set if it is in the supported languages list.

**A few examples:**  
https://www.yourwebsite.com/languages/ar <-- Sets the locale to arabic  
https://www.yourwebsite.com/languages/fr <-- Sets the locale to french

## Functions
**1. LocaleRoute() - Returns a trigger path**  
This function is used to generate trigger(locale changer) urls in your views. It uses the "trigger_path" to do so. Any changes to the "trigger_path" in the config file will automatically reflect.
```
// Example 1
{{Cookielize::LocaleRoute('en')}} //gives /languages/en

// Example 2
<a href="{{Cookielize::LocaleRoute('tr')}}">Turkish</a> //gives <a href="/languages/tr">Turkish</a>
``` 

**2. LocaleSupported() - Checks if locale is supported, returns a boolean**  
This function is used to check if a locale is in the "supported_languages" list. It returns **true** or **false**.
```
// Example
@if (Cookielize::LocaleSupported('en'))
// do somethinng
@endif  

```
**Note:** If you want to use the Cookielize functions within your controllers, don't forget to add `use Cookielize;` at the beginning of your controller.
```
// Example
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookielize;

class TestController extends Controller
{
    public function something()
    {
		if (Cookielize::LocaleSupported('en')) {
			// do something
		}
        return Cookielize::LocaleRoute('en');
    }
}

```  

## Configurables
You can configure various properties from the `config/cookielize.php` file.
```
/*
|--------------------------------------------------------------------------
| trigger_path
|--------------------------------------------------------------------------
|
| This is the path that will trigger the locale/language change. It should 
| contain a "{locale}" parameter which will be replaced by the locale code 
| while linking. This path starts from the root of your application url
| (APP_URL in your .env file).
|
| Example 1: '/languages/{locale}'
| When linked: http://www.yourApplicationURL.com/languages/en
| 
| Example 2: '/{locale}'
| When linked: https://www.yourApplicationURL.com/en
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
```
## Contribute  
I encourage you to contribute to this package to improve it and make it better. Even if you don't feel comfortable with coding or submitting a pull-request (PR), you can still support it by submitting issues with bugs or requesting new features, or simply helping discuss existing issues to give us your opinion and shape the progress of this package.