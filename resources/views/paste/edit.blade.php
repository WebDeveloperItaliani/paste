@extends("layout.base")

@section("title", "Wdi Paste - Modifica {$paste->name}")

@section("container")
    <h1 class="display-1">Modifica {{ $paste->name }}</h1>

    @includeWhen($errors->any(), "components.form-errors")

    <form action="{{ route("paste.update", $paste->slug) }}" method="post" role="form">
        {{ method_field("PUT") }}
        {{ csrf_field() }}

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="paste-name">Nome</label>
                <input type="text" class="form-control" id="paste-name" name="name" placeholder="Nome del paste" value="{{ old("name", $paste->name) }}">
            </div>
            <language-select :language="{{ $paste->language }}" extension="{{ $paste->extension }}"></language-select>
        </div>

        <div class="form-group">
            <label for="paste-description">Breve Descrizione</label>
            <textarea class="form-control" id="paste-description" name="description" placeholder="Una breve descrizione del tuo paste">{{ old("description", $paste->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="paste-code">Codice</label>
            <textarea class="form-control" id="paste-code" name="code" placeholder="Hello World;" rows="20" v-pre>{{ old("code", $paste->code) }}</textarea>
        </div>

        <div class="form-group">
            <label for="paste-password">Password di conferma</label>
            <input type="password" class="form-control" id="paste-password" name="password" required>
        </div>

        <button type="submit" class="btn btn-success">Aggiorna il paste</button>
    </form>
@endsection
