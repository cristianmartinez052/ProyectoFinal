@extends('layouts.admin')
@section('content')
    <section class="py-20 mx-auto">

        <!-- Contenido de la segunda columna -->

        <div class="w-2/6 mt-2  mx-auto p-6 bg-white  rounded-lg shadow  ">


            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4  mb-4 rounded-t border-b sm:mb-5">
                <h3 class="text-2xl  font-semibold text-center text-gray-800 px-5">
                    Actualizar Pedido nº {{ $pedido->id }}
                </h3>


            </div>
            <!-- Modal Editar -->
            <!-- Modal body -->
            <form action="{{ route('pedidos.update', $pedido) }}" method="POST" name="createForm"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria">
                    Actualizar estado
                </label>
                <select
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="categoria" name="estado">
                    <option>Selecciona un estado</option>
                    @foreach ($estado as $e)
                        <option value="{{ $e }}"  @if($e==$pedido->estado) selected @endif>{{ $e }}</option>
                    @endforeach
                </select>
                <div class="mt-5">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Actualizar estado

                    </button>
                </div>
            </form>
        </div>

    </section>
@endsection
