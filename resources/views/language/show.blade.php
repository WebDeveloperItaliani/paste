@extends("layout.base")

@section("title", "Wdi Paste - {$language->name}")

@section("container")
    <h1 class="display-1">{{ $language->name }}</h1>

    <div class="card-columns">
        @foreach($language->pastes as $paste)
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $paste->file_name }}<small>{{ $paste->extension }}</small></h4>
                    <p class="card-text">{{ $paste->description }}</p>
                    <a href="{{ route("paste.show", $paste->slug) }}" class="card-link">Visualizza</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
