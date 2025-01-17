<?php

namespace DayeBill\BillCore;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    public function register() : void
    {
        $this->mergeConfigFrom(__DIR__.'/../conf/bill-core.php', 'bill-core');
    }

    public function boot() : void
    {

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    protected function bootForConsole() : void
    {
        $this->publishes([
            __DIR__.'/../conf/bill-core.php' => config_path('bill-core.php'),
        ], 'bill-core.config');
    }
}
