<?php

namespace App\DataBase;

use App\Categoria;
use Illuminate\Support\Facades\DB;

class CategoriaDAO extends DB
{

    public function getCategorias()
    {

        return Categoria::all();
        
    }

}