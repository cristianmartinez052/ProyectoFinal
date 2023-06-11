<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Portada;
use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\User;
use App\Models\Marca;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = Categoria::orderBy('nombre')->paginate(4);
        $producto = Producto::orderBy('nombre');
        $ultimaPortada = Portada::latest('created_at')->first();
        $productos = Producto::where('stock', '>', '0')->paginate(4);
        $ultimosProductos = Producto::latest('created_at')->limit(4)->get();
        return view('welcome', compact('ultimaPortada', 'productos', 'ultimosProductos', 'producto', 'categorias'));
    }

    public function dashboard()
    {

        $apple = Producto::where('marca_id','=','1')->count();
        $razer= Producto::where('marca_id','=','9')->count();
        $intel=Producto::where('marca_id','=','4')->count();
        $nvidia =Producto::where('marca_id','=','2')->count();
        $sony = Producto::where('marca_id','=','12')->count();
        $marcas = Marca::orderBy('id','desc')->get();
        $ventasEnero = Pedido::whereMonth('fechapedido', '01')->count();
        $ventasFebrero = Pedido::whereMonth('fechapedido', '02')->count();
        $ventasMarzo = Pedido::whereMonth('fechapedido', '03')->count();
        $ventasAbril = Pedido::whereMonth('fechapedido', '04')->count();
        $ventasMayo = Pedido::whereMonth('fechapedido', '05')->count();
        $ventasJunio = Pedido::whereMonth('fechapedido', '06')->count();
        $ventasJulio = Pedido::whereMonth('fechapedido', '07')->count();
        $ventasAgosto = Pedido::whereMonth('fechapedido', '08')->count();
        $ventasSeptiembre = Pedido::whereMonth('fechapedido', '09')->count();
        $ventasOctubre = Pedido::whereMonth('fechapedido', '10')->count();
        $ventasNoviembre = Pedido::whereMonth('fechapedido', '11')->count();
        $ventasDiciembre = Pedido::whereMonth('fechapedido', '01')->count();
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $productos = Producto::orderBy('id', 'desc')->get();
        $usuarios = User::count();
        $ventas = Pedido::where('estado', '=', 'Completado')->count();
        $noStock = Producto::where('stock', '==', 0)->count();
        $totalPedidos = Pedido::count();
        $totalProductos = Producto::where('stock', '>', 0)->count();
        return view('dashboard', compact('apple','sony','razer','nvidia','intel','totalPedidos', 'totalProductos', 'noStock', 'ventas', 'usuarios', 'productos', 'meses', 'ventasEnero', 'ventasFebrero', 'ventasMarzo', 'ventasAbril', 'ventasMayo', 'ventasJunio', 'ventasJulio', 'ventasAgosto', 'ventasSeptiembre', 'ventasOctubre', 'ventasNoviembre', 'ventasDiciembre'));
    }



    public function catalogo($categoria_id)
    {

        $cate = Categoria::find($categoria_id);
        $categorias = Categoria::all();
        $productos = Producto::where('categoria_id', '=', $categoria_id)->paginate(12);
        return view('catalogo', compact('productos', 'categorias', 'cate'));
    }

    public function catalogoGenerico()
    {

        $categorias = Categoria::all();
        $productos = Producto::orderBy('created_at', 'desc')->paginate(12);
        return view('catalogo', compact('productos', 'categorias'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
