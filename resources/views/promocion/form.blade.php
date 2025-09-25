<div class="form-group">
    <label>Nombre Promoción</label>
    <input type="text" name="Nombre_promocion" class="form-control"
           value="{{ old('Nombre_promocion', $promocion->Nombre_promocion ?? '') }}" required>
</div>

<div class="form-group">
    <label>Inicio Promoción</label>
    <input type="date" name="Inicio_promocion" class="form-control"
           value="{{ old('Inicio_promocion', $promocion->Inicio_promocion ?? '') }}" required>
</div>

<div class="form-group">
    <label>Fin Promoción</label>
    <input type="date" name="Fin_promocion" class="form-control"
           value="{{ old('Fin_promocion', $promocion->Fin_promocion ?? '') }}" required>
</div>

<div class="form-group">
    <label>Cantidad de Usos</label>
    <input type="number" name="Cantidad_us_promocion" class="form-control"
           value="{{ old('Cantidad_us_promocion', $promocion->Cantidad_us_promocion ?? '') }}" required>
</div>

<div class="form-group">
    <label>Estado</label>
    <select name="Estado_promocion" class="form-control" required>
        <option value="Activa" {{ old('Estado_promocion', $promocion->Estado_promocion ?? '') == 'Activa' ? 'selected' : '' }}>Activa</option>
        <option value="Inactiva" {{ old('Estado_promocion', $promocion->Estado_promocion ?? '') == 'Inactiva' ? 'selected' : '' }}>Inactiva</option>
    </select>
</div>

<div class="form-group">
    <label>Descripción</label>
    <input type="text" name="Descripcion_promocion" class="form-control"
           value="{{ old('Descripcion_promocion', $promocion->Descripcion_promocion ?? '') }}">
</div>

<div class="form-group">
    <label>Producto Asociado</label>
    <select name="id_producto_FK" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($productos as $prod)
            <option value="{{ $prod->id_producto }}"
                {{ old('id_producto_FK', $promocion->id_producto_FK ?? '') == $prod->id_producto ? 'selected' : '' }}>
                {{ $prod->Nombre_producto }}
            </option>
        @endforeach
    </select>
</div>
