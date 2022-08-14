## About QuickAdmin

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

QuickAdmin is a web-based starter kit to help to start a large application without thinking about authentication, authorization, and role-based permission. 

- The codebase is structured by a Repository pattern.
- Laravel Ui is used for authentication.

QuickAdmin is accessible, powerful, and provides tools required for large, robust applications.

## Prerequisite

- PHP >= 7.3

## Getting Started

- First clone the project and change the directory

```shell
git clone https://github.com/wahid09/QuickAdmin.git
cd QuickAdmin
```

- Install Dependencies

1. install composer

```shell
composer install
```

2. Copy `.env.example` to `.env`

```shell
cp .env.example .env
```

3. Generate application key

```shell
php artisan key:generate
```
4. Databse migrations

```shell
php artisan migrate:refresh --seed
```
5. Start the webserver

```shell
php artisan serve
```


## License

The QuickAdmin is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
