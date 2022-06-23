<?php

namespace DummyNamespace\Providers;

use Uchup07\LaravelThemes\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        parent::boot();

        //
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/themes.php', 'themes'
        );
        $this->app->register(RouteServiceProvider::class);
    }
}