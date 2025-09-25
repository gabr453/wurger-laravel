@php
    $td = $tipoDescuento ?? null;
@endphp

<div class="form-group">
    <label>Nombre Tipo de Descuento</label>
    <input type="text" name="Nombre_tipo_descuento" class="form-control"
           value="{{ old('Nombre_tipo_descuento', optional($td)->Nombre_tipo_descuento) }}" required>
</div>

<div class="form-group">
    <label>Forma de Pago Asociada</label>
    <select name="id_fp_FK" class="form-control" required>
        <option value="">Seleccione</option>
        @foreach($formasPago as $fp)
            <option value="{{ $fp->id_fp }}"
                {{ old('id_fp_FK', optional($td)->id_fp_FK) == $fp->id_fp ? 'selected' : '' }}>
                {{ $fp->Nombre_fp }}
            </option>
        @endforeach
    </select>
</div>
