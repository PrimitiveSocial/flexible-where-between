<?php

namespace Primitive\FlexibleWhereBetween\Tests\Models;

use Primitive\FlexibleWhereBetween\FlexibleWhereBetween as WhereBetween;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use WhereBetween;

    protected $guarded = [];
}