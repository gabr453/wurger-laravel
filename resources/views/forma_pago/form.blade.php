<form action="{{ isset($forma_pago) ? route('forma_pago.update', $forma_pago->id_fp) : route('forma_pago.store') }}" method="POST">
    @csrf
    @if(isset($forma_pago))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="Nombre_fp">Forma de Pago</label>
        <input type="text" name="Nombre_fp" id="Nombre_fp"
               value="{{ old('Nombre_fp', $forma_pago->Nombre_fp ?? '') }}" 
               required pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$"
               title="Solo se permiten letras y espacios.">
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Nombre_fp') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="id_venta_FK">Venta Asociada</label>
        <select name="id_venta_FK" id="id_venta_FK" required>
            <option value="">Seleccione una venta</option>
            @foreach($ventas as $venta)
                <option value="{{ $venta->id_venta }}" 
                    {{ old('id_venta_FK', $forma_pago->id_venta_FK ?? '') == $venta->id_venta ? 'selected' : '' }}>
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
            case 'Nombre_fp':
                if (!value) {
                    message = 'La forma de pago es obligatoria.';
                } else if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/.test(value)) {
                    message = 'Solo se permiten letras y espacios.';
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

    // Validaciones en vivo
    form.querySelectorAll('input, select').forEach(input => {
        input.addEventListener('input', () => validateField(input));
        input.addEventListener('blur', () => validateField(input));
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
