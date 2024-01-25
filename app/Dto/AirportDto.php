<?php

namespace App\Dto;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class AirportDto extends Data
{
    public function __construct(
        public string $iata,
        public string $icao,
        public string $name,
        public string $latitude,
        public string $longitude,
        public string $timezoneName,
    )
    {

    }

    public static function fromAirport(array $airport): self
    {
        return new self(
            $airport['iata'],
            $airport['icao'],
            $airport['name'],
            $airport['latitude'],
            $airport['longitude'],
            $airport['timeZoneRegionName'],
        );
    }
}
