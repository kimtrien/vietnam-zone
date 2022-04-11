<?php

namespace Kjmtrue\VietnamZone\Console\Commands;

use Illuminate\Console\Command;
use Kjmtrue\VietnamZone\Imports\VienamZoneImport;
use Maatwebsite\Excel\Facades\Excel;

class DownloadCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vietnamzone:download';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'VietNam Zone Import';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (file_exists(storage_path('vnzone.xls'))) {
            $tmpFile = storage_path('vnzone.xls');
        } else {
            $tmpFile = realpath(__DIR__.'/../../../database/vnzone.xls');
        }

        $this->info('Importing...');
        $this->info($tmpFile);

        Excel::import(new VienamZoneImport(), $tmpFile);

        $this->info('Completed');
    }
}
