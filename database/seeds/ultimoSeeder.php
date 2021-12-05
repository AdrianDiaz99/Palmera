<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ultimoSeeder extends Seeder
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
    }
}
