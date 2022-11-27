<?php

namespace PacificDev\Laravel9Preset\Commands;

use Illuminate\Console\Command;
use InvalidArgumentException;

class Preset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'preset:ui
    { type : The preset type (bootstrap) }
    { --auth : Installs the authentication scaffolding }
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a Vite Bootstrap 5 preset';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        if ($this->argument('type') === 'bootstrap' && !$this->option('auth')) {

            $this->bootstrap();
        }
        if ($this->argument('type') === 'bootstrap' && $this->option('auth')) {
            # Install the auth preset - run preset:auth
            $this->authentication();
        }
        if ($this->argument('type') !== 'bootstrap') {
            # Invalid preset
            throw new InvalidArgumentException('This preset is invalid. Presets available: bootstrap');
        }
    }

    public function bootstrap()
    {
        Presets\UICommand::install();
        $this->info('Bootstrap, Sass, and Vite setup successful');
        $this->warn('Now you can run: [npm i && npm run dev] to compile all assets');
    }
    public function authentication()
    {
        Presets\AuthCommand::install();
        $this->info('Bootstrap, Sass, and Vite Authentication scaffolding setup successful');
        $this->warn('Now you can run: [npm i && npm run dev] to compile all assets');
    }

    protected static function update_packages($configuration_key)
    {
        if (!file_exists(base_path('package.json'))) {
            return;
        }

        $packages = json_decode(file_get_contents(base_path('package.json')), true);
        /* TODO: loop over the configuration_keys (it shouold be an array) and call the update_dependencies in the loop for each configuration_key */
        self::update_dependencies($packages, $configuration_key);
    }

    protected static function update_dependencies($packages, $configuration_key)
    {
        $packageArray = array_key_exists($configuration_key, $packages) ? $packages[$configuration_key] : [];

        $packages[$configuration_key] = static::update_package_array($packageArray, $configuration_key);

        ksort($packages[$configuration_key]);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
        );
    }
}
