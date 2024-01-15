<?php

namespace Parfaitementweb\FilamentCountryField\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Parfaitementweb\FilamentCountryField\FilamentCountryField
 */
class FilamentCountryField extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Parfaitementweb\FilamentCountryField\FilamentCountryField::class;
    }
}
