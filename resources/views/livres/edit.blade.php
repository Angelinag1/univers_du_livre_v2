@include('partials.header')
<div class="container">
    <h2>Modifier un livre</h2>
    <form method="POST" action="{{ route('livres.update', $livre->id) }}">
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
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
