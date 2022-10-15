<?php

namespace PacificDev\Laravel9Preset\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Preset extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'preset {bootstrap}';

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
        $this->info('setting up bootstrap and vite');
        self::install();
        $this->comment('Now you can run: npm i && npm run dev');
    }

    public static function install()
    {
        self::update_css();
        // remove postCss from package.json
        self::update_vite_config();
        // update js/css stubs
        self::update_app_js();
        // update welcome view
        self::add_welcome_page();
        // update packages
        self::update_packages();
    }

    public static function update_css()
    {
        //$this->info('folder css renamed as scss');
        File::moveDirectory(resource_path('css'), resource_path('scss'));
        //$this->info('scss file added');
        File::copy(__DIR__.'/../stubs/app.scss', resource_path('scss/app.scss'));
        //File:copy(resource_path('scss/app.css'), resource_path('scss/app.scss'));
    }

    public static function update_vite_config()
    {
        //$this->info('Vite config file created');
        File::copy(__DIR__.'/../stubs/vite.config.js', base_path('vite.config.js'));
    }

    public static function update_app_js()
    {
        //$this->info('Updating js file');
        File::copy(__DIR__.'/../stubs/app.js', resource_path('js/app.js'));
    }

    public static function update_packages()
    {
        //$this->info('Updating package.json');
        File::copy(__DIR__.'/../stubs/package.json', base_path('package.json'));
        //$this->warn('Now you can run: npm i && npm run dev');
    }

    public static function add_welcome_page()
    {
        //$this->info('Adding welcome view');
        File::copy(__DIR__.'/../stubs/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }
}
//
