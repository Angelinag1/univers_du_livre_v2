<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Livre;
use App\Models\Membre;



class ReservationController extends Controller
{

    public function index()
    {
        $livres = Livre::all();
        $nomsEmprunteurs = [];

        foreach ($livres as $livre) {
            if ($livre->disponible == 0) {
                $reservation = Reservation::where('id_livre', $livre->id)->first();
                if ($reservation) {
                    $nomsEmprunteurs[$livre->id] = $reservation->obtenirNomEmprunteur();
                } else {
                    $nomsEmprunteurs[$livre->id] = 'Emprunteur inconnu';
                }
            }
        }

        return view("livres.index", compact('livres', 'nomsEmprunteurs'));
    }

    public function obtenirNomEmprunteur($idLivre)
    {
        // Effectuer une jointure pour récupérer le nom de l'emprunteur
        $emprunteur = Livre::where('livres.id', $idLivre)
            ->join('reservations', 'livres.id', '=', 'reservations.id_livre')
            ->join('membres', 'reservations.id_membre', '=', 'membres.id')
            ->select('membres.nom', 'membres.prenom')
            ->first();
            dd($emprunteur);
        if ($emprunteur) {
            return "Nom de l'emprunteur : " . $emprunteur->prenom . ' ' . $emprunteur->nom;
        } else {
            return "Ce livre n'a pas d'emprunteur actuellement.";
        }
    }
    public function rendreLivre($id)
    {
        // Vérifier si l'utilisateur est connecté
        if (!auth()->check()) {
            // Rediriger vers la page de connexion ou afficher un message d'erreur
            return redirect()->route('connexion')->with('error', 'Veuillez vous connecter pour rendre un livre.');
        }

        // Vérifier si l'ID du livre est un entier
        if (!is_numeric($id)) {
            return redirect()->route('livres.index')->with('error', "L'identifiant du livre n'est pas valide.");
        }

        // Récupérer l'utilisateur connecté
        $membre = auth()->user();

        // Vérifier si l'utilisateur est l'emprunteur du livre
        $reservation = Reservation::where('id_livre', $id)
            ->where('id_membre', $membre->id)
            ->first();

        if ($reservation) {
            // Supprimer la réservation
            $reservation->delete();

            // Mettre à jour la disponibilité du livre
            Livre::where('id', $id)->update(['disponible' => true]);

            return redirect()->route('livres.index')->with('success', 'Livre rendu avec succès.');
        } else {
            return redirect()->route('livres.index')->with('error', "Vous n'êtes pas autorisé à rendre ce livre.");
        }
    }
}
