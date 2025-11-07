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

This package has been tested with Laravel 9.x, 10.x, 11.x and 12.x.

- Use package version 1.1 for Laravel 9
- Use package version 1.3 for Laravel 10 and 11
- Use package version 2.0 (this release) for Laravel 12 and newer

If you face any problem with this package please open an issue:

[https://github.com/fabiopacificicom/laravel-9-preset/issues](https://github.com/fabiopacificicom/laravel-9-preset/issues)

Release notes for v2.0.0 are in the `changelog.md` file in this repository.
