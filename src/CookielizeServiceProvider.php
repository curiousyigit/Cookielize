<?php

namespace hopefeda\Cookielize;
use Illuminate\Support\ServiceProvider;

class CookielizeServiceProvider extends ServiceProvider
{
    public function boot(\Illuminate\Contracts\Http\Kernel $kernel) 
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->publishes([__DIR__.'/config/cookielize.php' => config_path('cookielize.php')]);
        $kernel->pushMiddleware(CookielizeSetLocale::class);
    }

    public function register() 
    {
        $this->mergeConfigFrom(__DIR__.'/config/cookielize.php', 'cookielize');
        $this->app->bind('Cookielize', function($app)
        {
            return $this->app->make('hopefeda\Cookielize\Cookielize');
        });
    }
}