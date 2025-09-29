<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedor';
    protected $primaryKey = 'id_proveedor';
    public $timestamps = false;

    protected $fillable = [
        'Nom_proveedor',
        'Tel_proveedor',
        'Email_proveedor',
        'Direccion_proveedor',
        'Estado_proveedor',
        'id_usuario_FK',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario_FK', 'id_usuario');
    }
}
