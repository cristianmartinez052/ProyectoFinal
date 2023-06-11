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

                
            </div>
            <!-- Modal Editar -->
            <!-- Modal body -->
            <form action="{{ route('productos.update', $producto) }}" method="POST" name="createForm"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                        Nombre
                    </label>
                    <input value="{{$producto->nombre }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="titulo" type="text" placeholder="Nombre del producto" name="nombre"
                        />
                    @error('nombre')
                        <p class="text-red-700 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                        Tipo
                    </label>
                    <input value="{{$producto->tipo }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="titulo" type="text" placeholder="Tipo de producto" name="tipo"/>
                    @error('tipo')
                        <p class="text-red-700 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="contenido">
                        Descripción
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="contenido" placeholder="Descripción del producto" name="descripcion">{{$producto->descripcion}}</textarea>
                    @error('descripcion')
                        <p class="text-red-700 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="contenido">
                        Características
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="contenido" placeholder="Características del producto" name="caracteristicas">{{ $producto->caracteristicas }}</textarea>
                    @error('caracteristicas')
                        <p class="text-red-700 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">
                        Precio
                    </label>
                    <input value="{{$producto->precio}}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="precio" type="text" placeholder="Precio del producto..." name="precio" step="any" />
                    @error('precio')
                        <p class="text-red-700 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                        Stock
                    </label>
                    <input value="{{$producto->stock }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="titulo" type="text" placeholder="Stock del producto..." name="stock" />
                    @error('stock')
                        <p class="text-red-700 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="categoria">
                        Categoria
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="categoria" name="categoria_id">
                        <option>Selecciona una categoría</option>
                        @foreach ($categorias as $item)
                        <option value="{{ $item->id }}" @if($item->id==$producto->categoria_id) selected @endif>{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                    @error('categoria_id')
                        <p class="text-red-700 text-xs italic mt-2">{{ $message }}</p>
                    @enderror

                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="marca">
                        Marca
                    </label>
                    <select
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="marca" name="marca_id">
                        <option>Selecciona una marca</option>
                        @foreach ($marcas as $item)
                        <option value="{{ $item->id }}" @if($item->id==$producto->marca_id) selected @endif>{{ $item->nombre }}</option>
                        @endforeach
                    </select>
                    @error('marca_id')
                        <p class="text-red-700 text-xs italic mt-2">{{ $message }}</p>
                    @enderror

                </div>
                <div class="mt-3 mb-5">
                    <label for="logo" class="col-form-label">Imagen</label>
                    <input type="file" name="imagen" class="form-control" id="image" accept="image/*">
                    @error('imagen')
                        <p class="text-red-700 text-xs italic mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end items-center">
                    <img src="{{Storage::url($producto->imagen)}}" class="bg-cover bg-center h-52 shadow-md w-42" id="img">
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Guardar cambios
                </button>
              

            </form>

            </form>

        </div>
    </div>
    <script>
        //Cambiar imagen 
        document.getElementById("image").addEventListener('change', cambiarImagen);
        function cambiarImagen(event){
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload=(event)=>{
                document.getElementById("img").setAttribute('src', event.target.result)
            };
            reader.readAsDataURL(file);
    
        }
    </script>
@endsection
