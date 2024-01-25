<?php

return [

    'active_client' => env('FLIGHT_CLIENT', 'flightstats'),

    'clients' => [
        'flightstats' => [
            'class' => \App\Clients\FlightStatsClient::class,
            'app_id' => env('FLIGHTSTATS_APP_ID'),
            'app_key' => env('FLIGHTSTATS_APP_KEY'),
        ]
    ]

];
