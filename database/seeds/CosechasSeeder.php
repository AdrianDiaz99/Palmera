<?php

use Illuminate\Database\Seeder;

class CosechasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Cosechas')->insert([
            'idPalmera' => 'PAL001',
            'Año' => '2021',
            'Kilos' => 1000.0,
            'CostoCosecha' => 12000.0,
            'Categoria' => 1
        ]);

        DB::table('Cosechas')->insert([
            'idPalmera' => 'PAL002',
            'Año' => '2021',
            'Kilos' => 1000.0,
            'CostoCosecha' => 11000.0,
            'Categoria' => 1
        ]);        

        DB::table('Cosechas')->insert([
            'idPalmera' => 'PAL003',
            'Año' => '2021',
            'Kilos' => 1000.0,
            'CostoCosecha' => 5000.0,
            'Categoria' => 2
        ]);        

        DB::table('Cosechas')->insert([
            'idPalmera' => 'PAL005',
            'Año' => '2021',
            'Kilos' => 1000.0,
            'CostoCosecha' => 2000.0,
            'Categoria' => 2
        ]);

        DB::table('Cosechas')->insert([
            'idPalmera' => 'PAL009',
            'Año' => '2021',
            'Kilos' => 1000.0,
            'CostoCosecha' => 4000.0,
            'Categoria' => 1
        ]);        

        DB::table('Cosechas')->insert([
            'idPalmera' => 'PAL011',
            'Año' => '2021',
            'Kilos' => 1000.0,
            'CostoCosecha' => 16000.0,
            'Categoria' => 2
        ]);

    }
}
