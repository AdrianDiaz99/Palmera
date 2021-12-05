<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('Variedades')->insert([
            'VarNombre' => 'Deglet Noor',
            'VarDescripcion' => 'Piel brillante con tonos claros y ligeramente arrugada.'
        ]);

        DB::table('Variedades')->insert([
            'VarNombre' => 'Medjool',
            'VarDescripcion' => 'Muy dulce, tierno y jugoso.'
        ]);

        DB::table('Variedades')->insert([
            'VarNombre' => 'Khadrawy',
            'VarDescripcion' => 'El más pequeño pero aún así sigue siendo incluso algo más jugosa, destacar que este dátil es muy blando y muy dulce.'
        ]);

        DB::table('Variedades')->insert([
            'VarNombre' => 'Halawy',
            'VarDescripcion' => 'Pequeño tamaño presentando una piel suave. Cuando llega a su punto idóneo de maduración consigue un sabor dulce muy peculiar.'
        ]);

    }
}
