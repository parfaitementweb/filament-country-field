<?php

namespace Parfaitementweb\FilamentCountryField\Infolists\Components;

use Filament\Infolists\Components\TextEntry;
use Parfaitementweb\FilamentCountryField\Traits\HasData;

class CountryEntry extends TextEntry
{
    use HasData;

    public function nativeCountry()
    {
        $countries = $this->getCountriesList();
        $state = $this->getState();

        return $countries[$state] ?? $state;
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->formatStateUsing(fn (): string => $this->nativeCountry());
    }
}
