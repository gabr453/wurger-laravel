<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    use HasFactory;

    protected $table = 'forma_pago';
    protected $primaryKey = 'id_fp';
       public $timestamps = false;

    protected $fillable = [
        'Nombre_fp',
        'id_venta_FK'
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta_FK', 'id_venta');
    }
}
