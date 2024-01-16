<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Mockery\MockInterface;
use Parfaitementweb\FilamentCountryField\Country;

it('returns the country list by default', function () {
    $mock = $this->partialMock(Country::class, function (MockInterface $mock) {
        $mock->shouldReceive('getList')
            ->once()
            ->andReturn(['CA' => 'Canada', 'US' => 'United States']);
    });

    $options = $mock->getOptions();

    expect($options)->toBe(['CA' => 'Canada', 'US' => 'United States']);
});

it('returns the options list if set', function () {
    $countryField = (new Country('country'))->options(['foo' => 'bar']);
    $options = $countryField
        ->getOptions();

    expect($options)->toBe(['foo' => 'bar']);
});

it('can add element with options', function () {
    $mock = $this->partialMock(Country::class, function (MockInterface $mock) {
        $mock->shouldReceive('getList')
            ->once()
            ->andReturn(['CA' => 'Canada', 'US' => 'United States']);
    });

    $options = $mock->add(['MA' => 'Mars'])
        ->getOptions();

    expect($options)->toBe(['CA' => 'Canada', 'MA' => 'Mars', 'US' => 'United States']);
});

it('can exclude element with options', function () {
    $mock = $this->partialMock(Country::class, function (MockInterface $mock) {
        $mock->shouldReceive('getList')
            ->once()
            ->andReturn(['CA' => 'Canada', 'US' => 'United States']);
    });

    $options = $mock->exclude(['CA'])
        ->getOptions();

    expect($options)->toBe(['US' => 'United States']);
});

it('can map element keys with options', function () {
    $mock = $this->partialMock(Country::class, function (MockInterface $mock) {
        $mock->shouldReceive('getList')
            ->once()
            ->andReturn(['CA' => 'Canada', 'US' => 'United States']);
    });

    $options = $mock->map(['CA' => 'CN'])
        ->getOptions();

    expect($options)->toBe(['CN' => 'Canada', 'US' => 'United States']);
});

it('can map element keys with options as an array', function () {
    $mock = $this->partialMock(Country::class, function (MockInterface $mock) {
        $mock->shouldReceive('getList')
            ->once()
            ->andReturn(['CA' => 'Canada', 'US' => 'United States']);
    });

    $options = $mock->map(['CA' => 'CN', 'US' => 'UN'])
        ->getOptions();

    expect($options)->toBe(['CN' => 'Canada', 'UN' => 'United States']);
});

it('returns options sorted by keys by default', function () {
    $mock = $this->partialMock(Country::class, function (MockInterface $mock) {
        $mock->shouldReceive('getList')
            ->once()
            ->andReturn(['US' => 'United States', 'CA' => 'Canada', 'BE' => 'Belgium']);
    });

    $options = $mock->getOptions();

    expect($options)->toBe(['BE' => 'Belgium', 'CA' => 'Canada', 'US' => 'United States']);
});

it('returns options after exclude, add and map elements', function () {
    $mock = $this->partialMock(Country::class, function (MockInterface $mock) {
        $mock->shouldReceive('getList')
            ->once()
            ->andReturn(['US' => 'United States', 'CA' => 'Canada', 'BE' => 'Belgium']);
    });

    $options = $mock->exclude(['CA'])
        ->add(['MA' => 'Mars'])
        ->map(['BE' => 'BN'])
        ->getOptions();

    expect($options)->toBe(['BN' => 'Belgium', 'MA' => 'Mars', 'US' => 'United States']);
});

it('ignores empty keys when map is called', function () {
    $mock = $this->partialMock(Country::class, function (MockInterface $mock) {
        $mock->shouldReceive('getList')
            ->once()
            ->andReturn(['US' => 'United States', 'CA' => 'Canada']);
    });

    $options = $mock->map(['' => 'CN'])
        ->getOptions();

    expect($options)->toBe(['CA' => 'Canada', 'US' => 'United States']);
});

it('returns default options when methods are called with empty array', function () {
    $mock = $this->partialMock(Country::class, function (MockInterface $mock) {
        $mock->shouldReceive('getList')
            ->once()
            ->andReturn(['US' => 'United States', 'CA' => 'Canada']);
    });

    $options = $mock->exclude([])
        ->add([])
        ->map([])
        ->getOptions();

    expect($options)->toBe(['CA' => 'Canada', 'US' => 'United States']);
});

it('gets the data from the correct file in English', function () {
    App::setLocale('en');
    $data = (new Country('country'))
        ->getList();

    expect($data)->toBe(require __DIR__ . '/../src/data/en/country.php');
});

it('gets the data from the correct file in French', function () {
    App::setLocale('fr');
    $data = (new Country('country'))
        ->getList();

    expect($data)->toBe(require __DIR__ . '/../src/data/fr/country.php');
});

it('caches the countries', function () {
    App::setLocale('en');
    $countryField = (new Country('country'))
        ->getOptions();

    expect(Cache::get('filament-countries-field.en'))->toBe(require __DIR__ . '/../src/data/en/country.php');
});

it('clears the countries cache', function () {
    App::setLocale('en');
    $countryField = (new Country('country'))
        ->getOptions();

    expect(Cache::get('filament-countries-field.en'))->toBe(require __DIR__ . '/../src/data/en/country.php');

    Artisan::call('countries-field:clear');

    expect(Cache::get('filament-countries-field.en'))->toBeNull();
});
