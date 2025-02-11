<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\SportsApiInterface;
use App\Services\SportsApis\FootballData;

class SportsApiServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SportsApiInterface::class, FootballData::class);
    }
}
