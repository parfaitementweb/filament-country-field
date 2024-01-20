# Filament Country (ISO 639-1) Field

[![Latest Version on Packagist](https://img.shields.io/packagist/v/parfaitementweb/filament-country-field.svg?style=flat-square)](https://packagist.org/packages/parfaitementweb/filament-country-field)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/parfaitementweb/filament-country-field/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/parfaitementweb/filament-country-field/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/parfaitementweb/filament-country-field/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/parfaitementweb/filament-country-field/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/parfaitementweb/filament-country-field.svg?style=flat-square)](https://packagist.org/packages/parfaitementweb/filament-country-field)
[![Filament Version](https://img.shields.io/badge/Filament-v3-blue)](https://filamentphp.com)

The simplest way to list every country as a selectable dropdown 🤘

## Features
- Display a select field with **every ISO 639-1 language**. _tl;dr: The two-letter code._
- Built-in **localization** in **132** languages.
- Supports all the native **[Select Field](https://filamentphp.com/docs/3.x/forms/fields/select)** features.

## Screenshot
![filament-country-field](https://github.com/parfaitementweb/filament-country-field/assets/287688/ba6e568c-3244-4338-a6ca-89fce52a5f06)

## Getting Started

We have made things easy for you start. Here is the three steps your need to follow:

1. **Install the package**  
```bash
composer require parfaitementweb/filament-country-field
```

2. **Add the Country field in your Filament Resource.**

```php
use Parfaitementweb\FilamentCountryField\Forms\Components\Country;

Country::make('country')
```

3. **Enjoy.**

## Configuration

On top of all **[Select Field](https://filamentphp.com/docs/3.x/forms/fields/select)** methods, you can use these three helpers:

- `exclude()` removes an item from the list.
- `add()` adds your own value to the list.
- `map()` changes one key to another, such as `GB` to `UK`.

```php
use Parfaitementweb\FilamentCountryField\Forms\Components\Country;

Country::make('country')
->exclude(['NL'])
->add(['MA' =>'Mars'])
->map(['GB' => 'UK', 'GF' => 'FR'])

```

## Clearing the Cache

To ensure better performance and faster response times, the country list is stored in the cache for easy retrieval, leading to an overall snappier user experience.

To clear the cached country list, you can utilize the built-in artisan command provided by Laravel. The following command can be run in your terminal or command line interface:

```bash
php artisan countries-field:clear
```

## Built-in translations
The country values are displayed according to the user's current locale settings, which are determined by the App::getLocale() value.

The field supports those **132 languages**:  

*Afrikaans, Akan, Amharic, Arabic, Assamese, Azerbaijani, Belarusian, Bulgarian, Bambara, Bengali, Tibetan, Breton, Bosnian, Catalan, Chechen, Czech, Welsh, Danish, German, Dzongkha, Ewe, Greek, English, Esperanto, Spanish, Estonian, Basque, Persian, Fula, Finnish, Faroese, French, Western Frisian, Irish, Scottish Gaelic, Galician, Gujarati, Manx, Hausa, Hebrew, Hindi, Croatian, Hungarian, Armenian, Interlingua, Indonesian, Igbo, Sichuan Yi, Icelandic, Italian, Japanese, Javanese, Georgian, Kikuyu, Kazakh, Kalaallisut, Khmer, Kannada, Korean, Kashmiri, Kurdish, Cornish, Kyrgyz, Luxembourgish, Ganda, Lingala, Lao, Lithuanian, Luba-Katanga, Latvian, Malagasy, Maori, Macedonian, Malayalam, Mongolian, Marathi, Malay, Maltese, Burmese, Norwegian Bokmål, North Ndebele, Nepali, Dutch, Norwegian Nynorsk, Norwegian, Oromo, Odia, Ossetic, Punjabi, Polish, Pashto, Portuguese, Quechua, Romansh, Rundi, Romanian, Russian, Kinyarwanda, Sindhi, Northern Sami, Sango, Serbo-Croatian, Sinhala, Slovak, Slovenian, Shona, Somali, Albanian, Serbian, Swedish, Swahili, Tamil, Telugu, Tajik, Thai, Tigrinya, Turkmen, Tagalog, Tongan, Turkish, Tatar, Uighur, Ukrainian, Urdu, Uzbek, Vietnamese, Wolof, Xhosa, Yiddish, Yoruba, Chinese, Zulu*

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

This package used data from [umpirsky/country-list](https://github.com/umpirsky/country-list). Thank you for the great work.

- [Alexis](https://github.com/AlexisSerneels)
- [Saša Stamenković](https://github.com/umpirsky)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
