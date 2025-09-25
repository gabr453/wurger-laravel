<div class="form-group">
    <label>Nombre de la Unidad</label>
    <input type="text" name="Nombre_unidad" value="{{ old('Nombre_unidad', $unidad->Nombre_unidad ?? '') }}" required>
</div>

<div class="form-group">
    <label>Cantidad</label>
    <input type="number" name="Cantidad_unidad" value="{{ old('Cantidad_unidad', $unidad->Cantidad_unidad ?? '') }}" required>
</div>

<div class="form-group">
    <label>Producto</label>
    <select name="id_producto_FK" required>
        <option value="">Seleccione un producto</option>
        @foreach($productos as $producto)
            <option value="{{ $producto->id_producto }}" {{ old('id_producto_FK', $unidad->id_producto_FK ?? '') == $producto->id_producto ? 'selected' : '' }}>
                {{ $producto->Nombre_producto }}
            </option>
        @endforeach
    </select>
</div>
