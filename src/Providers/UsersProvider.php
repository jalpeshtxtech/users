<?php

namespace Jalpeshtxtech\Users\Providers;

use Illuminate\Support\ServiceProvider;

class UsersProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../views', 'users');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
    }

    public function register()
    {
        // register our controller
        $this->app->make('Jalpeshtxtech\Users\Controllers\UsersController');
        
    }
}
