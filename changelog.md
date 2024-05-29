# Changelog

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
