<form action="{{ isset($detalle) ? route('detalle_movimiento.update', $detalle->id_detalle_movimiento) : route('detalle_movimiento.store') }}" method="POST">
    @csrf
    @if(isset($detalle))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="Cantidad_detalle_movimiento">Cantidad</label>
        <input type="number" name="Cantidad_detalle_movimiento" id="Cantidad_detalle_movimiento"
               value="{{ old('Cantidad_detalle_movimiento', $detalle->Cantidad_detalle_movimiento ?? '') }}" required min="1">
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Cantidad_detalle_movimiento') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="id_movimiento_FK">Movimiento</label>
        <select name="id_movimiento_FK" id="id_movimiento_FK" required>
            <option value="">Seleccione un movimiento</option>
            @foreach($movimientos as $movimiento)
                <option value="{{ $movimiento->id_movimiento }}"
                        {{ old('id_movimiento_FK', $detalle->id_movimiento_FK ?? '') == $movimiento->id_movimiento ? 'selected' : '' }}>
                    {{ $movimiento->Tipo_movimiento }} - {{ $movimiento->Fecha_movimiento }}
                </option>
            @endforeach
        </select>
        <span class="error-message" style="color:red;display:none;"></span>
        @error('id_movimiento_FK') <div style="color:red">{{ $message }}</div> @enderror
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
            case 'Cantidad_detalle_movimiento':
                if (!value) {
                    message = 'La cantidad es obligatoria.';
                } else if (isNaN(value) || Number(value) < 1) {
                    message = 'Debe ingresar un número mayor o igual a 1.';
                }
                break;

            case 'id_movimiento_FK':
                if (!value) {
                    message = 'Debe seleccionar un movimiento.';
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
