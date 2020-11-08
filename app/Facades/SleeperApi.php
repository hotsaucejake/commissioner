<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SleeperApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'sleeperApi';
    }
}
