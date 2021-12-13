<?php

use Illuminate\Database\Seeder;

class ContenedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Contenedores')->insert([
            'idDatil' => 1,
            'Capacidad' => 10000,
            'KilosAlmacenados' => 1000.0,
            'KilosVendidos' => 0.0
        ]);

        DB::table('Contenedores')->insert([
            'idDatil' => 2,
            'Capacidad' => 10000,
            'KilosAlmacenados' => 1000.0,
            'KilosVendidos' => 0.0
        ]);

        DB::table('Contenedores')->insert([
            'idDatil' => 3,
            'Capacidad' => 10000,
            'KilosAlmacenados' => 1000.0,
            'KilosVendidos' => 0.0
        ]);        

        DB::table('Contenedores')->insert([
            'idDatil' => 4,
            'Capacidad' => 10000,
            'KilosAlmacenados' => 1000.0,
            'KilosVendidos' => 0.0
        ]);

        DB::table('Contenedores')->insert([
            'idDatil' => 5,
            'Capacidad' => 10000,
            'KilosAlmacenados' => 1000.0,
            'KilosVendidos' => 0.0
        ]);

        DB::table('Contenedores')->insert([
            'idDatil' => 6,
            'Capacidad' => 10000,
            'KilosAlmacenados' => 1000.0,
            'KilosVendidos' => 0.0
        ]);        

    }
}
