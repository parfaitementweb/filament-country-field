<?php

namespace Parfaitementweb\FilamentCountryField;

use Livewire\Features\SupportTesting\Testable;
use Parfaitementweb\FilamentCountryField\Testing\TestsFilamentCountryField;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentCountryFieldServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-country-field';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->askToStarRepoOnGitHub('parfaitementweb/filament-country-field');
            });
    }

    public function packageBooted(): void
    {
        Testable::mixin(new TestsFilamentCountryField());
    }
}
