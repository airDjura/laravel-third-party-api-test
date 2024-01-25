<?php

namespace App\Services;

use App\Contracts\FlightClientInterface;
use App\Dto\FlightResultCollection;

class FlightService
{
    public function __construct(protected FlightClientInterface $client)
    {
    }

    public function getScheduledFlights($flightNumber, $departureDate): FlightResultCollection
    {
        return $this->client->getScheduledFlights($flightNumber, $departureDate);
    }
}
