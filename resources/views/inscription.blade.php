@include('partials.header')
<div class="container">
    <h2>Inscription</h2>
    <form method="POST" action="{{ route('inscrire') }}">
        @csrf
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" name="nom" id="nom" required>
            @error('nom')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" name="prenom" id="prenom" required>
            @error('prenom')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" class="form-control" name="username" id="username" required>
            @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="adresse">Email :</label>
            <input type="email" class="form-control" name="adresse" id="adresse" required>
            @error('adresse')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderrorlert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe" required>
            @error('mot_de_passe')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
</div>
