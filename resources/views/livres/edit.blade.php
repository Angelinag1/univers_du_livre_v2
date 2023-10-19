@include('partials.header')
<div class="container">
    <h2>Modifier un livre</h2>
    <form method="POST" action="{{ route('livres.update', $livre->id) }}" id="modificationForm">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ $livre->titre }}" required>
        </div>
        <div class="form-group">
            <label for="auteur">Auteur :</label>
            <input type="text" class="form-control" id="auteur" name="auteur" value="{{ $livre->auteur }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea class="form-control" id="description" name="description">{{ $livre->description }}</textarea>
        </div>
        <button type="button" class="btn btn-primary" id="modifierBtn">Modifier</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modifierBtn = document.getElementById('modifierBtn');
        const modificationForm = document.getElementById('modificationForm');

        modifierBtn.addEventListener('click', function () {
            if (confirm("Êtes-vous sûr de vouloir modifier ce livre ?")) {
                modificationForm.submit();
            }
        });
    });
</script>
