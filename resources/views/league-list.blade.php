<div class="row">
    @foreach ($leagues as $league)
        <div class="col-4 mt-4">
            <a href="{{ route('league', ['league_id' => $league['code']]) }}" class="text-decoration-none">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $league['name'] }} ({{ $league['area']['name'] }})
                            <img src="{{ $league['area']['flag'] }}" alt="{{ $league['area']['flag'] }}" width="25">
                        </h5>
                        <img src="{{ $league['emblem'] }}" alt="{{ $league['name'] }}" width="50">
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
