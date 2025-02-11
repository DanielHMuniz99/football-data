@if($matches)
    @foreach($matches['matches'] as $match)
        @if($match['homeTeam']['id'])
            <div class="row">
                <div class="col-12 text-center">
                    {{ \Carbon\Carbon::parse($match['utcDate'])->format('d/m/Y') }}
                </div>
            </div>
            <div class="row text-center">
                <div class="col-4">
                    <img class="profile_img icon" src="{{ $match['homeTeam']['crest'] }}" alt="{{ $match['homeTeam']['shortName'] }}">
                    <a class="a-link" href="{{ route('leagues.team', ['team_id' => $match['homeTeam']['id'], 'league_id' => $match['competition']['code']]) }}">
                        {{ $match['homeTeam']['name'] }}
                    </a>
                </div>
                <div class="col-4">{{ $match['score']['fullTime']['home'] }} x {{ $match['score']['fullTime']['away'] }}</div>
                <div class="col-4">
                    <img class="profile_img icon" src="{{ $match['awayTeam']['crest'] }}" alt="{{ $match['awayTeam']['shortName'] }}">
                    <a class="a-link" href="{{ route('leagues.team', ['team_id' => $match['awayTeam']['id'], 'league_id' => $match['competition']['code']]) }}">
                        {{ $match['awayTeam']['name'] }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a class="a-link" href="{{ route('league', ['league_id' => $match['competition']['code']]) }}">
                        <strong>{{ $match['competition']['name'] }}</strong>
                    </a>
                </div>
            </div>
            <hr/>
        @endif
    @endforeach
@else
    <div class="alert alert-dark text-center" role="alert">
        Nenhum resultado encontrado no momento
    </div>
@endif