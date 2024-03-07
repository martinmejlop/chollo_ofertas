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
            'titulo' => 'required',
            'descripcion' => 'required',
            'url' => 'required',
            'categoria' => 'required',
            'puntuacion'=>'required',
            'precio'=>'required',
            'precio_descuento'=>'required',
            'disponible'=>'required'
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
            'titulo' => 'required',
            'descripcion' => 'required',
            'url' => 'required',
            'categoria' => 'required',
            'puntuacion'=>'required',
            'precio'=>'required',
            'precio_descuento'=>'required',
            'disponible'=>'required'
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
