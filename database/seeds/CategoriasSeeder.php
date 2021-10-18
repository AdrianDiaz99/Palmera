<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoriaspredios')->insert([
            'CatNombre' => 'Orgánico'
        ]);

        DB::table('categoriaspredios')->insert([
            'CatNombre' => 'No orgánico'
        ]);
    }
}
