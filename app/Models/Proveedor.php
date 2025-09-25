<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedor';
    protected $primaryKey = 'id_proveedor';
    public $timestamps = false; // Si tu tabla no tiene created_at y updated_at

    protected $fillable = [
        'Nom_proveedor',
        'Tel_proveedor',
        'Email_proveedor',
        'Direccion_proveedor',
        'Estado_proveedor',
        'id_usuario_FK',
    ];

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario_FK');
    }
}
