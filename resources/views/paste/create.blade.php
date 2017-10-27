@extends("layout.base")

@section("title", "Wdi Paste - Crea nuovo")

@section("container")
    <h1 class="display-1">Crea nuovo Paste</h1>

    @includeWhen($errors->any(), "components.form-errors")

    <form action="{{ route("paste.add") }}" method="post" role="form">
        {{ csrf_field() }}

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="paste-name">Nome</label>
                <input type="text" class="form-control" id="paste-name" name="file_name" placeholder="Nome del paste">
            </div>
            <div class="form-group col-md-4">
                <label for="paste-extension">Estensione</label>
                <input type="text" class="form-control" id="paste-extension" name="extension" placeholder=".php">
            </div>
            <div class="form-group col-md-4">
                <label for="paste-language">Linguaggio</label>
                <select name="language_id" id="paste-language" class="form-control">
                    <option selected aria-selected="true" disabled>Seleziona un linguaggio</option>
                    @foreach($languages as $language)
                        <option value="{{ $language->id }}">{{ $language->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="paste-description">Breve Descrizione</label>
            <textarea class="form-control" id="paste-description" name="description" placeholder="Una breve descrizione del tuo paste"></textarea>
        </div>

        <div class="form-group">
            <label for="paste-code">Codice</label>
            <textarea class="form-control" id="paste-code" name="code" placeholder="Hello World;" rows="20"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Crea</button>
    </form>
@endsection
