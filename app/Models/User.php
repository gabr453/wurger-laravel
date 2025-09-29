<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'Nom_usuario',
        'Apellido_usuario',
        'Cedula_usuario',
        'Salario_usuario',
        'Rol_usuario',
        'password', // si tienes autenticación
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function proveedores()
    {
        return $this->hasMany(Proveedor::class, 'id_usuario_FK');
    }

}
