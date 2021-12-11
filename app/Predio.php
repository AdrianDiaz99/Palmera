<?php

namespace App;

use App\DataBase\PredioDAO;
use Illuminate\Database\Eloquent\Model;

class Predio extends Model
{

    protected $table      = 'predios';
    protected $primaryKey = 'PreID';
    protected $fillable   = ['PreID', 'PreFactorLluvia', 'PreFactorHumedad', 'PreFactorResequedad', 'PreHectareas', 'PreTipoSuelo', 'Categoria', 'EmpleadoAlta'];
    protected $keyType    = 'string';
    public $incrementing  = false;

    private $predioDAO;
    private $categoria;
    private $tipoDeSuelo;

    public function __construct()
    {
        
        $this->predioDAO   = new PredioDAO();
        $this->categoria   = new Categoria();
        $this->tipoDeSuelo = new TipoDeSuelo();
        
    }

    /* GETTERS Y SETTERS */
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

    /* FUNCIONES DEL DOMINIO DEL PROBLEMA */
    public function getCategorias()
    {

        return $this->categoria->getCategorias();

    }

    public function getTiposSuelo()
    {

        return $this->tipoDeSuelo->getTiposDeSuelo();

    }

    public function crearTipoSuelo()
    {

        return new TipoDeSuelo();

    }

    public function crearPalmera()
    {

        return new Palmera();

    }

    public function crearCategoria()
    {

        return new Categoria();

    }

    public function getPagination($collection)
    {

        return $this->predioDAO->paginate($collection, 5, $page = null);

    }

    public function getPredios()
    {

        return $this->predioDAO->getPredios();

    }

    /* FUNCIONES DE ASOCIACIÓN ENTRE CLASES */
    /* Relacion n:1 Predios - Categorias/Usuarios */
    public function objetoCategoria()
    {

        return $this->belongsTo(Categoria::class, 'Categoria');

    }

    /* Relacion n:1 Predios - Categorias/Usuarios */
    public function objetoTipoSuelo()
    {

        return $this->belongsTo(TipoDeSuelo::class, 'PreTipoSuelo');

    }

    public function objetoEmpleado()
    {

        return $this->belongsTo(Empleado::class, 'EmpleadoAlta');

    }

    public function getPalmeras()
    {

        return $this->hasMany(Palmera::class, 'Predio');

    }

}