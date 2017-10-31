@extends("layout.base")

@section("title", "Wdi Paste - {$paste->name}")

@section("container")
    <h1 class="display-1">{{ $paste->name }}<small>.{{$paste->extension}}</small></h1>
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
