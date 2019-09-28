<?php

namespace App\Providers;

use App\Util\Sleeper\SleeperApi;
use Illuminate\Support\ServiceProvider;


class SleeperApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('sleeper-api', function () {
            return new SleeperApi;
        });
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}