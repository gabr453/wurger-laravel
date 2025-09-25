<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="Nombre_producto" value="{{ old('Nombre_producto', $producto->Nombre_producto ?? '') }}" required>
</div>

<div class="form-group">
    <label>Stock</label>
    <input type="number" name="Stock_producto" value="{{ old('Stock_producto', $producto->Stock_producto ?? '') }}" required>
</div>

<div class="form-group">
    <label>Stock mínimo</label>
    <input type="number" name="Stock_min_producto" value="{{ old('Stock_min_producto', $producto->Stock_min_producto ?? '') }}">
</div>

<div class="form-group">
    <label>Stock máximo</label>
    <input type="number" name="Stock_max_producto" value="{{ old('Stock_max_producto', $producto->Stock_max_producto ?? '') }}">
</div>

<div class="form-group">
    <label>Precio de recibimiento</label>
    <input type="number" step="0.01" name="Precio_recibimiento" value="{{ old('Precio_recibimiento', $producto->Precio_recibimiento ?? '') }}">
</div>

<div class="form-group">
    <label>Precio de venta</label>
    <input type="number" step="0.01" name="Precio_venta" value="{{ old('Precio_venta', $producto->Precio_venta ?? '') }}">
</div>

<div class="form-group">
    <label>Tipo de producto</label>
    <input type="text" name="Tipo_producto" value="{{ old('Tipo_producto', $producto->Tipo_producto ?? '') }}">
</div>

<div class="form-group">
    <label>Estado</label>
    <select name="Estado_producto">
        <option value="Activo" {{ old('Estado_producto', $producto->Estado_producto ?? '') == 'Activo' ? 'selected' : '' }}>Activo</option>
        <option value="Inactivo" {{ old('Estado_producto', $producto->Estado_producto ?? '') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
    </select>
</div>

<div class="form-group">
    <label>Fecha de ingreso</label>
    <input type="date" name="Fecha_ingreso_producto" value="{{ old('Fecha_ingreso_producto', $producto->Fecha_ingreso_producto ?? '') }}">
</div>

<div class="form-group">
    <label>Categoría</label>
    <select name="id_categoria_FK" required>
        <option value="">Seleccione</option>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id_categoria }}"
                {{ old('id_categoria_FK', $producto->id_categoria_FK ?? '') == $categoria->id_categoria ? 'selected' : '' }}>
                {{ $categoria->Nombre_categoria }}
            </option>
        @endforeach
    </select>
</div>
