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

        return $countries[$state] ?? $state;
    }
}
