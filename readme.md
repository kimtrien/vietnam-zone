## VietNam Zone

Database đơn vị hành chính của Việt Nam

Dữ liệu được lấy trực tiếp từ [Tổng Cục Thống Kê Việt Nam](https://danhmuchanhchinh.gso.gov.vn/).

Cập nhật lần cuối: 11/04/2022

## 1. Cài đặt

#### 1.1 Cài đặt gói bằng composer

```shell
composer require kjmtrue/vietnam-zone
```

#### 1.2 Copy file migration

```shell
php artisan vendor:publish --provider="Kjmtrue\VietnamZone\ServiceProvider"
```

#### 1.3 Chỉnh sửa file migration nếu cần

Mở các file migration sau và tuỳ chỉnh theo yêu cầu riêng của bạn.

```shell
database/migrations/2020_01_01_000001_create_provinces_table.php
database/migrations/2020_01_01_000002_create_districts_table.php
database/migrations/2020_01_01_000003_create_wards_table.php
```

## 2. Chạy migration

```shell
php artisan migrate
```

## 3. Import dữ liệu

```shell
php artisan vietnamzone:import
```

Lưu ý: 
- Dữ liệu được cập nhật lần cuối: 11/04/2022
- Để cập nhật dữ liệu mới nhất, vui lòng làm theo hướng dẫn ở mục 5 trước khi chạy lệnh `php artisan vietnamzone:import`

## 4. Sử dụng 

```php
$provinces = \Kjmtrue\VietnamZone\Models\Province::get();
$districts = \Kjmtrue\VietnamZone\Models\District::whereProvinceId(50)->get();
$wards = \Kjmtrue\VietnamZone\Models\Ward::whereDistrictId(552)->get();
```

## 5. Tải file dữ liệu

Dữ liệu được lấy từ [Tổng Cục Thống Kê Việt Nam](https://danhmuchanhchinh.gso.gov.vn/).

Trong tương lai, khi cơ quan có thẩm quyền sắp xếp lại các đơn vị hành chính thì bạn cần phải tải file dữ liệu mới nhất trước khi import dữ liệu vào dự án của bạn.

Bạn vui lòng làm theo các bước hướng dẫn dưới đây:

- Truy cập: https://danhmuchanhchinh.gso.gov.vn/ (URL này có thể bị [GSOVN](https://www.gso.gov.vn/) thay đổi)
- Tìm nút "Xuất Excel"
- Tick vào ô checkbox "Quận Huyện Phường Xã"
- Click vào nút "Xuất Excel", và tải file xls về
- Đổi tên file vừa tải về thành `vnzone.xls` và copy vào thư mục `storage` của dự án
- Chạy lệnh `php artisan vietnamzone:import` ở bước 3

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
