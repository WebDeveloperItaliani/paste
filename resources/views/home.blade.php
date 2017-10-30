@extends("layout.base")

@section("title", "Wdi Paste - Home")

@section("container")
    <main class="row justify-content-center align-items-center" role="main">
        <div class="col  text-center">
            <h1 class="display-1">WDI Paste</h1>
            <p class="lead">WDI Paste ti permette di creare e condividere Paste</p>

            <a class="btn btn-lg btn-outline-info" href="{{ route("language.list") }}">Scopri i linguaggi</a>
            <a class="btn btn-lg btn-outline-primary" href="{{ route("paste.create") }}">Crea nuovo Paste</a>
        </div>
    </main>
@endsection
