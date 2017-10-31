@extends("layout.base")

@section("title", "Wdi Paste - {$paste->name}")

@section("container")

    <div class="d-flex justify-content-between align-items-center">
        <h1 class="display-1">{{ $paste->name }}<small>.{{$paste->extension}}</small></h1>

        <div class="btn-group" role="group" aria-label="Fork menu">
            <a class="btn btn-primary" href="{{ route("fork.create", $paste->slug) }}">Forka</a>
            <a class="btn btn-outline-info" href="{{ route("paste.forks", $paste->slug) }}">{{ $paste->forks->count() }}</a>
        </div>
    </div>

    @if($paste->isAFork())
        <p>Fork di <a href="{{ route("paste.show", $paste->forked->slug) }}">{{ $paste->forked->fileName }}</a></p>
    @endif

    <blockquote class="blockquote">
        <p class="mb-0">{{ $paste->description }}</p>
        <footer class="blockquote-footer">
            <span>Creato il {{ $paste->created_at }} Linguaggio:</span>
            <cite title="Linguaggio"><a href="{{ route("language.show", $paste->language->name) }}">{{ $paste->language->name }}</a></cite>
        </footer>
    </blockquote>

    <div class="card m-5">
        <div class="card-body p-0">
            <pre class="m-0" v-pre><code>{{ $paste->code }}</code></pre>
        </div>
    </div>

@endsection

@section("js")
    <script>window.HighlightJs.initHighlightingOnLoad();</script>
@endsection
