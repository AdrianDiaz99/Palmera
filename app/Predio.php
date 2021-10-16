<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predio
{
    private $id, $factorLluvia, $factorHumedad, $factorResequedad, $hectareas, $userAlta, $categoria, $estatus;

    public function __construct($factorLluvia, $factorHumedad, $factorResequedad, $hectareas, $userAlta, $categoria)
    {
        $this->factorLluvia = $factorLluvia;
        $this->factorHumedad = $factorHumedad;
        $this->factorResequedad = $factorResequedad;
        $this->hectareas = $hectareas;
        $this->userAlta = $userAlta;
        $this->categoria = $categoria;
    }

    public function getEstatus()
    {
        return $this->estatus;
    }

    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getFactorLluvia()
    {
        return $this->factorLluvia;
    }

    public function setFactorLluvia($factorLluvia)
    {
        $this->factorLluvia = $factorLluvia;

        return $this;
    }

    public function getFactorHumedad()
    {
        return $this->factorHumedad;
    }

    public function setFactorHumedad($factorHumedad)
    {
        $this->factorHumedad = $factorHumedad;

        return $this;
    }

    public function getFactorResequedad()
    {
        return $this->factorResequedad;
    }

    public function setFactorResequedad($factorResequedad)
    {
        $this->factorResequedad = $factorResequedad;

        return $this;
    }

    public function getHectareas()
    {
        return $this->hectareas;
    }
    public function setHectareas($hectareas)
    {
        $this->hectareas = $hectareas;

        return $this;
    }

    public function getUserAlta()
    {
        return $this->userAlta;
    }

    public function setUserAlta($userAlta)
    {
        $this->userAlta = $userAlta;

        return $this;
    }
}
