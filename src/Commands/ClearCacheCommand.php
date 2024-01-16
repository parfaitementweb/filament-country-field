<?php

namespace Parfaitementweb\FilamentCountryField\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class ClearCacheCommand extends Command
{
    protected $signature = 'countries-field:clear';

    protected $description = 'Clear the Countries Field cache';

    public function handle(): void
    {
        $directories = File::directories(__DIR__ . '/../../src/data');

        $locales = [];
        foreach ($directories as $directory) {
            $locales[] = basename($directory);
        }

        foreach ($locales as $locale) {
            Cache::forget('filament-countries-field.' . $locale);
        }
    }
}
