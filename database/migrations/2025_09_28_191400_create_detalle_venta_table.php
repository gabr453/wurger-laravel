<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            // id_detalle_venta como BIGINT UNSIGNED auto-increment (coincide con $table->id())
            $table->id('id_detalle_venta');

            $table->integer('Cantidad_detalle_venta');
            $table->decimal('Precio_unitario', 10, 2);
            $table->decimal('Subtotal', 10, 2);
            $table->decimal('Descuento', 10, 2)->nullable();

            // FK hacia venta.id_venta -> usamos foreignId para crear unsignedBigInteger
            $table->foreignId('id_venta_FK')
                  ->constrained('venta', 'id_venta')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_venta');
    }
};
