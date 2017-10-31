@extends("layout.base")

@section("title", "Wdi Paste - Crea nuovo")

@section("container")
    <h1 class="display-1">Forka {{ $paste->name }}</h1>

    @includeWhen($errors->any(), "components.form-errors")

    <form action="{{ route("fork.add", $paste->slug) }}" method="post" role="form">
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

        <button type="submit" class="btn btn-success">Effettua il Fork</button>
    </form>
@endsection
