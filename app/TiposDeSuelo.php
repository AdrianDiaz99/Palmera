<?php

namespace App;

use App\DataBase\TiposDeSueloDAO;
use Illuminate\Database\Eloquent\Model;

class TiposDeSuelo extends Model
{
    protected $table = "TiposDeSuelo";
    protected $primaryKey = 'SueloId';
    protected $fillable = ['SueloNombre'];
    public $timestamps = false;

    private $dao;

    public function __construct()
    {
        parent::__construct();
        $this->dao = new TiposDeSueloDAO();
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

    //Funciones del modelo
    public function getTiposSuelo()
    {
        return $this->dao->getTiposSuelo();
    }
}
