<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'venta';
    protected $primaryKey = 'id_venta';
    public $timestamps = false; // la tabla no tiene created_at / updated_at

    protected $fillable = [
        'Fecha_venta',
        'Estado_venta',
        'id_usuario_FK'
    ];

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_FK');
    }

    // Relación con DetalleVenta
    public function detalleVenta()
    {
        return $this->hasMany(DetalleVenta::class, 'id_venta_FK');
    }
}
