<div class="form-group">
    <label>Nombre del Proveedor</label>
    <input type="text" name="Nom_proveedor" value="{{ old('Nom_proveedor', $proveedor->Nom_proveedor ?? '') }}" required>
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Teléfono</label>
    <input type="text" name="Tel_proveedor" value="{{ old('Tel_proveedor', $proveedor->Tel_proveedor ?? '') }}">
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="Email_proveedor" value="{{ old('Email_proveedor', $proveedor->Email_proveedor ?? '') }}">
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Dirección</label>
    <input type="text" name="Direccion_proveedor" value="{{ old('Direccion_proveedor', $proveedor->Direccion_proveedor ?? '') }}">
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Estado</label>
    <select name="Estado_proveedor" required>
        <option value="">Seleccione</option>
        <option value="Activo" {{ old('Estado_proveedor', $proveedor->Estado_proveedor ?? '') == 'Activo' ? 'selected' : '' }}>Activo</option>
        <option value="Inactivo" {{ old('Estado_proveedor', $proveedor->Estado_proveedor ?? '') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
    </select>
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Usuario Responsable</label>
    <select name="id_usuario_FK" required>
        <option value="">Seleccione un usuario</option>
        @foreach($usuarios as $usuario)
            <option value="{{ $usuario->id_usuario }}"
                {{ old('id_usuario_FK', $proveedor->id_usuario_FK ?? '') == $usuario->id_usuario ? 'selected' : '' }}>
                {{ $usuario->Nom_usuario }} {{ $usuario->Apellido_usuario }}
            </option>
        @endforeach
    </select>
    <span class="error-message"></span>
</div>
