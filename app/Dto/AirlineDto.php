<?php

namespace App\Dto;

use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class AirlineDto extends Data
{
    public function __construct(
        public string $name,
        public string $iata,
        public string $icao,
    )
    {

    }
}
