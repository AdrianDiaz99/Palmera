<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicaciones extends Model
{
    protected $table = "Ubicaciones";
    protected $primaryKey = 'idUbicacion';
    protected $fillable = ['Coordenadas', 'Predio'];
    public $timestamps = false;
}
