<?php

namespace Kjmtrue\VietnamZone;

use GuzzleHttp\Client;

class Downloader
{
    /**
     * Download database VietNam Zone
     *
     * @return string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function downloadFile()
    {
        $client = new Client([
            'verify' => false
        ]);

        $res = $client->get(config('vietnam-zone.remote_update'), [
            'save_to' => storage_path('vietnam-zone.xls')
        ]);

        return $res->getStatusCode() == 200 ? storage_path('vietnam-zone.xls') : null;
    }
}
