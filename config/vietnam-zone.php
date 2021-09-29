<?php
return [
    'remote_update' => "https://github.com/kjmtrue/vietnam-zone/raw/database/vietnam-zone.xls",
    'tables' => [
        'provinces' => 'cities',
        'districts' => 'districts',
        'wards'     => 'wards',
    ],

    'columns' => [
        'name'        => 'name',
        'gso_id'      => 'gso_id',
        'province_id' => 'city_id',
        'district_id' => 'district_id',
    ],
];
