<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->id('id_proveedor'); // AUTO_INCREMENT
            $table->string('Nom_proveedor', 30);
            $table->string('Tel_proveedor', 20)->nullable();
            $table->string('Email_proveedor', 30)->nullable();
            $table->string('Direccion_proveedor', 30)->nullable();
            $table->enum('Estado_proveedor', ['Activo', 'Inactivo'])->default('Activo');

            // Relación con usuario (FK)
            $table->foreignId('id_usuario_FK')
                  ->constrained('usuario', 'id_usuario')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proveedor');
    }
};
