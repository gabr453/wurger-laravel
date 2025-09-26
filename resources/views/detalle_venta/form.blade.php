<form action="{{ isset($detalle_venta) ? route('detalle_venta.update', $detalle_venta->id_detalle_venta) : route('detalle_venta.store') }}" method="POST">
    @csrf
    @if(isset($detalle_venta))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="Cantidad_detalle_venta">Cantidad</label>
        <input type="number" name="Cantidad_detalle_venta" id="Cantidad_detalle_venta"
               value="{{ old('Cantidad_detalle_venta', $detalle_venta->Cantidad_detalle_venta ?? '') }}" required min="1">
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Cantidad_detalle_venta') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Precio_unitario">Precio Unitario</label>
        <input type="number" step="0.01" name="Precio_unitario" id="Precio_unitario"
               value="{{ old('Precio_unitario', $detalle_venta->Precio_unitario ?? '') }}" required min="0.01">
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Precio_unitario') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Subtotal">Subtotal</label>
        <input type="number" step="0.01" name="Subtotal" id="Subtotal"
               value="{{ old('Subtotal', $detalle_venta->Subtotal ?? '') }}" readonly required>
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Subtotal') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Descuento">Descuento</label>
        <input type="number" step="0.01" name="Descuento" id="Descuento"
               value="{{ old('Descuento', $detalle_venta->Descuento ?? 0) }}" min="0">
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Descuento') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="id_venta_FK">Venta Asociada</label>
        <select name="id_venta_FK" id="id_venta_FK" required>
            <option value="">Seleccione una venta</option>
            @foreach($ventas as $venta)
                <option value="{{ $venta->id_venta }}" {{ old('id_venta_FK', $detalle_venta->id_venta_FK ?? '') == $venta->id_venta ? 'selected' : '' }}>
                    Venta #{{ $venta->id_venta }} - {{ $venta->Fecha_venta }}
                </option>
            @endforeach
        </select>
        <span class="error-message" style="color:red;display:none;"></span>
        @error('id_venta_FK') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <button type="submit">Guardar</button>
</form>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    const cantidadInput = document.getElementById('Cantidad_detalle_venta');
    const precioInput   = document.getElementById('Precio_unitario');
    const subtotalInput = document.getElementById('Subtotal');
    const descuentoInput = document.getElementById('Descuento');

    function showError(input, message) {
        const msg = input.parentElement.querySelector('.error-message');
        if (!msg) return;
        msg.textContent = message;
        msg.style.display = message ? 'block' : 'none';
    }

    function calcularSubtotal() {
        const cantidad = parseFloat(cantidadInput.value) || 0;
        const precio   = parseFloat(precioInput.value) || 0;
        subtotalInput.value = (cantidad > 0 && precio > 0) ? (cantidad * precio).toFixed(2) : '';
    }

    function validateField(input) {
        const name = input.name;
        const value = (input.value || '').trim();
        let message = '';

        switch (name) {
            case 'Cantidad_detalle_venta':
                if (!value || parseInt(value) <= 0) {
                    message = 'La cantidad debe ser mayor a 0.';
                }
                break;

            case 'Precio_unitario':
                if (!value || parseFloat(value) <= 0) {
                    message = 'El precio debe ser mayor a 0.';
                }
                break;

            case 'Subtotal':
                if (!value || parseFloat(value) <= 0) {
                    message = 'El subtotal debe calcularse.';
                }
                break;

            case 'Descuento':
                const subtotal = parseFloat(subtotalInput.value) || 0;
                const descuento = parseFloat(value) || 0;
                if (descuento < 0) {
                    message = 'El descuento no puede ser negativo.';
                } else if (descuento > subtotal) {
                    message = 'El descuento no puede ser mayor que el subtotal.';
                }
                break;

            case 'id_venta_FK':
                if (!value) {
                    message = 'Debe seleccionar una venta.';
                }
                break;
        }

        showError(input, message);
        return message === '';
    }

    // recalcular subtotal en vivo
    cantidadInput.addEventListener('input', () => {
        calcularSubtotal();
        validateField(cantidadInput);
        validateField(subtotalInput);
    });
    precioInput.addEventListener('input', () => {
        calcularSubtotal();
        validateField(precioInput);
        validateField(subtotalInput);
    });

    // validaciones en vivo
    form.querySelectorAll('input, select').forEach(input => {
        input.addEventListener('input', () => validateField(input));
        input.addEventListener('blur', () => validateField(input));
        input.addEventListener('change', () => validateField(input));
    });

    // validación al enviar
    form.addEventListener('submit', function (e) {
        let valid = true;
        calcularSubtotal();
        form.querySelectorAll('input, select').forEach(input => {
            if (!validateField(input)) valid = false;
        });
        if (!valid) e.preventDefault();
    });
});
</script>
@endpush
