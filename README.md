# Country dropdown with ISO 3166 options values

[![Latest Version on Packagist](https://img.shields.io/packagist/v/parfaitementweb/filament-country-field.svg?style=flat-square)](https://packagist.org/packages/parfaitementweb/filament-country-field)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/parfaitementweb/filament-country-field/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/parfaitementweb/filament-country-field/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/parfaitementweb/filament-country-field/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/parfaitementweb/filament-country-field/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/parfaitementweb/filament-country-field.svg?style=flat-square)](https://packagist.org/packages/parfaitementweb/filament-country-field)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require parfaitementweb/filament-country-field
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-country-field-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-country-field-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-country-field-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$filamentCountryField = new Parfaitementweb\FilamentCountryField();
echo $filamentCountryField->echoPhrase('Hello, Parfaitementweb!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Alexis](https://github.com/AlexisSerneels)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
