@extends('components.app-layout')

@section('content')

<h1>Bienvenido a la página de Accesorios Basquetbol</h1>
<ul>
@foreach ($productos as $producto)
    <li>
        <a href="{{ route('basquetbol.show', ['basquetbol' => $producto->id, 'categoria' => request()->categoria]) }}">
            {{ $producto->nombre }}
        </a>
    </li>
@endforeach
</ul>

<!-- Paginación -->
{{ $productos->links() }}

@endsection