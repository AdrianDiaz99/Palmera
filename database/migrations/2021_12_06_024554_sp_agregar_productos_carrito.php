<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpAgregarProductosCarrito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        DB::unprepared("
        
        DROP PROCEDURE IF EXISTS sp_agregar_productos_carrito;
        
        CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_agregar_productos_carrito`(IN cliente INT, IN datil INT, IN cantidadRequerida BIGINT)
        inicio: BEGIN

            DECLARE stockDisponible BIGINT;
            
            START TRANSACTION;
                
            SELECT stock INTO stockDisponible FROM datiles WHERE idDatil = datil FOR UPDATE;

            IF (stockDisponible < cantidadRequerida) THEN
                    SELECT 
                    'error' as tipo,
                    'No hay Stock suficiente para completar tu pedido' as mensaje;
                    
                    LEAVE inicio;
            END IF;

            IF EXISTS (SELECT TRUE FROM productoscarrito WHERE idCliente = cliente AND idDatil = datil) THEN
                
                IF EXISTS (SELECT TRUE FROM productoscarrito WHERE idCliente = cliente AND idDatil = datil AND (cantidadRequerida + cantidad > stockDisponible )) THEN
                
                    SELECT 
                    'error' as tipo,
                    'No hay Stock suficiente para completar tu pedido' as mensaje;
                    
                    LEAVE inicio;
                
                END IF;
                
                UPDATE productoscarrito SET cantidad = cantidad + cantidadRequerida
                WHERE idCliente = cliente AND idDatil = datil;
                
                SELECT 
                    'mensaje' as tipo,
                    'Su producto ya estaba en el carrito, se actualizo la cantidad' as mensaje;
                
            ELSE
            
                INSERT INTO productoscarrito(idCliente, idDatil, cantidad) VALUES(cliente, datil, cantidadRequerida);
                
                SELECT 
                    'mensaje' as tipo,
                    'Producto agregados al carrito' as mensaje;
                
            END IF;

        COMMIT;

        END");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        DB::unprepared('DROP PROCEDURE `sp_agregar_productos_carrito` ');

    }
}
