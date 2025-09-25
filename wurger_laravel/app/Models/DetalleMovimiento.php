<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleMovimiento extends Model
{
    use HasFactory;

    protected $table = 'detalle_movimiento';
    protected $primaryKey = 'id_detalle_movimiento';
    public $timestamps = false;

    protected $fillable = [
        'Cantidad_detalle_movimiento',
        'id_movimiento_FK',
    ];

    public function movimiento()
    {
        return $this->belongsTo(Movimiento::class, 'id_movimiento_FK');
    }
}
