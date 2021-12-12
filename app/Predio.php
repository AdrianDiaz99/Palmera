<?php

namespace App;

use App\DataBase\PredioDAO;
use Illuminate\Database\Eloquent\Model;


define('ORGANICO', 1);
define('NO_ORGANICO', 2);

class Predio extends Model
{

    protected $table      = 'predios';
    protected $primaryKey = 'PreID';
    protected $fillable   = ['PreID', 'PreFactorLluvia', 'PreFactorHumedad', 'PreFactorResequedad', 'PreHectareas', 'PreTipoSuelo', 'Categoria', 'EmpleadoAlta'];
    protected $keyType    = 'string';
    public $incrementing  = false;

    private  PredioDAO $dao;

    private Categoria $categoria;
    private TipoDeSuelo $tipoDeSuelo;
    private Palmera $palmera;


    public function __construct()
    {

        $this->dao   = new PredioDAO();
        $this->categoria   = new Categoria();
        $this->tipoDeSuelo = new TipoDeSuelo();
        $this->palmera      = new Palmera();
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

    public function validarCategoria()
    {
    }

    /**Funciones correspondientes al dominio del problema*/
    public function getActividades()
    {

        return $this->palmera->getActividades();
    }

    public function getCategorias()
    {

        return $this->categoria->getCategorias();
    }

    public function getTiposDeSuelo()
    {

        return $this->tipoDeSuelo->getTiposDeSuelo();
    }

    public function getPredios()
    {
        $args = func_get_args();

        if (count(func_get_args()) == 3) {
            return $this->dao->getPredios($args[0], $args[1], $args[2]);
        }

        return $this->dao->getPredios($args[0]);
    }

    public function getPrediosOrganicos()
    {

        $args = func_get_args();

        if (count(func_get_args()) == 2) {
            return $this->getPredios(ORGANICO, $args[0], $args[1]);
        }

        return $this->getPredios(ORGANICO);
    }

    public function getPrediosNoOrganicos()
    {
        $args = func_get_args();

        if (count(func_get_args()) == 2) {
            return $this->getPredios(NO_ORGANICO, $args[0], $args[1]);
        }

        return $this->getPredios(NO_ORGANICO);
    }

    public function agregarActividadPalmera($idPalmera, $idActividad, $frecuencia, $fechaInicio, $fechaFin)
    {

        return $this->palmera->agregarActividadPalmera($idPalmera, $idActividad, $frecuencia, $fechaInicio, $fechaFin);
    }

    public function agregarActividadPredio(Predio $predio, $idActividad, $frecuencia, $fechaInicio, $fechaFin)
    {
        return $this->dao->agregarActividadPredio($predio, $idActividad, $frecuencia, $fechaInicio, $fechaFin);
    }
}
