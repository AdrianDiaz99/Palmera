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
        $this->call(TiposDeSueloSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(TiposEmpleadoSeeder::class);
        $this->call(EmpleadosSeeder::class);
        $this->call(ControlConcurrenciaSeeder::class);
        $this->call(PrediosSeeder::class);
        $this->call(UbicacionesSeeder::class);
        $this->call(ClientesSeeder::class);
        $this->call(VariedadesSeeder::class);
        $this->call(DatilesSeeder::class);
        $this->call(ActividadesSeeder::class);
        $this->call(PalmerasSeeder::class);
    }
}
