<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Actividades')->insert([
            'ActNombre' => 'Eliminar hierba',
            'ActDescripcion' => 'Remover la hierba alrededor de la rama',
            'ActCosto' => 10,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Actividades')->insert([
            'ActNombre' => 'Podar palmera',
            'ActDescripcion' => 'Eliminar el exceso de hojas en los extremos',
            'ActCosto' => 5,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Actividades')->insert([
            'ActNombre' => 'Preparar tasa para riego',
            'ActDescripcion' => 'Dimensionar la tierra alrededor del tronco, para vertir el agua.',
            'ActCosto' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Actividades')->insert([
            'ActNombre' => 'Poner veneno',
            'ActDescripcion' => 'Colocar el veneno necesario alrededor de la palmera',
            'ActCosto' => 7,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Actividades')->insert([
            'ActNombre' => 'Realizar riego',
            'ActDescripcion' => 'Vertir 3 litros de agua sobre la palmera',
            'ActCosto' => 6,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Actividades')->insert([
            'ActNombre' => 'Poner fertilizante',
            'ActDescripcion' => 'Colocar 20mg de Fertilizante vegetal',
            'ActCosto' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Actividades')->insert([
            'ActNombre' => 'Aclarar racimo',
            'ActDescripcion' => 'Se realiza sobre la base del Datil',
            'ActCosto' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Actividades')->insert([
            'ActNombre' => 'Poner red',
            'ActDescripcion' => 'Colocar la malla, para cuando se realice la cosecha',
            'ActCosto' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Actividades')->insert([
            'ActNombre' => 'Recolectar',
            'ActDescripcion' => 'Realizar la cosecha de la palmera',
            'ActCosto' => 20,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('Actividades')->insert([
            'ActNombre' => 'Quitar red',
            'ActDescripcion' => 'Remover la malla, una vez se realizo la cosecha',
            'ActCosto' => 6,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
