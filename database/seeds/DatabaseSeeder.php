<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ControlConcurrenciaSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(TiposDeSueloSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TiposEmpleadoSeeder::class);
        $this->call(EmpleadosSeeder::class);
        $this->call(PrediosSeeder::class);
        $this->call(UbicacionesSeeder::class);
    }
}
