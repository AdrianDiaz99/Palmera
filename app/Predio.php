<?php

namespace App;

use App\DataBase\PredioDAO;
use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{
    protected $table = 'predios';
    protected $primaryKey = 'PreID';
    protected $fillable = ['PreID', 'PreFactorLluvia', 'PreFactorHumedad', 'PreFactorResequedad', 'PreHectareas', 'PreTipoSuelo', 'Categoria', 'EmpleadoAlta'];
    protected $keyType = 'string';
    public $incrementing = false;

    private $dao;

    public function __construct()
    {
        parent::__construct();
        $this->dao = new PredioDAO();
    }

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
        return $this->belongsTo(Categorias::class, 'Categoria');
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

    public function getPalmeras()
    {
        return $this->hasMany(Palmera::class, 'Predio');
    }

    //Funciones del modelo
    public function crearTipoSuelo()
    {
        return new TiposDeSuelo();
    }

    public function crearPalmera()
    {
        return new Palmera();
    }

    public function crearCategoria()
    {
        return new Categorias();
    }

    public function getPagination($collection)
    {
        return $this->dao->paginate($collection, 5, $page = null);
    }

    public function getPredios()
    {
        return $this->dao->getPredios();
    }
}
