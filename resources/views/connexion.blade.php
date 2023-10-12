
    <header class="container">
        <h1>Connexion</h1>
        {{-- <a href="{{ route('accueil') }}" class="btn btn-primary">Retour</a> --}}
    </header>

    <div class="container">
        <form method="POST" action="{{ route('membre.authenticate') }}">
            @csrf <!-- Ajoutez ceci pour la protection CSRF -->

            <div class="form-group">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe :</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="rememberMe" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="rememberMe">
                    Se souvenir de moi
                </label>
            </div>
            <input type="submit" class="btn btn-primary" name="login" value="Se connecter">
        </form>
    </div>

    @if (session('error'))
        <div class="container">
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        </div>
    @endif
