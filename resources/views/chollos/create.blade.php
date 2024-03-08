@extends('layouts.plantilla')

@section('titulo', 'Alta de Chollos')

@section('contenido')
    <div class="container">
        <h2>Agregar Chollo</h2>

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
        <form action="{{ route('chollos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" class="form-control" value="{{ old('titulo') }}" required>
            </div>
            <!-- Tienes que añadir los otros dos campos -->
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}" required>
            </div>
            <div class="form-group">
                <label for="url">URL:</label>
                <input type="url" name="url" class="form-control" value="{{ old('url') }}" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <input type="text" name="categoria" class="form-control" value="{{ old('categoria') }}" required>
            </div>
            <div class="form-group">
                <label for="puntuacion">Puntuacion:</label>
                <input type="number" name="puntuacion" class="form-control" value="{{ old('puntuacion') }}" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="number" name="precio" class="form-control" value="{{ old('precio') }}" required>
            </div>
            <div class="form-group">
                <label for="precio_descuento">Precio con Descuento:</label>
                <input type="number" name="precio_descuento" class="form-control" value="{{ old('precio_descuento') }}"
                    required>
            </div>
            <div class="form-group">
                <label for="disponible">Disponibilidad:</label><br>
                <td><select name="disponible">
                        <option value="1">Disponible</option>
                        <option value="0">No Disponible</option>
                    </select></td>
            </div><br>
            <button type="submit" class="btn btn-primary">Guardar Chollo</button>
        </form>
    </div>
@endsection
