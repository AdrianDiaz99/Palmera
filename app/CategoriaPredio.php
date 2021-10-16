<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaPredio extends Model
{
    protected $table = "CategoriasPredios";
    protected $fillable = ['CatNombre'];
}
