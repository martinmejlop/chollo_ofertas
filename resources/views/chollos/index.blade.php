@extends('layouts.plantilla')
@section('titulo', 'Inicio')

@section('contenido')


    <div class="container">
        <h2>Lista de Chollos</h2>

        <!-- Aquí se mostrarán los Mensajes -->
        @if (session('mensaje'))
        <div class="alert alert-success" role="alert">
                {{ session('mensaje') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>URL</th>
                    <th>Categoria</th>
                    <th>Puntuación</th>
                    <th>Precio</th>
                    <th>Precio Descuento</th>
                    <th>Disponible</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se mostrarán los usuarios. Rellena lo que falta -->

                @foreach ($cholloList as $chollo)
                    <tr>
                        <td><img src='img/cholloofertas-{{ $chollo->id }}.jpg' class="img-thumbnail"></td>
                        <td> {{ $chollo->id }} </td>
                        <td> {{ $chollo->titulo }} </td>
                        <td> {{ $chollo->descripcion }} </td>
                        <td> {{ $chollo->url }} </td>
                        <td> {{ $chollo->categoria }} </td>
                        <td> {{ $chollo->puntuacion }} </td>
                        <td> {{ $chollo->precio }} </td>
                        <td> {{ $chollo->precio_descuento }} </td>
                        <td> {{ $chollo->disponible }} </td>
                        <td>
                            <a href=" {{ route('chollos.show', $chollo->id) }} " class="btn btn-info">Ver</a>
                            <a href=" {{ route('chollos.edit', $chollo->id) }} " class="btn btn-warning">Editar</a>
                            <form action="   {{ route('chollos.destroy', $chollo->id) }}" method="POST"
                                style="display: inline;">
                                <!-- Aquí falta una directiva de seguridad de los formularios -->
                                @csrf
                                <!-- Aquí falta el método de envío -->
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
