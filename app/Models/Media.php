<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['url', 'titre_media', 'id_type_media', 'id_contenu'];

    public function typeMedia()
    {
        return $this->belongsTo(TypeMedia::class, 'id_type_media', 'id_type_media');
    }

    public function contenu()
    {
        return $this->belongsTo(Contenu::class, 'id_contenu', 'id');
    }
}