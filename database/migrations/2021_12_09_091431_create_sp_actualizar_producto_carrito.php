<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpActualizarProductoCarrito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        
        DROP PROCEDURE IF EXISTS sp_actualizar_producto_carrito;
        
        CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_producto_carrito`(IN cliente INT, IN datil INT, IN cantidadRequerida BIGINT)
        inicio: BEGIN
        
        DECLARE stockDisponible BIGINT;
        DECLARE cantidadAnterior BIGINT;

        SELECT cantidad INTO cantidadAnterior FROM productoscarrito WHERE idCliente = cliente AND idDatil = datil;
        
        IF (cantidadAnterior = cantidadRequerida) THEN
        
                SELECT 
                'error' as tipo,
                'Favor de cambiar la cantidad a actualizar' as mensaje;
                
                LEAVE inicio;
                
        END IF;
    
        START TRANSACTION;
            
        SELECT stock INTO stockDisponible FROM datiles WHERE idDatil = datil FOR UPDATE;

        IF (stockDisponible < cantidadRequerida) THEN
                SELECT 
                'error' as tipo,
                'No hay Stock suficiente para completar tu pedido' as mensaje;
                
                LEAVE inicio;
        END IF;

        UPDATE productoscarrito SET cantidad = cantidadRequerida WHERE idCliente = cliente AND idDatil = cliente;

        SELECT 
        'mensaje' as tipo,
        'Producto actualizado correctamente' as mensaje;

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
        Schema::dropIfExists('sp_actualizar_producto_carrito');
    }
}
