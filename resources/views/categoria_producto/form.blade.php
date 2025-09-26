<div class="form-group">
    <label for="Nombre_categoria">Nombre de la Categoría</label>
    <input type="text" name="Nombre_categoria" id="Nombre_categoria"
        value="{{ old('Nombre_categoria', $categoria->Nombre_categoria ?? '') }}" 
        required maxlength="30">
    <span class="error-message"></span>
    @error('Nombre_categoria') <div style="color: red;">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label for="cantidad_categoria">Cantidad</label>
    <input type="number" name="cantidad_categoria" id="cantidad_categoria"
        value="{{ old('cantidad_categoria', $categoria->cantidad_categoria ?? '') }}" 
        required min="0">
    <span class="error-message"></span>
    @error('cantidad_categoria') <div style="color: red;">{{ $message }}</div> @enderror
</div>

<button type="submit" class="btn btn-success">Guardar</button>
<a href="{{ route('categoria_producto.index') }}" class="btn btn-secondary">Cancelar</a>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
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
            case 'Nombre_categoria':
                if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(value)) {
                    message = 'Solo letras permitidas.';
                }
                if (!value) message = 'Este campo es obligatorio.';
                break;
            case 'cantidad_categoria':
                if (value === '') {
                    message = 'Este campo es obligatorio.';
                } else if (isNaN(value) || Number(value) < 0) {
                    message = 'Debe ser un número mayor o igual a 0.';
                }
                break;
        }

        showError(input, message);
        return message === '';
    }

    // Validación en vivo
    form.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', () => validateField(input));
        input.addEventListener('change', () => validateField(input));
    });

    // Validación al enviar
    form.addEventListener('submit', function(e) {
        let valid = true;
        form.querySelectorAll('input').forEach(input => {
            if (!validateField(input)) valid = false;
        });
        if (!valid) e.preventDefault();
    });
});
</script>
@endpush
