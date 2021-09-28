<?php

namespace Kjmtrue\VietnamZone;

use GuzzleHttp\Client;

class Downloader
{
    const DOWNLOAD_URL = config('vietnam-zone.remote_update');

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

        $res = $client->get(self::DOWNLOAD_URL, [
            'save_to' => storage_path('vietnam-zone.xls')
        ]);

        return $res->getStatusCode() == 200 ? storage_path('vietnam-zone.xls') : null;
    }
}
