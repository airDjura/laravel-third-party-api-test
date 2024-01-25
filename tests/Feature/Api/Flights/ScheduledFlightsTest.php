<?php

namespace Tests\Feature\Api\Flights;

use Exception;

class ScheduledFlightsTest extends ScheduledFlightsTestCase
{
    protected string $routeName = 'api.scheduled_flights';

    protected array $expectedResponseStructure = [
        "data" => [
            [
                "departure_airport" => [
                    "iata",
                    "icao",
                    "name",
                    "latitude",
                    "longitude",
                    "timezone_name",
                ],
                "arrival_airport" => [
                    "iata",
                    "icao",
                    "name",
                    "latitude",
                    "longitude",
                    "timezone_name",
                ],
                "scheduled_time",
                "airline" => [
                    "name",
                    "iata",
                    "icao",
                ]
            ]
        ]
    ];

    public function testItReturnsSuccessResponseWithTheCorrectData(): void
    {
        $this->fakeSuccessfulScheduledFlights();

        $response = $this->json('GET', route($this->routeName, [
            'flight_number' => 'KL1010',
            'departure_date' => '2024-02-01',
        ]));

        $response
            ->assertStatus(200)
            ->assertJsonStructure($this->expectedResponseStructure);
    }

    public function testItReturnsUnprocessableEntityResponseWhenProvidedDataIsInvalid(): void
    {
        $response = $this->json('GET', route($this->routeName, [
            'flight_number' => 'SomeBigString',
            'departure_date' => 'invalid_date',
        ]));

        $response->assertStatus(422)
            ->assertInvalid(
                [
                    'flight_number',
                ],
            );
    }
}
