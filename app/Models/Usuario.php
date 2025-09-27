<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Usuario extends Model
{
    use Notifiable;
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false; // Desactiva created_at y updated_at

    protected $fillable = [
        'Nom_usuario',
        'Apellido_usuario',
        'Cedula_usuario',
        'Email_usuario',
        'Tel_usuario',
        'Salario_usuario',
        'Fecha_ingreso_usuario',
        'Fecha_nac_usuario',
        'Sexo_usuario',
        'Estado_usuario',
        'rol',
        'Password_usuario'
    ];
    protected $hidden = [
        'Password_usuario',
    ];

    // 👇 importante para que Laravel use la columna correcta como contraseña
    public function getAuthPassword()
    {
        return $this->Password_usuario;
    }
}


