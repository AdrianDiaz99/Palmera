<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('Datiles')->insert([
            'Categoria' => 1,
            'Variedad' => 1,
            'Precio' => 50.0,
            'Stock' => 1000.0
        ]);

        DB::table('Datiles')->insert([
            'Categoria' => 2,
            'Variedad' => 1,
            'Precio' => 25.0,
            'Stock' => 1000.0
        ]);

        DB::table('Datiles')->insert([
            'Categoria' => 1,
            'Variedad' => 2,
            'Precio' => 100.0,
            'Stock' => 1000.0
        ]);

        DB::table('Datiles')->insert([
            'Categoria' => 2,
            'Variedad' => 3,
            'Precio' => 49.0,
            'Stock' => 1000.0
        ]);

        DB::table('Datiles')->insert([
            'Categoria' => 1,
            'Variedad' => 4,
            'Precio' => 150.0,
            'Stock' => 1000.0
        ]);

        DB::table('Datiles')->insert([
            'Categoria' => 2,
            'Variedad' => 4,
            'Precio' => 110.0,
            'Stock' => 1000.0
        ]);

    }
}
