<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PalmerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Palmeras')->insert([
            'IdPalmera' => 'PAL001',
            'Variedad' => 1,
            'Predio' => 'P001',
            'Categoria' => 1,
            'Empleado' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Palmeras')->insert([
            'IdPalmera' => 'PAL002',
            'Variedad' => 2,
            'Predio' => 'P001',
            'Categoria' => 1,
            'Empleado' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Palmeras')->insert([
            'IdPalmera' => 'PAL003',
            'Variedad' => 4,
            'Predio' => 'P001',
            'Categoria' => 2,
            'Empleado' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('Palmeras')->insert([
            'IdPalmera' => 'PAL004',
            'Variedad' => 3,
            'Predio' => 'P002',
            'Categoria' => 1,
            'Empleado' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Palmeras')->insert([
            'IdPalmera' => 'PAL005',
            'Variedad' => 3,
            'Predio' => 'P002',
            'Categoria' => 2,
            'Empleado' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Palmeras')->insert([
            'IdPalmera' => 'PAL006',
            'Variedad' => 4,
            'Predio' => 'P002',
            'Categoria' => 2,
            'Empleado' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('Palmeras')->insert([
            'IdPalmera' => 'PAL007',
            'Variedad' => 2,
            'Predio' => 'P003',
            'Categoria' => 1,
            'Empleado' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Palmeras')->insert([
            'IdPalmera' => 'PAL008',
            'Variedad' => 2,
            'Predio' => 'P003',
            'Categoria' => 2,
            'Empleado' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Palmeras')->insert([
            'IdPalmera' => 'PAL009',
            'Variedad' => 4,
            'Predio' => 'P003',
            'Categoria' => 1,
            'Empleado' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('Palmeras')->insert([
            'IdPalmera' => 'PAL010',
            'Variedad' => 1,
            'Predio' => 'P004',
            'Categoria' => 1,
            'Empleado' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Palmeras')->insert([
            'IdPalmera' => 'PAL011',
            'Variedad' => 1,
            'Predio' => 'P004',
            'Categoria' => 2,
            'Empleado' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Palmeras')->insert([
            'IdPalmera' => 'PAL012',
            'Variedad' => 1,
            'Predio' => 'P004',
            'Categoria' => 1,
            'Empleado' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('Palmeras')->insert([
            'IdPalmera' => 'PAL013',
            'Variedad' => 1,
            'Predio' => 'P005',
            'Categoria' => 1,
            'Empleado' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Palmeras')->insert([
            'IdPalmera' => 'PAL014',
            'Variedad' => 4,
            'Predio' => 'P005',
            'Categoria' => 1,
            'Empleado' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Palmeras')->insert([
            'IdPalmera' => 'PAL015',
            'Variedad' => 1,
            'Predio' => 'P005',
            'Categoria' => 1,
            'Empleado' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
