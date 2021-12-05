<?php

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
        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 333.33333,
            'Predio' => 'P001'
        ]);
        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 444.444444,
            'Predio' => 'P001'
        ]);
        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 555.555555,
            'Predio' => 'P001'
        ]);

        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 333.33333,
            'Predio' => 'P002'
        ]);
        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 444.444444,
            'Predio' => 'P002'
        ]);
        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 555.555555,
            'Predio' => 'P002'
        ]);

        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 333.33333,
            'Predio' => 'P003'
        ]);
        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 444.444444,
            'Predio' => 'P003'
        ]);
        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 555.555555,
            'Predio' => 'P003'
        ]);

        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 333.33333,
            'Predio' => 'P004'
        ]);
        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 444.444444,
            'Predio' => 'P004'
        ]);
        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 555.555555,
            'Predio' => 'P004'
        ]);

        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 333.33333,
            'Predio' => 'P005'
        ]);
        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 444.444444,
            'Predio' => 'P005'
        ]);
        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 555.555555,
            'Predio' => 'P005'
        ]);

        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 333.33333,
            'Predio' => 'P006'
        ]);
        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 444.444444,
            'Predio' => 'P006'
        ]);
        DB::table('Ubicaciones')->insert([
            'Coordenadas' => 555.555555,
            'Predio' => 'P006'
        ]);

    }
}
