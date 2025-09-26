<form action="{{ isset($tipo_descuento) ? route('tipo_descuento.update', $tipo_descuento->id_tipo_descuento) : route('tipo_descuento.store') }}" method="POST">
    @csrf
    @if(isset($tipo_descuento))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="Nombre_tipo_descuento">Tipo de Descuento</label>
        <input type="text" name="Nombre_tipo_descuento" id="Nombre_tipo_descuento"
               value="{{ old('Nombre_tipo_descuento', $tipo_descuento->Nombre_tipo_descuento ?? '') }}" 
               required pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$"
               title="Solo se permiten letras y espacios.">
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Nombre_tipo_descuento') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="id_fp_FK">Forma de Pago</label>
        <select name="id_fp_FK" id="id_fp_FK" required>
            <option value="">Seleccione una forma de pago</option>
            @foreach($formasPago as $fp)
                <option value="{{ $fp->id_fp }}" 
                    {{ old('id_fp_FK', $tipo_descuento->id_fp_FK ?? '') == $fp->id_fp ? 'selected' : '' }}>
                    {{ $fp->Nombre_fp }}
                </option>
            @endforeach
        </select>
        <span class="error-message" style="color:red;display:none;"></span>
        @error('id_fp_FK') <div style="color:red">{{ $message }}</div> @enderror
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
            case 'Nombre_tipo_descuento':
                if (!value) {
                    message = 'El nombre del tipo de descuento es obligatorio.';
                } else if (!/^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$/.test(value)) {
                    message = 'Solo se permiten letras y espacios.';
                }
                break;

            case 'id_fp_FK':
                if (!value) {
                    message = 'Debe seleccionar una forma de pago.';
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
