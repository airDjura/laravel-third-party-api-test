<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GetFlightSchedulesRequest;
use App\Http\Resources\Api\ScheduledFlightResource;
use App\Services\FlightService;

class FlightController extends Controller
{
    public function schedules(GetFlightSchedulesRequest $request, FlightService $flightService)
    {
        $flightNumber = $request->input('flight_number');
        $departureDate = $request->input('departure_date');

        return ScheduledFlightResource::collection($flightService->getScheduledFlights($flightNumber, $departureDate));
    }
}
