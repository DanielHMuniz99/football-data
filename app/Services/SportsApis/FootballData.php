<?php

namespace App\Services\SportsApis;

use App\Interfaces\SportsApiInterface;
use Illuminate\Support\Facades\Http;

class FootballData implements SportsApiInterface
{
    protected string $apiUrl = 'https://api.football-data.org/v4/';
    protected string $apiKey;

    public function __construct()
    {
        $this->apiKey = env('API_FOOTBALL_DATA');
    }

    private function request(string $endpoint, array $params = []): array
    {
        try {
            $response = Http::withHeaders([
                'X-Auth-Token' => $this->apiKey,
            ])->get("{$this->apiUrl}/{$endpoint}", $params);
    
            if ($response->successful()) {
                return $response->json();
            }

            return [];
        } catch (RequestException $e) {
            return [];
        } catch (\Exception $e) {
            return [];
        }
    }

    public function getLeagues(): array
    {
        return $this->request('competitions');
    }

    public function getLeague(string $league_id) :array
    {
        return $this->request("competitions/{$league_id}");
    }

    public function getTeamsByLeagues(string $league_id): array
    {
        return $this->request("competitions/{$league_id}/teams");
    }

    public function getUpcomingMatchesByLeague(string $league_id): array
    {
        return $this->request("competitions/{$league_id}/matches", [
            "status" => "SCHEDULED"
        ]);
    }

    public function getResultsByLeague(string $league_id): array
    {
        return $this->request("competitions/{$league_id}/matches", [
            "status" => "FINISHED"
        ]);
    }

    public function getUpcomingMatchesByTeam(int $team_id): array
    {
        return $this->request("teams/{$team_id}/matches", [
            "status" => "SCHEDULED"
        ]);
    }

    public function getResultsByTeam(int $team_id): array
    {
        return $this->request("teams/{$team_id}/matches", [
            "status" => "FINISHED"
        ]);
    }

    public function getStandingByLeague(string $league_id): array
    {
        return $this->request("competitions/{$league_id}/standings");
    }

    public function getTeamsByLeague(string $league_id): array
    {
        return $this->request("competitions/{$league_id}/teams");
    }

    public function getTeam(int $team_id) :array
    {
        return $this->request("teams/{$team_id}");
    }

    public function getOngoinMatches() :array
    {
        return $this->request("matches", [
            "status" => "IN_PLAY"
        ]);
    }
}
