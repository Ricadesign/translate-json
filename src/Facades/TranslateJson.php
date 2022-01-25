<?php

namespace Ricadesign\TranslateJson\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ricadesign\TranslateJson\TranslateJson
 */
class TranslateJson extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'translate-json';
    }
}
