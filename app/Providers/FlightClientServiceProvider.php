<?php

namespace App\Providers;

use App\Contracts\FlightClientInterface;
use Illuminate\Support\ServiceProvider;

class FlightClientServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            FlightClientInterface::class,
            config('flight.clients')[config('flight.active_client')]['class']
        );
    }

    public function boot(): void
    {
    }
}
