<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Adrian',
            'email' => 'correo@correo.com',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'name' => 'Alberto',
            'email' => 'correo2@correo.com',
            'password' => Hash::make('12345678')
        ]);

        DB::table('users')->insert([
            'name' => 'Raul',
            'email' => 'correo3@correo.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
