<?php

namespace App\Http\Controllers;

use App\Models\Portada;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Producto::all();
        $producto = Producto::orderBy('nombre');
        $portadas = Portada::orderBy('id', 'desc')->paginate(5);
        return view('portadas.index', compact('portadas', 'producto', 'productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'titulo' => ['required', 'string', 'min:3'],
            'producto_id' => ['required', 'exists:productos,id'],
            'imagen' => ['required', 'image', 'max:2048']

        ]);

        $file=$request->file('imagen');
        
        //Se ha subido la imagen, la almaceno fisicamente
        $url = Storage::put("portadas/", $request->file('imagen'));
        $urlBuena = "portadas/" . basename($url);


        //guardo el producto en la base de datos
        $portada = Portada::create($request->all());
        $portada->update([
            'imagen' => $urlBuena
        ]);
        return redirect()->route('portadas.index')->with('mensaje', 'Portada creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portada $portada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portada $portada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portada $portada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portada $portada)
    {
        //
        Storage::delete($portada->imagen);
        $portada->delete();
        return redirect()->route('portadas.index')->with('mensaje','Portada borrada correctamente');
    }
}
