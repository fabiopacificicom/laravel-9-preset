# Laravel 9 Vite/Bootstrap 5 preset

***Attention***: run this package on fresh laravel applications

Install the package by running the composer command

```bash
composer require pacificdev/laravel_9_preset
```

## Bootstrap/Sass/Vite Preset

The following command will do the following tasks:

- remove postcss
- install bootstrap 5
- install sass
- update vite config  
- add a default welcome page.

```bash
php artisan preset:ui bootstrap
```

## Laravel Breeze/Bootstrap Authentication Preset

Make sure laravel breeze has been installed and scaffolded using the commands below

```bash
composer require laravel/breeze --dev
php artisan breeze:install
```

Install PacificDev Breeze/Bootstrap Scaffolding

```bash
php artisan preset:ui bootstrap --auth

```
