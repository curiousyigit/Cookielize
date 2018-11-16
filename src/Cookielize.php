<?php

namespace hopefeda\Cookielize;

class Cookielize
{
    public function LocaleRoute($locale)
    { 
        return str_replace("{locale}", $locale, config('cookielize.trigger_path'));
    }

    public function LocaleSupported($locale)
    {
        if (in_array($locale, config('cookielize.supported_languages')))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}