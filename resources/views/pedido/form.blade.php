<form action="{{ isset($pedido) ? route('pedido.update', $pedido->id_pedido) : route('pedido.store') }}" method="POST">
    @csrf
    @if(isset($pedido))
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="Fecha_pedido">Fecha del Pedido</label>
        <input type="date" name="Fecha_pedido" id="Fecha_pedido"
               value="{{ old('Fecha_pedido', $pedido->Fecha_pedido ?? '') }}" required>
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Fecha_pedido') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Observaciones_devoluciones">Observaciones / Devoluciones</label>
        <input type="text" name="Observaciones_devoluciones" id="Observaciones_devoluciones"
               value="{{ old('Observaciones_devoluciones', $pedido->Observaciones_devoluciones ?? '') }}" maxlength="30">
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Observaciones_devoluciones') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="Estado_pedido">Estado del Pedido</label>
        <select name="Estado_pedido" id="Estado_pedido" required>
            <option value="">Seleccione</option>
            <option value="Pendiente" {{ old('Estado_pedido', $pedido->Estado_pedido ?? '') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="Entregado" {{ old('Estado_pedido', $pedido->Estado_pedido ?? '') == 'Entregado' ? 'selected' : '' }}>Entregado</option>
            <option value="Cancelado" {{ old('Estado_pedido', $pedido->Estado_pedido ?? '') == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
        </select>
        <span class="error-message" style="color:red;display:none;"></span>
        @error('Estado_pedido') <div style="color:red">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label for="id_cliente_FK">Cliente</label>
        <select name="id_cliente_FK" id="id_cliente_FK" required>
            <option value="">Seleccione un cliente</option>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id_cliente }}" {{ old('id_cliente_FK', $pedido->id_cliente_FK ?? '') == $cliente->id_cliente ? 'selected' : '' }}>
                    {{ $cliente->Nom_cliente }}
                </option>
            @endforeach
        </select>
        <span class="error-message" style="color:red;display:none;"></span>
        @error('id_cliente_FK') <div style="color:red">{{ $message }}</div> @enderror
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
            case 'Fecha_pedido':
                if (!value) {
                    message = 'La fecha es obligatoria.';
                } else {
                    const today = new Date().toISOString().split('T')[0];
                    if (value > today) {
                        message = 'La fecha no puede ser futura.';
                    }
                }
                break;

            case 'Observaciones_devoluciones':
                if (value.length > 30) {
                    message = 'Máximo 30 caracteres.';
                }
                break;

            case 'Estado_pedido':
                if (!value) {
                    message = 'Debe seleccionar un estado.';
                }
                break;

            case 'id_cliente_FK':
                if (!value) {
                    message = 'Debe seleccionar un cliente.';
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
