@extends('layouts.app')

@section('content')
<h1 class="h3 mb-3">Nuevo tipo de producto</h1>

<div class="card shadow-sm">
  <div class="card-body">
    <form method="POST" action="{{ route('tipos_productos.store') }}">
      @csrf
      @include('tipos_productos.form', ['tipo' => null])
      <div class="mt-3">
        <a href="{{ route('tipos_productos.index') }}" class="btn btn-light">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>
@endsection
