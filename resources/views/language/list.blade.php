@extends("layout.base")

@section("title", "Wdi Paste - Linguaggi")

@section("container")
    <h1 class="display-1 mb-4">Linguaggi</h1>

    <div class="row">
    @foreach($languages->chunk(3) as $languagesChunk)
        @foreach($languagesChunk as $language)
            <div class="col-md-2">
                <p class="lead">
                    <a href="{{ route("language.show", $language->name) }}" class="text-capitalize">{{ $language->name }}</a>
                    <small class="text-muted">({{ $language->pastes_count }})</small>
                </p>
            </div>
        @endforeach
        <div class="w100"></div>
    @endforeach
    </div>
@endsection
