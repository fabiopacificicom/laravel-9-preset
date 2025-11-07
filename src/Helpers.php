<?php

namespace PacificDev\Laravel9Preset;

use Illuminate\Support\Arr;

class Helpers
{
  public static function get_packages()
  {
    if (!file_exists(base_path('package.json'))) {
      return;
    }

    $packages = json_decode(file_get_contents(base_path('package.json')), true);
    return $packages;
  }

  public static function update_package_array($packages, $configuration_key)
  {
    $package_array = [];

    if ($configuration_key === 'dependencies') {
      $package_array = [
        "@popperjs/core" => "^2.11.8",
        "bootstrap" => "^5.3.8",
        "bootstrap-icons" => "^1.13.1"
      ];
    } else {

      $package_array = [
        "sass" => "^1.93.3",
      ];
    }

    return $package_array + $packages;
  }

  public static function update_dependencies($packages, $configuration_keys)
  {
    foreach ($configuration_keys as $configuration_key) {
      # code...
      $packageArray = array_key_exists($configuration_key, $packages) ? $packages[$configuration_key] : [];

      $packages[$configuration_key] = self::update_package_array($packageArray, $configuration_key);
      if ($configuration_key === 'devDependencies') {
        $packages[$configuration_key] = self::remove_packages($packages);
      }
      ksort($packages[$configuration_key]);
    }

    file_put_contents(
      base_path('package.json'),
      json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . PHP_EOL
    );
  }

  public static function remove_packages($packages)
  {
    $dev_packages  = $packages['devDependencies'];

    $packages_to_remove = [
      "@tailwindcss/forms",
      "alpinejs",
      "postcss",
      "tailwindcss",
    ];

    foreach ($packages_to_remove as $package_name) {
      if (Arr::has($dev_packages, $package_name)) {
        Arr::pull($dev_packages, $package_name);
      }
    }

    return $dev_packages;
  }
}
