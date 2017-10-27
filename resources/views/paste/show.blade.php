@extends("layout.base")

@section("title", "Wdi Paste - {$paste->name}")

@section("css")
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
@endsection

@section("container")
    <h1 class="display-1">{{ $paste->file_name }}<small>{{ $paste->extension }}</small></h1>

    <p class="lead">{{ $paste->description }}</p>

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
