<?php

declare(strict_types=1);

namespace Tests\Feature\Api\Flights;

use Illuminate\Support\Facades\Http;
use Tests\CreatesApplication;
use Tests\TestCase;

abstract class ScheduledFlightsTestCase extends TestCase
{
    use CreatesApplication;

    protected array $successFlightStatsResponseMock = [ // app/Clients/FlightStatsClient.php:39
        "request" => [
            "carrier" => [
                "requestedCode" => "KL",
                "fsCode" => "KL",
            ],
            "flightNumber" => [
                "requested" => "1010",
                "interpreted" => "1010",
            ],
            "departing" => true,
            "url" => "https://api.flightstats.com/flex/schedules/rest/v1/json/flight/KL/1010/departing/2024/2/1",
            "date" => [
                "year" => "2024",
                "month" => "2",
                "day" => "1",
                "interpreted" => "2024-02-01",
            ]
        ],
        "scheduledFlights" => [
            [
                "carrierFsCode" => "KL",
                "flightNumber" => "1010",
                "departureAirportFsCode" => "LHR",
                "arrivalAirportFsCode" => "AMS",
                "departureTime" => "2024-02-01T11:45:00.000",
                "arrivalTime" => "2024-02-01T14:05:00.000",
                "stops" => 0,
                "departureTerminal" => "4",
                "flightEquipmentIataCode" => "73H",
                "isCodeshare" => false,
                "isWetlease" => false,
                "serviceType" => "J",
                "serviceClasses" => [
                    "R",
                    "F",
                    "J",
                    "Y",
                ],
                "trafficRestrictions" => [],
                "codeshares" => [
                    [
                        "carrierFsCode" => "DL",
                        "flightNumber" => "9503",
                        "serviceType" => "J",
                        "serviceClasses" => [
                            "F",
                            "J",
                            "Y",
                        ],
                        "trafficRestrictions" => [
                            "G",
                        ],
                        "referenceCode" => 11363910,
                    ],
                    [
                        "carrierFsCode" => "GA",
                        "flightNumber" => "9237",
                        "serviceType" => "J",
                        "serviceClasses" => [
                            "J",
                            "Y",
                        ],
                        "trafficRestrictions" => [
                            "Y"
                        ],
                        "referenceCode" => 11363908
                    ],
                    [
                        "carrierFsCode" => "KQ",
                        "flightNumber" => "1010",
                        "serviceType" => "J",
                        "serviceClasses" => [
                            "J",
                            "Y",
                        ],
                        "trafficRestrictions" => [
                            "G",
                        ],
                        "referenceCode" => 11363918,
                    ],
                    [
                        "carrierFsCode" => "MF",
                        "flightNumber" => "9306",
                        "serviceType" => "J",
                        "serviceClasses" => [
                            "R",
                            "J",
                            "Y",
                        ],
                        "trafficRestrictions" => [
                            "G"
                        ],
                        "referenceCode" => 11363912,
                    ],
                    [
                        "carrierFsCode" => "MU",
                        "flightNumber" => "1940",
                        "serviceType" => "J",
                        "serviceClasses" => [
                            "R",
                            "J",
                            "Y",
                        ],
                        "trafficRestrictions" => [
                            "Y",
                        ],
                        "referenceCode" => 11363914,
                    ],
                    5 => [
                        "carrierFsCode" => "VS",
                        "flightNumber" => "6917",
                        "serviceType" => "J",
                        "serviceClasses" => [
                            "R",
                            "J",
                            "Y",
                        ],
                        "trafficRestrictions" => [
                            "Q",
                        ],
                        "referenceCode" => 11363916,
                    ]
                ],
                "referenceCode" => "2611-2925746--",
            ]
        ],
        "appendix" => [
            "airlines" => [
                [
                    "fs" => "KL",
                    "iata" => "KL",
                    "icao" => "KLM",
                    "name" => "KLM",
                    "active" => true,
                ],
                [
                    "fs" => "KQ",
                    "iata" => "KQ",
                    "icao" => "KQA",
                    "name" => "Kenya Airways",
                    "active" => true,
                ],
                [
                    "fs" => "DL",
                    "iata" => "DL",
                    "icao" => "DAL",
                    "name" => "Delta Air Lines",
                    "active" => true,
                ],
                [
                    "fs" => "MU",
                    "iata" => "MU",
                    "icao" => "CES",
                    "name" => "China Eastern Airlines",
                    "active" => true,
                ],
                [
                    "fs" => "MF",
                    "iata" => "MF",
                    "icao" => "CXA",
                    "name" => "Xiamen Airlines",
                    "active" => true,
                ],
                [
                    "fs" => "GA",
                    "iata" => "GA",
                    "icao" => "GIA",
                    "name" => "Garuda Indonesia",
                    "active" => true,
                ],
                [
                    "fs" => "VS",
                    "iata" => "VS",
                    "icao" => "VIR",
                    "name" => "Virgin Atlantic",
                    "active" => true,
                ]
            ],
            "airports" => [
                [
                    "fs" => "AMS",
                    "iata" => "AMS",
                    "icao" => "EHAM",
                    "faa" => "",
                    "name" => "Amsterdam Airport Schiphol",
                    "city" => "Amsterdam",
                    "cityCode" => "AMS",
                    "countryCode" => "NL",
                    "countryName" => "Netherlands",
                    "regionName" => "Europe",
                    "timeZoneRegionName" => "Europe/Amsterdam",
                    "weatherZone" => "",
                    "localTime" => "2024-01-24T19:29:29.138",
                    "utcOffsetHours" => 1.0,
                    "latitude" => 52.309069,
                    "longitude" => 4.763385,
                    "elevationFeet" => -11,
                    "classification" => 1,
                    "active" => true
                ], [
                    "fs" => "LHR",
                    "iata" => "LHR",
                    "icao" => "EGLL",
                    "faa" => "",
                    "name" => "London Heathrow Airport",
                    "city" => "London",
                    "cityCode" => "LON",
                    "stateCode" => "EN",
                    "countryCode" => "GB",
                    "countryName" => "United Kingdom",
                    "regionName" => "Europe",
                    "timeZoneRegionName" => "Europe/London",
                    "weatherZone" => "",
                    "localTime" => "2024-01-24T18:29:29.138",
                    "utcOffsetHours" => 0.0,
                    "latitude" => 51.469603,
                    "longitude" => -0.453566,
                    "elevationFeet" => 80,
                    "classification" => 1,
                    "active" => true,
                ],
            ],
            "equipments" => [
                [
                    "iata" => "73H",
                    "name" => "Boeing 737-800 (winglets) Passenger/BBJ2",
                    "turboProp" => false,
                    "jet" => true,
                    "widebody" => false,
                    "regional" => false,
                ]
            ]
        ]
    ];

    protected array $notAuthorizedFlightStatsResponseMock = [
        "error" => [
            "httpStatusCode" => 401,
            "errorCode" => "UNAUTHORIZED",
            "errorMessage" => "Unauthorized",
        ]
    ];

    protected function fakeSuccessfulScheduledFlights(): void
    {
        Http::fake(
            [
                'https://api.flightstats.com/flex/schedules/rest/v1/json/flight/*/*/departing/*/*/*' => Http::response(
                    $this->successFlightStatsResponseMock
                ),
            ]
        );
    }

    protected function fakeNotAuthorizedScheduledFlights(): void
    {
        Http::fake(
            [
                'https://api.flightstats.com/flex/schedules/rest/v1/json/flight/*/*/departing/*/*/*' => Http::response(
                    $this->notAuthorizedFlightStatsResponseMock,
                    401
                ),
            ]
        );
    }

}
