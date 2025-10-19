<div class="row g-3">
  <div class="col-md-6">
    <label for="Nombre_Categoria" class="form-label">Nombre de la categoría</label>
    <input type="text" id="Nombre_Categoria" name="Nombre_Categoria" class="form-control" maxlength="35"
           value="{{ old('Nombre_Categoria', optional($tipo)->Nombre_Categoria) }}" required>
  </div>
  <div class="col-md-6">
    <label for="Descripcion_tipo" class="form-label">Descripción</label>
    <input type="text" id="Descripcion_tipo" name="Descripcion" class="form-control" maxlength="45"
           value="{{ old('Descripcion', optional($tipo)->Descripcion) }}">
  </div>
</div>
