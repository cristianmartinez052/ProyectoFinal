@extends('layouts.admin')


@section('content')
    <div class="py-20 mb-0">

        <!-- Contenido de la segunda columna -->

        <div class="w-5/6 mt-2  mx-auto p-6 bg-white  shadow rounded-lg   ">
            <a href="#">
                <h5 class="mb-2 text-center text-3xl  tracking-tight text-gray-900">Lista de pedidos</h5>
            </a>

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
                        <thead class="text-xs text-gray-700  uppercase bg-gray-200">
                            <tr class="rounded">

                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Usuario
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha Pedido
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Estado
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total
                                </th>
                                <th scope="col" class="right">
                                    Acciones
                                </th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($pedidos as $item)
                                <tr class="bg-white border-b  hover:bg-gray-50">

                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        {{ $item->id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->fechapedido }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div
                                                class="h-2.5 w-2.5 rounded-full @if ($item->estado == 'Nuevo') bg-blue-500 @elseif ($item->estado == 'Enviado') bg-yellow-500  @elseif ($item->estado == 'Completado') bg-green-600 @elseif ($item->estado == 'Cancelado') bg-red-600 @endif mr-2 end">
                                            </div> {{ $item->estado }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                        {{ $item->total }}&nbsp;€
                                    </td>


                                    <td class="p whitespace-nowrap flex justify-start ">
                                        <a href="{{ route('pedidos.show', $item) }}"
                                            class="font-medium flex items-center px-3 py-2 text-blue-600 dark:text-blue-600 hover:text-semibold"><svg
                                                fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                                class="h-6 w-6 text-blue-600">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                                </path>
                                            </svg>Detalle pedido</a>

                                        <a href="{{ route('pedidos.edit', $item) }}" data-modal-show="modalCreate"
                                            type="button"
                                            class="font-medium flex items-center px-3 py-2 text-yellow-600  hover:text-semibold">
                                            <svg fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true" class="h-6 w-6 text-yellow-500">
                                                <path
                                                    d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z">
                                                </path>
                                                <path
                                                    d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z">
                                                </path>
                                            </svg>
                                            Actualizar estado</a>
                                    </td>
                                </tr>
                            @endforeach

                </div>
                </tbody>
                <tfoot>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Usuario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha Pedido
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col" hidden class="right">
                        Acciones
                    </th>
                </tfoot>
                </table>
                <script>
                    $(document).ready(function() {
                        // Setup - add a text input to each footer cell
                        $('#example tfoot th').each(function() {
                            var title = $(this).text();
                            if (title != "Acciones") {
                                $(this).html('<input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="' + title + '" type="text" placeholder="Buscar" />');
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
                                        $('#btn-reset').on('click', function() {

                                            document.getElementById("Id").value = '';
                                            document.getElementById("Usuario").value = '';
                                            document.getElementById("Fecha Pedido").value = '';
                                            document.getElementById("Estado").value = '';
                                            document.getElementById("Total").value = "";
                                            that.search('').draw();

                                        });
                                    });
                            },
                            "order": [1, 'desc'],
                            "lengthMenu": [15, 30, 50, 100],
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
            </div>
        </div>
      

    </div>

    </div>
    </div>
@endsection
