<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="Nombre_producto_terminado" value="{{ old('Nombre_producto_terminado', $producto_terminado->Nombre_producto_terminado ?? '') }}" required>
</div>

<div class="form-group">
    <label>Descripción</label>
    <input type="text" name="Descripcion_producto_terminado" value="{{ old('Descripcion_producto_terminado', $producto_terminado->Descripcion_producto_terminado ?? '') }}" required>
</div>

<div class="form-group">
    <label>Categoría</label>
    <input type="text" name="Categoria_producto_terminado" value="{{ old('Categoria_producto_terminado', $producto_terminado->Categoria_producto_terminado ?? '') }}" required>
</div>

<div class="form-group">
    <label>Costo</label>
    <input type="number" step="0.01" name="Costo_producto_terminado" value="{{ old('Costo_producto_terminado', $producto_terminado->Costo_producto_terminado ?? '') }}" required>
</div>

<div class="form-group">
    <label>Precio</label>
    <input type="number" step="0.01" name="Precio_producto_terminado" value="{{ old('Precio_producto_terminado', $producto_terminado->Precio_producto_terminado ?? '') }}" required>
</div>

<div class="form-group">
    <label>Stock Actual</label>
    <input type="number" name="Stock_actual_producto_terminado" value="{{ old('Stock_actual_producto_terminado', $producto_terminado->Stock_actual_producto_terminado ?? '') }}" required>
</div>

<div class="form-group">
    <label>Stock Mínimo</label>
    <input type="number" name="Stock_min_producto_terminado" value="{{ old('Stock_min_producto_terminado', $producto_terminado->Stock_min_producto_terminado ?? '') }}" required>
</div>

<div class="form-group">
    <label>Estado</label>
    <select name="Estado_producto_terminado" required>
        <option value="Activo" {{ old('Estado_producto_terminado', $producto_terminado->Estado_producto_terminado ?? '') == 'Activo' ? 'selected' : '' }}>Activo</option>
        <option value="Inactivo" {{ old('Estado_producto_terminado', $producto_terminado->Estado_producto_terminado ?? '') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
    </select>
</div>

<div class="form-group">
    <label>Producto Base</label>
    <select name="id_producto_FK" required>
        <option value="">Seleccione</option>
        @foreach($productos as $producto)
            <option value="{{ $producto->id_producto }}" {{ old('id_producto_FK', $producto_terminado->id_producto_FK ?? '') == $producto->id_producto ? 'selected' : '' }}>
                {{ $producto->Nombre_producto }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Fecha de Ingreso</label>
    <input type="date" name="Fecha_ingreso_producto_terminado" value="{{ old('Fecha_ingreso_producto_terminado', $producto_terminado->Fecha_ingreso_producto_terminado ?? '') }}" required>
</div>
