@extends('components.app-layout')

@section('content')

<!-- Enlace para volver a la lista de productos, adaptado dependiendo de la ruta -->
<a href="{{ route(request()->segment(1) . '.index', ['categoria' => $producto->categoria]) }}">Volver</a>

<h1>{{ $producto->nombre}}</h1> <!-- Mostrar nombre del producto -->

<!-- Mostrar imagen del producto -->
<img src="{{ asset($producto->image) }}" alt="{{ $producto->nombre }}" class="img-fluid">

<!-- Mostrar categoría -->
<p><b>Categoría:</b> {{$producto->categoria}}</p>

<!-- Mostrar descripción o contenido del producto -->
<p>{{$producto->description}}</p>

<!-- Mostrar precio -->
<p><b>Precio:</b> ${{ number_format($producto->precio, 2) }}</p>

<!-- Formulario para agregar al carrito -->
<form action="{{ route('carrito.store') }}" method="POST">
    @csrf
    <input type="hidden" name="producto_id" value="{{ $producto->id }}">

    <div class="form-group">
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" value="1" min="1" required class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Agregar al carrito</button>
</form>

@if(session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif


@endsection