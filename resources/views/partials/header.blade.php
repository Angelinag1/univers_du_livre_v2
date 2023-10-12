<!DOCTYPE html>
<html>
<head>
    <title>Univers du Livre</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            {{-- <a class="navbar-brand" href="{{ route('accueil') }}">
                <img src="{{ asset('img/logo.png') }}" alt="logo" srcset="">
                Univers du Livre
            </a> --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('livres.index') }}">Bibliothèque</a>
                    </li>
                </ul>
                @if (auth()->check())
                    <div class="ml-auto">
                        <!-- Si l'utilisateur est connecté, afficher le pseudo -->
                        <span class="navbar-text mr-5">Bonjour {{ auth()->user()->prenom }}</span>
                        <a href="{{ route('deconnexion') }}" class="btn btn-primary">Se déconnecter</a>
                    </div>
                @else
                    <!-- Si l'utilisateur n'est pas connecté, afficher les boutons d'inscription et de connexion -->
                    <div class="ml-auto">
                        <a href="{{ route('inscription') }}" class="btn btn-primary">S'inscrire</a>
                        <a href="{{ route('connexion') }}" class="btn btn-primary">Se connecter</a>
                    </div>
                @endif
            </div>
        </nav>
    </header>
