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

## Run migration

```shell
php artisan migrate
```

## Download và import dữ liệu vào database

```shell
php artisan vietnamzone:download
```

## Todo

- [ ] Cập nhật dữ liệu
- [ ] Download file trực tiếp từ website tổng cục thống kê

## Screenshot

`select * from provinces`

```
+----+------------------------+--------+---------------------+---------------------+
| id | name                   | gso_id | created_at          | updated_at          |
+----+------------------------+--------+---------------------+---------------------+
|  1 | Thành phố Hà Nội       | 01     | 2020-06-16 17:22:30 | 2020-06-16 17:22:30 |
|  2 | Tỉnh Hà Giang          | 02     | 2020-06-16 17:22:30 | 2020-06-16 17:22:30 |
|  3 | Tỉnh Cao Bằng          | 04     | 2020-06-16 17:22:30 | 2020-06-16 17:22:30 |
|  4 | Tỉnh Bắc Kạn           | 06     | 2020-06-16 17:22:30 | 2020-06-16 17:22:30 |
|  5 | Tỉnh Tuyên Quang       | 08     | 2020-06-16 17:22:30 | 2020-06-16 17:22:30 |
+----+------------------------+--------+---------------------+---------------------+
```

`select * from districts`

```
+----+-------------------+--------+-------------+---------------------+---------------------+
| id | name              | gso_id | province_id | created_at          | updated_at          |
+----+-------------------+--------+-------------+---------------------+---------------------+
|  1 | Quận Ba Đình      | 001    |           1 | 2020-06-16 17:22:30 | 2020-06-16 17:22:30 |
|  2 | Quận Hoàn Kiếm    | 002    |           1 | 2020-06-16 17:22:30 | 2020-06-16 17:22:30 |
|  3 | Quận Tây Hồ       | 003    |           1 | 2020-06-16 17:22:30 | 2020-06-16 17:22:30 |
|  4 | Quận Long Biên    | 004    |           1 | 2020-06-16 17:22:30 | 2020-06-16 17:22:30 |
|  5 | Quận Cầu Giấy     | 005    |           1 | 2020-06-16 17:22:30 | 2020-06-16 17:22:30 |
+----+-------------------+--------+-------------+---------------------+---------------------+
```

`select * from wards`

```
+----+--------------------------+--------+-------------+---------------------+---------------------+
| id | name                     | gso_id | district_id | created_at          | updated_at          |
+----+--------------------------+--------+-------------+---------------------+---------------------+
|  1 | Phường Phúc Xá           | 00001  |           1 | 2020-06-16 17:30:13 | 2020-06-16 17:30:13 |
|  2 | Phường Trúc Bạch         | 00004  |           1 | 2020-06-16 17:30:13 | 2020-06-16 17:30:13 |
|  3 | Phường Vĩnh Phúc         | 00006  |           1 | 2020-06-16 17:30:13 | 2020-06-16 17:30:13 |
|  4 | Phường Cống Vị           | 00007  |           1 | 2020-06-16 17:30:13 | 2020-06-16 17:30:13 |
|  5 | Phường Liễu Giai         | 00008  |           1 | 2020-06-16 17:30:13 | 2020-06-16 17:30:13 |
+----+--------------------------+--------+-------------+---------------------+---------------------+
```