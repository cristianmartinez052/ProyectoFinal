@extends('layouts.admin')
@section('content')
    <div class="py-20 mb-0">
       
                <!-- Contenido de la segunda columna -->

                <div class="w-2/6 mt-2  mx-auto p-6 bg-white  rounded-lg shadow  ">
                    
                           
                                <!-- Modal header -->
                                <div class="flex justify-between items-center pb-4  mb-4 rounded-t border-b sm:mb-5">
                                    <h3 class="text-2xl  font-semibold text-center text-gray-800 px-5">
                                        Editar Categoría
                                    </h3>
                                    
                                    </button>
                                </div>
                                <!-- Modal Editar -->
                                <form action="{{ route('categorias.update', $categoria) }}" method="POST"
                                    name="createForm">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                                            Nombre
                                        </label>
                                        <input value="{{ @old('titulo', $categoria->nombre) }}"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="titulo" type="text" placeholder="Nombre de la categoría..."
                                            name="nombre" />
                                        @error('nombre')
                                            <p class="text-red-700 text-xs italic mt-2">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="contenido">
                                            Descripción
                                        </label>
                                        <textarea
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="contenido" placeholder="Contenido del post..." name="descripcion">{{ @old('descripcion', $categoria->descripcion) }}</textarea>
                                        @error('descripcion')
                                            <p class="text-red-700 text-xs italic mt-2">
                                                {{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Guardar Cambios</button>
                                    <a href="{{route('categorias.index')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i class="fas fa-arrow-left me-1"></i>Volver</a>                                   

                                </form>
                           
                </div>
            </div>
@endsection
