@extends("layout.base")

@section("title", "Wdi Paste - I forks di {$paste->name}")

@section("container")
    <h1 class="display-1">Il network di {{ $paste->name }}<small class="text-muted">.{{ $paste->extension }}</small></h1>

    @if($paste->hasForks())
        <div class="card-columns">
        @foreach($paste->forks as $fork)
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-capitalize">{{ $fork->fileName }}</h4>
                    <p class="card-text">{{ $fork->description }}</p>
                    <a href="{{ route("paste.show", $fork->slug) }}" class="card-link">Visualizza</a>
                </div>
            </div>
        @endforeach
        </div>
    @else
        <div class="card border-secondary">
            <div class="card-header">Opps nessuno fork di {{ $paste->name }}</div>
            <div class="card-body text-secondary">
                <h4 class="card-title">{{ $paste->name }} è senza fork</h4>
                <p class="card-text">Evidentemente si sente solo... vuoi essere il primo ad effettuare il fork?</p>
                <a href="{{ route("fork.create", $paste->slug) }}">Crea il primo fork per {{ $paste->name }}</a>
            </div>
        </div>
    @endif

@endsection
