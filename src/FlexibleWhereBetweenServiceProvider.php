<?php

namespace Primitive\FlexibleWhereBetween;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class FlexibleWhereBetweenServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        Builder::macro('whereBetween', function($column, array $values, $boolean = 'and', $not = false) {
            $type = 'between';

            $min = reset($values) ?? null;
            $max = end($values) ?? null;

            if (is_null($min) && is_null($max)) {
                return $this;
            }

            if (is_null($min)) {
                return $this->where($column, '<=', $max, $boolean);
            }

            if (is_null($max)) {
                return $this->where($column, '>=', $min, $boolean);
            }

            $this->wheres[] = compact('type', 'column', 'values', 'boolean', 'not');

            $this->addBinding($this->cleanBindings($values), 'where');

            return $this;
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }
}
