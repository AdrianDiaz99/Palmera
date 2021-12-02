<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Empleados')->insert([
            'EmpCorreo' => 'correo@correo.com',
            'EmpDomicilio' => 'Calle Del Vaso #4567 Col. Las Flautas C.P. 80000',
            'EmpNombre' => 'JESUS ADRIAN DIAZ OROZCO',
            'EmpTelefono' => '6685478595',
            'TipoEmpleado' => '1'
        ]);
        DB::table('Empleados')->insert([
            'EmpCorreo' => 'correo2@correo.com',
            'EmpDomicilio' => 'Calle Del Pastel #4555 Col. Las Lumbres C.P. 80100',
            'EmpNombre' => 'MANUEL ALBERTO SOTELO RIVAS',
            'EmpTelefono' => '6695847562',
            'TipoEmpleado' => '1'
        ]);
        DB::table('Empleados')->insert([
            'EmpCorreo' => 'correo3@correo.com',
            'EmpDomicilio' => 'Calle Del Cerro #1234 Col. Las Americas C.P. 80200',
            'EmpNombre' => 'RAUL IVAN FRAGOSO SANCHEZ',
            'EmpTelefono' => '6685254634',
            'TipoEmpleado' => '1'
        ]);
    }
}
