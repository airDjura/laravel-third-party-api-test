<?php

namespace App\Dto;

use Illuminate\Support\Collection;

/**
 * @method FlightResultDto first(callable $callback = null, $default = null)
 */
class FlightResultCollection extends Collection
{
    public static function fromFlightStatsResponse($data): self
    {
        $collection = new self([]);

        foreach ($data['scheduledFlights'] as $flight) {
            $collection->push(FlightResultDto::fromFlightStatsResponse($flight, $data));
        }

        return $collection;
    }
}
