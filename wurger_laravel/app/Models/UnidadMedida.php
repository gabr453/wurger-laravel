<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;

    protected $table = 'unidad_medida'; // nombre de la tabla

    protected $primaryKey = 'id_unidad';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'Nombre_unidad',
        'Cantidad_unidad',
        'id_producto_FK'
    ];

    /**
     * Relación con Producto
     * Una unidad pertenece a un producto
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto_FK', 'id_producto');
    }

    // Desactivamos timestamps si no existen columnas created_at y updated_at
    public $timestamps = false;
}
