# Changelog

All notable changes to `laravel-flysystem-cloudinary-nova` will be documented in this file.

## 13.0.0 - 2026-04-03

- Laravel 13 and PHP 8.3–8.5 support (PHP 8.2 dropped)
- Require `laravel/nova` ^5.8 and `codebar-ag/laravel-flysystem-cloudinary` ^13.0
- Thumbnail and preview URLs use the field’s configured disk (`getStorageDisk()`), not a hardcoded disk name
- Validate the filesystem disk entry for the disk passed to the field (including custom disk names); require `driver` `cloudinary` with a clear error message
- Pest 4, Orchestra Testbench 11, Larastan 3.9
- CI: PHP 8.3–8.5 matrix, Laravel 13, Nova credentials; `codebar-ag/laravel-flysystem-cloudinary` from Packagist ([v13.0.0](https://github.com/codebar-ag/laravel-flysystem-cloudinary/releases/tag/v13.0.0)) — no path repository or extra checkout
