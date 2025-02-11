<div class="row">
    @if($teams)
        @foreach ($teams as $team)
            <div class="col-4 mt-4">
                <a href="{{ route('leagues.team', ['league_id' => $league_id, 'team_id' => $team['id']]) }}" class="text-decoration-none">
                    <div class="card team-card">
                        <div class="card-body">
                            <img src="{{ $team['crest'] }}" alt="{{ $team['crest'] }}" width="25">
                            <h5 class="card-title">{{ $team['name'] }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    @else
        <div class="alert alert-secondary" role="alert">
            Nnenhuma equipe encontrada
        </div>
    @endif
</div>
