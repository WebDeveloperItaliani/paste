<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route("home") }}">WDI Paste</a>
    <button class="navbar-toggler" aria-expanded="false" aria-controls="navbarCollapse" aria-label="Toggle navigation" type="button" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route("language.list") }}">Linguaggi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("paste.create") }}">Crea nuovo paste</a>
            </li>
        </ul>

        @auth
            <a href="#coming-soon" class="btn btn-primary">Dashboard</a>
            <a href="{{ route("auth.logout") }}" class="btn btn-secondary">Esci</a>
        @endauth

        @guest
            <a href="{{ route("social.login", "facebook")  }}" class="btn btn-primary">Accedi</a>
        @endguest
    </div>
</nav>
