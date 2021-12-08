<?php

namespace App\DataBase;

use App\Actividad;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


class ProgramarActividadesPalmerasDAO extends DataBase
{
    public function getActividades()
    {
        return Actividad::where('Estatus', 1)->get(['IdActividad', 'ActNombre', 'ActDescripcion', 'ActCosto']);
    }

    public function getPalmeras($predio)
    {
        return $this->paginate($predio->Palmeras, 2, $page = null);
    }

    public function paginate($items, $perPage = 2, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);
    }
}
