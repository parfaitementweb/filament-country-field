<?php

namespace Parfaitementweb\FilamentCountryField\Traits;

use Illuminate\Support\Facades\Cache;

trait HasData
{
    public function getLocale(): string
    {
        $locale = app()->getLocale();
        $localePrefix = explode('_', $locale)[0]; // Pega apenas a parte inicial do locale

        return $localePrefix;
    }

    public function getCountriesList(): array
    {
        return Cache::rememberForever('filament-countries-field.' . $this->getLocale(), fn () => $this->getList());
    }

    public function getList(): array
    {

        $customPath = resource_path('custom/vendor/parfaitementweb/filament-country-field/src/data/' . $this->getLocale() . '/country.php');
        $defaultPath = __DIR__ . '/../data/' . $this->getLocale() . '/country.php';

        if (file_exists($customPath)) {
            return require $customPath;
        }

        if  (file_exists($defaultPath)) {
            return require $defaultPath;
        } else {
            return require __DIR__ . '/../data/en/country.php';
        }

    }
}
