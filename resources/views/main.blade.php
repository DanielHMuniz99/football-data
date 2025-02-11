@include('head')
<body id="body">
    <form>
        <input type="hidden" id="team" value="{{ $team['id'] ?? '' }}"/>
        <input type="hidden" id="league" value="{{ $league['code'] ?? '' }}"/>
    </form>

    <div class="preloader">
        <svg width="200" height="200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-ripple" style="background:0 0"><circle cx="50" cy="50" r="4.719" fill="none" stroke="#1d3f72" stroke-width="2"><animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="3" keySplines="0 0.2 0.8 1" begin="-1.5s" repeatCount="indefinite"/><animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="3" keySplines="0.2 0 0.8 1" begin="-1.5s" repeatCount="indefinite"/></circle><circle cx="50" cy="50" r="27.591" fill="none" stroke="#5699d2" stroke-width="2"><animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="3" keySplines="0 0.2 0.8 1" begin="0s" repeatCount="indefinite"/><animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="3" keySplines="0.2 0 0.8 1" begin="0s" repeatCount="indefinite"/></circle></svg>
  </div>

    <section class="tabs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-outer">
                        <div class="tab-list">
                            <ul>
                                <li>
                                    <img style="height: 50px;" class="" src="{{ asset('image/logo.png') }}">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-10">
                <div class="mb-2 text-white">
                    <strong>
                        <a href="{{ route('index') }}" class="text-white text-decoration-none">Home</a>
                        @isset($league)
                            <a href="{{ route('league', ['league_id' => $league['code']]) }}" class="text-white text-decoration-none">
                                > {{ $league['name'] }}
                            </a>
                        @endisset
                        @if(isset($team) && isset($league))
                            <a href="{{ route('leagues.team', ['league_id' => $league['code'], 'team_id' => $team['id']]) }}" class="text-white text-decoration-none">
                                > <b style="cursor: pointer;"> {{ $team['name'] }} </b>
                            </a>
                        @endisset
                    </strong>
                </div>
                <div class="mb-3">
                    <div class="card">
                        <div class="card-body">
                            @if(empty($team))
                                @include('navbar', ['league' => $league ?? null])
                            @endif
                            <div id="main-data">
                                @if(!empty($team))
                                    @include("team-data", ["team" => $team])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-2 d-none d-md-block">
                <div class="card" style="background-color: #202A39;">
                    <div class="card-body">
                        <h5 class="card-title text-white text-center">Jogos ao vivo</h5>
                        <div class="accordion-item">
                            <div id="collapseOne" class="" aria-labelledby="headingOne">
                                <div class="accordion-body" id="live-games">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        $(document).ready(() => {
            $("form").on("submit", event => event.preventDefault());
        });

        liveGames()

        function liveGames()
        {
            let route = "{{ route('ongoing.matches') }}";
            callAjax(route, [], '#live-games');
        }

        // if ($("#league").val() && !$("#team").val()) {
        //     getResultsByLeague($("#league").val(), 'results');
        // }

        if ($("#team").val()) {
            getResultsByTeams($("#team").val(), 'results', '#sub-data-results');
            getResultsByTeams($("#team").val(), 'upcoming', '#sub-data-upcoming');
        }

        function search(league) {
            const route = league ? "{{ route('teams', ['league_id' => '__ID__']) }}".replace('__ID__', league) : "{{ route('leagues') }}";

            if (!$("#search-input").val()) {
                toastr.warning("Filtro de pesquisa inválida", "Atenção");
                return false;
            }
            let data = { search: $("#search-input").val() };
            callAjax(route, data);
        }

        function getResultsByLeague(league, type, element) {

            $(".navbar-nav .nav-link").removeClass("active");
            $(element).addClass("active");

            let baseRoute = "{{ route('leagues.results.matches', ['league_id' => '__ID__']) }}".replace('__ID__', league);
            let route = type === 'upcoming' ? "{{ route('leagues.upcoming.matches', ['league_id' => '__ID__']) }}".replace('__ID__', league) : baseRoute;
            callAjax(route);
        }

        function getResultsByTeams(league, type, showResponse) {
            let baseRoute = "{{ route('team.results.matches', ['team_id' => '__ID__']) }}".replace('__ID__', league);
            let route = type === 'upcoming' ? "{{ route('team.upcoming.matches', ['team_id' => '__ID__']) }}".replace('__ID__', league) : baseRoute;
            callAjax(route, [], showResponse);
        }


        function callAjax(route, data = [], showResponse = '') {
            if (!showResponse) {
                $(".preloader").show();
            }
            console.log("callAjax", route);
            $.ajax({
                type: 'GET',
                url: route,
                data: data,
                success: (response) => {
                    $(".preloader").hide();
                    if (showResponse) {
                        $(showResponse).html(response);
                        return;
                    }
                    $("#main-data").html(response);
                },
                error: (xhr, status, error) => {
                    console.error("Erro na requisição:", error);
                    $(".preloader").hide();
                }
            });
        }
    </script>
</body>
