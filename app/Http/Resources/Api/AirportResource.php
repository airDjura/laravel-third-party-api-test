<?php

namespace App\Http\Resources\Api;

use App\Dto\AirportDto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/* @property-read AirportDto $resource */
class AirportResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'iata' => $this->resource->iata,
            'icao' => $this->resource->icao,
            'name' => $this->resource->name,
            'latitude' => $this->resource->latitude,
            'longitude' => $this->resource->longitude,
            'timezone_name' => $this->resource->timezoneName,
        ];
    }
}
