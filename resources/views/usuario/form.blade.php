@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
<style>
    form {
        max-width: 1000px;
        margin: 30px auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0px 4px 15px rgba(0,0,0,0.08);
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 10px;
    }

    .form-group label {
        font-weight: bold;
        margin-bottom: 4px;
        font-size: 14px;
        color: #444;
    }

    .form-group input,
    .form-group select {
        padding: 12px 14px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
        transition: all 0.3s ease;
        width: 100%;
        box-sizing: border-box;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0px 0px 6px rgba(0,123,255,0.2);
    }

    .form-group .error-message {
        color: red;
        font-size: 13px;
        margin-top: 4px;
        display: none;
    }

    button {
        grid-column: span 3;
        background: #007bff;
        color: #fff;
        padding: 14px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        transition: background 0.3s ease;
    }

    button:hover {
        background: #0056b3;
    }

    .btn-back {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 20px;
        background: #0056b3;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        transition: background 0.3s ease;
    }
</style>

<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">{{ isset($usuario) ? 'Editar Usuario' : 'Nuevo Usuario' }}</h1>

    <form id="formUsuario"
          action="{{ isset($usuario) ? route('usuario.update', $usuario) : route('usuario.store') }}"
          method="POST" novalidate>
        @csrf
        @if(isset($usuario))
            @method('PUT')
        @endif

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="Nom_usuario" value="{{ old('Nom_usuario', isset($usuario) ? $usuario->Nom_usuario : '') }}">
            <span class="error-message"></span>
        </div>

        <div class="form-group">
            <label>Apellido</label>
            <input type="text" name="Apellido_usuario" value="{{ old('Apellido_usuario', isset($usuario) ? $usuario->Apellido_usuario : '') }}">
            <span class="error-message"></span>
        </div>

        <div class="form-group">
            <label>Cédula</label>
            <input type="text" name="Cedula_usuario" value="{{ old('Cedula_usuario', isset($usuario) ? $usuario->Cedula_usuario : '') }}">
            <span class="error-message"></span>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="Email_usuario" value="{{ old('Email_usuario', isset($usuario) ? $usuario->Email_usuario : '') }}">
            <span class="error-message"></span>
        </div>

        <div class="form-group">
            <label>Teléfono</label>
            <input type="text" name="Tel_usuario" value="{{ old('Tel_usuario', isset($usuario) ? $usuario->Tel_usuario : '') }}">
            <span class="error-message"></span>
        </div>

        <div class="form-group">
            <label>Salario</label>
            <input type="number" step="0.01" name="Salario_usuario" value="{{ old('Salario_usuario', isset($usuario) ? $usuario->Salario_usuario : '') }}">
            <span class="error-message"></span>
        </div>

        <div class="form-group">
            <label>Fecha Ingreso</label>
            <input type="date" name="Fecha_ingreso_usuario" value="{{ old('Fecha_ingreso_usuario', isset($usuario) ? $usuario->Fecha_ingreso_usuario : '') }}">
            <span class="error-message"></span>
        </div>

        <div class="form-group">
            <label>Fecha Nacimiento</label>
            <input type="date" name="Fecha_nac_usuario" value="{{ old('Fecha_nac_usuario', isset($usuario) ? $usuario->Fecha_nac_usuario : '') }}">
            <span class="error-message"></span>
        </div>

        <div class="form-group">
            <label>Sexo</label>
            <select name="Sexo_usuario">
                <option value="">-- Selecciona --</option>
                <option value="M" {{ old('Sexo_usuario', isset($usuario) ? $usuario->Sexo_usuario : '') == 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ old('Sexo_usuario', isset($usuario) ? $usuario->Sexo_usuario : '') == 'F' ? 'selected' : '' }}>Femenino</option>
                <option value="Otro" {{ old('Sexo_usuario', isset($usuario) ? $usuario->Sexo_usuario : '') == 'Otro' ? 'selected' : '' }}>Otro</option>
            </select>
            <span class="error-message"></span>
        </div>

        <div class="form-group">
            <label>Estado</label>
            <select name="Estado_usuario">
                <option value="">-- Selecciona --</option>
                <option value="Activo" {{ old('Estado_usuario', isset($usuario) ? $usuario->Estado_usuario : '') == 'Activo' ? 'selected' : '' }}>Activo</option>
                <option value="Inactivo" {{ old('Estado_usuario', isset($usuario) ? $usuario->Estado_usuario : '') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
            <span class="error-message"></span>
        </div>

        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" name="Password_usuario">
            <span class="error-message"></span>
        </div>

        <button type="submit">Guardar</button>
        <a href="{{ url()->previous() }}" class="btn-back">Volver</a>
    </form>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formUsuario');

    function showError(input, message) {
        const msg = input.parentElement.querySelector('.error-message');
        msg.textContent = message;
        msg.style.display = message ? 'block' : 'none';
    }

    function validateField(input) {
        const name = input.name;
        const value = input.value.trim();
        let message = '';

        switch(name) {
            case 'Nom_usuario':
            case 'Apellido_usuario':
                if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(value)) {
                    message = 'Solo letras permitidas.';
                }
                if (!value) message = 'Este campo es obligatorio.';
                break;
            case 'Cedula_usuario':
                if (!/^\d+$/.test(value)) message = 'Debe ser numérico.';
                if (!value) message = 'Este campo es obligatorio.';
                break;
            case 'Email_usuario':
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(value)) message = 'Correo inválido.';
                if (!value) message = 'Este campo es obligatorio.';
                break;
            case 'Tel_usuario':
                if (!/^\d+$/.test(value)) message = 'Debe ser numérico.';
                if (!value) message = 'Este campo es obligatorio.';
                break;
            case 'Salario_usuario':
                if (isNaN(value) || Number(value) <= 0) message = 'Debe ser un número mayor a 0.';
                if (!value) message = 'Este campo es obligatorio.';
                break;
            case 'Fecha_ingreso_usuario':
            case 'Fecha_nac_usuario':
                if (!value) message = 'Este campo es obligatorio.';
                break;
            case 'Sexo_usuario':
            case 'Estado_usuario':
                if (!value) message = 'Seleccione una opción.';
                break;
            case 'Password_usuario':
                if (value.length < 6) message = 'Mínimo 6 caracteres.';
                if (!value) message = 'Este campo es obligatorio.';
                break;
        }

        showError(input, message);
        return message === '';
    }

    // Validación en vivo
    form.querySelectorAll('input, select').forEach(input => {
        input.addEventListener('input', () => validateField(input));
        input.addEventListener('change', () => validateField(input));
    });

    // Validación al enviar
    form.addEventListener('submit', function(e) {
        let valid = true;
        form.querySelectorAll('input, select').forEach(input => {
            if (!validateField(input)) valid = false;
        });
        if (!valid) e.preventDefault();
    });
});
</script>
@endpush
