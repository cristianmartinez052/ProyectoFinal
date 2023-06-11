<?php

namespace App\Http\Controllers;

use App\Models\detallePedido;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pedidos = Pedido::orderBy('id', 'desc')->get();
        return view('pedidos.index', compact('pedidos'));
    }

    public function misPedidos()
    {
        $pedidos = Pedido::oderBy('fechapedido', 'desc')->where('user_id', '=', auth()->user()->id)->paginate(5);
        return view('mispedidos', compact('pedidos'));
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
    public function show(Pedido $pedido)
    {
        //
        $detalle = detallePedido::orderBy('id', 'desc')->where('pedido_id', '=', $pedido->id)->get();

        return view('pedidos.detalle', compact('detalle', 'pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //

        $estado = ['Cancelado','Completado','Enviado'];
       return view('pedidos.update', compact('pedido','estado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
    
        $pedido->update(['estado' => $request->estado]);
        return redirect()->route('pedidos.index')->with('mensaje', 'Estado del pedido nº' . $pedido->id . ' ha sido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
