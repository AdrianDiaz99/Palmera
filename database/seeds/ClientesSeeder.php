<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Clientes')->insert([
            'Correo' => 'cliente1@correo.com',
            'Nombre' => 'ITZEL CAROLINA BANUELOS CAMACHO',
            'Telefono' => '6685478595'
        ]);

        DB::table('Clientes')->insert([
            'Correo' => 'cliente2@correo.com',
            'Nombre' => 'JOEL EDUARDO RIVERA FELIX',
            'Telefono' => '6685478595'
        ]);
    }
}
