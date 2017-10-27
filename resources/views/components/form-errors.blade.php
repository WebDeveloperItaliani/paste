<div class="alert alert-danger">
    <h5 class="display-5">Oops ci sono degli errori</h5>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>

    <p>Correggi i problemi prima di procedere</p>
</div>
