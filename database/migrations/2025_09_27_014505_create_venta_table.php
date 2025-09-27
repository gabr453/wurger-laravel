<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->id('id_venta');
            $table->date('Fecha_venta');
            $table->enum('Estado_venta', ['Pendiente', 'Pagada', 'Anulada']);
            
            // FK hacia usuario
            $table->unsignedBigInteger('id_usuario_FK');
            $table->foreign('id_usuario_FK')
                  ->references('id_usuario')
                  ->on('usuario')
                  ->onDelete('cascade'); // opcional

            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('venta');
    }
};
