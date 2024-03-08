@extends('layouts.plantilla')

@section('titulo', 'Edición de Usuarios')

@section('contenido')
    <div class="container">
        <h2>Editar Chollo</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Agrega la ruta -->
        <form action="{{ route('chollos.update', $chollo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" class="form-control" value="{{ $chollo->titulo }}" required>
            </div>
            <!-- Tienes que añadir los otros dos campos -->
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" name="descripcion" class="form-control" value="{{ $chollo->descripcion }}" required>
            </div>
            <div class="form-group">
                <label for="url">URL:</label>
                <input type="url" name="url" class="form-control" value="{{ $chollo->url }}" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <input type="text" name="categoria" class="form-control" value="{{ $chollo->categoria }}" required>
            </div>
            <div class="form-group">
                <label for="puntuacion">Puntuacion:</label>
                <input type="number" name="puntuacion" class="form-control" value="{{ $chollo->puntuacion }}" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" class="form-control" value="{{ $chollo->precio }}" required>
            </div>
            <div class="form-group">
                <label for="precio_descuento">Precio con Descuento:</label>
                <input type="number" name="precio_descuento" class="form-control" value="{{ $chollo->precio_descuento }}"
                    required>
            </div>
            <div class="form-group">
                <label for="disponible">Disponibilidad:</label>
                <td><select name="disponible">
                        <option value="1">Disponible</option>
                        <option value="0">No Disponible</option>
                    </select></td>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection
