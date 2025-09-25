<div class="form-group">
    <label>Tipo de movimiento</label>
    <select name="Tipo_movimiento" required>
        <option value="">Seleccione</option>
        <option value="Entrada" {{ old('Tipo_movimiento', $movimiento->Tipo_movimiento ?? '') == 'Entrada' ? 'selected' : '' }}>Entrada</option>
        <option value="Salida" {{ old('Tipo_movimiento', $movimiento->Tipo_movimiento ?? '') == 'Salida' ? 'selected' : '' }}>Salida</option>
    </select>
</div>

<div class="form-group">
    <label>Cantidad</label>
    <input type="number" name="Cantidad_movimiento" value="{{ old('Cantidad_movimiento', $movimiento->Cantidad_movimiento ?? '') }}" required>
</div>

<div class="form-group">
    <label>Fecha</label>
    <input type="date" name="Fecha_movimiento" value="{{ old('Fecha_movimiento', $movimiento->Fecha_movimiento ?? '') }}" required>
</div>

<div class="form-group">
    <label>Descripción</label>
    <input type="text" name="Descripcion_movimiento" value="{{ old('Descripcion_movimiento', $movimiento->Descripcion_movimiento ?? '') }}">
</div>

<div class="form-group">
    <label>Producto</label>
    <select name="id_producto_FK" required>
        <option value="">Seleccione</option>
        @foreach($productos as $prod)
            <option value="{{ $prod->id_producto }}" {{ old('id_producto_FK', $movimiento->id_producto_FK ?? '') == $prod->id_producto ? 'selected' : '' }}>
                {{ $prod->Nombre_producto }}
            </option>
        @endforeach
    </select>
</div>
