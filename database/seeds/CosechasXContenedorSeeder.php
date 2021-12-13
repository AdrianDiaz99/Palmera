<?php

use Illuminate\Database\Seeder;

class CosechasXContenedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Cosechasxcontenedor')->insert([
            'idPalmera' => 'PAL001',
            'Año' => '2021',
            'Consecutivo' => 1,
            'ConID' => 1,
            'KilosDepositados' => 1000.0
        ]);

        DB::table('Cosechasxcontenedor')->insert([
            'idPalmera' => 'PAL002',
            'Año' => '2021',
            'Consecutivo' => 2,
            'ConID' => 2,
            'KilosDepositados' => 1000.0
        ]);
        
        DB::table('Cosechasxcontenedor')->insert([
            'idPalmera' => 'PAL003',
            'Año' => '2021',
            'Consecutivo' => 3,
            'ConID' => 3,
            'KilosDepositados' => 1000.0
        ]);        

        DB::table('Cosechasxcontenedor')->insert([
            'idPalmera' => 'PAL005',
            'Año' => '2021',
            'Consecutivo' => 4,
            'ConID' => 4,
            'KilosDepositados' => 1000.0
        ]);
        
        DB::table('Cosechasxcontenedor')->insert([
            'idPalmera' => 'PAL009',
            'Año' => '2021',
            'Consecutivo' => 5,
            'ConID' => 5,
            'KilosDepositados' => 1000.0
        ]);
        
        DB::table('Cosechasxcontenedor')->insert([
            'idPalmera' => 'PAL011',
            'Año' => '2021',
            'Consecutivo' => 6,
            'ConID' => 6,
            'KilosDepositados' => 1000.0
        ]);        
    }
}
