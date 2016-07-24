<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('menuButton', '');
        view()->share('submitButton', '');
        view()->share('blogButton', '');
        view()->share('queryString', 'param_name=abc');
        view()->share('footer', 'true');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
