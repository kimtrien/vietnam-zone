<?php

namespace Kjmtrue\VietnamZone;

use Kjmtrue\VietnamZone\Console\Commands\ImportCommand;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'migrations');

        $this->commands([
            ImportCommand::class,
        ]);
    }
}
