<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $marca = Marca::all();
        $cat = Categoria::all();
        $categorias = Categoria::orderBy(('nombre'));
        $marcas = Marca::orderBy('nombre');
        $productos = Producto::orderBy('id', 'desc')->get();
        return view('productos.index', compact('productos', 'categorias', 'marcas', 'cat', 'marca'));
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



        $request->validate([
            'nombre' => ['required', 'string', 'min:3'],
            'descripcion' => ['required', 'string', 'min:5'],
            'tipo' => ['required', 'string', 'min:3'],
            'caracteristicas' => ['required', 'string', 'min:5'],
            'precio' => ['required','numeric','regex:/^[0-9]+(\.[0-9]{1,2})?$/'],
            'stock' => ['required', 'integer'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'marca_id' => ['required', 'exists:marcas,id'],
            'imagen' => ['required', 'image', 'max:2048']

        ]);

        $file = $request->file('imagen');

        //Se ha subido la imagen, la almaceno fisicamente
        $url = Storage::put("productos/", $request->file('imagen'));
        $urlBuena = "productos/" . basename($url);


        //guardo el producto en la base de datos
        $producto = Producto::create($request->all());
        $producto->update([
            'imagen' => $urlBuena
        ]);
        return redirect()->route('productos.index')->with('mensaje', 'Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //

        //devolveremos un array de productos que sean de la misma marca
        $ultimosProductos = Producto::latest('created_at')->limit(4)->get();
        return view('productos.info', compact('producto', 'ultimosProductos'));
    }


    public function productoinfo(Request $request)
    {
        //devolveremos un array de productos que sean de la misma marca
        $ultimosProductos = Producto::latest('created_at')->limit(4)->get();
        $producto = Producto::find($request->id);
        return view('productos.info', compact('producto', 'ultimosProductos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('productos.update', compact('producto', 'categorias', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
        
        $request->validate([
            'nombre' => ['required', 'string', 'min:3'],
            'descripcion' => ['required', 'string', 'min:5'],
            'tipo' => ['required', 'string', 'min:3'],
            'caracteristicas' => ['required', 'string', 'min:5'],
            'precio' => ['required', 'integer', 'min:1'],
            'stock' => ['required', 'integer'],
            'categoria_id' => ['required', 'exists:categorias,id'],
            'marca_id' => ['required', 'exists:marcas,id'],
            'imagen' => ['nullable', 'image', 'max:2048']
        ]);


        if ($request->file('imagen')) {
            //Vamos a cambiar la imagen
            //Borramos la imagen antigua
            Storage::delete($producto->imagen);
            //Se ha subido la imagen la almaceno fisicamente
            //Se ha subido la imagen, la almaceno fisicamente
            $url = Storage::put("productos/", $request->file('imagen'));
            $urlBuena = "productos/" . basename($url);
            $producto->update($request->all());
            $producto->update([
                'imagen' => $urlBuena
            ]);
        } else {
            $producto->update($request->all());
        }
        return redirect()->route('productos.index')->with('mensaje', 'Producto editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //Borro la imagen
        Storage::delete($producto->imagen);
        $producto->delete();
        return redirect()->route('productos.index')->with('mensaje', 'Producto borrado correctamente');
    }
}
