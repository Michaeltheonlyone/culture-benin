<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $primaryKey = 'id_region';
    protected $fillable = ['nom_region','description','population','superficie','localisation'];
}
