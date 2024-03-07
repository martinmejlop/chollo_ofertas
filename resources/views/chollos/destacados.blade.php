@extends('layouts.plantilla')
@section('titulo', 'Inicio')

@section('contenido')


    <div class="container">
        <h2>Lista de Chollos Destacados</h2>
        
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>URL</th>
                    <th>Categoria</th>
                    <th>Puntuación</th>
                    <th>Precio</th>
                    <th>Precio Descuento</th>
                    <th>Disponible</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se mostrarán los usuarios. Rellena lo que falta -->

                @foreach ($cholloList as $chollo)
                    <tr>
                        <td> {{ $chollo->id }} </td>
                        <td> {{ $chollo->titulo }} </td>
                        <td> {{ $chollo->descripcion }} </td>
                        <td> {{ $chollo->url }} </td>
                        <td> {{ $chollo->categoria }} </td>
                        <td> {{ $chollo->puntuacion }} </td>
                        <td> {{ $chollo->precio }} </td>
                        <td> {{ $chollo->precio_descuento }} </td>
                        <td> {{ $chollo->disponible }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
