<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('forma_pago', function (Blueprint $table) {
            // id_fp como BIGINT UNSIGNED auto-increment
            $table->id('id_fp');

            $table->string('Nombre_fp', 30);

            // FK hacia venta.id_venta
            $table->foreignId('id_venta_FK')
                  ->constrained('venta', 'id_venta')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forma_pago');
    }
};
