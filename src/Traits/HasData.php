<?php

namespace Parfaitementweb\FilamentCountryField\Traits;

use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;

trait HasData
{

    public function getCountriesList(): array
    {
        return $this->getList();
    }

    public function getList(): array
    {
        $locale = App::getLocale();

        if (str_contains($locale, '_')) {
            if (! Lang::has('filament-country-field::country', $locale, false)) {
                $locale = Str::before($locale, '_');
            }
        }

        return __('filament-country-field::country', locale: $locale);
    }
}
