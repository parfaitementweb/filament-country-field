<?php

namespace Parfaitementweb\FilamentCountryField\Traits;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

trait HasData
{
    public function getLocale(): string
    {
        return Str::before(app()->getLocale(), '_');
    }

    public function getCountriesList(): array
    {
        return Cache::rememberForever('filament-countries-field.' . $this->getLocale(), fn () => $this->getList());
    }

    public function getList(): array
    {
        try {
            return require __DIR__ . '/../data/' . $this->getLocale() . '/country.php';
        } catch (Exception $e) {
            return require __DIR__ . '/../data/en/country.php';
        }
    }
}
