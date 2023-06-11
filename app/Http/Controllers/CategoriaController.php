<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriaController extends Controller
{
    public Categoria $cat;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $categorias = Categoria::orderBy('id', 'asc')->get();
        return view('categorias.index', compact('categorias'));
    }

   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'unique:categorias,nombre'],
            'descripcion' => ['required', 'string', 'min:5']
        ]);




        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);


        return redirect()->route('categorias.index')->with('mensaje', 'Categoría creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //

        return view('categorias.update', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
        $request->validate([
            'nombre' => ['required', 'string', 'min:3', 'unique:categorias,nombre,'.$categoria->id],
            'descripcion' => ['required', 'string', 'min:5']
        ]);

        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('mensaje', 'Categoría editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //

        $categoria->delete();
        return redirect()->route('categorias.index')->with('mensaje', 'Categoría borrada correctamente');
    }
}
