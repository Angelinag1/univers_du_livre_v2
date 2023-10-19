@include('partials.header')

<div class="container mt-4">
    <h2 class="text-center">Explorez notre Bibliothèque</h2>

   <form method="POST" action="{{ route('livres.rechercher') }}">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="recherche" class="form-control" placeholder="Rechercher un livre...">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </div>
    </div>
</form>


<div class="row">
    @foreach ($livres as $livre)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $livre->titre }}</h5>
                    <p class="card-text">{{ $livre->description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Auteur : {{ $livre->auteur }}</li>
                    @if ($livre->disponible == 1)
                        <li class="list-group-item text-success">Disponible</li>
                        @if (auth()->check())
                            <div class="card-body">
                                <form method="POST" action="{{ route('livres.reserver', ['id' => $livre->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-success d-inline mr-2">Réserver</button>
                                </form>
                                <a href="{{ route('livres.edit', ['id' => $livre->id]) }}"
                                    class="btn btn-primary d-inline mr-2">Modifier</a>
                                <form method="POST" action="{{ route('livres.destroy', $livre->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger d-inline">Supprimer</button>
                                </form>
                            </div>
                        @endif
                    @else
                        <li class="list-group-item text-danger">Emprunté</li>
                        @if (auth()->check())
                            <div class="card-body">Emprunté par : {{ $nomsEmprunteurs[$livre->id] }}</div>
                            <a href="{{ route('livres.rendre', ['id' => $livre->id]) }}"
                                class="btn btn-warning">Rendre le livre</a>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    @endforeach
</div>
</div>
