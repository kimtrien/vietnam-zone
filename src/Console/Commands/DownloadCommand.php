<?php

namespace Kjmtrue\VietnamZone\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Kjmtrue\VietnamZone\Downloader;
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
    protected $description = 'VietNam Zone Download Data';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Downloading...');

        $tmpFile = app(Downloader::class)->downloadFile();

        $this->info('Importing...');

        Excel::import(new VienamZoneImport(), $tmpFile);

        File::delete($tmpFile);

        $this->info('Completed');
    }
}
