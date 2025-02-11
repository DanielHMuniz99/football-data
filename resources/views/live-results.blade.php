@if($matches['matches'])
    @foreach($matches['matches'] as $match)
        <div class="card">
            <div class="card-body">
                <div class="row">
                </div>
                <div class="row text-center">
                    <div class="col-4">
                        <img class="profile_img icon" src="{{ $match['homeTeam']['crest'] }}" alt="{{ $match['homeTeam']['shortName'] }}">
                    </div>
                    <div class="col-4 no-wrap">{{ $match['score']['fullTime']['home'] }} x {{ $match['score']['fullTime']['away'] }}</div>
                    <div class="col-4">
                        <img class="profile_img icon" src="{{ $match['awayTeam']['crest'] }}" alt="{{ $match['awayTeam']['shortName'] }}">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12 text-center">
                        <strong>{{ $match['competition']['name'] }}</strong>
                    </div>
                </div>
            </div>
        </div>
        <br>
    @endforeach
@else
<div class="alert alert-dark text-center" role="alert">
    Sem jogos ao vivo no momento
</div>
@endif