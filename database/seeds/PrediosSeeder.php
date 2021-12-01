d<?php

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class PrediosSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {

            $idPredio = DB::select("CALL sp_obtener_id('Predios')")[0]->v_idSiguiente;

            DB::table('predios')->insert([
                'PreID' => $idPredio,
                'PreFactorLluvia' => 90.9,
                'PreFactorHumedad' => 99,
                'PreFactorResequedad' => 0.1,
                'PreHectareas' => 10,
                'PreTipoSuelo' => 1,
                'Categoria' => 1,
                'EmpleadoAlta' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'estatus' => 1
            ]);

            $idPredio = DB::select("CALL sp_obtener_id('Predios')")[0]->v_idSiguiente;

            DB::table('predios')->insert([
                'PreID' => $idPredio,
                'PreFactorLluvia' => 90.9,
                'PreFactorHumedad' => 99,
                'PreFactorResequedad' => 0.1,
                'PreHectareas' => 10,
                'PreTipoSuelo' => 1,
                'Categoria' => 1,
                'EmpleadoAlta' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'estatus' => 1
            ]);

            $idPredio = DB::select("CALL sp_obtener_id('Predios')")[0]->v_idSiguiente;

            DB::table('predios')->insert([
                'PreID' => $idPredio,
                'PreFactorLluvia' => 90.9,
                'PreFactorHumedad' => 99,
                'PreFactorResequedad' => 0.1,
                'PreHectareas' => 10,
                'PreTipoSuelo' => 1,
                'Categoria' => 1,
                'EmpleadoAlta' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'estatus' => 1
            ]);

            $idPredio = DB::select("CALL sp_obtener_id('Predios')")[0]->v_idSiguiente;

            DB::table('predios')->insert([
                'PreID' => $idPredio,
                'PreFactorLluvia' => 90.9,
                'PreFactorHumedad' => 99,
                'PreFactorResequedad' => 0.1,
                'PreHectareas' => 10,
                'PreTipoSuelo' => 1,
                'Categoria' => 1,
                'EmpleadoAlta' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'estatus' => 1
            ]);

            $idPredio = DB::select("CALL sp_obtener_id('Predios')")[0]->v_idSiguiente;

            DB::table('predios')->insert([
                'PreID' => $idPredio,
                'PreFactorLluvia' => 90.9,
                'PreFactorHumedad' => 99,
                'PreFactorResequedad' => 0.1,
                'PreHectareas' => 10,
                'PreTipoSuelo' => 1,
                'Categoria' => 1,
                'EmpleadoAlta' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'estatus' => 1
            ]);

            $idPredio = DB::select("CALL sp_obtener_id('Predios')")[0]->v_idSiguiente;

            DB::table('predios')->insert([
                'PreID' => $idPredio,
                'PreFactorLluvia' => 90.9,
                'PreFactorHumedad' => 99,
                'PreFactorResequedad' => 0.1,
                'PreHectareas' => 10,
                'PreTipoSuelo' => 1,
                'Categoria' => 1,
                'EmpleadoAlta' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'estatus' => 1
            ]);

            $idPredio = DB::select("CALL sp_obtener_id('Predios')")[0]->v_idSiguiente;

            DB::table('predios')->insert([
                'PreID' => $idPredio,
                'PreFactorLluvia' => 90.9,
                'PreFactorHumedad' => 99,
                'PreFactorResequedad' => 0.1,
                'PreHectareas' => 10,
                'PreTipoSuelo' => 1,
                'Categoria' => 1,
                'EmpleadoAlta' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'estatus' => 1
            ]);
        }
    }
