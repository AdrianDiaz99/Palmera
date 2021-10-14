<?php

namespace App;

Class Predio
{

    private $factorLluvia;
    private $factorHumedad;
    private $factorResequedad;
    private $hectareas;
    private $userAlta;

    public function __construct($factorLluvia, $factorHumedad, $factorResequedad, $hectareas, $userAlta)
    {

        $this->factorLluvia = $factorLluvia;
        $this->factorHumedad = $factorHumedad;
        $this->factorResequedad = $factorResequedad;
        $this->hectareas = $hectareas;
        $this->userAlta = $userAlta;
        
    }

    /**
     * Get the value of factorLluvia
     */ 
    public function getFactorLluvia()
    {
        return $this->factorLluvia;
    }

    /**
     * Set the value of factorLluvia
     *
     * @return  self
     */ 
    public function setFactorLluvia($factorLluvia)
    {
        $this->factorLluvia = $factorLluvia;

        return $this;
    }

    /**
     * Get the value of factorHumedad
     */ 
    public function getFactorHumedad()
    {
        return $this->factorHumedad;
    }

    /**
     * Set the value of factorHumedad
     *
     * @return  self
     */ 
    public function setFactorHumedad($factorHumedad)
    {
        $this->factorHumedad = $factorHumedad;

        return $this;
    }

    /**
     * Get the value of factorResequedad
     */ 
    public function getFactorResequedad()
    {
        return $this->factorResequedad;
    }

    /**
     * Set the value of factorResequedad
     *
     * @return  self
     */ 
    public function setFactorResequedad($factorResequedad)
    {
        $this->factorResequedad = $factorResequedad;

        return $this;
    }

    /**
     * Get the value of hectareas
     */ 
    public function getHectareas()
    {
        return $this->hectareas;
    }

    /**
     * Set the value of hectareas
     *
     * @return  self
     */ 
    public function setHectareas($hectareas)
    {
        $this->hectareas = $hectareas;

        return $this;
    }


    /**
     * Get the value of userAlta
     */ 
    public function getUserAlta()
    {
        return $this->userAlta;
    }

    /**
     * Set the value of userAlta
     *
     * @return  self
     */ 
    public function setUserAlta($userAlta)
    {
        $this->userAlta = $userAlta;

        return $this;
    }
    
}