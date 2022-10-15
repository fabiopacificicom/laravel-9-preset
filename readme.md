# Laravel 9 Bootstrap preset

Install the package by running the composer command

```bash
composer require pacificdev/laravel_9_preset
```

Note: There is a bug in the current version and the command is not automatically registered in the laravel application after the package is installed, so a temporary fix will be to manually register it in the app/Console/Kernel.php by adding the following protected property that references the command

```php
protected $commands = [ \PacificDev\Laravel9Preset\Commands\Preset::class, ];

```
