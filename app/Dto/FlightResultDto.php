<?php

namespace App\Dto;

use Spatie\LaravelData\Data;

class FlightResultDto extends Data
{
    public function __construct(
        public AirportDto $departureAirport,
        public AirportDto $arrivalAirport,
        public string     $scheduledTime,
        public AirlineDto $airline
    )
    {
    }

    public static function fromFlightStatsResponse($flight, $data): self
    {
        $airports = collect($data['appendix']['airports']);

        $airlines = collect($data['appendix']['airlines']);

        $flightAirline = $airlines->filter(fn($item) => $item['fs'] === $flight['carrierFsCode'])->first();

        $departureAirport = $airports->filter(fn($item) => $item['fs'] === $flight['departureAirportFsCode'])->first();

        $arrivalAirport = $airports->filter(fn($item) => $item['fs'] === $flight['arrivalAirportFsCode'])->first();

        return new self(
            AirportDto::fromAirport($departureAirport),
            AirportDto::fromAirport($arrivalAirport),
            $flight['departureTime'],
            new AirlineDto($flightAirline['name'], $flightAirline['iata'], $flightAirline['icao']),
        );
    }
}
