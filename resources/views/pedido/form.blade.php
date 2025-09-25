<div class="form-group">
    <label>Fecha del Pedido</label>
    <input type="date" name="Fecha_pedido" value="{{ old('Fecha_pedido', $pedido->Fecha_pedido ?? '') }}" required>
</div>

<div class="form-group">
    <label>Observaciones / Devoluciones</label>
    <input type="text" name="Observaciones_devoluciones" value="{{ old('Observaciones_devoluciones', $pedido->Observaciones_devoluciones ?? '') }}">
</div>

<div class="form-group">
    <label>Estado</label>
    <select name="Estado_pedido" required>
        <option value="Pendiente" {{ old('Estado_pedido', $pedido->Estado_pedido ?? '') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
        <option value="Entregado" {{ old('Estado_pedido', $pedido->Estado_pedido ?? '') == 'Entregado' ? 'selected' : '' }}>Entregado</option>
        <option value="Cancelado" {{ old('Estado_pedido', $pedido->Estado_pedido ?? '') == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
    </select>
</div>

<div class="form-group">
    <label>Cliente</label>
    <select name="id_cliente_FK" required>
        <option value="">Seleccione un cliente</option>
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->id_cliente }}" 
              {{ old('id_cliente_FK', $pedido->id_cliente_FK ?? '') == $cliente->id_cliente ? 'selected' : '' }}>
              {{ $cliente->Nom_cliente }}
            </option>
        @endforeach
    </select>
</div>
