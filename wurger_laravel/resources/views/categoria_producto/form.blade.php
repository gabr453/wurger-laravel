<div class="form-group">
    <label for="Nombre_categoria">Nombre de la Categoría</label>
    <input type="text" name="Nombre_categoria" id="Nombre_categoria"
        value="{{ old('Nombre_categoria', $categoria->Nombre_categoria ?? '') }}" required maxlength="30">
    @error('Nombre_categoria') <div style="color: red;">{{ $message }}</div> @enderror
</div>

<div class="form-group">
    <label for="cantidad_categoria">Cantidad</label>
    <input type="number" name="cantidad_categoria" id="cantidad_categoria"
        value="{{ old('cantidad_categoria', $categoria->cantidad_categoria ?? '') }}" required min="0">
    @error('cantidad_categoria') <div style="color: red;">{{ $message }}</div> @enderror
</div>
