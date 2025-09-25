<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';
    protected $primaryKey = 'id_pedido';
    public $timestamps = false; // tu tabla no tiene created_at ni updated_at

    protected $fillable = [
        'Fecha_pedido',
        'Observaciones_devoluciones',
        'Estado_pedido',
        'id_cliente_FK'
    ];

    // Relación con Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente_FK', 'id_cliente');
    }
}
