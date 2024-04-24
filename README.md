
## Tutorial Install
1. Git Clone repository ini
```sh
git clone https://github.com/WahyuNT/k24-test.git
```
2.Lalu jalankan  `composer install` dan `composer update` 
3.Jalankan key:generate untuk generate key pada laravel
```sh
php artisan key:generate
```
4.Buka file .env lalu ubah nama database
```sh
{
    DB_DATABASE=k24-test
}
```
5.Jalankan `php artisan migrate` untuk membuat database, namun jika gagal bisa membuat secara manual database bernama `k24-test`
```sh
{
   php artisan migrate
}
```
6.Jalankan `php artisan db:seed` untuk membuat data dummy yang sudah disiapkan
```sh
{
   php artisan db:seed
}
```
7.Terahir jalankan web dengan `php artisan serve`