<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ControlConcurrenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('ControlConcurrencia')->insert([
            'Tabla' => 'Predios',
            'IDSiguiente' => 'P001'
        ]);
    }
}
