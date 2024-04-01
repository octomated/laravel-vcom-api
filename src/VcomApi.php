<?php

namespace Octomated\VcomApi;

use meteocontrol\client\vcomapi\ApiClient;
use meteocontrol\client\vcomapi\endpoints\main\Systems;

/**
 * @method Systems systems()
 */
readonly class VcomApi
{
    public function __construct(private ApiClient $apiClient)
    {
    }

    public function __call($method, $parameters): mixed
    {
        return $this->apiClient->$method(...$parameters);
    }
}
