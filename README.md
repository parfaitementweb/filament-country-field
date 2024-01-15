# Filament Country (ISO 639-1) Dropdown Fieldtype

[![Latest Version on Packagist](https://img.shields.io/packagist/v/parfaitementweb/filament-country-field.svg?style=flat-square)](https://packagist.org/packages/parfaitementweb/filament-country-field)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/parfaitementweb/filament-country-field/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/parfaitementweb/filament-country-field/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/parfaitementweb/filament-country-field/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/parfaitementweb/filament-country-field/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/parfaitementweb/filament-country-field.svg?style=flat-square)](https://packagist.org/packages/parfaitementweb/filament-country-field)

The simplest way to list every country as a selectable dropdown 🤘

## Features
- Display a select field with **every ISO 639-1 language**. _tl;dr: The two-letter code._
- Built-in **localization** in **70+** languages.
- Supports all the native **Select Filament Field** [features](https://filamentphp.com/docs/3.x/forms/fields/select).


## Getting Started

We have made things easy for you start. Here is the three steps your need to follow:

1. **Install the addon**  
```bash
composer require parfaitementweb/filament-country-field
```

2. **Add the Country field in your Filament Resource.**
```php
use Parfaitementweb\FilamentCountryField\Country;

Country::make('country')
```

3. **Enjoy.**

## Configuration

On top of all **Select Filament Field** [features](https://filamentphp.com/docs/3.x/forms/fields/select) methods, you can use these three helpers:

- `exclude()` removes an item from the list.
- `add()` adds your own value to the list.
- `map()` changes one key to another, such as `GB` to `UK`.

```php
use Parfaitementweb\FilamentCountryField\Country;

Country::make('country')
->exclude(['NL'])
->add(['MA' =>'Mars'])
->map(['GB' => 'UK', 'GF' => 'FR'])

```

## Built-in translations
The country values are displayed according to the user's current locale settings, which are determined by the App::getLocale() value.

The addon supports _Afrikaans, Amharic, Arabic, Azerbaijani, Belorussian, Bulgarian, Bengali, Bosnian, Catalan, Czech, Danish, German, English, Spanish, Estonian, Persian, Finnish, French, Galician, Greek, Hausa, Hebrew, Hindi, Croatian, Hungarian, Armenian, Icelandic, Italian, Indonesian, Japanese, Georgian, Kazakh, Khmer, Korean, Kurdish, Kyrgyz, Lithuanian, Latvian, Macedonian, Malayalam, Mongolian, Malay, Norwegian Bokmål, Dutch, Norwegian Nynorsk, Norwegian, Polish, Pashto, Portuguese, Romanian, Russian, Sindhi, Slovak, Slovene, Somali, Albanian, Serbian, Swedish, Tamil, Tajik, Thai, Turkish, Tatar, Uyghur, Ukrainian, Urdu, Uzbek, Chinese, Vietnamese_.

## Built-in countries
You can check the entire [country list here](DATA.md).

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

This package uses https://github.com/petercoles/Multilingual-Country-List by https://github.com/petercoles. Thank you for the great work.

- [Alexis](https://github.com/AlexisSerneels)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
