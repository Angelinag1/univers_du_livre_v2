<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
    protected $table = 'livre';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // Relation avec les réservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'id_livre');
    }

    // Getters and setters
    public function getTitreAttribute($value)
    {
        return ucfirst($value); // Exemple d'un getter pour mettre la première lettre en majuscule
    }

    public function setTitreAttribute($value)
    {
        $this->attributes['titre'] = strtolower($value); // Exemple d'un setter pour mettre en minuscules
    }
}
