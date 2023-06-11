@extends('layouts.base')

@section('content')
    <div class="py-20 mb-0">

        <div class="w-5/6 mt-2  mx-auto p-6 bg-transparet  rounded-lg  ">

            <h5 class="mb-2 text-center text-3xl  tracking-tight text-gray-900">Detalle del pedido</h5>
            <div class="bg-white rounded-lg shadow-lg px-8 py-10 max-w-xl mx-auto">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center">
                        <img class="h-8 w-8 mr-2" src="https://flowbite.com/docs/images/logo.svg" alt="Logo" />
                        <div class="text-gray-700 font-semibold leading-10 text-2xl">ComputerZone</div>
                    </div>
                    <div class="text-gray-700">
                        <div class="font-bold text-xl mb-2">INVOICE</div>
                        <div class="text-sm">Fecha: {{ $pedido->fechapedido }}</div>
                        <div class="text-sm">Invoice #: {{ $pedido->id }}</div>
                    </div>
                </div>
                <div class="border-b-2 border-gray-300 pb-8 mb-8">
                    <h2 class="text-xl font-bold mb-4">Enviar a:</h2>
                    <div class="text-gray-700 mb-2">{{ $pedido->user->name }}</div>
                    <div class="text-gray-700">{{ $pedido->user->email }}</div>
                </div>
                <table class="w-full text-left mb-8">
                    <thead>
                        <tr>
                            <th class="text-gray-700 font-bold uppercase py-2">Descripcion</th>
                            <th class="text-gray-700 font-bold uppercase py-2">Cantidad</th>
                            <th class="text-gray-700 font-bold uppercase py-2">Precio</th>
                            <th class="text-gray-700 font-bold uppercase py-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalle as $item)
                            <tr>
                                <td class="py-4 text-gray-700">{{ $item->producto->nombre }}</td>
                                <td class="py-4 text-gray-700 text-center">{{ $item->cantidad }}</td>
                                <td class="py-4 text-gray-700 text-center">{{ $item->precio }}</td>
                                <td class="py-4 text-gray-700 text-center">{{ $item->importe }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                <div class="flex justify-end mb-3">
                    <div class="text-gray-700 mr-2">Subtotal:</div>
                    <div class="text-gray-700">{{$pedido->subotal}}€</div>
                </div>
                <div class="flex justify-end mb-8">
                    <div class="text-gray-700 mr-2">Impuestos 21% IVA:</div>
                    <div class="text-gray-700"></div>

                </div>
                <div class="flex justify-end mb-8">
                    <div class="text-gray-700 font-bold text-xl mr-2">Total:</div>
                    <div class="text-gray-700 font-bold text-xl">{{ $pedido->total }} €</div>
                </div>
                <div class="border-t-2 flex items-center justify-center border-gray-300 pt-8 mb-8">
                    <a href="{{ url()->previous() }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-arrow-left me-1"></i>Volver</a>
                </div>
            </div>



        </div>
    @endsection
