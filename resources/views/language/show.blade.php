@extends("layout.base")

@section("title", "Wdi Paste - {$language->name}")

@section("container")
    <h1 class="display-1">{{ $language->name }}</h1>

    <p>
        <span>Possibili estensioni:</span>
        <span class="text-muted">{{ $language->extensionsToString }}</span>
    </p>

    <div class="card-columns">
        @forelse($language->pastes as $paste)
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-capitalize">{{ $paste->fileName }}</h4>
                    <p class="card-text">{{ $paste->description }}</p>
                    <a href="{{ route("paste.show", $paste->slug) }}" class="card-link">Visualizza</a>
                </div>
            </div>
        @empty
            <div class="card border-secondary">
                <div class="card-header">Opps nessuno paste per {{ $language->name }}</div>
                <div class="card-body text-secondary">
                    <h4 class="card-title">{{ $language->name }} è senza paste</h4>
                    <p class="card-text">Questo è dovuto al fatto che questo linguaggio non è stato ancora utilizzato per creare dei paste, vuoi essere il primo?</p>
                    <a href="{{ route("paste.create") }}">Crea il primo paste per {{ $language->name }}</a>
                </div>
            </div>
        @endforelse
    </div>
@endsection
