@extends('layouts.admin')
@section('content')
    
    <div class="py-20 mb-0">
        
                <!-- Contenido de la segunda columna -->

                <div class="w-5/6 mt-2  mx-auto p-6 bg-white  rounded-lg shadow  ">
                    <a href="#">
                        <h5 class="mb-2 text-center text-3xl  tracking-tight text-gray-900">Lista de Usuarios</h5>
                    </a>
                    <div>

                        <!-- Modal toggle -->


                    </div>
                    <div class="table-responsive mt-5">

                        <div class=" overflow-x-auto sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500" id="example">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Fecha de alta
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $item)
                                        <tr class="bg-white border-b text-gray-700">
                                            <td class="px-6 py-4">{{ $item->id }}</td>
                                            <td class="px-6 py-4">{{ $item->name }}</td>
                                            <td class="px-6 py-4">{{ $item->email }}</td>
                                            <td class="px-6 py-4">{{ $item->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                  $('#example').DataTable({
                    "order": [2, 'desc'],
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
    <div>
@endsection
