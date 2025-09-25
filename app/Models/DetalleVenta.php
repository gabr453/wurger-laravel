<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_venta';
    protected $primaryKey = 'id_detalle_venta';
    public $timestamps = false;

    protected $fillable = [
        'Cantidad_detalle_venta',
        'Precio_unitario',
        'Subtotal',
        'Descuento',
        'id_venta_FK'
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta_FK', 'id_venta');
    }
}
