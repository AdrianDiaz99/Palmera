<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposEmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TiposEmpleado')->insert([
            'TipoNombre' => 'Especialista en Predios'
        ]);
    }
}
