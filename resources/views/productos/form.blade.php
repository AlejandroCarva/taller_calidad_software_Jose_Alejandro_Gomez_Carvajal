<div class="row g-3">
  <div class="col-md-6">
    <label class="form-label">Nombre</label>
    <input type="text" name="Nombre_Product" class="form-control" maxlength="30"
           value="{{ old('Nombre_Product', optional($producto)->Nombre_Product) }}" required>
  </div>
  <div class="col-md-6">
    <label class="form-label">Código</label>
    <input type="text" name="Codigo_Product" class="form-control" maxlength="25"
           value="{{ old('Codigo_Product', optional($producto)->Codigo_Product) }}" required>
  </div>
  <div class="col-md-12">
    <label class="form-label">Descripción</label>
    <textarea name="Descripcion" class="form-control" rows="3">{{ old('Descripcion', optional($producto)->Descripcion) }}</textarea>
  </div>
  <div class="col-md-4">
    <label class="form-label">Stock</label>
    <input type="number" name="Stock_Product" class="form-control" min="0"
           value="{{ old('Stock_Product', optional($producto)->Stock_Product ?? 0) }}" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Valor</label>
    <input type="number" name="Valor_Product" class="form-control" min="0" step="0.01"
           value="{{ old('Valor_Product', optional($producto)->Valor_Product ?? 0) }}" required>
  </div>
  <div class="col-md-4">
    <label class="form-label">Tipo de producto</label>
    <select name="Tipos_Productos_id_Tipos_Productos" class="form-select" required>
      <option value="" disabled {{ old('Tipos_Productos_id_Tipos_Productos', optional($producto)->Tipos_Productos_id_Tipos_Productos) ? '' : 'selected' }}>Seleccione un tipo</option>
      @foreach ($tipos as $t)
        <option value="{{ $t->id_Tipos_Productos }}"
          {{ (string)old('Tipos_Productos_id_Tipos_Productos', optional($producto)->Tipos_Productos_id_Tipos_Productos) === (string)$t->id_Tipos_Productos ? 'selected' : '' }}>
          {{ $t->Nombre_Categoria }}
        </option>
      @endforeach
    </select>
  </div>
  <div class="col-md-8">
    <label class="form-label">Imagen</label>
    <input type="file" name="imagen" class="form-control" accept="image/*">
    @if(optional($producto)->imagen)
      <div class="form-text">Imagen actual: <a href="{{ asset('storage/' . $producto->imagen) }}" target="_blank">ver</a></div>
    @endif
  </div>
</div>
