<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="Nom_usuario" value="{{ old('Nom_usuario', $usuario->Nom_usuario ?? '') }}" required>
</div>

<div class="form-group">
    <label>Apellido</label>
    <input type="text" name="Apellido_usuario" value="{{ old('Apellido_usuario', $usuario->Apellido_usuario ?? '') }}">
</div>

<div class="form-group">
    <label>Cédula</label>
    <input type="text" name="Cedula_usuario" value="{{ old('Cedula_usuario', $usuario->Cedula_usuario ?? '') }}">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="Email_usuario" value="{{ old('Email_usuario', $usuario->Email_usuario ?? '') }}">
</div>

<div class="form-group">
    <label>Teléfono</label>
    <input type="text" name="Tel_usuario" value="{{ old('Tel_usuario', $usuario->Tel_usuario ?? '') }}">
</div>

<div class="form-group">
    <label>Salario</label>
    <input type="number" step="0.01" name="Salario_usuario" value="{{ old('Salario_usuario', $usuario->Salario_usuario ?? '') }}">
</div>

<div class="form-group">
    <label>Fecha de ingreso</label>
    <input type="date" name="Fecha_ingreso_usuario" value="{{ old('Fecha_ingreso_usuario', $usuario->Fecha_ingreso_usuario ?? '') }}">
</div>

<div class="form-group">
    <label>Fecha de nacimiento</label>
    <input type="date" name="Fecha_nac_usuario" value="{{ old('Fecha_nac_usuario', $usuario->Fecha_nac_usuario ?? '') }}">
</div>

<div class="form-group">
    <label>Sexo</label>
    <select name="Sexo_usuario">
        <option value="">Seleccione</option>
        <option value="M" {{ old('Sexo_usuario', $usuario->Sexo_usuario ?? '') == 'M' ? 'selected' : '' }}>Masculino</option>
        <option value="F" {{ old('Sexo_usuario', $usuario->Sexo_usuario ?? '') == 'F' ? 'selected' : '' }}>Femenino</option>
        <option value="Otro" {{ old('Sexo_usuario', $usuario->Sexo_usuario ?? '') == 'Otro' ? 'selected' : '' }}>Otro</option>
    </select>
</div>

<div class="form-group">
    <label>Estado</label>
    <select name="Estado_usuario">
        <option value="Activo" {{ old('Estado_usuario', $usuario->Estado_usuario ?? '') == 'Activo' ? 'selected' : '' }}>Activo</option>
    </select>
</div>

<div class="form-group">
    <label>Rol</label>
    <select name="rol">
        <option value="Usuario" {{ old('rol', $usuario->rol ?? '') == 'Usuario' ? 'selected' : '' }}>Usuario</option>
    </select>
</div>

<div class="form-group">
    <label>Contraseña</label>
    <input type="password" name="Password_usuario">
</div>
