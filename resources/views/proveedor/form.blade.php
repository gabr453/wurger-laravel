<div class="form-group">
    <label>Nombre Proveedor</label>
    <input type="text" name="Nom_proveedor" class="form-control"
           value="{{ old('Nom_proveedor', $proveedor->Nom_proveedor ?? '') }}" required>
</div>

<div class="form-group">
    <label>Teléfono</label>
    <input type="text" name="Tel_proveedor" class="form-control"
           value="{{ old('Tel_proveedor', $proveedor->Tel_proveedor ?? '') }}">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="Email_proveedor" class="form-control"
           value="{{ old('Email_proveedor', $proveedor->Email_proveedor ?? '') }}">
</div>

<div class="form-group">
    <label>Dirección</label>
    <input type="text" name="Direccion_proveedor" class="form-control"
           value="{{ old('Direccion_proveedor', $proveedor->Direccion_proveedor ?? '') }}">
</div>

<div class="form-group">
    <label>Estado</label>
    <select name="Estado_proveedor" class="form-control">
        <option value="Activo" {{ old('Estado_proveedor', $proveedor->Estado_proveedor ?? '') == 'Activo' ? 'selected' : '' }}>Activo</option>
        <option value="Inactivo" {{ old('Estado_proveedor', $proveedor->Estado_proveedor ?? '') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
    </select>
</div>

<div class="form-group">
    <label>Usuario Responsable</label>
    <select name="id_usuario_FK" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($usuarios as $user)
            <option value="{{ $user->id_usuario }}"
                {{ old('id_usuario_FK', $proveedor->id_usuario_FK ?? '') == $user->id_usuario ? 'selected' : '' }}>
                {{ $user->Nom_usuario }} {{ $user->Apellido_usuario }}
            </option>
        @endforeach
    </select>
</div>
