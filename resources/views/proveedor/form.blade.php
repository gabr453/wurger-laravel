<div class="form-group">
    <label>Nombre del Proveedor</label>
    <input type="text" name="Nom_proveedor" value="{{ old('Nom_proveedor', $proveedor->Nom_proveedor ?? '') }}" required>
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Teléfono</label>
    <input type="text" name="Tel_proveedor" value="{{ old('Tel_proveedor', $proveedor->Tel_proveedor ?? '') }}" required>
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="Email_proveedor" value="{{ old('Email_proveedor', $proveedor->Email_proveedor ?? '') }}" required>
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Dirección</label>
    <input type="text" name="Direccion_proveedor" value="{{ old('Direccion_proveedor', $proveedor->Direccion_proveedor ?? '') }}" required>
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Estado</label>
    <select name="Estado_proveedor" required>
        <option value="">Seleccione</option>
        <option value="Activo" {{ old('Estado_proveedor', $proveedor->Estado_proveedor ?? '') == 'Activo' ? 'selected' : '' }}>Activo</option>
        <option value="Inactivo" {{ old('Estado_proveedor', $proveedor->Estado_proveedor ?? '') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
    </select>
    <span class="error-message"></span>
</div>

<div class="form-group">
    <label>Usuario Responsable</label>
    <select name="id_usuario_FK" required>
        <option value="">Seleccione un usuario</option>
        @foreach($usuarios as $usuario)
            <option value="{{ $usuario->id_usuario }}"
                {{ old('id_usuario_FK', $proveedor->id_usuario_FK ?? '') == $usuario->id_usuario ? 'selected' : '' }}>
                {{ $usuario->Nom_usuario }} {{ $usuario->Apellido_usuario }}
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
        Nom_proveedor: function(value) {
            if (!value.trim()) return "El nombre es obligatorio.";
            if (!/^[a-zA-Z\s]+$/.test(value)) return "El nombre no debe contener números.";
            return "";
        },
        Tel_proveedor: function(value) {
            if (!value.trim()) return "El teléfono es obligatorio.";
            if (!/^\d{7,15}$/.test(value)) return "El teléfono debe tener entre 7 y 15 dígitos.";
            return "";
        },
        Email_proveedor: function(value) {
            if (!value.trim()) return "El email es obligatorio.";
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) return "Formato de email inválido.";
            return "";
        },
        Direccion_proveedor: function(value) {
            if (!value.trim()) return "La dirección es obligatoria.";
            return "";
        },
        Estado_proveedor: function(value) {
            if (!value) return "Seleccione un estado.";
            return "";
        },
        id_usuario_FK: function(value) {
            if (!value) return "Seleccione un usuario.";
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

    form.querySelectorAll('input, select').forEach(field => {
        field.addEventListener('input', () => validateField(field));
        field.addEventListener('change', () => validateField(field));
    });

    form.addEventListener('submit', function(e) {
        let valid = true;
        form.querySelectorAll('input, select').forEach(field => {
            if (!validateField(field)) valid = false;
        });
        if (!valid) e.preventDefault();
    });
});
</script>
@endpush
