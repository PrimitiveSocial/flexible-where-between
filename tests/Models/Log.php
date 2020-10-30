<?php

namespace PrimitiveSocial\FlexibleWhereBetween\Tests\Models;

use PrimitiveSocial\FlexibleWhereBetween\FlexibleWhereBetween as WhereBetween;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use WhereBetween;

    protected $guarded = [];
}