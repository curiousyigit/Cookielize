<?php

namespace hopefeda\cookielize;
use Illuminate\Support\ServiceProvider;

class CookielizeServiceProvider extends ServiceProvider
{
    public function boot(\Illuminate\Contracts\Http\Kernel $kernel) 
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->mergeConfigFrom(__DIR__.'/config/cookielize.php', 'cookielize');
        $this->publishes([__DIR__.'/config/cookielize.php' => config_path('cookielize.php')]);
        $kernel->pushMiddleware(CookielizeSetLocale::class);
    }

    public function register() 
    {
        
    }
}