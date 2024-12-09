@extends('components.app-layout')

@section('content')

<h1>Productos en tu carrito</h1>

@if(count($productos) > 0)
    <ul>
        @foreach ($productos as $item)
            <li>
                <p>{{ $item->producto->nombre }} - Cantidad: {{ $item->cantidad }}</p>
                <p>Precio: ${{ number_format($item->producto->precio * $item->cantidad, 2) }}</p>
                
                <!-- Formulario para modificar la cantidad -->
                <form action="{{ route('carrito.update', $item->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('PUT')
                    <input type="number" name="cantidad" value="{{ $item->cantidad }}" min="1" required class="form-control" style="width: 100px; display: inline;">
                    <button type="submit" class="btn btn-secondary">Actualizar cantidad</button>
                </form>

                <!-- Formulario para eliminar el producto -->
                <form action="{{ route('carrito.destroy', $item->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>

    <!-- Mostrar el total del carrito -->
    <h3>Total del carrito: ${{ number_format($productos->sum(function($item) {
        return $item->producto->precio * $item->cantidad;
    }), 2) }}</h3>
@else
    <p>No tienes productos en tu carrito.</p>
@endif

@endsection