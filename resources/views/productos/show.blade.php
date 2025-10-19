@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Producto: {{ $producto->Nombre_Product }}</h1>
  <div>
    <a href="{{ route('productos.edit', $producto) }}" class="btn btn-primary">Editar</a>
    <a href="{{ route('productos.index') }}" class="btn btn-light">Volver</a>
  </div>
</div>

<div class="row g-3">
  <div class="col-md-8">
    <div class="card shadow-sm mb-3">
      <div class="card-body">
        <dl class="row mb-0">
          <dt class="col-sm-4">Código</dt>
          <dd class="col-sm-8">{{ $producto->Codigo_Product }}</dd>

          <dt class="col-sm-4">Tipo</dt>
          <dd class="col-sm-8">{{ optional($producto->tipoProducto)->Nombre_Categoria ?? 'Sin tipo' }}</dd>

          <dt class="col-sm-4">Stock</dt>
          <dd class="col-sm-8">{{ $producto->Stock_Product }}</dd>

          <dt class="col-sm-4">Valor</dt>
          <dd class="col-sm-8">$ {{ number_format($producto->Valor_Product, 2) }}</dd>
        </dl>
        <hr>
        <p class="mb-0">{{ $producto->Descripcion }}</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow-sm">
      <div class="card-body text-center">
        @if($producto->imagen)
            <img src="{{ $producto->imagen }}" alt="Imagen del producto" class="img-fluid mb-3" style="max-width:300px;">
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
