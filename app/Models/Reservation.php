<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservation';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['id_livre', 'id_membre', 'date_reservation'];


    public function livre()
    {
        return $this->belongsTo(Livre::class, 'id_livre');
    }

    public function membre()
    {
        return $this->belongsTo(Membre::class, 'id_membre');
    }
    public function obtenirNomEmprunteur()
{
    // Vérifiez si la relation "membre" est chargée
    if ($this->relationLoaded('membre')) {
        return $this->membre->nom . ' ' . $this->membre->prenom;
    } else {
        // Si la relation n'est pas chargée, essayez de la charger
        $this->load('membre');
        if ($this->relationLoaded('membre')) {
            return $this->membre->nom . ' ' . $this->membre->prenom;
        } else {
            return 'Emprunteur inconnu';
        }
    }
}

}
