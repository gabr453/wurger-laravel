<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';
    public $timestamps = false; // porque la tabla no tiene created_at/updated_at

    protected $fillable = [
        'Nombre_producto',
        'Stock_producto',
        'Stock_min_producto',
        'Stock_max_producto',
        'Precio_recibimiento',
        'Precio_venta',
        'Tipo_producto',
        'Estado_producto',
        'Fecha_ingreso_producto',
        'id_categoria_FK'
    ];

    // Relación con categoría
    public function categoria()
    {
        return $this->belongsTo(CategoriaProducto::class, 'id_categoria_FK', 'id_categoria');
    }
}
