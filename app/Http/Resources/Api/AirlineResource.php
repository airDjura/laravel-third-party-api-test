<?php

namespace App\Http\Resources\Api;

use App\Dto\AirlineDto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/* @property-read AirlineDto $resource */
class AirlineResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->resource->name,
            'iata' => $this->resource->iata,
            'icao' => $this->resource->icao,
        ];
    }
}
