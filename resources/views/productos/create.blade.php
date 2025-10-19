@extends('layouts.app')

@section('content')
<h1 class="h3 mb-3">Nuevo producto</h1>

<div class="card shadow-sm">
  <div class="card-body">
    <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
      @csrf
      @include('productos.form', ['producto' => null, 'tipos' => $tipos])
      <div class="mb-3">
        <label for="imagen" class="form-label">Enlace de la imagen (URL)</label>
        <input type="url" class="form-control" id="imagen" name="imagen" placeholder="https://ejemplo.com/imagen.jpg" value="{{ old('imagen') }}">
        <small class="form-text text-muted">Pon aquí el enlace de la imagen de internet.</small>
      </div>
      <div class="mt-3">
        <a href="{{ route('productos.index') }}" class="btn btn-light">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>
@endsection
