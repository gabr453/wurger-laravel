<div class="form-group">
    <label>Cantidad</label>
    <input type="number" name="Cantidad_detalle_movimiento" value="{{ old('Cantidad_detalle_movimiento', $detalle->Cantidad_detalle_movimiento ?? '') }}" required>
</div>

<div class="form-group">
    <label>Movimiento</label>
    <select name="id_movimiento_FK" required>
        <option value="">Seleccione</option>
        @foreach($movimientos as $mov)
            <option value="{{ $mov->id_movimiento }}" {{ old('id_movimiento_FK', $detalle->id_movimiento_FK ?? '') == $mov->id_movimiento ? 'selected' : '' }}>
                {{ $mov->Tipo_movimiento }} - {{ $mov->Fecha_movimiento }}
            </option>
        @endforeach
    </select>
</div>
