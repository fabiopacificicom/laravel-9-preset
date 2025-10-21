# Changelog

## [1.3.1] - 2025-10-21

### Updated

- Added Laravel 12 compatibility by updating framework constraint to include `^12.0`
- Updated PHP requirement to `^8.2 || ^8.3 || ^8.4` to align with Laravel 12 requirements
- Updated npm package versions to latest stable releases:
  - Updated `vite` to version 7.1.11
  - Updated `laravel-vite-plugin` to version 2.0.1
  - Updated `axios` to version 1.12.2
  - Updated `sass` to version 1.93.2
  - Updated `bootstrap` to version 5.3.8
  - Updated `bootstrap-icons` to version 1.13.1
  - Updated `@popperjs/core` to version 2.11.8 (unchanged)

## [1.3.0] - 2024-05-29

### Added

- Bootstrap icons to enhance the auth scaffolding UI.
- New alias to resolve `~icons` to the node_modules bootstrap icons folder for simpler imports.

### Updated

- Welcome page to accommodate the new auth scaffolding enhancements.
- package.json stub with the latest changes.
- Import statements in the package to use `import from` instead of `require` for bootstrap, adhering to ES6 syntax.

## [1.2.0] - 2024-05-29

### Added

- Bootstrap icons to enhance the user interface with a richer set of icons.
- References to the newly added icons on the welcome page to demonstrate their integration.
- Support and suggest sections in `composer.json`, providing guidance on getting support and recommending complementary packages.

### Updated

- Updated various dependencies in `package.json` to their latest versions to ensure the package remains current and functional:
  - Updated `vite` to version 5.0.0
  - Updated `laravel-vite-plugin` to version 1.0.0
  - Updated `axios` to version 1.6.4
  - Updated `sass` to version 1.71.0
  - Updated `bootstrap` to version 5.3.3
  - Updated `@popperjs/core` to version 2.11.8
