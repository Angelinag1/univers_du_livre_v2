<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\Reservation;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::orderBy('id', 'desc')->get();
        return view('livres.index', compact('livres'));
    }

    public function create()
    {
        return view('livres.create');
    }

    public function store(Request $request)
    {
        // Validez les données du formulaire ici, par exemple, en utilisant la méthode $request->validate()

        // Créez un nouvel enregistrement de livre dans la base de données en utilisant le modèle Livre
        $nouveauLivre = new Livre();
        $nouveauLivre->isbn = $request->input('isbn');
        $nouveauLivre->titre = $request->input('titre');
        $nouveauLivre->auteur = $request->input('auteur');
        $nouveauLivre->description = $request->input('description');
        $nouveauLivre->disponible = 1; // Valeur par défaut

        $nouveauLivre->save();

        // Redirigez l'utilisateur vers la page souhaitée avec un message de succès
        return redirect()->route('livres.index')->with('success', 'Le livre a été ajouté avec succès.');
    }
    public function reserver($id)
    {
        // Vérifier si l'utilisateur est connecté
        if (!auth()->check()) {
            // Rediriger vers la page de connexion ou afficher un message d'erreur
            return redirect()->route('connexion')->with('error', 'Veuillez vous connecter pour effectuer une réservation.');
        }

        // Vérifier si l'identifiant du livre est un entier
        if (!is_numeric($id)) {
            return redirect()->route('livres.index')->with('error', "L'identifiant du livre n'est pas valide.");
        }

        // Récupérer l'utilisateur connecté
        $membre = auth()->user();

        // Obtenir la date et l'heure actuelles
        $date_reservation = now();

        // Insérer la réservation
        Reservation::create([
            'id_livre' => $id,
            'id_membre' => $membre->id,
            'date_reservation' => $date_reservation,
        ]);

        // Mettre à jour la disponibilité du livre
        Livre::where('id', $id)->update(['disponible' => false]);

        return redirect()->route('livres.index')->with('success', 'Livre réservé avec succès.');
    }
    public function edit($id)
    {
        // Récupérez les données du livre à partir de la base de données
        $livre = Livre::find($id);

        if (!$livre) {
            // Gérez le cas où le livre n'a pas été trouvé
            return redirect()->route('livres.index')->with('error', 'Livre non trouvé.');
        }

        // Affichez la vue de modification du livre avec les données du livre
        return view('livres.edit', compact('livre'));
    }
    public function update(Request $request, $id)
    {
        // Validez les données du formulaire
        $request->validate([
            'titre' => 'required',
            'auteur' => 'required',
        ]);

        // Mettez à jour les données du livre dans la base de données
        Livre::where('id', $id)->update([
            'titre' => $request->input('titre'),
            'auteur' => $request->input('auteur'),
            'description' => $request->input('description'),
        ]);

        // Redirigez l'utilisateur vers la page de la bibliothèque avec un message de succès
        return redirect()->route('livres.index')->with('success', 'Livre modifié avec succès.');
    }
    public function destroy($id)
    {
        // Recherchez le livre à supprimer dans la base de données
        $livre = Livre::find($id);

        if (!$livre) {
            // Gérez le cas où le livre n'a pas été trouvé
            return redirect()->route('livres.index')->with('error', 'Livre non trouvé.');
        }

        // Supprimez le livre de la base de données
        $livre->delete();

        // Redirigez l'utilisateur vers la page de la bibliothèque avec un message de succès
        return redirect()->route('livres.index')->with('success', 'Livre supprimé avec succès.');
    }

    public function rechercher(Request $request)
{
    $recherche = $request->input('recherche');

    // Effectuez la recherche des livres qui correspondent au terme de recherche
    $livres = Livre::where('titre', 'LIKE', '%' . $recherche . '%')
                    ->orWhere('auteur', 'LIKE', '%' . $recherche . '%')
                    ->get();

    // Passez les résultats de la recherche à la vue
    return view('livres.recherche', compact('livres'));
}

}
