<?php

namespace hopefeda\cookielize;

use Closure;
use Cookie;

class CookielizeSetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = Cookie::get('locale');
        if($locale != null && in_array($locale, config('cookielize.supported_languages')))
        {
            app()->setLocale($locale);
        }

        return $next($request);
    }
}
