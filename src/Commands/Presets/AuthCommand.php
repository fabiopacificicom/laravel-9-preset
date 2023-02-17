<?php

namespace PacificDev\Laravel9Preset\Commands\Presets;

use PacificDev\Laravel9Preset\Helpers;
use PacificDev\Laravel9Preset\Commands\Preset;
use Illuminate\Support\Facades\File;

class AuthCommand extends Preset
{
    public static function install()
    {
        var_dump('Run all installation steps');
        self::update_css();
        self::update_vite_config();
        self::update_app_js();
        self::update_packages(['dependencies', 'devDependencies']);

        // update layouts
        self::update_layouts();
        // update welcome view
        self::update_views();
        // update views auth
        self::update_auth_views();
        // remove views componets
        self::remove_default_components();
        // delete unused config files
        self::clean_up();
    }
    /* Layouts */

    public static function update_layouts()
    {
        // Copy app.blade.php layout file
        File::copy(__DIR__ . '/../../stubs/auth/views/layouts/app.blade.php', resource_path('views/layouts/app.blade.php'));
        // TODO: remove navigation.blade.php
        File::delete(resource_path('views/layouts/navigation.blade.php'));
        // TODO: add an admin layout
    }

    /* Views */
    public static function update_auth_views()
    {
        // Copy all auth views from the studs to the resources/views/auth folder
        File::copyDirectory(__DIR__ . '/../../stubs/auth/views/auth/', resource_path('views/auth/'));
        // Copy all profile views from the studs to the resources/views/profile folder
        File::copyDirectory(__DIR__ . '/../../stubs/auth/views/profile/', resource_path('views/profile/'));
    }

    public static function update_views()
    {
        File::copy(__DIR__ . '/../../stubs/auth/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
        File::copy(__DIR__ . '/../../stubs/auth/views/dashboard.blade.php', resource_path('views/dashboard.blade.php'));
    }

    public static function remove_default_components()
    {
        // Remove app/View folder
        File::deleteDirectory(app_path('View'));
        //TODO: Remove folder resources/views/componenets;
        File::deleteDirectory(resource_path('views/components'));
    }

    /* Configuration */

    /**
     * Update css assets
     * rename css folder as scss
     * copy app.scss stub inside scss/
     */
    public static function update_css()
    {
        // remove app.css
        File::delete(resource_path('css/app.css'));
        //$this->info('folder css renamed as scss');
        File::moveDirectory(resource_path('css'), resource_path('scss'));

        File::copy(__DIR__ . '/../../stubs/auth/app.scss', resource_path('scss/app.scss'));
    }

    public static function update_vite_config()
    {
        File::copy(__DIR__ . '/../../stubs/auth/vite.config.js', base_path('vite.config.js'));
    }

    public static function update_app_js()
    {
        //$this->info('Updating js file');
        File::copy(__DIR__ . '/../../stubs/auth/app.js', resource_path('js/app.js'));
    }
    protected static function update_packages($configuration_keys)
    {

        // Read the package json
        $packages = Helpers::get_packages();
        Helpers::update_dependencies($packages, $configuration_keys);
    }

    public static function clean_up()
    {
        File::delete(base_path('postcss.config.js'));
        File::delete(base_path('tailwind.config.js'));
    }
}
