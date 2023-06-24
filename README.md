<h1 align="center">Laravel Templating Engine</h1>

[![Latest Version on Packagist](https://img.shields.io/packagist/v/asiifdev/laraveltemplateengine.svg?style=flat-square)](https://packagist.org/packages/asiifdev/laraveltemplateengine)
[![Total Downloads](https://img.shields.io/packagist/dt/asiifdev/laraveltemplateengine.svg?style=flat-square)](https://packagist.org/packages/asiifdev/laraveltemplateengine)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/asiifdev/laraveltemplateengine/laravel.yml?branch=main&label=laravel&style=flat-square)](https://github.com/asiifdev/laraveltemplateengine/actions?query=workflow%3Alaravel+branch%3Amain)
[![MIT License](https://img.shields.io/badge/License-MIT-green.svg)](https://choosealicense.com/licenses/mit/)
<img src="https://komarev.com/ghpvc/?username=asiifdev&label=Profile%20views&color=0e75b6&style=flat" alt="asiifdev" />

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

atau jika kalian ingin custom nama projectnya bisa juga dengan command

```bash
  composer create-project asiifdev/laraveltemplateengine {Nama Project yang kalian inginkan}
  cd {Nama Project yang kalian inginkan}
```

Setting file .env seusaikan DATABASE nya dengan DATABASE yang kalian gunakan,kemudian Migrasi Struktur DB dan Lakukan Seeder

```bash
  php artisan migrate:fresh --seed
```

ketika menjalankan command seeder,akan ada error seperti ini:
```bash
   Error 

  Call to undefined function Database\Seeders\getAvatar()

  at database\seeders\UserSeeder.php:20
     16▕         $user = User::create([
     17▕             "name" => "Role User",
     18▕             "email" => "user@gmail.com",
     19▕             "password" => bcrypt("password"),
  ➜  20▕             "photo" => getAvatar('user@gmail.com')
     21▕         ]);
     22▕         $user->assignRole('user');
     23▕
     24▕         $admin = User::create([

  1   vendor\laravel\framework\src\Illuminate\Container\BoundMethod.php:36
      Database\Seeders\UserSeeder::run()

  2   vendor\laravel\framework\src\Illuminate\Container\Util.php:41
      Illuminate\Container\BoundMethod::Illuminate\Container\{closure}()
```
Abaikan saja,lanjut silahkan install package2 npm dan build projectnya dengan command

```bash
  npm install && npm run build
```

**PENTING!!!** \
Setelah installasi project selesai,silahkan buka file composer.json kalian dan pada object autoload tambahkan:

```bash
"files": [
    "app/Helpers/helpers.php"
]
```
Sehingga hasilnya seperti ini
```bash
"autoload": {
    "psr-4": {
        "App\\": "app/",
        "Database\\Factories\\": "database/factories/",
        "Database\\Seeders\\": "database/seeders/"
    },
    "files": [
        "app/Helpers/helpers.php"
    ]
},
```
kemudian jalankan command 
```bash
composer dump-autoload
```

Kemudian jalankan project nya dengan command

```bash
  php artisan serve
```

Kemudian masuk ke host [Lokal](http://127.0.0.1:8000).

## Documentation

COMING SOON !

## Authors

-   [@asiifdev](https://www.github.com/asiifdev)

<h3 align="left">Support:</h3>
<p><a href="https://www.buymeacoffee.com/asiifdev"> <img align="left" src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" height="50" width="210" alt="asiifdev" /></a><a href="https://ko-fi.com/asiifdev"> <img align="left" src="https://cdn.ko-fi.com/cdn/kofi3.png?v=3" height="50" width="210" alt="asiifdev" /></a></p><br><br>
