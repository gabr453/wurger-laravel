<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDescuento extends Model
{
    use HasFactory;

    protected $table = 'tipo_descuento';
    protected $primaryKey = 'id_tipo_descuento';
    public $timestamps = false;

    protected $fillable = [
        'Nombre_tipo_descuento',
        'id_fp_FK'
    ];

    // Relación con FormaPago
    public function formaPago()
    {
        return $this->belongsTo(FormaPago::class, 'id_fp_FK', 'id_fp');
    }
}