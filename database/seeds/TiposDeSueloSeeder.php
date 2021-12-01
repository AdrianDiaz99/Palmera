<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposDeSueloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('TiposDeSuelo')->insert([
            'SueloNombre' => 'Arcilloso'
        ]);
        DB::table('TiposDeSuelo')->insert([
            'SueloNombre' => 'Arenoso'
        ]);
        DB::table('TiposDeSuelo')->insert([
            'SueloNombre' => 'Calizo'
        ]);
        DB::table('TiposDeSuelo')->insert([
            'SueloNombre' => 'Mixto'
        ]);
    }
}
