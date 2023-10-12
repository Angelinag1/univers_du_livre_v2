
@include('partials.header')
<div class="container">
    <h2>Ajouter un livre</h2>
    <form method="POST" action="{{ route('livres.store') }}">
        @csrf <!-- Ajoutez ceci pour la protection CSRF -->

        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
        </div>
        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>
        <div class="form-group">
            <label for="auteur">Auteur :</label>
            <input type="text" class="form-control" id="auteur" name="auteur" required>
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
