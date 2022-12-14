<?php

namespace PacificDev\Laravel9Preset\Commands;

use Illuminate\Console\Command;
use InvalidArgumentException;
use PacificDev\Laravel9Preset\Helpers;
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

}
