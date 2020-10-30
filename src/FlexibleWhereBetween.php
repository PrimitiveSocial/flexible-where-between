<?php

namespace PrimitiveSocial\FlexibleWhereBetween;

use PrimitiveSocial\FlexibleWhereBetween\Builder\FlexibleWhereBetweenBuilder as QueryBuilder;

trait FlexibleWhereBetween
{
    public static function query(): QueryBuilder
    {
        return parent::query();
    }

    /**
     * Configure Eloquent to use custom Query Builder.
     */
    protected function newBaseQueryBuilder(): QueryBuilder
    {
        $connection = $this->getConnection();

        return new QueryBuilder($connection, $connection->getQueryGrammar(), $connection->getPostProcessor());
    }
    
}
