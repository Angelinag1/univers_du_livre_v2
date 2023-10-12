@include('partials.header')

<div class="container">
    <h2 class="mt-4">Résultats de la recherche</h2>

    <a href="{{ route('livres.index') }}" class="btn btn-primary mb-3">Retour à la liste complète</a>

    <!-- Liste des livres résultant de la recherche -->
    <div class="row">
        @foreach ($livres as $livre)
            <div class=".col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $livre->titre }}</h5>
                        <p class="card-text">{{ $livre->description }}</p>
                    </div>
                    <!-- Utilisez la classe img-fluid pour les images si nécessaire -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $livre->auteur }}</li>
                        @if ($livre->disponible == 1)
                            <li class="list-group-item" style="color:green">Disponible</li>
                            <!-- Bouton "Emprunter" pour les utilisateurs connectés -->
                            @if (auth()->check())
                                <div class="card-body">
                                    <form method="POST" action="{{ route('livres.reserver', ['id' => $livre->id]) }}">
                                        @csrf
                                        <!-- Ajoutez ici les champs de formulaire nécessaires -->
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
                            <li class="list-group-item" style="color:red">Emprunté</li>
                            <div class="card-body">{{ $nomsEmprunteurs[$livre->id] }}</div>
                            <a href="{{ route('livres.rendre', ['id' => $livre->id]) }}" class="btn btn-warning">Rendre
                                le livre</a>
                        @endif
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>
