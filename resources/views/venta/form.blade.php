<form action="{{ isset($venta) ? route('venta.update', $venta->id_venta) : route('venta.store') }}" method="POST">
    @csrf
    @if(isset($venta))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="Fecha_venta">Fecha de la Venta</label>
        <input type="date" name="Fecha_venta" id="Fecha_venta"
               value="{{ old('Fecha_venta', $venta->Fecha_venta ?? '') }}" required>
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Fecha_venta') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Estado_venta">Estado de la Venta</label>
        <select name="Estado_venta" id="Estado_venta" required>
            <option value="">Seleccione</option>
            <option value="Pendiente" {{ old('Estado_venta', $venta->Estado_venta ?? '') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="Pagada" {{ old('Estado_venta', $venta->Estado_venta ?? '') == 'Pagada' ? 'selected' : '' }}>Pagada</option>
            <option value="Anulada" {{ old('Estado_venta', $venta->Estado_venta ?? '') == 'Anulada' ? 'selected' : '' }}>Anulada</option>
        </select>
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Estado_venta') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="id_usuario_FK">Usuario Responsable</label>
        <select name="id_usuario_FK" id="id_usuario_FK" required>
            <option value="">Seleccione un usuario</option>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id_usuario }}" {{ old('id_usuario_FK', $venta->id_usuario_FK ?? '') == $usuario->id_usuario ? 'selected' : '' }}>
                    {{ $usuario->Nom_usuario }} {{ $usuario->Apellido_usuario }}
                </option>
            @endforeach
        </select>
        <span class="error-message" style="color:red;display:none;"></span>
        @error('id_usuario_FK') <div style="color:red">{{ $message }}</div> @enderror
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
            case 'Fecha_venta':
                if (!value) {
                    message = 'La fecha es obligatoria.';
                } else {
                    const inputDate = new Date(value + "T00:00:00"); // asegurar formato correcto
                    const today = new Date();
                    today.setHours(0,0,0,0); // quitar horas
                    if (inputDate > today) {
                        message = 'La fecha no puede ser futura.';
                    }
                }
                break;

            case 'Estado_venta':
                if (!value) {
                    message = 'Debe seleccionar un estado.';
                }
                break;

            case 'id_usuario_FK':
                if (!value) {
                    message = 'Debe seleccionar un usuario.';
                }
                break;
        }

        showError(input, message);
        return message === '';
    }

    // Validación en vivo
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
