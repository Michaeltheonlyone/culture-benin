<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeMedia extends Model
{
    protected $table = 'typemedias';            // exact table name
    protected $primaryKey = 'id_type_media';    // exact PK column
    public $timestamps = true;

    public $incrementing = true;                // AUTO_INCREMENT
    protected $keyType = 'int';                 // PK is integer

    protected $fillable = ['nom_media'];

    public function medias()
    {
        return $this->hasMany(Media::class, 'id_type_media', 'id_type_media');
    }
}