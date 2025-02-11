<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-header bg-transparent text-center">
                    <img class="profile_img" src="{{ $team['crest'] }}" alt="{{ $team['shortName'] }}">
                    <h3>{{ $team['name'] }}</h3>
                </div>
                <div class="card-body">
                    <p class="mb-0"><strong class="pr-1">Técnico: </strong>{{ $team['coach']['name'] }}</p>
                    <p class="mb-0"><strong class="pr-1">Contrato até: </strong> {{ $team['coach']['contract']['until'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="pt-0">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th width="30%">País</th>
                            <td>{{ $team['area']['name'] }}</td>
                        </tr>
                        <tr>
                            <th width="30%">Endereço</th>
                            <td>{{ $team['address'] }}</td>
                        </tr>
                        <tr>
                            <th width="30%">Estádio</th>
                            <td>{{ $team['venue'] }}</td>
                        </tr>
                        <tr>
                            <th width="30%">Fundação</th>
                            <td>{{ $team['founded'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="card">
            <div class="card-header bg-transparent text-center">
                Próximos jogos
            </div>
            <div class="card-body overflow-auto" style="max-height: 250px;">
                <div id="sub-data-upcoming">
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="card">
            <div class="card-header bg-transparent text-center">
                Resultados
            </div>
            <div class="card-body overflow-auto" style="max-height: 250px;">
                <div id="sub-data-results">
                </div>
            </div>
        </div>
    </div>
</div>
