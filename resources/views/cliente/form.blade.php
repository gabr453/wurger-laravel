<form action="{{ isset($cliente) ? route('cliente.update', $cliente->id_cliente) : route('cliente.store') }}" method="POST">
    @csrf
    @if(isset($cliente))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="Nom_cliente">Nombre del Cliente</label>
        <input type="text" name="Nom_cliente" id="Nom_cliente"
               value="{{ old('Nom_cliente', $cliente->Nom_cliente ?? '') }}" required maxlength="30">
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Nom_cliente') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Tel_cliente">Teléfono</label>
        <input type="text" name="Tel_cliente" id="Tel_cliente"
               value="{{ old('Tel_cliente', $cliente->Tel_cliente ?? '') }}" required maxlength="20">
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Tel_cliente') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Direc_cliente">Dirección</label>
        <input type="text" name="Direc_cliente" id="Direc_cliente"
               value="{{ old('Direc_cliente', $cliente->Direc_cliente ?? '') }}" required maxlength="30">
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Direc_cliente') <div style="color:red">{{ $message }}</div> @enderror
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
            case 'Nom_cliente':
                if (!value) {
                    message = 'El nombre es obligatorio.';
                } else if (!/^[a-zA-ZÁÉÍÓÚáéíóúñÑ\s]+$/.test(value)) {
                    message = 'El nombre solo puede contener letras y espacios.';
                } else if (value.length > 30) {
                    message = 'Máximo 30 caracteres.';
                }
                break;

            case 'Tel_cliente':
                if (!value) {
                    message = 'El teléfono es obligatorio.';
                } else if (!/^[0-9+\-\s]{7,20}$/.test(value)) {
                    message = 'Ingrese un teléfono válido (solo números, +, - y espacios).';
                }
                break;

            case 'Direc_cliente':
                if (!value) {
                    message = 'La dirección es obligatoria.';
                } else if (value.length > 30) {
                    message = 'Máximo 30 caracteres.';
                }
                break;
        }

        showError(input, message);
        return message === '';
    }

    // Validación en vivo
    form.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', () => validateField(input));
        input.addEventListener('blur', () => validateField(input)); 2q  |
    });

    // Validación al enviar
    form.addEventListener('submit', function (e) {
        let valid = true;
        form.querySelectorAll('input').forEach(input => {
            if (!validateField(input)) valid = false;
        });
        if (!valid) e.preventDefault();
    });
});
</script>
@endpush
