<?php

namespace Ghayas\HelloWorldPackage;

use Illuminate\Support\ServiceProvider;

class HelloWorldPackageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Merge config
        $this->mergeConfigFrom(
            __DIR__ . '/config/hello-world-package.php',
            'hello-world-package'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Publish views
        $this->loadViewsFrom(__DIR__ . '/Views', 'hello-world-package');

        // Publish views to the application
        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/hello-world-package'),
        ], 'views');

        // Publish config
        $this->publishes([
            __DIR__ . '/config/hello-world-package.php' => config_path('hello-world-package.php'),
        ], 'config');

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }
}