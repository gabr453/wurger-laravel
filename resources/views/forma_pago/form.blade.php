<div class="form-group">
    <label for="Nombre_fp">Nombre de la Forma de Pago</label>
    <input type="text" name="Nombre_fp" id="Nombre_fp"
           value="{{ old('Nombre_fp', $formaPago->Nombre_fp ?? '') }}"
           class="form-control" required>
</div>

<div class="form-group">
    <label for="id_venta_FK">Venta Asociada</label>
    <select name="id_venta_FK" id="id_venta_FK" class="form-control" required>
        <option value="">Seleccione una venta</option>
        @foreach ($ventas as $venta)
            <option value="{{ $venta->id_venta }}"
                {{ old('id_venta_FK', $formaPago->id_venta_FK ?? '') == $venta->id_venta ? 'selected' : '' }}>
                Venta #{{ $venta->id_venta }} - {{ $venta->Estado_venta }}
            </option>
        @endforeach
    </select>
</div>
