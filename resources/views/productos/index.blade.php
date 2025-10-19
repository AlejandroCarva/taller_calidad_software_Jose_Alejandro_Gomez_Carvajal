@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3">Productos</h1>
  <div>
    <a href="{{ route('productos.create') }}" class="btn btn-primary">Nuevo producto</a>
    @auth
      <form action="{{ route('logout') }}" method="POST" class="d-inline ms-2">
        @csrf
        <button type="submit" class="btn btn-danger">Cerrar sesión</button>
      </form>
    @endauth
  </div>
</div>

<div class="card shadow-sm">
  <div class="table-responsive">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Código</th>
          <th>Tipo</th>
          <th>Stock</th>
          <th>Valor</th>
          <th class="text-end">Acciones</th>
        </tr>
      </thead>
      <tbody>
      @forelse ($productos as $p)
        <tr>
          <td>{{ $p->id_productos }}</td>
          <td>{{ $p->Nombre_Product }}</td>
          <td>{{ $p->Codigo_Product }}</td>
          <td>
            @if($p->tipoProducto)
              <a href="{{ route('tipos_productos.show', $p->tipoProducto) }}">{{ $p->tipoProducto->Nombre_Categoria }}</a>
            @else
              <span class="text-muted">Sin tipo</span>
            @endif
          </td>
          <td>{{ $p->Stock_Product }}</td>
          <td>$ {{ number_format($p->Valor_Product, 2) }}</td>
          <td class="text-end">
            <a href="{{ route('productos.show', $p) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
            <a href="{{ route('productos.edit', $p) }}" class="btn btn-sm btn-outline-primary">Editar</a>
            <form action="{{ route('productos.destroy', $p) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este producto?');">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="7" class="text-center py-4">No hay productos.</td></tr>
      @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
