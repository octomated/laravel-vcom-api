<?php

namespace Octomated\VcomApi\Commands;

use Illuminate\Console\Command;
use meteocontrol\vcomapi\model\System;
use Octomated\VcomApi\VcomApi;

class VcomApiGetSystemsCommand extends Command
{
    public $signature = '8:mc:systems:get';

    public $description = 'Get all meteocontrol systems';

    public function handle(VcomApi $vcomApi): int
    {
        try {
            $systems = collect($vcomApi->client()->systems()->get());

            $headers = array_flip((array)$systems->first->jsonSerialize());
            $rows = $systems->map(fn (System $system) => $system->jsonSerialize())->toArray();
            $this->table($headers, $rows);

            return self::SUCCESS;
        } catch (\Throwable $throwable) {
            $this->error($throwable->getMessage());
            return self::FAILURE;
        }
    }
}
