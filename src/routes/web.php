<?php

Route::get(config('cookielize.trigger_path'), function($locale) {

    if (!in_array($locale, config('cookielize.supported_languages'))) 
    {
        if (config('cookielize.unsupported_language_action') == '404')
        {
            abort(404);
        }
        else
        {
            return redirect(config('cookielize.unsupported_language_action'));
        }
    }

    if (config('cookielize.redirect_after_change_to') == 'back') 
    {
        if(request()->fullUrl() === redirect()->back()->getTargetUrl())
        {
            return redirect(config('cookielize.fallback_path'))->withCookie(cookie()->forever('locale', $locale));
        }
        else 
        {
            return redirect()->back()->withCookie(cookie()->forever('locale', $locale));
        }
    }
    else 
    {
        return redirect(config('cookielize.redirect_after_change_to'))->withCookie(cookie()->forever('locale', $locale));
    } 
});