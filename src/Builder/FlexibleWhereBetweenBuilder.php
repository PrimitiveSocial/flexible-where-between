<?php

namespace Primitive\FlexibleWhereBetween\Builder;

use Illuminate\Database\Query\Builder as BaseQueryBuilder;

class FlexibleWhereBetweenBuilder extends BaseQueryBuilder
{
    public function whereBetween($column, array $values, $boolean = 'and', $not = false)
    {
        $type = 'between';

        $min = reset($values) ?? null;
        $max = end($values) ?? null;

        if (is_null($min) && is_null($max)) {
            return $this;
        }

        if (is_null($min)) {
            return $this->where($column, '<=', $max);
        }

        if (is_null($max)) {
            return $this->where($column, '>=', $min);
        }

        $this->wheres[] = compact('type', 'column', 'values', 'boolean', 'not');

        $this->addBinding($this->cleanBindings($values), 'where');

        return $this;
    }
}
