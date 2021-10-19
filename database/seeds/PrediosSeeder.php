<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrediosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('predios')->insert([
            'FactorLluvia' => 90.9,
            'FactorHumedad' => 99,
            'FactorResequedad' => 0.1,
            'Hectareas' => 10,
            'categoria' => 1,
            'user_id' => 1,
            'estatus' => 1
        ]);

        DB::table('predios')->insert([
            'FactorLluvia' => 80.9,
            'FactorHumedad' => 80,
            'FactorResequedad' => 12.1,
            'Hectareas' => 16,
            'categoria' => 1,
            'user_id' => 2,
            'estatus' => 1
        ]);

        DB::table('predios')->insert([
            'FactorLluvia' => 50.0,
            'FactorHumedad' => 50.0,
            'FactorResequedad' => 50.0,
            'Hectareas' => 7,
            'categoria' => 2,
            'user_id' => 1,
            'estatus' => 0
        ]);

        DB::table('predios')->insert([
            'FactorLluvia' => 73.3,
            'FactorHumedad' => 70,
            'FactorResequedad' => 29.3,
            'Hectareas' => 20,
            'categoria' => 2,
            'user_id' => 3,
            'estatus' => 1
        ]);

        DB::table('predios')->insert([
            'FactorLluvia' => 13.3,
            'FactorHumedad' => 10,
            'FactorResequedad' => 60.3,
            'Hectareas' => 3,
            'categoria' => 2,
            'user_id' => 2,
            'estatus' => 1
        ]);

        DB::table('predios')->insert([
            'FactorLluvia' => 100,
            'FactorHumedad' => 100,
            'FactorResequedad' => 0,
            'Hectareas' => 16,
            'categoria' => 1,
            'user_id' => 1,
            'estatus' => 1
        ]);

    }
}
