<div class="form-group">
    <label>Fecha de Venta</label>
    <input type="date" name="Fecha_venta" 
           value="{{ old('Fecha_venta', $venta->Fecha_venta ?? '') }}" 
           class="form-control" required>
</div>

<div class="form-group">
    <label>Estado</label>
    <select name="Estado_venta" class="form-control" required>
        <option value="Pendiente" {{ old('Estado_venta', $venta->Estado_venta ?? '') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="Pagada" {{ old('Estado_venta', $venta->Estado_venta ?? '') == 'Pagada' ? 'selected' : '' }}>Pagada</option>
        <option value="Anulada" {{ old('Estado_venta', $venta->Estado_venta ?? '') == 'Anulada' ? 'selected' : '' }}>Anulada</option>
    </select>
</div>

<div class="form-group">
    <label>Usuario</label>
    <select name="id_usuario_FK" class="form-control" required>
        @foreach($usuarios as $usuario)
            <option value="{{ $usuario->id_usuario }}"
                {{ old('id_usuario_FK', $venta->id_usuario_FK ?? '') == $usuario->id_usuario ? 'selected' : '' }}>
                {{ $usuario->Nom_usuario }}
            </option>
        @endforeach
    </select>
</div>
