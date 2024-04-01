<?php

namespace Parfaitementweb\FilamentCountryField;

use Parfaitementweb\FilamentCountryField\Commands\ClearCacheCommand;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentCountryFieldServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-country-field';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasCommand(ClearCacheCommand::class)
            ->hasInstallCommand(function (InstallCommand $command) {
                $command->askToStarRepoOnGitHub('parfaitementweb/filament-country-field');
            })
            ->hasViews('filament-country-field');
    }
}
