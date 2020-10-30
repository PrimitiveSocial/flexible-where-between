<?php

namespace PrimitiveSocial\FlexibleWhereBetween;

use PrimitiveSocial\FlexibleWhereBetween\Builder\FlexibleWhereBetweenBuilder as QueryBuilder;
use PrimitiveSocial\FlexibleWhereBetween\Builder\FlexibleWhereBetweenBuilder as DB;

trait FlexibleWhereBetween
{
    /**
     * Configure Eloquent to use custom Query Builder.
     */
    protected function newBaseQueryBuilder(): QueryBuilder
    {
        $connection = $this->getConnection();

        return new QueryBuilder($connection, $connection->getQueryGrammar(), $connection->getPostProcessor());
    }
}
