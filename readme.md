# install

Install with composer `composer create-project --prefer-dist laravel/laravel uocmo`

`cd uocmo`

Mysql 

```textmate
CREATE DATABASE loyalty CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE USER 'root2'@'localhost' IDENTIFIED WITH mysql_native_password BY 'tieungao';

GRANT ALL PRIVILEGES ON *.* TO 'root2'@'localhost' WITH GRANT OPTION;

FLUSH PRIVILEGES;
```
Install backpack `composer require backpack/crud`

```textmate
php artisan backpack:base:install
php artisan backpack:crud:install
```

If We using Elfinder when install then `chmod -R 777 public/uploads`.

Remove auth `rm -rf app/Http/Controllers/Auth`

Run `php artisan key:generate`

Run `php artisan serve` to start server on 8000

* Create Admin user

`php artisan backpack:base:user`

* See more about Laravel Backpack `https://stackoverflow.com/search?q=laravel+backpack`

* Start with categories:

`php artisan make:migration create_categories --create=categories`

* Take a look at `https://github.com/Laravel-Backpack/NewsCRUD/tree/master/src`

* Icon list `https://www.w3schools.com/icons/fontawesome_icons_webapp.asp`

* Masonary Script `https://masonry.desandro.com/#cdn`

================

## Create new project from this template

* 