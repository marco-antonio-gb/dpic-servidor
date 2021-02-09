<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


### Installation
 Clone the project in your server folder (laragon = WWWW directory)
    
```sh
$ git clone https://github.com/marco-antonio-gb/dpic-servidor.git
```
 
 Install the dependencies and devDependencies and start the server.

```sh
$ cd dpic-servidor
$ composer install
```
Configure your .env file
```sh
DB_DATABASE=server_dpic
DB_USERNAME=root
DB_PASSWORD=
```
Generate an app encryption key

```sh
$ php artisan key:generate
```
Create an empty database for our application
```sh
$ mysql -u root -p
$ CREATE DATABASE server-dpic;
$ exit
```
Migrate the database
```sh
$php artisan migrate:fresh --seed
```


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
