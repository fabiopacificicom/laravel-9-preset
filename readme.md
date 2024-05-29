# Laravel Vite/Bootstrap 5 preset

***Attention***: run this package on fresh laravel applications

Install the package by running the composer command

```bash
composer require pacificdev/laravel_9_preset
```

## Bootstrap/Sass/Vite Preset

The following command will do the following tasks:

- remove postcss
- install bootstrap 5.3.x
- install bootstrap icons
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

## Compatibility notes

This package has been tested with laravel 9.x, 10.x and 11.x

- use package version 1.1 for laravel 9
- use package version 1.3 for laravel 10 and 11
  
If you face any problem with this package please open an issue [here](https://github.com/fabiopacificicom/laravel-9-preset/issues)
