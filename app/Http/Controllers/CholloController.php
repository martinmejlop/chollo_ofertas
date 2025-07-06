<?php

namespace App\Http\Controllers;

use App\Models\Chollo;
use Illuminate\Http\Request;

class CholloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cholloList = Chollo::all();
        return view('chollos.index', compact('cholloList'));
    }

    public function destacados()
    {
        $cholloList = Chollo::orderBy('puntuacion', 'desc')->paginate();
        return view('chollos.destacados', compact('cholloList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chollos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required|max:1000',
            'url' => 'required|url|max:500',
            'categoria' => 'required|max:100',
            'puntuacion' => 'required|numeric|min:0|max:10',
            'precio' => 'required|numeric|min:0',
            'precio_descuento' => 'required|numeric|min:0',
            'disponible' => 'required|boolean'
        ], [
            'titulo.required' => 'El titulo es obligatorio',
            'titulo.max' => 'El titulo no puede tener más de 255 caracteres',
            'descripcion.required' => 'La descripcion es obligatoria',
            'descripcion.max' => 'La descripcion no puede tener más de 1000 caracteres',
            'url.required' => 'La url es obligatoria',
            'url.url' => 'La url debe tener un formato válido',
            'url.max' => 'La url no puede tener más de 500 caracteres',
            'categoria.required' => 'La categoria es obligatoria',
            'categoria.max' => 'La categoria no puede tener más de 100 caracteres',
            'puntuacion.required' => 'La puntuacion es obligatoria',
            'puntuacion.numeric' => 'La puntuacion debe ser un número',
            'puntuacion.min' => 'La puntuacion debe ser mayor o igual a 0',
            'puntuacion.max' => 'La puntuacion debe ser menor o igual a 10',
            'precio.required' => 'El precio es obligatorio',
            'precio.numeric' => 'El precio debe ser un número',
            'precio.min' => 'El precio debe ser mayor o igual a 0',
            'precio_descuento.required' => 'El precio de descuento es obligatorio',
            'precio_descuento.numeric' => 'El precio de descuento debe ser un número',
            'precio_descuento.min' => 'El precio de descuento debe ser mayor o igual a 0',
            'disponible.required' => 'La disponibilidad es obligatoria',
            'disponible.boolean' => 'La disponibilidad debe ser verdadero o falso',
        ]);

        Chollo::create($request->all());

        return redirect()->route('chollos.index')->with('mensaje', 'Chollo creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chollo = Chollo::findOrFail($id);
        return view('chollos.show', compact('chollo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $chollo = Chollo::findOrFail($id);
        return view('chollos.edit', compact('chollo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required|max:1000',
            'url' => 'required|url|max:500',
            'categoria' => 'required|max:100',
            'puntuacion' => 'required|numeric|min:0|max:10',
            'precio' => 'required|numeric|min:0',
            'precio_descuento' => 'required|numeric|min:0',
            'disponible' => 'required|boolean'
        ], [
            'titulo.required' => 'El titulo es obligatorio',
            'titulo.max' => 'El titulo no puede tener más de 255 caracteres',
            'descripcion.required' => 'La descripcion es obligatoria',
            'descripcion.max' => 'La descripcion no puede tener más de 1000 caracteres',
            'url.required' => 'La url es obligatoria',
            'url.url' => 'La url debe tener un formato válido',
            'url.max' => 'La url no puede tener más de 500 caracteres',
            'categoria.required' => 'La categoria es obligatoria',
            'categoria.max' => 'La categoria no puede tener más de 100 caracteres',
            'puntuacion.required' => 'La puntuacion es obligatoria',
            'puntuacion.numeric' => 'La puntuacion debe ser un número',
            'puntuacion.min' => 'La puntuacion debe ser mayor o igual a 0',
            'puntuacion.max' => 'La puntuacion debe ser menor o igual a 10',
            'precio.required' => 'El precio es obligatorio',
            'precio.numeric' => 'El precio debe ser un número',
            'precio.min' => 'El precio debe ser mayor o igual a 0',
            'precio_descuento.required' => 'El precio de descuento es obligatorio',
            'precio_descuento.numeric' => 'El precio de descuento debe ser un número',
            'precio_descuento.min' => 'El precio de descuento debe ser mayor o igual a 0',
            'disponible.required' => 'La disponibilidad es obligatoria',
            'disponible.boolean' => 'La disponibilidad debe ser verdadero o falso',
        ]);

        $chollo = Chollo::findOrFail($id);
        $chollo->update($request->all());
        return redirect()->route('chollos.index')->with('mensaje', 'Chollo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chollo = Chollo::findOrFail($id);
        $chollo->delete();
        return redirect()->route('chollos.index')->with('mensaje', 'Chollo eliminado exitosamente');
    }
}
