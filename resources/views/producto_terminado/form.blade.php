<form action="{{ isset($producto_terminado) ? route('producto_terminado.update', $producto_terminado->id) : route('producto_terminado.store') }}" 
      method="POST">
    @csrf
    @if(isset($producto_terminado))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="Nombre_producto_terminado">Nombre</label>
        <input type="text" name="Nombre_producto_terminado" id="Nombre_producto_terminado"
            value="{{ old('Nombre_producto_terminado', $producto_terminado->Nombre_producto_terminado ?? '') }}"
            required maxlength="50">
        <span class="error-message" style="color: red; display: none;"></span>
        @error('Nombre_producto_terminado') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Descripcion_producto_terminado">Descripción</label>
        <input type="text" name="Descripcion_producto_terminado" id="Descripcion_producto_terminado"
            value="{{ old('Descripcion_producto_terminado', $producto_terminado->Descripcion_producto_terminado ?? '') }}"
            required maxlength="100">
        <span class="error-message" style="color: red; display: none;"></span>
        @error('Descripcion_producto_terminado') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Categoria_producto_terminado">Categoría</label>
        <input type="text" name="Categoria_producto_terminado" id="Categoria_producto_terminado"
            value="{{ old('Categoria_producto_terminado', $producto_terminado->Categoria_producto_terminado ?? '') }}"
            required maxlength="50">
        <span class="error-message" style="color: red; display: none;"></span>
        @error('Categoria_producto_terminado') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Costo_producto_terminado">Costo</label>
        <input type="number" step="0.01" name="Costo_producto_terminado" id="Costo_producto_terminado"
            value="{{ old('Costo_producto_terminado', $producto_terminado->Costo_producto_terminado ?? '') }}"
            required min="0">
        <span class="error-message" style="color: red; display: none;"></span>
        @error('Costo_producto_terminado') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Precio_producto_terminado">Precio</label>
        <input type="number" step="0.01" name="Precio_producto_terminado" id="Precio_producto_terminado"
            value="{{ old('Precio_producto_terminado', $producto_terminado->Precio_producto_terminado ?? '') }}"
            required min="0">
        <span class="error-message" style="color: red; display: none;"></span>
        @error('Precio_producto_terminado') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Stock_actual_producto_terminado">Stock Actual</label>
        <input type="number" name="Stock_actual_producto_terminado" id="Stock_actual_producto_terminado"
            value="{{ old('Stock_actual_producto_terminado', $producto_terminado->Stock_actual_producto_terminado ?? '') }}"
            required min="0">
        <span class="error-message" style="color: red; display: none;"></span>
        @error('Stock_actual_producto_terminado') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Stock_min_producto_terminado">Stock Mínimo</label>
        <input type="number" name="Stock_min_producto_terminado" id="Stock_min_producto_terminado"
            value="{{ old('Stock_min_producto_terminado', $producto_terminado->Stock_min_producto_terminado ?? '') }}"
            required min="0">
        <span class="error-message" style="color: red; display: none;"></span>
        @error('Stock_min_producto_terminado') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Estado_producto_terminado">Estado</label>
        <select name="Estado_producto_terminado" id="Estado_producto_terminado" required>
            <option value="">Seleccione</option>
            <option value="Activo" {{ old('Estado_producto_terminado', $producto_terminado->Estado_producto_terminado ?? '') == 'Activo' ? 'selected' : '' }}>Activo</option>
            <option value="Inactivo" {{ old('Estado_producto_terminado', $producto_terminado->Estado_producto_terminado ?? '') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
        </select>
        <span class="error-message" style="color: red; display: none;"></span>
        @error('Estado_producto_terminado') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="id_producto_FK">Producto Base</label>
        <select name="id_producto_FK" id="id_producto_FK" required>
            <option value="">Seleccione</option>
            @foreach($productos as $producto)
                <option value="{{ $producto->id_producto }}" {{ old('id_producto_FK', $producto_terminado->id_producto_FK ?? '') == $producto->id_producto ? 'selected' : '' }}>
                    {{ $producto->Nombre_producto }}
                </option>
            @endforeach
        </select>
        <span class="error-message" style="color: red; display: none;"></span>
        @error('id_producto_FK') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Fecha_ingreso_producto_terminado">Fecha de Ingreso</label>
        <input type="date" name="Fecha_ingreso_producto_terminado" id="Fecha_ingreso_producto_terminado"
            value="{{ old('Fecha_ingreso_producto_terminado', $producto_terminado->Fecha_ingreso_producto_terminado ?? '') }}"
            required>
        <span class="error-message" style="color: red; display: none;"></span>
        @error('Fecha_ingreso_producto_terminado') <div style="color:red">{{ $message }}</div> @enderror
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

    function isFutureDate(value) {
        if (!value) return false;
        const selected = new Date(value);
        if (isNaN(selected)) return false;
        const today = new Date();
        today.setHours(0,0,0,0);
        selected.setHours(0,0,0,0);
        return selected > today;
    }

    function validateField(input) {
        const name = input.name;
        const value = (input.value || '').trim();
        let message = '';

        switch (name) {
            case 'Nombre_producto_terminado':
            case 'Descripcion_producto_terminado':
            case 'Categoria_producto_terminado':
                if (!value) {
                    message = 'Este campo es obligatorio.';
                } else if (!/^[a-zA-Z\sáéíóúÁÉÍÓÚñÑ]+$/.test(value)) {
                    message = 'Solo se permiten letras y espacios.';
                }
                break;

            case 'Costo_producto_terminado':
            case 'Precio_producto_terminado':
            case 'Stock_actual_producto_terminado':
            case 'Stock_min_producto_terminado':
                if (value === '') {
                    message = 'Este campo es obligatorio.';
                } else if (isNaN(value) || Number(value) < 0) {
                    message = 'Debe ser un número mayor o igual a 0.';
                }
                break;

            case 'Estado_producto_terminado':
                if (!value) message = 'Seleccione un estado.';
                break;

            case 'id_producto_FK':
                if (!value) message = 'Seleccione un producto base.';
                break;

            case 'Fecha_ingreso_producto_terminado':
                if (!value) {
                    message = 'Seleccione una fecha.';
                } else if (isFutureDate(value)) {
                    message = 'La fecha no puede ser futura.';
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
