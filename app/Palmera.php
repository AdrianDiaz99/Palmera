<?php

namespace App;

use App\DataBase\PalmeraDAO;
use Illuminate\Database\Eloquent\Model;

class Palmera extends Model
{

    protected $table      = 'Palmeras';
    protected $primaryKey = 'IdPalmera';
    protected $fillable   = ['IdPalmera', 'Variedad', 'Predio', 'Categoria', 'Empleado', 'Estatus'];
    protected $keyType    = 'string';
    public $incrementing  = false;

    private $palmeraDAO;
    private Actividad $actividad;

    public function __construct()
    {

        $this->palmeraDAO = new PalmeraDAO();
        $this->actividad = new Actividad();
    }

    /* GETTERS Y SETTERS */
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

        return $this->belongsTo(Variedad::class, 'Variedad');
    }

    public function objetoCategoria()
    {

        return $this->belongsTo(Categoria::class, 'Categoria');
    }

    public function objetoEmpleado()
    {

        return $this->belongsTo(Empleado::class, 'Empleado');
    }

    /* FUNCIONES DEL DOMINIO DEL PROBLEMA */
    public function programarActividad($idPalmera, $idActividad, $frecuencia, $fechaInicio, $fechaFin)
    {

        return $this->palmeraDAO->programarActividad($idPalmera, $idActividad, $frecuencia, $fechaInicio, $fechaFin);
    }

    public function getActividades($palmera)
    {
        return $this->actividad->getActividades($palmera);
    }
}
