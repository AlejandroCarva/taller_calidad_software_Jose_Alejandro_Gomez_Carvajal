@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h3">Tipos de productos</h1>
  <a href="{{ route('tipos_productos.create') }}" class="btn btn-primary">Nuevo tipo</a>
  </div>

<div class="card shadow-sm">
  <div class="table-responsive">
    <table class="table table-striped mb-0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th class="text-end">Acciones</th>
        </tr>
      </thead>
      <tbody>
      @forelse ($tipos as $t)
        <tr>
          <td>{{ $t->id_Tipos_Productos }}</td>
          <td>{{ $t->Nombre_Categoria }}</td>
          <td>{{ $t->Descripcion }}</td>
          <td class="text-end">
            <a href="{{ route('tipos_productos.show', $t) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
            <a href="{{ route('tipos_productos.edit', $t) }}" class="btn btn-sm btn-outline-primary">Editar</a>
            <form action="{{ route('tipos_productos.destroy', $t) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este tipo?');">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-outline-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="4" class="text-center py-4">No hay tipos creados.</td></tr>
      @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
