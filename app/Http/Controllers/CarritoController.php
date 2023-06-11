<?php

namespace App\Http\Controllers;

use App\Models\detallePedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Pedido;


class CarritoController extends Controller
{
    //
    public function carrito()
    {
        $productos = Producto::orderBy('id', 'desc')->paginate(4);
        return view('carrito', compact('productos'));
    }

    //La siguiente función agrega el producto al carrito
    public function agregarProducto(Request $request)
    {

        $producto = Producto::find($request->producto_id);

        Cart::add([
            'id' => $producto->id,
            'name' => $producto->nombre,
            'price' => $producto->precio,
            'qty' => 1,
            'weight' => 1,
            'options' => [
                'imagen' => $producto->imagen,

            ]
        ]);

        return redirect()->back();
    }

    //La siguiente función incrementará la cantidad de mi producto en 1 unidad
    public function incrementarCantidad(Request $request)
    {
        $item = Cart::content()->where("rowId", $request->id)->first();
        Cart::update($request->id, ["qty" => $item->qty + 1]);
        return back();
    }

    //La siguiente función decrementará la cantidad de mi producto en 1 unidad
    public function decrementarCantidad(Request $request)
    {
        $item = Cart::content()->where("rowId", $request->id)->first();
        Cart::update($request->id, ["qty" => $item->qty - 1]);
        return back();
    }

    public function eliminarItem(Request $request)
    {
        Cart::remove($request->id);
        return back();
    }


    public function eliminarCarrito()
    {
        Cart::destroy();
        return back();
    }

    public function confirmarCarrito()
    {
        $pedido = new Pedido();
        $pedido->total = Cart::subtotal();
        $pedido->impuesto = Cart::tax();
        $pedido->baseImponible = Cart::subtotal() / 1.21;
        $pedido->fechapedido = date('Y-m-d h:m');
        $pedido->estado = "Nuevo";
        $pedido->user_id = auth()->user()->id;
        $pedido->timestamps = false;
        $pedido->save();
        foreach (Cart::content() as $item) {
            $detalle = new detallePedido();
            $detalle->precio = $item->price;
            $detalle->cantidad = $item->qty;
            $detalle->importe = $item->price * $item->qty;
            $detalle->producto_id = $item->id;
            $detalle->pedido_id = $pedido->id;
            $pedido->updateStock($item->id, $item->qty);
            $detalle->save();
        }


        Cart::destroy();
        //return redirect
        return redirect()->route('mispedidos')->with('mensaje', 'Pedido creado correctamente!');
    }

    public function misPedidos()
    {
        $pedidos = Pedido::orderBy('fechapedido', 'desc')->where('user_id', '=', auth()->user()->id)->paginate(5);
        return view('pedidos.mispedidos', compact('pedidos'));
    }
}
