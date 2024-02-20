<?php

namespace Octomated\VcomApi;

use meteocontrol\client\vcomapi\ApiClient;

class VcomApi
{

    public function __construct(private readonly ApiClient $apiClient) {}

    public function client(): ApiClient
    {
        return $this->apiClient;
    }
}
