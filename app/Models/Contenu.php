<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contenu extends Model
{
    
    protected $fillable = [
        'titre','description', 'contenu','id_type_contenu','id_type_media','id_region','parent_id','id_utilisateur', 'id_langue'
    ];

    public function typeContenu() { return $this->belongsTo(TypeContenu::class,'id_type_contenu'); }
    public function typeMedia() { return $this->belongsTo(TypeMedia::class,'id_type_media'); }
    public function region() { return $this->belongsTo(Region::class,'id_region'); }
    public function parent() { return $this->belongsTo(Contenu::class,'parent_id'); }
    public function enfants() { return $this->hasMany(Contenu::class,'parent_id'); }

    // Prefer standard User model (users table) — FK in contenus is id_utilisateur
    public function auteur()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_utilisateur', 'id');
    }

    // keep alias if code references user()
    public function user()
    {
        return $this->auteur();
    }

    public function medias()
    {
        return $this->hasMany(Media::class, 'id_contenu', 'id');
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'id_contenu', 'id');
    }
    public function langue()
{
    return $this->belongsTo(Langue::class, 'id_langue');
}
}