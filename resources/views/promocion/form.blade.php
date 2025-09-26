<div class="form-group">
    <label>Nombre de la Promoción</label>
    <input type="text" name="Nombre_promocion" value="{{ old('Nombre_promocion', $promocion->Nombre_promocion ?? '') }}" required>
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Fecha de Inicio</label>
    <input type="date" name="Inicio_promocion" value="{{ old('Inicio_promocion', $promocion->Inicio_promocion ?? '') }}" required>
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Fecha de Fin</label>
    <input type="date" name="Fin_promocion" value="{{ old('Fin_promocion', $promocion->Fin_promocion ?? '') }}" required>
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Cantidad de Usos</label>
    <input type="number" name="Cantidad_us_promocion" value="{{ old('Cantidad_us_promocion', $promocion->Cantidad_us_promocion ?? '') }}" required min="1">
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Estado</label>
    <select name="Estado_promocion" required>
        <option value="">Seleccione</option>
        <option value="Activa" {{ old('Estado_promocion', $promocion->Estado_promocion ?? '') == 'Activa' ? 'selected' : '' }}>Activa</option>
        <option value="Inactiva" {{ old('Estado_promocion', $promocion->Estado_promocion ?? '') == 'Inactiva' ? 'selected' : '' }}>Inactiva</option>
    </select>
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Descripción</label>
    <textarea name="Descripcion_promocion" rows="3" required>{{ old('Descripcion_promocion', $promocion->Descripcion_promocion ?? '') }}</textarea>
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Producto</label>
    <select name="id_producto_FK" required>
        <option value="">Seleccione un producto</option>
        @foreach($productos as $producto)
            <option value="{{ $producto->id_producto }}"
                {{ old('id_producto_FK', $promocion->id_producto_FK ?? '') == $producto->id_producto ? 'selected' : '' }}>
                {{ $producto->Nombre_producto }}
            </option>
        @endforeach
    </select>
    <span class="error-message"></span>
</div>

<button type="submit">Guardar</button>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');

    const validations = {
        Nombre_promocion: function(value) {
            if (!value.trim()) return "El nombre es obligatorio.";
            if (!/^[a-zA-Z\s]+$/.test(value)) return "El nombre no debe contener números.";
            return "";
        },
        Inicio_promocion: function(value) {
            if (!value) return "La fecha de inicio es obligatoria.";
            const hoy = new Date();
            hoy.setHours(0,0,0,0);
            const inicio = new Date(value);
            if (inicio > hoy) return "La fecha de inicio no puede ser futura.";
            return "";
        },
        Fin_promocion: function(value) {
            if (!value) return "La fecha de fin es obligatoria.";
            const hoy = new Date();
            hoy.setHours(0,0,0,0);
            const fin = new Date(value);
            if (fin > hoy) return "La fecha de fin no puede ser futura.";
            const inicioValue = form.querySelector('input[name="Inicio_promocion"]').value;
            if (inicioValue) {
                const inicio = new Date(inicioValue);
                if (fin < inicio) return "La fecha de fin debe ser igual o posterior a la fecha de inicio.";
            }
            return "";
        },
        Cantidad_us_promocion: function(value) {
            if (!value.trim()) return "La cantidad es obligatoria.";
            if (value <= 0) return "La cantidad debe ser mayor que cero.";
            return "";
        },
        Estado_promocion: function(value) {
            if (!value) return "Seleccione un estado.";
            return "";
        },
        Descripcion_promocion: function(value) {
            if (!value.trim()) return "La descripción es obligatoria.";
            return "";
        },
        id_producto_FK: function(value) {
            if (!value) return "Seleccione un producto.";
            return "";
        }
    };

    function validateField(field) {
        const value = field.value;
        const errorMessage = validations[field.name](value);
        const errorElement = field.parentElement.querySelector('.error-message');
        errorElement.textContent = errorMessage;
        errorElement.style.display = errorMessage ? "block" : "none";
        return !errorMessage;
    }

    form.querySelectorAll('input, select, textarea').forEach(field => {
        field.addEventListener('input', () => validateField(field));
        field.addEventListener('change', () => validateField(field));
    });

    form.addEventListener('submit', function(e) {
        let valid = true;
        form.querySelectorAll('input, select, textarea').forEach(field => {
            if (!validateField(field)) valid = false;
        });
        if (!valid) e.preventDefault();
    });
});
</script>
@endpush
