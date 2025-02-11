<?php

use App\Http\Controllers\SportsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SportsController::class, 'index'])->name('index');

Route::get('/leagues', [SportsController::class, 'getLeagues'])->name('leagues');
Route::get('/leagues/{league_id}', [SportsController::class, 'getLeague'])->name('league');
Route::get('/leagues/{league_id}/matches/upcoming', [SportsController::class, 'getUpcomingMatchesByLeague'])->name('leagues.upcoming.matches');
Route::get('/leagues/{league_id}/matches/results', [SportsController::class, 'getResultsByLeague'])->name('leagues.results.matches');
Route::get('/leagues/{league_id}/teams', [SportsController::class, 'getTeamsByLeague'])->name('teams');
Route::get('/leagues/{league_id}/team/{team_id}', [SportsController::class, 'getTeam'])->name('leagues.team');

Route::get('/teams/{team_id}/matches/upcoming', [SportsController::class, 'getUpcomingMatchesByTeam'])->name('team.upcoming.matches');
Route::get('/teams/{team_id}/matches/results', [SportsController::class, 'getResultsByTeam'])->name('team.results.matches');

Route::get('/ongoing', [SportsController::class, 'getOngoinMatches'])->name('ongoing.matches');