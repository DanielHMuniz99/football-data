<?php

namespace App\Http\Controllers;

use App\Services\SportsService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;

class SportsController extends Controller
{
    /**
     * Instância do serviço de esportes.
     *
     * @var SportsService
     */
    protected SportsService $sportsService;

    /**
     * SportsController constructor.
     *
     * @param SportsService $sportsService
     */
    public function __construct(SportsService $sportsService)
    {
        // Injeção de dependência para o serviço
        $this->sportsService = $sportsService;
    }

    /**
     * Exibe a página inicial.
     *
     * @return View
     */
    public function index(): View
    {
        return view("main");
    }

    /**
     * Exibe os detalhes de uma liga.
     *
     * @param string $league_id
     * @return View
     */
    public function getLeague(string $league_id): View
    {
        $league = $this->sportsService->getLeague($league_id);
        return view('main', ['league' => $league]);
    }

    /**
     * Exibe os detalhes de um time, incluindo a liga relacionada.
     *
     * @param string $league_id
     * @param int $team_id
     * @return View
     */
    public function getTeam(string $league_id, int $team_id): View
    {
        $team = $this->sportsService->getTeam($team_id);
        $league = null;

        if ($team) {
            $league = $this->findLeagueForTeam($team, $league_id);
        }

        return view('main', ['league' => $league, 'team' => $team]);
    }

    /**
     * Encontra a liga relacionada a um time.
     *
     * @param array $team
     * @param string $league_id
     * @return array|null
     */
    private function findLeagueForTeam(array $team, string $league_id): ?array
    {
        $codes = array_column($team['runningCompetitions'], 'code');
        $index = array_search($league_id, $codes);

        return $index !== false ? $team['runningCompetitions'][$index] : null;
    }

    /**
     * Exibe a lista de ligas filtradas com base no nome.
     *
     * @param Request $request
     * @return View
     */
    public function getLeagues(Request $request): View
    {
        $search = $request->get("search");
        $leagues = $this->sportsService->getLeagues();
        $filteredLeagues = $this->filterLeaguesByName($leagues['competitions'], $search);
        return view('league-list', ['leagues' => $filteredLeagues]);
    }

    /**
     * Filtra as competições com base no nome fornecido.
     *
     * @param array $competitions
     * @param string $search
     * @return array
     */
    private function filterLeaguesByName(array $competitions, string $search): array
    {
        // Filtra ligas que contêm o termo de busca no nome
        $filteredCompetitions = array_filter($competitions, function($competition) use ($search) {
            return stripos($competition['name'], $search) !== false;
        });

        return array_values($filteredCompetitions);
    }

    /**
     * Exibe os times de uma liga.
     *
     * @param string $league_id
     * @return View
     */
    public function getTeamsByLeague(string $league_id, Request $request): View
    {
        $search = $request->get("search");
        $teams = $this->sportsService->getTeamsByLeague($league_id);
        $filteredTeams = $this->filterLeaguesByName($teams['teams'], $search);
        return view("team-list", ['league_id' => $league_id, 'teams' => $filteredTeams]);
    }

    /**
     * Exibe os próximos jogos de uma liga.
     *
     * @param string $league_id
     * @return View
     */
    public function getUpcomingMatchesByLeague(string $league_id): View
    {
        $matches = $this->sportsService->getUpcomingMatchesByLeague($league_id);
        return view("results", ['league' => $league_id, 'matches' => $matches]);
    }

    /**
     * Exibe os resultados de uma liga.
     *
     * @param string $league_id
     * @return View
     */
    public function getResultsByLeague(string $league_id): View
    {
        $matches = $this->sportsService->getResultsByLeague($league_id);
        return view("results", ['league' => $league_id, 'matches' => $matches]);
    }

    /**
     * Exibe os próximos jogos de um time.
     *
     * @param int $team_id
     * @return View
     */
    public function getUpcomingMatchesByTeam(int $team_id): View
    {
        $matches = $this->sportsService->getUpcomingMatchesByTeam($team_id);
        return view("results", ['league' => null, 'matches' => $matches]);
    }

    /**
     * Exibe os resultados de um time.
     *
     * @param int $team_id
     * @return View
     */
    public function getResultsByTeam(int $team_id): View
    {
        $matches = $this->sportsService->getResultsByTeam($team_id);
        return view("results", ['league' => null, 'matches' => $matches]);
    }

    public function getOngoinMatches()
    {
        $matches = $this->sportsService->getOngoinMatches();
        return view("live-results", ['league' => null, 'matches' => $matches]);
    }
}
