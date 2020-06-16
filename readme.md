## VietNam Zone

Database đơn vị hành chính của Việt Nam

Dữ liệu được lấy trực tiếp từ Tổng Cục Thống Kê Việt Nam.
 
Đảm bảo luôn luôn là dữ liệu mới nhất và chính xác nhất.

## Cài đặt

```shell
composer require kjmtrue/vietnam-zone
```

#### Copy file config và migration

```shell
php artisan vendor:publish --provider="Kjmtrue\VietnamZone\ServiceProvider"
```

#### Chỉnh sửa config và migration nếu bạn cần tuỳ biến cho dự án

1. Đổi tên bảng

Mở file `config/vietnam-zone.php` chỉnh các cấu hình sau:

```php
'tables' => [
    'provinces' => 'provinces',
    'districts' => 'districts',
    'wards'     => 'wards',
],
```

2. Đổi tên column

Mở file `config/vietnam-zone.php` chỉnh các cấu hình sau:

```php
'columns' => [
    'name'        => 'name',
    'gso_id'      => 'gso_id',
    'province_id' => 'province_id',
    'district_id' => 'district_id',
],
```

3. Thêm column

Mở các file migration sau và tuỳ chỉnh theo ý thích

```shell
database/migrations/2020_01_01_000001_create_provinces_table.php
database/migrations/2020_01_01_000002_create_districts_table.php
database/migrations/2020_01_01_000003_create_wards_table.php
```

#### Chạy migration

```shell
php artisan migrate
```

#### Download và import dữ liệu vào database

```shell
php artisan vietnamzone:download
```

#### Todo

- [ ] Command cập nhật dữ liệu
- [ ] Download file trực tiếp từu website tổng cục thống kê