<div class="form-group">
    <label>Cantidad</label>
    <input type="number" name="Cantidad_detalle_venta" class="form-control" 
        value="{{ old('Cantidad_detalle_venta', $detalle->Cantidad_detalle_venta ?? '') }}" required>
</div>

<div class="form-group">
    <label>Precio Unitario</label>
    <input type="number" step="0.01" name="Precio_unitario" class="form-control" 
        value="{{ old('Precio_unitario', $detalle->Precio_unitario ?? '') }}" required>
</div>

<div class="form-group">
    <label>Subtotal</label>
    <input type="number" step="0.01" name="Subtotal" class="form-control" 
        value="{{ old('Subtotal', $detalle->Subtotal ?? '') }}" required>
</div>

<div class="form-group">
    <label>Descuento</label>
    <input type="number" step="0.01" name="Descuento" class="form-control" 
        value="{{ old('Descuento', $detalle->Descuento ?? '') }}">
</div>

<div class="form-group">
    <label>Venta</label>
    <select name="id_venta_FK" class="form-control" required>
        <option value="">Seleccione una venta</option>
        @foreach($ventas as $venta)
            <option value="{{ $venta->id_venta }}"
                {{ old('id_venta_FK', $detalle->id_venta_FK ?? '') == $venta->id_venta ? 'selected' : '' }}>
                Venta #{{ $venta->id_venta }}
            </option>
        @endforeach
    </select>
</div>
