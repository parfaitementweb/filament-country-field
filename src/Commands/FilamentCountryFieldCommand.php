<?php

namespace Parfaitementweb\FilamentCountryField\Commands;

use Illuminate\Console\Command;

class FilamentCountryFieldCommand extends Command
{
    public $signature = 'filament-country-field';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
