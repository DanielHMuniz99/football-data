<?php

namespace App\Interfaces;

interface SportsApiInterface
{
    public function getLeagues(): array;
    public function getLeague(string $league_id): array;
    public function getTeamsByLeagues(string $league_id): array;
    public function getTeam(int $team_id) :array;
    public function getUpcomingMatchesByLeague(string $league_id): array;
    public function getResultsByLeague(string $league_id): array;
    public function getUpcomingMatchesByTeam(int $team_id): array;
    public function getResultsByTeam(int $team_id): array;
    public function getStandingByLeague(string $league_id): array;
    public function getOngoinMatches(): array;
}
