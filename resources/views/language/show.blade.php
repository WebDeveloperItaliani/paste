@extends("layout.base")

@section("title", "Wdi Paste - {$language->name}")

@section("container")
    <h1 class="display-1">{{ $language->name }}</h1>

    @foreach($language->pastes->chunk(3) as $pasteChunk)
        @foreach($pasteChunk as $paste)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $paste->file_name }}<small>{{ $paste->extension }}</small></h4>
                        <p class="card-text">{{ $paste->description }}</p>
                        <a href="{{ route("paste.show", $paste->slug) }}" class="card-link">Visualizza</a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="w100"></div>
    @endforeach
@endsection
