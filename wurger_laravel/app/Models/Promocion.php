<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    protected $table = 'promocion';
        public $timestamps = false;
 
    protected $primaryKey = 'id_promocion';

    protected $fillable = [
        'Nombre_promocion',
        'Inicio_promocion',
        'Fin_promocion',
        'Cantidad_us_promocion',
        'Estado_promocion',
        'Descripcion_promocion',
        'id_producto_FK',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto_FK');
    }
}
