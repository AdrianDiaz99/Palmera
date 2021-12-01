<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaPredio extends Model
{
    protected $table = "CategoriasPredios";
    protected $primaryKey = 'CatId';
    protected $fillable = ['CatNombre'];
    public $timestamps = false;

    public function getId()
    {

        return $this->CatId;
    }

    public function setId($id)
    {

        $this->CatId = $id;
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
