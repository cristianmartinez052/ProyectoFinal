@extends('layouts.admin')
@section('content')
    <div class="py-20 mb-0">

        <!-- Contenido de la segunda columna -->

        <div class="w-5/6 mt-2  mx-auto p-6 bg-white  rounded-lg shadow  ">
            <a href="#">
                <h5 class="mb-2 text-center text-3xl  tracking-tight text-gray-900">Lista de productos</h5>
            </a>
            <div class="my-5">
                <button id="modalCreateButton" data-modal-toggle="modalCreate" data-modal-show="modalCreate" type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                        class="fas fa-plus me-1"></i>Producto</button>
                <a href="{{ route('portadas.index') }}"
                    class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"><i
                        class="fa-regular fa-image me-1"></i>Portadas</a>
            </div>
            @if (session('mensaje'))
                <div id="alert-1" class="flex p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 " role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('mensaje') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8"
                        data-dismiss-target="#alert-1" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif




            <div class="table-responsive mt-5">


                <div class="overflow-x-auto  sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 " id="example">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Imagem</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Descripcion
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Características
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tipo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Precio
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Stock
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Categoría
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Marca
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $item)
                                <tr class="bg-white border-b  hover:bg-gray-50">
                                    <td class="w-32 p-4">
                                        <img src="{{ Storage::url($item->imagen) }}" alt="{{ $item->nombre }}">
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        {{ $item->nombre }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->descripcion }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->caracteristicas }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->tipo }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        {{ $item->precio }}&nbsp;€
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        {{ $item->stock }}&nbsp;uds
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        {{ $item->categoria->nombre }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        {{ $item->marca->nombre }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form method="POST" action="{{ route('productos.destroy', $item) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('productos.show', $item) }}"
                                                class="font-medium text-blue-700  hover:underline"><i
                                                    class="fa-solid fa-magnifying-glass fa-lg me-2"></i></a>
                                            <a href="{{ route('productos.edit', $item) }}"
                                                class="font-medium text-yellow-500 hover:text-bold"><i
                                                    class="fas fa-edit fa-lg me-2"></i></a>
                                            <button type="submit" onclick="return confirm('Desea borrar el producto?')"
                                                class="font-medium text-red-600  hover:underline"><i
                                                    class="fas fa-trash fa-lg me-2"></i></button>
                                          
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th  scope="col" class="px-6 py-3">
                                    <span class="sr-only">Imagen</span>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Descripcion
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Características
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tipo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Precio
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Stock
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Categoría
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Marca
                                </th>
                                <th hidden  scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                   
                </div>
                

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-----Modal crear--------->
    <!-- Main modal -->
    <div id="modalCreate" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4  mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-center text-gray-800 px-5">
                        Nuevo Producto
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-500 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-toggle="modalCreate">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('productos.store') }}" method="POST" name="createForm"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                            Nombre
                        </label>
                        <input value="{{ @old('nombre') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="titulo" type="text" placeholder="Nombre del producto" name="nombre" />
                        @error('nombre')
                            <p class="text-red-700 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                            Tipo
                        </label>
                        <input value="{{ @old('tipo') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="titulo" type="text" placeholder="Tipo de producto" name="tipo" />
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
                            id="contenido" placeholder="Descripción del producto" name="descripcion">{{ @old('descripcion') }}</textarea>
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
                            id="contenido" placeholder="Características del producto" name="caracteristicas">{{ @old('caracteristicas') }}</textarea>
                        @error('caracteristicas')
                            <p class="text-red-700 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="precio">
                            Precio
                        </label>
                        <input value="{{ @old('precio') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="precio" type="text" placeholder="Precio del producto..." name="precio"
                            step="any" />
                        @error('precio')
                            <p class="text-red-700 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="titulo">
                            Stock
                        </label>
                        <input value="{{ @old('stock') }}"
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
                            @foreach ($cat as $item)
                                <option value="{{ $item->id }}" @selected($item->id == @old('categoria_id'))>{{ $item->nombre }}
                                </option>
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
                            @foreach ($marca as $item)
                                <option value="{{ $item->id }}" @selected($item->id == @old('marca_id'))>{{ $item->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('marca_id')
                            <p class="text-red-700 text-xs italic mt-2">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="mt-3 mb-5">
                        <label for="logo" class="col-form-label">Imagen</label>
                        <input type="file" name="imagen" class="form-control" accept="image/*">
                        @error('imagen')
                            <p class="text-red-700 text-xs italic mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Añadir producto
                    </button>

                </form>
            </div>
        </div>







    </div>
    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example tfoot th').each(function() {
                var title = $(this).text();
                if (title != "imagen") {
                    $(this).html('<input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="' + title + '" type="text" placeholder='+title+' />');
                }
              
            });
            // DataTable
            var table = $('#example').DataTable({
                initComplete: function() {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function() {
                            var that = this;

                            $('input', this.footer()).on('keyup change clear', function() {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                          
                        });
                },
                "order": [1, 'desc'],
                "lengthMenu": [5, 10, 20, 100],
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                },
            });
        });
    </script>

    @if ($errors->any())
        <script>
            const modal = document.getElementById('modalCreate');
            const ventana = new Modal(modal)
            ventana.show();
        </script>
    @endif
@endsection
