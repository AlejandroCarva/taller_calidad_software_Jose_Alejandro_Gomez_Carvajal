@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3 mb-0">Tipo: {{ $tipo->Nombre_Categoria }}</h1>
  <div>
    <a href="{{ route('tipos_productos.edit', $tipo) }}" class="btn btn-primary">Editar</a>
    <a href="{{ route('tipos_productos.index') }}" class="btn btn-light">Volver</a>
  </div>
</div>

<div class="card shadow-sm mb-3">
  <div class="card-body">
    <dl class="row mb-0">
      <dt class="col-sm-3">ID</dt>
      <dd class="col-sm-9">{{ $tipo->id_Tipos_Productos }}</dd>

      <dt class="col-sm-3">Nombre</dt>
      <dd class="col-sm-9">{{ $tipo->Nombre_Categoria }}</dd>

      <dt class="col-sm-3">Descripción</dt>
      <dd class="col-sm-9">{{ $tipo->Descripcion }}</dd>
    </dl>
  </div>
</div>

<div class="card shadow-sm">
  <div class="card-header">Productos de este tipo</div>
  <div class="table-responsive">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Código</th>
          <th>Stock</th>
          <th>Valor</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      @forelse ($tipo->productos as $p)
        <tr>
          <td>{{ $p->id_productos }}</td>
          <td>{{ $p->Nombre_Product }}</td>
          <td>{{ $p->Codigo_Product }}</td>
          <td>{{ $p->Stock_Product }}</td>
          <td>$ {{ number_format($p->Valor_Product, 2) }}</td>
          <td><a class="btn btn-sm btn-outline-secondary" href="{{ route('productos.show', $p) }}">Ver</a></td>
        </tr>
      @empty
        <tr><td colspan="6" class="text-center py-4">Sin productos</td></tr>
      @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
