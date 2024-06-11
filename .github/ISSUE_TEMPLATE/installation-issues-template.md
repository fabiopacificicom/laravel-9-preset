---
name: Installation issues Template
about: Use this template to report package installation issues
title: Installation bug report
labels: bug
assignees: fabiopacifici

---

## System details

Please add your system details to help us reproduce the installation issue. 

For example: 
- Laravel Version 10.x
- php 8.2.19
- node version v22.2.0
- npm version 10.7.0
- composer version 2.5.4

This details can be found using `php artisan about` and `npm -v` and `node -v`

#### Commands
Add the commands you used to install the package in the execution order.

for example: 
```bash
composer create-project laravel/laravel:^10 test-auth-10
cd test-auth-10
composer require laravel/breeze --dev
php artisan breeze:install
npm install

# 1. php artisan serve and npm run dev checks ✔

# package installation commands
composer require pacificdev/laravel_9_preset
php artisan preset:ui bootstrap --auth
npm install

# 2, php artisan serve and npm run dev checks ✔

```

Please note if the `php artisan serve` and `npm run dev`  commands ran successfully at points 1 and 2 above.

#### Outcome
If the commands above ran successfully then you should see the package welcome page and therefore you don't need to file an issue. 

✅ Expected = Actual

Otherwise please note below the errors you received.

❌ Expected != Actual


#### Dependencies (composer.json)

Please list your dependencies below. For example:

```json


"require": {
        "php": "^8.1",
        "guzzlehttp/guzzle": "^7.2",
        "laravel/framework": "^10.10",
        "laravel/sanctum": "^3.3",
        "laravel/tinker": "^2.8",
        "pacificdev/laravel_9_preset": "^1.3"
    },
    "require-dev": {
        "fakerphp/faker": "^1.9.1",
        "laravel/breeze": "^1.29",
        "laravel/pint": "^1.0",
        "laravel/sail": "^1.18",
        "mockery/mockery": "^1.4.4",
        "nunomaduro/collision": "^7.0",
        "phpunit/phpunit": "^10.1",
        "spatie/laravel-ignition": "^2.0"
    },

```

#### Dependencies (package.json)

Please list your node dependencies below. For example: 

```json

 "devDependencies": {
        "autoprefixer": "^10.4.2",
        "axios": "^1.6.4",
        "laravel-vite-plugin": "^1.0.0",
        "sass": "^1.71.0",
        "vite": "^5.0.0"
    },
    "dependencies": {
        "@popperjs/core": "^2.11.8",
        "bootstrap": "^5.3.3",
        "bootstrap-icons": "^1.11.3"
    }
```
