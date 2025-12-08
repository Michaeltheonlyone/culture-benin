<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{  
    protected $primaryKey = 'id_langue';
    protected $fillable = ['nom_langue', 'code_langue', 'description'];
}
