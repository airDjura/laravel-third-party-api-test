<?php

namespace App\Http\Resources\Api;

use App\Dto\FlightResultDto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/* @property-read FlightResultDto $resource */
class ScheduledFlightResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'departure_airport' => new AirportResource($this->resource->departureAirport),
            'arrival_airport' => new AirportResource($this->resource->departureAirport),
            'scheduled_time' => $this->resource->scheduledTime,
            'airline' => new AirlineResource($this->resource->airline),
        ];
    }
}
