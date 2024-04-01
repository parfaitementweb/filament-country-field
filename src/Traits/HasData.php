<?php

namespace Parfaitementweb\FilamentCountryField\Traits;

use Illuminate\Support\Facades\Cache;

trait HasData
{
    public function getLocale(): string
    {
        return app()->getLocale();
    }

    public function getCountriesList(): array
    {
        return Cache::rememberForever('filament-countries-field.' . $this->getLocale(), fn () => $this->getList());
    }

    public function getList(): array
    {
        return require __DIR__ . '/../data/' . $this->getLocale() . '/country.php';
    }
}
