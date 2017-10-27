@extends("layout.base")

@section("title", "Wdi Paste - {$paste->name}")

@section("css")
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
@endsection

@section("container")
    <h1 class="display-1">{{ $paste->name }}</h1>

    <blockquote class="blockquote">
        <p class="mb-0">{{ $paste->description }}</p>
        <footer class="blockquote-footer">Creato il {{ $paste->created_at }} <cite title="Linguaggio">{{ $paste->language }}</cite></footer>
    </blockquote>

    <div class="card">
        <div class="card-body p-0">
            <pre class="m-0"><code>{{ $paste->code }}</code></pre>
        </div>
    </div>

@endsection

@section("js")
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection
