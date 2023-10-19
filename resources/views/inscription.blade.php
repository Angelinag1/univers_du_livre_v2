@include('partials.header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><h2>Inscription</h2></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('inscrire') }}">
                        @csrf

                        <div class="form-group">
                            <label for="prenom">Prénom :</label>
                            <input type="text" class="form-control" name="prenom" id="prenom" required>
                            @error('prenom')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nom">Nom :</label>
                            <input type="text" class="form-control" name="nom" id="nom" required>
                            @error('nom')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="username">Nom d'utilisateur :</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="adresse">Email :</label>
                            <input type="email" class="form-control" name="adresse" id="adresse" required>
                            @error('adresse')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mot_de_passe">Mot de passe :</label>
                            <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" required>
                            @error('mot_de_passe')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-check">
    <input class="form-check-input" type="checkbox" name="accept_terms" id="accept_terms" required>
    <label class="form-check-label" for="accept_terms">
        J'accepte la Politique de confidentialité et les Conditions Générales d'Utilisation.
    </label>
</div>
                         <p class="small text-muted">Nous prenons votre vie privée au sérieux. Vos informations personnelles ne seront pas partagées avec des tiers sans votre consentement.</p>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">S'inscrire</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
