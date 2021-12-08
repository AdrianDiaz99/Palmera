<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variedades extends Model
{
    protected $table = "Variedades";
    protected $primaryKey = 'VarID';
    protected $fillable = ['VarNombre', 'VarDescripcion'];
    public $timestamps = false;

    public function getVarNombre()
    {
        return $this->VarNombre;
    }
}
