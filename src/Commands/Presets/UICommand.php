<?php

namespace PacificDev\Laravel9Preset\Commands\Presets;

use PacificDev\Laravel9Preset\Commands\Preset;
use Illuminate\Support\Facades\File;

class UICommand extends Preset
{

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
        //TODO: replace this double call with a single method
        // call passing an array update_packages(['dependencies', 'devDependencies'])
        static::update_packages('dependencies');
        static::update_packages('devDependencies');
    }

    public static function update_css()
    {
        //$this->info('folder css renamed as scss');
        File::moveDirectory(resource_path('css'), resource_path('scss'));
        //$this->info('scss file added');
        File::copy(__DIR__ . '/../../stubs/app.scss', resource_path('scss/app.scss'));
        //File:copy(resource_path('scss/app.css'), resource_path('scss/app.scss'));
    }

    public static function update_vite_config()
    {
        //$this->info('Vite config file created');
        File::copy(__DIR__ . '/../../stubs/vite.config.js', base_path('vite.config.js'));
    }

    public static function update_app_js()
    {
        //$this->info('Updating js file');
        File::copy(__DIR__ . '/../../stubs/app.js', resource_path('js/app.js'));
    }
    // TODO: cleanup
    // public static function update_packages()
    // {
    //     //$this->info('Updating package.json');
    //     File::copy(__DIR__ . '/../../stubs/package.json', base_path('package.json'));
    //     //$this->warn('Now you can run: npm i && npm run dev');
    // }

    /* TODO: This exact method has been defined twice, either in here and in AuthCommand.php. Refactor this method in a dedicated file, to remove code duplication.  */
    protected static function update_package_array($packages, $configuration_key)
    {
        $package_array = [];

        if ($configuration_key === 'dependencies') {
            $package_array = [
                "@popperjs/core" => "^2.11.6",
                "bootstrap" => "^5.2.2"
            ];
        } else {
            /* TODO: leave in the array only sass, remove the others */
            $package_array = [
                "axios" => "^0.27",
                "laravel-vite-plugin" => "^0.6.0",
                "lodash" => "^4.17.19",
                "sass" => "^1.55.0",
                "vite" => "^3.0.0"
            ];
        }

        return $package_array + $packages;
    }

    public static function add_welcome_page()
    {
        //$this->info('Adding welcome view');
        File::copy(__DIR__ . '/../../stubs/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }
}
