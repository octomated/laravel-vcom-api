<?php

namespace Octomated\VcomApi\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Octomated\VcomApi\VcomApi
 */
class VcomApi extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Octomated\VcomApi\VcomApi::class;
    }
}
