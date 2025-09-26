<form action="{{ isset($movimiento) ? route('movimiento.update', $movimiento->id_movimiento) : route('movimiento.store') }}" method="POST">
    @csrf
    @if(isset($movimiento))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="Tipo_movimiento">Tipo de Movimiento</label>
        <select name="Tipo_movimiento" id="Tipo_movimiento" required>
            <option value="">Seleccione</option>
            <option value="Entrada" {{ old('Tipo_movimiento', $movimiento->Tipo_movimiento ?? '') == 'Entrada' ? 'selected' : '' }}>Entrada</option>
            <option value="Salida" {{ old('Tipo_movimiento', $movimiento->Tipo_movimiento ?? '') == 'Salida' ? 'selected' : '' }}>Salida</option>
        </select>
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Tipo_movimiento') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Cantidad_movimiento">Cantidad</label>
        <input type="number" name="Cantidad_movimiento" id="Cantidad_movimiento"
               value="{{ old('Cantidad_movimiento', $movimiento->Cantidad_movimiento ?? '') }}" required min="1">
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Cantidad_movimiento') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Fecha_movimiento">Fecha</label>
        <input type="date" name="Fecha_movimiento" id="Fecha_movimiento"
               value="{{ old('Fecha_movimiento', $movimiento->Fecha_movimiento ?? '') }}" required>
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Fecha_movimiento') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Descripcion_movimiento">Descripción</label>
        <input type="text" name="Descripcion_movimiento" id="Descripcion_movimiento" maxlength="30"
               value="{{ old('Descripcion_movimiento', $movimiento->Descripcion_movimiento ?? '') }}">
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Descripcion_movimiento') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="id_producto_FK">Producto</label>
        <select name="id_producto_FK" id="id_producto_FK" required>
            <option value="">Seleccione un producto</option>
            @foreach($productos as $producto)
                <option value="{{ $producto->id_producto }}"
                        {{ old('id_producto_FK', $movimiento->id_producto_FK ?? '') == $producto->id_producto ? 'selected' : '' }}>
                    {{ $producto->Nombre_producto }}
                </option>
            @endforeach
        </select>
        <span class="error-message" style="color:red;display:none;"></span>
        @error('id_producto_FK') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <button type="submit">Guardar</button>
</form>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    function showError(input, message) {
        const msg = input.parentElement.querySelector('.error-message');
        if (!msg) return;
        msg.textContent = message;
        msg.style.display = message ? 'block' : 'none';
    }

    function validateField(input) {
        const name = input.name;
        const value = (input.value || '').trim();
        let message = '';
        const hoy = new Date().setHours(0,0,0,0);

        switch (name) {
            case 'Tipo_movimiento':
                if (!value) message = 'Debe seleccionar un tipo de movimiento.';
                break;

            case 'Cantidad_movimiento':
                if (!value) {
                    message = 'La cantidad es obligatoria.';
                } else if (isNaN(value) || Number(value) < 1) {
                    message = 'Debe ingresar un número mayor o igual a 1.';
                }
                break;

            case 'Fecha_movimiento':
                if (!value) {
                    message = 'La fecha es obligatoria.';
                } else {
                    const fechaSeleccionada = new Date(value).setHours(0,0,0,0);
                    if (fechaSeleccionada > hoy) {
                        message = 'La fecha no puede ser futura.';
                    }
                }
                break;

            case 'Descripcion_movimiento':
                if (value && !/^[a-zA-Z0-9\sáéíóúÁÉÍÓÚñÑ.,-]+$/.test(value)) {
                    message = 'La descripción solo puede contener letras, números y signos básicos.';
                }
                break;

            case 'id_producto_FK':
                if (!value) message = 'Debe seleccionar un producto.';
                break;
        }

        showError(input, message);
        return message === '';
    }

    // Validación en vivo
    form.querySelectorAll('input, select').forEach(input => {
        input.addEventListener('input', () => validateField(input));
        input.addEventListener('change', () => validateField(input));
        input.addEventListener('blur', () => validateField(input));
    });

    // Validación al enviar
    form.addEventListener('submit', function (e) {
        let valid = true;
        form.querySelectorAll('input, select').forEach(input => {
            if (!validateField(input)) valid = false;
        });
        if (!valid) e.preventDefault();
    });
});
</script>
@endpush
