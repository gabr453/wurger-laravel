<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaTable extends Migration
{
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->id('id_venta'); // BIGINT UNSIGNED AUTO_INCREMENT
            $table->date('Fecha_venta');
            $table->enum('Estado_venta', ['Pendiente','Pagada','Anulada']);
            
            // FK hacia usuario.id_usuario -> deben coincidir: ambos unsignedBigInteger
            $table->unsignedBigInteger('id_usuario_FK');
            $table->foreign('id_usuario_FK')
                  ->references('id_usuario')
                  ->on('usuario')
                  ->onDelete('cascade'); // opcional: cascade al borrar usuario

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('venta');
    }
}
