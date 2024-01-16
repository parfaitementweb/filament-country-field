<?php

namespace Parfaitementweb\FilamentCountryField\Forms\Components;

use Closure;
use Filament\Forms\Components\Select;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Cache;

class Country extends Select
{
    protected array | Arrayable | string | Closure | null $excluded = null;

    protected array | Arrayable | string | Closure | null $added = null;

    protected array | Arrayable | string | Closure | null $mapped = null;

    public function getOptions(): array
    {
        $options = $this->evaluate($this->options) ?? [];

        if (! empty($options)) {
            return $options;
        }

        $locale = app()->getLocale();
        $countries = Cache::rememberForever('filament-countries-field.' . $locale, fn () => $this->getList());

        return collect($countries)
            ->when($this->mapped, function ($options) {
                return $options->mapWithKeys(function ($country, $key) {
                    if (in_array($key, array_keys($this->mapped))) {
                        return [$this->mapped[$key] => $country];
                    }

                    return [$key => $country];
                });
            })
            ->merge($this->getAdd())
            ->reject(function ($country, $key) {
                return in_array($key, $this->getExclude());
            })
            ->sort()
            ->toArray();
    }

    public function getList(): array
    {
        $locale = app()->getLocale();

        return require __DIR__ . '/../../data/' . $locale . '/country.php';
    }

    public function map(array | Closure | string | Arrayable | null $mapped = null): static
    {
        $this->mapped = $mapped;

        return $this;
    }

    public function getMap(): array
    {
        return $this->evaluate($this->mapped ?? null);
    }

    public function exclude(array | Closure | string | Arrayable | null $excluded = null): static
    {
        $this->excluded = $excluded;

        return $this;
    }

    public function getExclude(): array
    {
        return $this->evaluate($this->excluded ?? []);
    }

    public function add(array | Closure | string | Arrayable | null $added = null): static
    {
        $this->added = $added;

        return $this;
    }

    public function getAdd(): array
    {
        return $this->evaluate($this->added ?? []);
    }
}
