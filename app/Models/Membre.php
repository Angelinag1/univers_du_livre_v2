<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Auth\Passwords\CanResetPassword;

class Membre extends Authenticatable
{
    use Notifiable, CanResetPassword;

    protected $table = 'membre';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nom','prenom' ,'adresse','username', 'mot_de_passe',
    ];

    // Hasher le mot de passe lors de la sauvegarde
    public function setMotDePasseAttribute($value)
    {
        $this->attributes['mot_de_passe'] = bcrypt($value);
    }
}
