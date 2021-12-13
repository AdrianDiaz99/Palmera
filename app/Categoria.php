<?php

namespace App;

use App\DataBase\CategoriaDAO;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    protected $table      = "Categorias";
    protected $primaryKey = 'CatID';
    protected $fillable   = ['CatNombre'];
    public $timestamps    = false;

    private $categoriaDAO;

    public function __construct()
    {

        $this->categoriaDAO = new CategoriaDAO();

    }

    /* GETTERS Y SETTERS */
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

    /* FUNCIONES DEL DOMINIO DEL PROBLEMA */
    public function getCategorias()
    {

        return $this->categoriaDAO->getCategorias();

    }

    /* FUNCIONES DE ASOCIACIÓN ENTRE CLASES */
    public function predios()
    {

        return $this->hasMany(Predio::class, 'categoria');

    }
    
}