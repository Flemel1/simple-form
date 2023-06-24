# CodeIgniter 4 Application Starter

* Codeigniter 4
* PHP 8
* MySQL 5
* Clone projek menggunakan git

## Database
* Buat database dengan nama codeigniter
* Import file codeigniter.sql pada database
* Atau menjalankan migration dengan (Optional)
```bash
php spark migrate
```

## Instal depedencies
Jalankan perintah berikut
```bash
composer install
```

## Environment Variabel
* Ubah environment variabel pada file .env
database.default.hostname = localhost (nama host)
database.default.database = codeigniter (nama database)
database.default.username = (username user)
database.default.password = (password user)
database.default.DBDriver = MySQLi (driver MySQL)
database.default.port = 3306 (Port database)

## Jalankan aplikasi
Gunakan perintah berikut untuk menjalankan aplikasi
```bash
php spark serve
```
