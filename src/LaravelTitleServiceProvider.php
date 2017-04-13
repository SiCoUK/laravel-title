<?php
namespace SiCoUK\LaravelTitle;

use Illuminate\Support\ServiceProvider;

class LaravelTitleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('LaravelTitle', function()
        {
            return new \SiCoUK\LaravelTitle\Title;
        });
    }
}
