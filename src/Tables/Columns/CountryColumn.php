<?php

namespace Parfaitementweb\FilamentCountryField\Tables\Columns;

use Filament\Tables\Columns\Column;
use Parfaitementweb\FilamentCountryField\Traits\HasData;

class CountryColumn extends Column
{
    use HasData;

    protected string $view = 'filament-country-field::country-column';

    public function nativeCountry()
    {
        $countries = $this->getCountriesList();
        $state = $this->getState();

        if (is_array($state)) {
            return $this->getMultipleCountries($state, $countries);
        }

        return $countries[$state] ?? $state;
    }

    protected function getMultipleCountries(array $countryCodes, array $countries): string
    {
        $countryNames = array_map(function ($code) use ($countries) {
            return $countries[$code] ?? $code;
        }, $countryCodes);

        return implode(', ', $countryNames);
    }
}
