<!DOCTYPE html>
<html>
<head>
    <title>Univers du Livre</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="https://lh3.googleusercontent.com/drive-viewer/AK7aPaDIOKuR-RtfmyOFFSOKFRGEmXJr6izX2j6y3DXlQGokkT-b2gI3Xc30u8R7yeCwy7ht504RNChn6fu8e_M6sFjOa4hllQ=s2560" width="30" height="30" class="d-inline-block align-top" alt="">
                    Univers du Livre
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('livres.index') }}">Bibliothèque</a>
                        </li>
                    </ul>
                    @if (auth()->check())
                        <div class="ml-auto">
                            <span class="navbar-text mr-3">Bonjour {{ auth()->user()->prenom }}</span>
                            <a href="{{ route('deconnexion') }}" class="btn btn-primary">Se déconnecter</a>
                        </div>
                    @else
                        <div class="ml-auto">
                            <a href="{{ route('inscription') }}" class="btn btn-primary">S'inscrire</a>
                            <a href="{{ route('connexion') }}" class="btn btn-primary">Se connecter</a>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
