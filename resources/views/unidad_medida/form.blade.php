<form action="{{ isset($unidad) ? route('unidad_medida.update', $unidad->id_unidad) : route('unidad_medida.store') }}" method="POST">
    @csrf
    @if(isset($unidad))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="Nombre_unidad">Nombre de la Unidad</label>
        <input type="text" name="Nombre_unidad" id="Nombre_unidad"
               value="{{ old('Nombre_unidad', $unidad->Nombre_unidad ?? '') }}" required maxlength="50">
        <span class="error-message" style="color: red; display: none;"></span>
        @error('Nombre_unidad') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Cantidad_unidad">Cantidad</label>
        <input type="number" name="Cantidad_unidad" id="Cantidad_unidad"
               value="{{ old('Cantidad_unidad', $unidad->Cantidad_unidad ?? '') }}" required min="1">
        <span class="error-message" style="color: red; display: none;"></span>
        @error('Cantidad_unidad') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="id_producto_FK">Producto</label>
        <select name="id_producto_FK" id="id_producto_FK" required>
            <option value="">Seleccione un producto</option>
            @foreach($productos as $producto)
                <option value="{{ $producto->id_producto }}" 
                        {{ old('id_producto_FK', $unidad->id_producto_FK ?? '') == $producto->id_producto ? 'selected' : '' }}>
                    {{ $producto->Nombre_producto }}
                </option>
            @endforeach
        </select>
        <span class="error-message" style="color: red; display: none;"></span>
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

        switch (name) {
            case 'Nombre_unidad':
                if (!value) {
                    message = 'El nombre es obligatorio.';
                } else if (!/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/.test(value)) {
                    message = 'El nombre solo puede contener letras y espacios.';
                }
                break;

            case 'Cantidad_unidad':
                if (!value) {
                    message = 'La cantidad es obligatoria.';
                } else if (isNaN(value) || Number(value) < 1) {
                    message = 'Debe ingresar un número mayor o igual a 1.';
                }
                break;

            case 'id_producto_FK':
                if (!value) {
                    message = 'Debe seleccionar un producto.';
                }
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
