<?php

namespace Octomated\VcomApi;

use meteocontrol\client\vcomapi\ApiClient;
use meteocontrol\client\vcomapi\endpoints\main\Alarms;
use meteocontrol\client\vcomapi\endpoints\main\Session;
use meteocontrol\client\vcomapi\endpoints\main\Systems;
use meteocontrol\client\vcomapi\endpoints\main\Tickets;
use meteocontrol\client\vcomapi\endpoints\sub\alarms\Alarm;
use meteocontrol\client\vcomapi\endpoints\sub\cmms\Cmms;
use meteocontrol\client\vcomapi\endpoints\sub\systems\System;
use meteocontrol\client\vcomapi\endpoints\sub\tickets\Ticket;

/**
 * @method Systems systems()
 * @method System system(string $systemKey)
 * @method Tickets tickets()
 * @method Ticket ticket(string $ticketId)
 * @method Alarms alarms()
 * @method Alarm alarm(int $alarmId)
 * @method Session session()
 * @method Cmms cmms()
 */
readonly class VcomApi
{
    public function __construct(private ApiClient $apiClient) {}

    public function __call($method, $parameters): mixed
    {
        return $this->apiClient->$method(...$parameters);
    }
}
