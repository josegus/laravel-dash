<?php

namespace JoseGus\LaravelDash;

use Illuminate\Support\ServiceProvider;

class LaravelDashServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'dash');

        $this->publishViews();
        $this->publishLayoutViews();
        $this->publishAuthViews();
        $this->publishAssets();
        $this->publishResources();
        $this->publishConfig();
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/dash.php', 'dash'
        );
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__.'/../config/dash.php' => config_path('dash.php')
        ], 'laravel-dash:config');
    }

    protected function publishAssets()
    {
        $this->publishes([
            __DIR__.'/../public/' => public_path('vendor/dash')
        ], 'laravel-dash:assets');
    }

    protected function publishResources()
    {
        $this->publishes([
            __DIR__.'/../resources/js' => base_path('resources/dash/js'),
            __DIR__.'/../resources/sass' => base_path('resources/dash/sass'),
        ], 'laravel-dash:resources');
    }

    protected function publishViews()
    {
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/dash')
        ], 'laravel-dash:views');
    }

    protected function publishLayoutViews()
    {
        $this->publishes([
            __DIR__.'/../resources/views/layouts' => base_path('resources/views/vendor/dash/layouts')
        ], 'laravel-dash:layout-views');
    }

    protected function publishAuthViews()
    {
        $this->publishes([
            __DIR__.'/../resources/views/auth' => base_path('resources/views/vendor/dash/auth')
        ], 'laravel-dash:auth-views');
    }
}
