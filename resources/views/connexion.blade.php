@include('partials.header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <header>
                        <h1 class="text-center">Connexion</h1>
                    </header>

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

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

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary btn-lg" name="login">Se connecter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
