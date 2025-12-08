<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $primaryKey = 'id_commentaire'; // Add this line
    public $incrementing = true; // Add this if it's auto-increment
    protected $keyType = 'int'; // Add this if it's integer
    
    protected $fillable = [
        'texte',
        'note',
        'date',
        'id_utilisateur',
        'id_contenu'
    ];

    // Relationships
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }

    public function contenu()
    {
        return $this->belongsTo(Contenu::class, 'id_contenu');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }
}