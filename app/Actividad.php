<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = "Actividades";
    protected $primaryKey = 'IdActividad';
    protected $fillable = ['ActNombre', 'ActDescripcion', 'ActCosto'];
}
