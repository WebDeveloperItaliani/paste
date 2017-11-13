@extends("layout.base")

@section("title", "Wdi Paste - {$paste->name}")

@section("container")

    <div class="d-flex justify-content-between align-items-center">
        <h1 class="display-1">{{ $paste->name }}<small>.{{$paste->extension}}</small></h1>

        <div class="btn-toolbar" role="toolbar" aria-label="Paste utility menu">
            <div class="btn-group mr-2" role="group" aria-label="Edit paste">
                <a class="btn btn-primary" href="{{ route("paste.edit", $paste->slug) }}">Modifica</a>
            </div>
            <div class="btn-group" role="group" aria-label="Fork paste">
                <a class="btn btn-primary" href="{{ route("fork.create", $paste->slug) }}">Forka</a>
                <a class="btn btn-outline-primary" href="{{ route("paste.forks", $paste->slug) }}">{{ $paste->forks->count() }}</a>
            </div>
        </div>
    </div>

    <blockquote class="blockquote">
        <p class="mb-0">{{ $paste->description }}</p>
        <footer class="blockquote-footer">
            <span>Creato {{ $paste->created_at->diffForHumans() }}</span>
            @if($paste->hasUser())
            <span>da </span>
            <cite title="Creato da">{{ $paste->user->facebookProfile->name }}</cite>
            @endif
            @if($paste->isAFork())
            <span>fork di</span>
            <cite title="Fork di"><a href="{{ route("paste.show", $paste->forked->slug) }}">{{ $paste->forked->fileName }}</a></cite>
            @endif

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
