<img src="https://banners.beyondco.de/Laravel%20Flysystem%20Cloudinary%20Nova.png?theme=light&packageManager=composer+require&packageName=codebar-ag%2Flaravel-flysystem-cloudinary-nova&pattern=circuitBoard&style=style_2&description=An+opinionated+way+to+integrate+Cloudinary+with+the+Laravel+filesystem+and+Laravel+Nova&md=1&showWatermark=0&fontSize=150px&images=cloud&widths=500&heights=500">

[![Latest Version on Packagist](https://img.shields.io/packagist/v/codebar-ag/laravel-flysystem-cloudinary-nova.svg?style=flat-square)](https://packagist.org/packages/codebar-ag/laravel-flysystem-cloudinary-nova)
[![Total Downloads](https://img.shields.io/packagist/dt/codebar-ag/laravel-flysystem-cloudinary-nova.svg?style=flat-square)](https://packagist.org/packages/codebar-ag/laravel-flysystem-cloudinary-nova)
[![run-tests](https://github.com/codebar-ag/laravel-flysystem-cloudinary-nova/actions/workflows/run-tests.yml/badge.svg?branch=main)](https://github.com/codebar-ag/laravel-flysystem-cloudinary-nova/actions/workflows/run-tests.yml)
[![PHPStan](https://github.com/codebar-ag/laravel-flysystem-cloudinary-nova/actions/workflows/phpstan.yml/badge.svg?branch=main)](https://github.com/codebar-ag/laravel-flysystem-cloudinary-nova/actions/workflows/phpstan.yml)
[![Fix PHP code style issues](https://github.com/codebar-ag/laravel-flysystem-cloudinary-nova/actions/workflows/fix-php-code-style-issues.yml/badge.svg?branch=main)](https://github.com/codebar-ag/laravel-flysystem-cloudinary-nova/actions/workflows/fix-php-code-style-issues.yml)

## 🛠 Requirements

- Cloudinary Account
- [Laravel Flysystem Cloudinary](https://github.com/codebar-ag/laravel-flysystem-cloudinary)

## 🛠 Requirements

- Cloudinary Account

| Package 	 | PHP 	  | Laravel 	     | Flysystem 	 |
|-----------|--------|---------------|-------------|
| >v2.0     | >8.3   | > Laravel 11  | > 3.0       |
| >v1.0     | >8.2   | > Laravel 10  | > 3.0       |


## ⚙️ Installation

You can install the package via composer:

```shell
composer require codebar-ag/laravel-flysystem-cloudinary-nova
```

Follow the installation instructions
of [Laravel Flysystem Cloudinary](https://github.com/codebar-ag/laravel-flysystem-cloudinary#readme)

## 📝 Usage

```php
use CodebarAg\FlysystemCloudinaryNova\CloudinaryImage;

CloudinaryImage::make('Image')
```

## 🚧 Testing

Run the tests:

```shell
composer test
```

## 📝 Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## ✏️ Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## 🧑‍💻 Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## 🙏 Credits

- [Rhys Lees](https://github.com/RhysLees)
- [Sebastian Fix](https://github.com/StanBarrows)
- [All Contributors](../../contributors)
- [Skeleton Repository from Spatie](https://github.com/spatie/package-skeleton-laravel)
- [Laravel Package Training from Spatie](https://spatie.be/videos/laravel-package-training)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
