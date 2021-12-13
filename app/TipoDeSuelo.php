<?php

namespace App;

use App\DataBase\TipoDeSueloDAO;
use Illuminate\Database\Eloquent\Model;

class TipoDeSuelo extends Model
{

    protected $table      = "TiposDeSuelo";
    protected $primaryKey = 'SueloId';
    protected $fillable   = ['SueloNombre'];
    public $timestamps    = false;

    private $tipoDeSueloDAO;

    public function __construct()
    {

        $this->tipoDeSueloDAO = new TipoDeSueloDAO();

    }

    public function getTiposDeSuelo()
    {

        return $this->tipoDeSueloDAO->getTiposSuelo();
        
    }

    public function getSueloId()
    {

        return $this->SueloID;

    }

    public function setId($SueloId)
    {

        $this->SueloID = $SueloId;

    }

    public function getSueloNombre()
    {
        return $this->SueloNombre;

    }

    public function setSueloNombre($SueloNombre)
    {

        $this->$SueloNombre = $SueloNombre;

    }

    public function predios()
    {

        return $this->hasMany(Predio::class, 'PreTipoSuelo');

    }

}