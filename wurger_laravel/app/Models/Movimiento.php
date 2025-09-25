<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $table = 'movimiento'; // nombre de la tabla

    protected $primaryKey = 'id_movimiento';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'Tipo_movimiento',
        'Cantidad_movimiento',
        'Fecha_movimiento',
        'Descripcion_movimiento',
        'id_producto_FK'
    ];

    /**
     * Relación con Producto
     * Un movimiento pertenece a un producto
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto_FK', 'id_producto');
    }

    // Desactivamos timestamps si no existen columnas created_at y updated_at
    public $timestamps = false;
}
