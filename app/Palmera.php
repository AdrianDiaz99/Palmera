<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Palmera extends Model
{
    protected $table = 'Palmeras';
    protected $primaryKey = 'IdPalmera';
    protected $fillable = ['IdPalmera', 'Variedad', 'Predio', 'Categoria', 'Empleado', 'Estatus'];
    protected $keyType = 'string';
    public $incrementing = false;

    public function getId()
    {
        return $this->IdPalmera;
    }

    public function getEstatus()
    {
        return $this->Estatus;
    }

    public function objetoVariedad()
    {
        return $this->belongsTo(Variedades::class, 'Variedad');
    }

    public function objetoCategoria()
    {
        return $this->belongsTo(Categorias::class, 'Categoria');
    }

    public function objetoEmpleado()
    {
        return $this->belongsTo(Empleados::class, 'Empleado');
    }
}
