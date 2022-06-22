<?php

namespace Uchup07\LaravelThemes;

use Illuminate\Support\ServiceProvider;
use Uchup07\LaravelThemes\Manifest;
use Uchup07\LaravelThemes\View\ThemeViewFinder;
use Uchup07\LaravelThemes\Console\GenerateTheme;

class LaravelThemesServiceProvider extends ServiceProvider
{   
    /**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/themes.php' => config_path('themes.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/themes.php', 'laravel-themes');

        $this->registerServices();
		$this->registerNamespaces();

        // Register the main class to use with the facade
        /* $this->app->singleton('laravel-themes', function () {
            return new LaravelThemes;
        }); */

        $this->commands([
            GenerateTheme::class
        ]);
    }

    public function provides()
    {
        return ['laravel-themes', 'view.finder'];
    }

    protected function registerServices()
    {
        $this->app->singleton('laravel-themes', function($app) {
            $themes = [];
            $items  = [];

            if ($path = base_path('themes')) {
                if (file_exists($path) && is_dir($path)) {
                    $themes = $this->app['files']->directories($path);
                }
			}

            foreach ($themes as $theme) {
                $manifest = new Manifest($theme.'/theme.json');
                $items[]  = collect($manifest->all());
            }

            return new LaravelThemes($items);
		});

        $this->app->singleton('view.finder', function($app) {
            return new ThemeViewFinder($app['files'], $app['config']['view.paths'], null);
		});
    }

    protected function registerNamespaces()
    {
        $themes = app('laravel-themes')->all();

        foreach ($themes as $theme) {
            $namespace = $theme->get('slug');
			$hint      = app('laravel-themes')->path('resources/views', $theme->get('slug'));

            app('view')->addNamespace($namespace, $hint);
        }
    }
}
