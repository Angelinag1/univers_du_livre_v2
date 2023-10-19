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

        <!-- Bouton pour afficher la fenêtre modale de confirmation -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmAddModal">Ajouter</button>

        <!-- Fenêtre modale de confirmation -->
        <div class="modal fade" id="confirmAddModal" tabindex="-1" role="dialog" aria-labelledby="confirmAddModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmAddModalLabel">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Voulez-vous vraiment ajouter ce livre ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Confirmer</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
