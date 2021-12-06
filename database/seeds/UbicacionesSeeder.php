<?php

use App\Ubicaciones;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UbicacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ubicacion = new Ubicaciones(
            array(
                "Coordenadas" => 333.33333,
                "Predio" => 'P001'
            )
        );
        $ubicacion->saveOrFail();

        $ubicacion = new Ubicaciones(
            array(
                "Coordenadas" => 444.444444,
                "Predio" => 'P001'
            )
        );
        $ubicacion->saveOrFail();

        $ubicacion = new Ubicaciones(
            array(
                "Coordenadas" => 555.555555,
                "Predio" => 'P001'
            )
        );
        $ubicacion->saveOrFail();

        $ubicacion = new Ubicaciones(
            array(
                "Coordenadas" => 333.33333,
                "Predio" => 'P002'
            )
        );
        $ubicacion->saveOrFail();

        $ubicacion = new Ubicaciones(
            array(
                "Coordenadas" => 444.444444,
                "Predio" => 'P002'
            )
        );
        $ubicacion->saveOrFail();

        $ubicacion = new Ubicaciones(
            array(
                "Coordenadas" => 555.555555,
                "Predio" => 'P002'
            )
        );
        $ubicacion->saveOrFail();

        $ubicacion = new Ubicaciones(
            array(
                "Coordenadas" => 333.33333,
                "Predio" => 'P003'
            )
        );
        $ubicacion->saveOrFail();

        $ubicacion = new Ubicaciones(
            array(
                "Coordenadas" => 444.444444,
                "Predio" => 'P003'
            )
        );
        $ubicacion->saveOrFail();

        $ubicacion = new Ubicaciones(
            array(
                "Coordenadas" => 555.555555,
                "Predio" => 'P003'
            )
        );
        $ubicacion->saveOrFail();

        $ubicacion = new Ubicaciones(
            array(
                "Coordenadas" => 333.33333,
                "Predio" => 'P004'
            )
        );
        $ubicacion->saveOrFail();

        $ubicacion = new Ubicaciones(
            array(
                "Coordenadas" => 444.444444,
                "Predio" => 'P004'
            )
        );
        $ubicacion->saveOrFail();

        $ubicacion = new Ubicaciones(
            array(
                "Coordenadas" => 555.555555,
                "Predio" => 'P004'
            )
        );
        $ubicacion->saveOrFail();

        $ubicacion = new Ubicaciones(
            array(
                "Coordenadas" => 333.33333,
                "Predio" => 'P005'
            )
        );
        $ubicacion->saveOrFail();

        $ubicacion = new Ubicaciones(
            array(
                "Coordenadas" => 444.444444,
                "Predio" => 'P005'
            )
        );
        $ubicacion->saveOrFail();

        $ubicacion = new Ubicaciones(
            array(
                "Coordenadas" => 555.555555,
                "Predio" => 'P005'
            )
        );
        $ubicacion->saveOrFail();
    }
}
