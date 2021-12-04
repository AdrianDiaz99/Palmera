<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    protected $table = 'predios';
    protected $primaryKey = 'PreID';
    protected $fillable = ['PreID', 'PreFactorLluvia', 'PreFactorHumedad', 'PreFactorResequedad', 'PreHectareas', 'PreTipoSuelo', 'Categoria', 'EmpleadoAlta'];
    protected $keyType = 'string';
    public $incrementing = false;

    public function getEstatus()
    {
        return $this->estatus;
    }

    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }

    public function getTipoSuelo()
    {
        return $this->PreTipoSuelo;
    }

    public function setTipoSuelo($tipoSuelo)
    {
        $this->PreTipoSuelo = $tipoSuelo;
    }


    public function getCategoria()
    {
        return $this->Categoria;
    }

    public function setCategoria($categoria)
    {
        $this->Categoria = $categoria;
    }

    public function getPreID()
    {
        return $this->PreID;
    }

    public function setPreID($PreID)
    {
        $this->PreID = $PreID;
    }

    public function getFactorLluvia()
    {
        return $this->PreFactorLluvia;
    }

    public function setFactorLluvia($factorLluvia)
    {
        $this->PreFactorLluvia = $factorLluvia;
    }

    public function getFactorHumedad()
    {
        return $this->PreFactorHumedad;
    }

    public function setFactorHumedad($factorHumedad)
    {
        $this->PreFactorHumedad = $factorHumedad;
    }

    public function getFactorResequedad()
    {
        return $this->PreFactorResequedad;
    }

    public function setFactorResequedad($factorResequedad)
    {
        $this->PreFactorResequedad = $factorResequedad;
    }

    public function getHectareas()
    {
        return $this->PreHectareas;
    }
    public function setHectareas($hectareas)
    {
        $this->PreHectareas = $hectareas;
    }

    public function getUserAlta()
    {
        return $this->user_id;
    }

    public function setUserAlta($userAlta)
    {
        $this->user_id = $userAlta;
    }

    /* Relacion n:1 Predios - Categorias/Usuarios */
    public function objetoCategoria()
    {
        return $this->belongsTo(CategoriaPredio::class, 'Categoria');
    }

    /* Relacion n:1 Predios - Categorias/Usuarios */
    public function objetoTipoSuelo()
    {
        return $this->belongsTo(TiposDeSuelo::class, 'PreTipoSuelo');
    }

    public function objetoEmpleado()
    {
        return $this->belongsTo(Empleados::class, 'EmpleadoAlta');
    }
}
