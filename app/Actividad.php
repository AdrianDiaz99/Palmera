<?php

namespace App;

use App\DataBase\ActividadDAO;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{

    protected $table      = "Actividades";
    protected $primaryKey = 'IdActividad';
    protected $fillable   = ['ActNombre', 'ActDescripcion', 'ActCosto'];

    private $frecuencia;
    private $fechaInicio;
    private $fechaFin;

    private $dao;

    public function __construct()
    {

        $this->dao = new ActividadDAO();
    }


    /* GETTERS Y SETTERS */
    public function getFrecuencia()
    {

        return $this->frecuencia;
    }

    public function getFechaInicio()
    {

        return $this->fechaInicio;
    }

    public function getFechaFin()
    {

        return $this->fechaFin;
    }

    public function setFrecuencia($frecuencia)
    {

        $this->frecuencia = $frecuencia;
    }

    public function setFechaInicio($fechaInicio)
    {

        $this->fechaInicio = $fechaInicio;
    }

    public function setFechaFin($fechaFin)
    {

        $this->fechaFin = $fechaFin;
    }

    public function getId()
    {

        return $this->IdActividad;
    }

    public function getNombre()
    {

        return $this->ActNombre;
    }

    public function getDescripcion()
    {

        return $this->ActDescripcion;
    }

    public function getCosto()
    {

        return $this->ActCosto;
    }


    /* FUNCIONES DEL DOMINIO DEL PROBLEMA */
    public function getActividades()
    {

        return $this->dao->getActividades();
    }
}
