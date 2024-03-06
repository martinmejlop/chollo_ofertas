@extends('layouts.plantilla')

@section('titulo', 'Detalle de Usuarios')

@section('contenido')
    <div class="container">
        <h2>Detalles del Chollo</h2>

        <p><strong>ID:</strong>{{ $chollo->id }}</p>
        <p><strong>Título:</strong>{{ $chollo->titulo }}</p>
        <p><strong>Descripción:</strong>{{ $chollo->descripcion }}</p>
        <p><strong>URL:</strong>{{ $chollo->url }}</p>
        <p><strong>Categoria:</strong>{{ $chollo->categoria }}</p>
        <p><strong>Puntuación:</strong>{{ $chollo->puntuacion }}</p>
        <p><strong>Precio:</strong>{{ $chollo->precio }}</p>
        <p><strong>Precio Descuento:</strong>{{ $chollo->precio_descuento }}</p>
        <p><strong>Disponibilidad:</strong>{{ $chollo->disponible }}</p>
        <a href="{{ route('chollos.index') }}" class="btn btn-secondary">Volver a la lista de chollos</a>
    </div>

@endsection
