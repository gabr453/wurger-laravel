<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoTerminado extends Model
{
    use HasFactory;

    protected $table = 'producto_terminado';
    protected $primaryKey = 'id_producto_terminado';
    public $timestamps = false; // como no tienes created_at ni updated_at

    protected $fillable = [
        'Nombre_producto_terminado',
        'Descripcion_producto_terminado',
        'Categoria_producto_terminado',
        'Costo_producto_terminado',
        'Precio_producto_terminado',
        'Stock_actual_producto_terminado',
        'Stock_min_producto_terminado',
        'Estado_producto_terminado',
        'Fecha_ingreso_producto_terminado',
        'id_producto_FK',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto_FK');
    }
}
