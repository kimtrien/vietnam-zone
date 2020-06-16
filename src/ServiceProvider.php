<?php

namespace Kjmtrue\VietnamZone;

use Kjmtrue\VietnamZone\Console\Commands\DownloadCommand;
use Kjmtrue\VietnamZone\Console\Commands\UpdateCommand;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/vietnam-zone.php', 'vietnam-zone');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../config/vietnam-zone.php' => config_path('vietnam-zone.php'),
        ], 'config');

        $this->commands([
            DownloadCommand::class,
            UpdateCommand::class,
        ]);
    }
}