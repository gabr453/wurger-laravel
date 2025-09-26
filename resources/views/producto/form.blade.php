<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="Nombre_producto" value="{{ old('Nombre_producto', $producto->Nombre_producto ?? '') }}" required maxlength="50">
    <span class="error-message"></span>
    @error('Nombre_producto') <div style="color:red;">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Stock</label>
    <input type="number" name="Stock_producto" value="{{ old('Stock_producto', $producto->Stock_producto ?? '') }}" required min="0">
    <span class="error-message"></span>
    @error('Stock_producto') <div style="color:red;">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Stock mínimo</label>
    <input type="number" name="Stock_min_producto" value="{{ old('Stock_min_producto', $producto->Stock_min_producto ?? '') }}" min="0">
    <span class="error-message"></span>
    @error('Stock_min_producto') <div style="color:red;">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Stock máximo</label>
    <input type="number" name="Stock_max_producto" value="{{ old('Stock_max_producto', $producto->Stock_max_producto ?? '') }}" min="0">
    <span class="error-message"></span>
    @error('Stock_max_producto') <div style="color:red;">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Precio de recibimiento</label>
    <input type="number" step="0.01" name="Precio_recibimiento" value="{{ old('Precio_recibimiento', $producto->Precio_recibimiento ?? '') }}" min="0">
    <span class="error-message"></span>
    @error('Precio_recibimiento') <div style="color:red;">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Precio de venta</label>
    <input type="number" step="0.01" name="Precio_venta" value="{{ old('Precio_venta', $producto->Precio_venta ?? '') }}" min="0">
    <span class="error-message"></span>
    @error('Precio_venta') <div style="color:red;">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Tipo de producto</label>
    <input type="text" name="Tipo_producto" value="{{ old('Tipo_producto', $producto->Tipo_producto ?? '') }}" maxlength="30">
    <span class="error-message"></span>
    @error('Tipo_producto') <div style="color:red;">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Estado</label>
    <select name="Estado_producto" required>
        <option value="">Seleccione</option>
        <option value="Activo" {{ old('Estado_producto', $producto->Estado_producto ?? '') == 'Activo' ? 'selected' : '' }}>Activo</option>
        <option value="Inactivo" {{ old('Estado_producto', $producto->Estado_producto ?? '') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
    </select>
    <span class="error-message"></span>
    @error('Estado_producto') <div style="color:red;">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label>Fecha de ingreso</label>
    <input type="date" name="Fecha_ingreso_producto" value="{{ old('Fecha_ingreso_producto', $producto->Fecha_ingreso_producto ?? '') }}">
    <span class="error-message"></span>
    @error('Fecha_ingreso_producto') <div style="color:red;">{{ $message }}</div> @enderror
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
    <span class="error-message"></span>
    @error('id_categoria_FK') <div style="color:red;">{{ $message }}</div> @enderror
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    function showError(input, message) {
        const msg = input.parentElement.querySelector('.error-message');
        msg.textContent = message;
        msg.style.color = "red";
        msg.style.fontSize = "13px";
        msg.style.display = message ? "block" : "none";
    }

    function validateField(input) {
        const name = input.name;
        const value = input.value.trim();
        let message = '';

        switch(name) {
            case 'Nombre_producto':
                if (!value) message = 'El nombre es obligatorio.';
                else if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(value)) message = 'Solo letras permitidas.';
                break;
            case 'Stock_producto':
            case 'Stock_min_producto':
            case 'Stock_max_producto':
                if (value === '') message = 'Este campo es obligatorio.';
                else if (isNaN(value) || Number(value) < 0) message = 'Debe ser un número positivo.';
                break;
            case 'Precio_recibimiento':
            case 'Precio_venta':
                if (value === '') message = 'Este campo es obligatorio.';
                else if (isNaN(value) || Number(value) < 0) message = 'Debe ser un valor mayor o igual a 0.';
                break;
            case 'Tipo_producto':
                if (value && !/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(value)) message = 'Solo letras permitidas.';
                break;
            case 'Estado_producto':
                if (!value) message = 'Seleccione un estado.';
                break;
            case 'Fecha_ingreso_producto':
                if (value) {
                    const hoy = new Date();
                    hoy.setHours(0,0,0,0);
                    const fechaSeleccionada = new Date(value);
                    if (fechaSeleccionada > hoy) {
                        message = 'La fecha no puede ser futura.';
                    }
                }
                break;
            case 'id_categoria_FK':
                if (!value) message = 'Seleccione una categoría.';
                break;
        }

        showError(input, message);
        return message === '';
    }

    // Validación en vivo
    form.querySelectorAll('input, select').forEach(input => {
        input.addEventListener('input', () => validateField(input));
        input.addEventListener('change', () => validateField(input));
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
