[![Latest Version on Packagist](https://img.shields.io/packagist/v/asiifdev/laraveltemplateengine.svg?style=flat-square)](https://packagist.org/packages/asiifdev/laraveltemplateengine)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/asiifdev/laraveltemplateengine/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/asiifdev/laraveltemplateengine/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/asiifdev/laraveltemplateengine/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/asiifdev/laraveltemplateengine/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/asiifdev/laraveltemplateengine.svg?style=flat-square)](https://packagist.org/packages/asiifdev/laraveltemplateengine)


# Laravel Templating Engine

Ini adalah sebuah starter pack project Laravel Framework yang disertai dengan Role & Permission dari [Spatie Laravel Permissions](https://spatie.be/docs/laravel-permission/v5/introduction). selain starter pack,dengan Laravel Templating Engine ini kalian akan dimudahkan dalam pembuatan menu beserta form nya hanya dengan klik2 lewat panel dashboard yang juga sudah terdapat didalamnya.\
#easyforuse \#custumizable \#free



## Tech Stack

**1. [Laravel Versi 10](https://laravel.com/)** \
**2. [Laravel Livewire](https://laravel-livewire.com/)** \
**3. [Admin Panel Template (Acorn Bootstrap 5 Admin)](https://acorn-html-docs.coloredstrategies.com/Welcome.Introduction.html)**\
**4. [Laravel Livewire](https://laravel-livewire.com/)** 





## Installation

Install Laravel Templating Engine with composer

```bash
  composer create-project asiifdev/laraveltemplateengine
  cd laraveltemplateengine
```
Setting file .env seusaikan DATABASE nya dengan DATABASE yang kalian gunakan,kemudian Migrasi Struktur DB dan Lakukan Seeder Role & User
```bash
  php artisan migrate --seed
```
Setelah command migrasi dan seeder selesai,silahkan install package2 npm dan build projectnya dengan command
```bash
  npm install && npm run build
```
Kemudian jalankan project nya dengan command
```bash
  php artisan serve
```

Kemudian masuk ke host [Lokal](http://127.0.0.1:8000).
    