<?php

namespace App;

use App\DataBase\CategoriasDAO;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $table = "Categorias";
    protected $primaryKey = 'CatID';
    protected $fillable = ['CatNombre'];
    public $timestamps = false;

    private $dao;

    public function __construct()
    {
        $this->dao = new CategoriasDAO();
    }

    public function getId()
    {

        return $this->CatID;
    }

    public function setId($id)
    {

        $this->CatID = $id;
    }

    public function getCatNombre()
    {
        return $this->CatNombre;
    }

    public function setCatNombre($CatNombre)
    {
        $this->$CatNombre = $CatNombre;
    }

    public function predios()
    {
        return $this->hasMany(Predio::class, 'categoria');
    }
}
