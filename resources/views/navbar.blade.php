<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        @if(!empty($league['code']))
            <div class="navbar-nav">
                <a href="#" class="nav-item nav-link" onclick="getResultsByLeague('{{ $league['code'] }}', 'results', $(this))">Resultados</a>
                <a href="#" class="nav-item nav-link" onclick="getResultsByLeague('{{ $league['code'] }}', 'upcoming', $(this))">Próximos jogos</a>
            </div>
        @endif
        <form class="d-flex w-100 d-lg-block" onsubmit="search('{{ $league['code'] ?? '' }}'); return false;">
            <div class="input-group">
                <span class="input-group-text"><i class="fa fa-search"></i></span>
                <input type="text" id="search-input" class="form-control" placeholder="{{ empty($league['code']) ? 'Buscar liga' : 'Buscar time' }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
    </div>
</nav>
