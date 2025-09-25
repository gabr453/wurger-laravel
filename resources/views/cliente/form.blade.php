<div class="form-group">
    <label>Nombre</label>
    <input type="text" name="Nom_cliente" value="{{ old('Nom_cliente', $cliente->Nom_cliente ?? '') }}" required>
</div>

<div class="form-group">
    <label>Teléfono</label>
    <input type="text" name="Tel_cliente" value="{{ old('Tel_cliente', $cliente->Tel_cliente ?? '') }}">
</div>

<div class="form-group">
    <label>Dirección</label>
    <input type="text" name="Direc_cliente" value="{{ old('Direc_cliente', $cliente->Direc_cliente ?? '') }}">
</div>
