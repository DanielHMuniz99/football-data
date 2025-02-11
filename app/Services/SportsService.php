<?php

namespace App\Services;

use App\Interfaces\SportsApiInterface;

class SportsService
{
    protected SportsApiInterface $sportsApi;

    public function __construct(SportsApiInterface $sportsApi)
    {
        $this->sportsApi = $sportsApi;
    }

    public function getLeagues(): array
    {
        return $this->sportsApi->getLeagues();
    }

    public function getLeague(string $league_id) :array
    {
        return $this->sportsApi->getLeague($league_id);
    }

    public function getTeamsByLeague(string $league_id): array
    {
        return $this->sportsApi->getTeamsByLeague($league_id);
    }

    public function getTeam(int $team_id): array
    {
        return $this->sportsApi->getTeam($team_id);
    }

    public function getUpcomingMatchesByLeague(string $league_id): array
    {
        return $this->sportsApi->getUpcomingMatchesByLeague($league_id);
    }

    public function getResultsByLeague(string $league_id): array
    {
        return $this->sportsApi->getResultsByLeague($league_id);
    }

    public function getUpcomingMatchesByTeam(int $team_id): array
    {
        return $this->sportsApi->getUpcomingMatchesByTeam($team_id);
    }

    public function getResultsByTeam(int $team_id): array
    {
        return $this->sportsApi->getResultsByTeam($team_id);
    }

    public function getStandingByLeague(string $league_id): array
    {
        return $this->sportsApi->getStandingByLeague($league_id);
    }

    public function getOngoinMatches(): array
    {
        return $this->sportsApi->getOngoinMatches();   
    }
}
