<?php

use Parfaitementweb\FilamentCountryField\Country;
use PeterColes\Countries\CountriesFacade;

it('returns the country list by default', function () {
    CountriesFacade::shouldReceive('lookup')->andReturn(['CA' => 'Canada', 'US' => 'United States']);

    $countryField = new Country('country');
    $options = $countryField->getOptions();

    expect($options)->toBe(['CA' => 'Canada', 'US' => 'United States']);
});

it('returns the options list if set', function () {
    CountriesFacade::shouldReceive('lookup')->andReturn(['CA' => 'Canada', 'US' => 'United States']);

    $countryField = (new Country('country'))->options(['foo' => 'bar']);
    $options = $countryField->getOptions();

    expect($options)->toBe(['foo' => 'bar']);
});

it('can add element with options', function () {
    CountriesFacade::shouldReceive('lookup')->andReturn(['CA' => 'Canada', 'US' => 'United States']);

    $countryField = new Country('country');
    $countryField->add(['MA' => 'Mars']);
    $options = $countryField->getOptions();

    expect($options)->toBe(['CA' => 'Canada', 'MA' => 'Mars', 'US' => 'United States']);
});

it('can exclude element with options', function () {
    CountriesFacade::shouldReceive('lookup')->andReturn(['CA' => 'Canada', 'US' => 'United States']);

    $countryField = new Country('country');
    $countryField->exclude(['CA']);

    $options = $countryField->getOptions();
    expect($options)->toBe(['US' => 'United States']);
});

it('can map element keys with options', function () {
    CountriesFacade::shouldReceive('lookup')->andReturn(['CA' => 'Canada', 'US' => 'United States']);

    $countryField = new Country('country');
    $countryField->map(['CA' => 'CN']);

    $options = $countryField->getOptions();

    expect($options)->toBe(['CN' => 'Canada', 'US' => 'United States']);
});

it('can map element keys with options as an array', function () {
    CountriesFacade::shouldReceive('lookup')->andReturn(['CA' => 'Canada', 'US' => 'United States']);

    $countryField = new Country('country');
    $countryField->map(['CA' => 'CN', 'US' => 'UN']);

    $options = $countryField->getOptions();

    expect($options)->toBe(['CN' => 'Canada', 'UN' => 'United States']);
});

it('returns options sorted by keys by default', function () {
    CountriesFacade::shouldReceive('lookup')->andReturn(['US' => 'United States', 'CA' => 'Canada', 'BE' => 'Belgium']);

    $countryField = new Country('country');
    $options = $countryField->getOptions();

    expect($options)->toBe(['BE' => 'Belgium', 'CA' => 'Canada', 'US' => 'United States']);
});

it('returns options after exclude, add and map elements', function () {
    CountriesFacade::shouldReceive('lookup')->andReturn(['US' => 'United States', 'CA' => 'Canada', 'BE' => 'Belgium']);

    $countryField = new Country('country');
    $countryField->exclude(['CA'])
        ->add(['MA' => 'Mars'])
        ->map(['BE' => 'BN']);

    $options = $countryField->getOptions();

    expect($options)->toBe(['BN' => 'Belgium', 'MA' => 'Mars', 'US' => 'United States']);
});

it('ignores empty keys when map is called', function () {
    CountriesFacade::shouldReceive('lookup')->andReturn(['US' => 'United States', 'CA' => 'Canada']);

    $countryField = new Country('country');
    $countryField->map(['' => 'CN']);

    $options = $countryField->getOptions();

    expect($options)->toBe(['CA' => 'Canada', 'US' => 'United States']);
});

it('returns default options when methods are called with empty array', function () {
    CountriesFacade::shouldReceive('lookup')->andReturn(['US' => 'United States', 'CA' => 'Canada']);

    $countryField = new Country('country');
    $countryField->exclude([])
        ->add([])
        ->map([]);

    $options = $countryField->getOptions();

    expect($options)->toBe(['CA' => 'Canada', 'US' => 'United States']);
});
