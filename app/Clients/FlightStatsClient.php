<?php

namespace App\Clients;

use App\Contracts\FlightClientInterface;
use App\Dto\FlightResultCollection;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;

class FlightStatsClient implements FlightClientInterface
{
    public function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public function getScheduledFlights($flightNumber, $departureDate): FlightResultCollection
    {
        $carrier = substr($flightNumber, 0, 2);

        $flightNumberParam = substr($flightNumber, 2);

        $date = new Carbon($departureDate);

        $response = Http::get('https://api.flightstats.com/flex/schedules/rest/v1/json/flight/' . $carrier . '/' . $flightNumberParam . '/departing/' . $date->year . '/' . $date->month . '/' . $date->day, [
                'appId' => config('flight.clients.flightstats.app_id'),
                'appKey' => config('flight.clients.flightstats.app_key'),
            ]
        );

        $responseBody = $response->json();

        if (array_key_exists('error', $responseBody)) {
            throw new Exception('Flight stats failed');
        }

        return FlightResultCollection::fromFlightStatsResponse($responseBody);
    }
}
