<?php

namespace Kjmtrue\VietnamZone\Console\Commands;

use Illuminate\Console\Command;

class UpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vietnamzone:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'VietNam Zone Update Data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Updating...');
    }
}
