<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('Nom_usuario', 30);
            $table->string('Apellido_usuario', 30)->nullable();
            $table->string('Cedula_usuario', 20)->unique()->nullable();
            $table->decimal('Salario_usuario', 10, 2)->nullable();
            $table->date('Fecha_ingreso_usuario')->nullable();
            $table->date('Fecha_nac_usuario')->nullable();
            $table->enum('Sexo_usuario', ['M', 'F', 'Otro'])->nullable();
            $table->string('Tel_usuario', 20)->nullable();
            $table->string('Email_usuario', 50)->unique();
            $table->string('Password_usuario', 100);
            $table->enum('Estado_usuario', ['Activo', 'Inactivo'])->default('Activo');
            $table->enum('rol', ['Admin', 'Usuario'])->default('Usuario');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
