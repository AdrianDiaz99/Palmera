<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    protected $table = 'predios';
    protected $fillable = ['factorLluvia', 'factorHumedad', 'factorResequedad', 'hectareas', 'categoria', 'user_id'];
    protected $keyType = 'string';
    public $incrementing = false;

    public function asignarVariables($factorLluvia, $factorHumedad, $factorResequedad, $hectareas, $categoria, $user_id)
    {
        $this->factorLluvia = $factorLluvia;
        $this->factorHumedad = $factorHumedad;
        $this->factorResequedad = $factorResequedad;
        $this->hectareas = $hectareas;
        $this->categoria = $categoria;
        $this->user_id = $user_id;
    }

    public function getEstatus()
    {
        return $this->estatus;
    }

    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFactorLluvia()
    {
        return $this->FactorLluvia;
    }

    public function setFactorLluvia($factorLluvia)
    {
        $this->FactorLluvia = $factorLluvia;
    }

    public function getFactorHumedad()
    {
        return $this->FactorHumedad;
    }

    public function setFactorHumedad($factorHumedad)
    {
        $this->FactorHumedad = $factorHumedad;
    }

    public function getFactorResequedad()
    {
        return $this->FactorResequedad;
    }

    public function setFactorResequedad($factorResequedad)
    {
        $this->FactorResequedad = $factorResequedad;
    }

    public function getHectareas()
    {
        return $this->Hectareas;
    }
    public function setHectareas($hectareas)
    {
        $this->Hectareas = $hectareas;
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
        return $this->belongsTo(CategoriaPredio::class, 'categoria');
    }

    public function objetoUsuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
