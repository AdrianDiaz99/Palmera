<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaPredio extends Model
{
    protected $table = "CategoriasPredios";
    protected $fillable = ['CatNombre'];
    public $timestamps = false;

    public function __construct($CatNombre)
    {
        $this->CatNombre = $CatNombre;
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
        return $this->hasMany(PredioModel::class, 'categoria');
    }
}
