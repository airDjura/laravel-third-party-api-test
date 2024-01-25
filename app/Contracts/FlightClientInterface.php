<?php
namespace App\Contracts;

use App\Dto\FlightResultCollection;

interface FlightClientInterface
{
    public function getScheduledFlights(string $flightNumber, string $departureDate): FlightResultCollection;
}
