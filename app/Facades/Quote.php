<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Quote extends Facade
{
    protected static function getFacadeAccessor():string
    {
        return 'quote';
    }
}
