<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    protected $fillable = [
        'nom','prenom','email','password','sexe','date_inscription','date_naissance',
        'statut','photo','header','id_role','id_langue'
    ];

    public function role() {
        return $this->belongsTo(Role::class, 'id_role');
    }

    public function langue() {
        return $this->belongsTo(Langue::class, 'id_langue');
    }

    public function contenus() {
    return $this->hasMany(Contenu::class, 'id_utilisateur');
    }

    public function commentaires() {
    return $this->hasMany(Commentaire::class, 'id_utilisateur');
    }

}
