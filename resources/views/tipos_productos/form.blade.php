<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Nombre de la categoría</label>
    <input type="text" name="Nombre_Categoria" class="form-control" maxlength="35"
           value="{{ old('Nombre_Categoria', optional($tipo)->Nombre_Categoria) }}" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Descripción</label>
    <input type="text" name="Descripcion" class="form-control" maxlength="45"
           value="{{ old('Descripcion', optional($tipo)->Descripcion) }}">
  </div>
</div>
