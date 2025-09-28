<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tipo_descuento', function (Blueprint $table) {
            $table->id('id_tipo_descuento'); // AUTO_INCREMENT
            $table->string('Nombre_tipo_descuento', 30);

            // Relación con forma_pago (FK)
            $table->foreignId('id_fp_FK')
                  ->constrained('forma_pago', 'id_fp')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipo_descuento');
    }
};
