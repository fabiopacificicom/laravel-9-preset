<?php

namespace PacificDev\Laravel9Preset\Commands\Presets;

use PacificDev\Laravel9Preset\Helpers;
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
        self::update_packages(['dependencies', 'devDependencies']);
        // delete unused config files
        self::clean_up();
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

    protected static function update_packages($configuration_keys)
    {

        // Read the package json
        $packages = Helpers::get_packages();
        Helpers::update_dependencies($packages, $configuration_keys);
    }
    /* TODO: remove duplication - here and in AuthCommand -> move this method in the helpers */
    public static function clean_up()
    {
        File::delete(base_path('postcss.config.js'));
        File::delete(base_path('tailwind.config.js'));
        File::delete(resource_path('scss/app.css'));
    }
    public static function add_welcome_page()
    {
        //$this->info('Adding welcome view');
        File::copy(__DIR__ . '/../../stubs/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }
}
