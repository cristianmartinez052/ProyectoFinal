@extends('layouts.admin')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <main class="py-20">
        <div class="grid mb-4 pb-10 px-8 mx-4 rounded-3xl bg-gray-100">

            <div class="grid grid-cols-12 gap-6">
                <div class="grid grid-cols-12 col-span-12 gap-6 xxl:col-span-9">
                    <div class="col-span-12 mt-8">
                        <div class="flex items-center h-10 intro-y">
                            <h2 class="mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl">
                                Dashboard</h2>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                href="{{ route('pedidos.index') }}">
                                <div class="p-5">
                                    <div class="flex justify-between">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                        @if ($ventas > 0)
                                            <div
                                                class="bg-green-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                                <span class="flex items-center"></span>{{ $ventas }} ventas
                                            </div>
                                        @endif

                                    </div>
                                    <div class="ml-2 w-full flex-1">
                                        <div>
                                            <div class="mt-3 text-3xl font-bold leading-8">{{ $totalPedidos }}</div>

                                            <div class="mt-1 text-base text-gray-600">Pedidos realizados</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                href="{{ route('productos.index') }}">
                                <div class="p-5">
                                    <div class="flex justify-between">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-yellow-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                        @if ($noStock > 0)
                                            <div
                                                class="bg-red-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">

                                                <span class="flex items-center">{{ $noStock }} producto/os sin
                                                    stock</span>

                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-2 w-full flex-1">
                                        <div>
                                            <div class="mt-3 text-3xl font-bold leading-8">{{ $totalProductos }}</div>

                                            <div class="mt-1 text-base text-gray-600">Productos en stock</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                href="{{ route('usuarios.index') }}">
                                <div class="p-5">
                                    <div class="flex justify-between">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-pink-600" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                        </svg>

                                    </div>
                                    <div class="ml-2 w-full flex-1">
                                        <div>
                                            <div class="mt-3 text-3xl font-bold leading-8">{{ $usuarios }}</div>

                                            <div class="mt-1 text-base text-gray-600">Usuarios</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                                href="#">
                                <div class="p-5">
                                    <div class="flex justify-between">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                        </svg>
                                        <div
                                            class="bg-blue-500 rounded-full h-6 px-2 flex justify-items-center text-white font-semibold text-sm">
                                            <span class="flex items-center">30%</span>
                                        </div>
                                    </div>
                                    <div class="ml-2 w-full flex-1">
                                        <div>
                                            <div class="mt-3 text-3xl font-bold leading-8">4.510</div>

                                            <div class="mt-1 text-base text-gray-600">Item Sales</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-span-12 mt-5">
                        <div class="grid gap-2 grid-cols-1 lg:grid-cols-2">
                            <div class="bg-white shadow-lg p-4" id="chartline">
                                <h1 class="font-bold text-base"><i class="fas fa-table me-1"></i>Ventas por mes</h1>
                                <canvas id="grafico1" style="height: 80%"></canvas>
                            </div>
                            <div class="bg-white shadow-lg p-4" id="chartpie">
                                <h1 class="font-bold text-base"><i class="fas fa-table me-1"></i>Productos por marca</h1>
                                <canvas id="grafico2" style="height: 80px; width:80px"></canvas>
                            </div>
                            
                           
                        </div>
                    </div>
                    <div class="col-span-12 mt-5">
                        <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                            <div class="bg-white p-4 shadow-lg rounded-lg">
                                <h1 class="font-bold text-base"><i class="fas fa-table me-1"></i>Productos</h1>
                                <div class="mt-4">
                                    <div class="flex flex-col">
                                        <div class="-my-2 overflow-x-auto">
                                            <div class="py-2 align-middle inline-block min-w-full">
                                                <div
                                                    class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg bg-white">
                                                    <table class="min-w-full divide-y divide-gray-200" id="example">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3">
                                                                    <span class="sr-only">Imagen</span>
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Nombre
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
                                                        <tbody class="bg-white divide-y divide-gray-200">
                                                            @foreach ($productos as $item)
                                                                <tr class="bg-white border-b  hover:bg-gray-50">
                                                                    <td class="w-28 p-4">
                                                                        <img src="{{ Storage::url($item->imagen) }}"
                                                                            alt="{{ $item->nombre }}">
                                                                    </td>
                                                                    <td class="px-6 py-4 font-semibold text-gray-900">
                                                                        {{ $item->nombre }}
                                                                    </td>

                                                                    <td class="px-6 py-4">
                                                                        {{ $item->tipo }}
                                                                    </td>
                                                                    <td class="px-6 py-4  text-gray-900">
                                                                        {{ $item->precio }}&nbsp;€
                                                                    </td>
                                                                    <td class="px-6 py-4  text-gray-900">
                                                                        {{ $item->stock }}&nbsp;uds
                                                                    </td>
                                                                    <td class="px-6 py-4  text-gray-900">
                                                                        {{ $item->categoria->nombre }}
                                                                    </td>
                                                                    <td class="px-6 py-4  text-gray-900">
                                                                        {{ $item->marca->nombre }}
                                                                    </td>
                                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                                        <form method="POST"
                                                                            action="{{ route('productos.destroy', $item) }}">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <a href="{{ route('productos.show', $item) }}"
                                                                                class="font-medium text-blue-700  hover:underline"><i
                                                                                    class="fa-solid fa-magnifying-glass fa-lg me-2"></i></a>
                                                                            <a href="{{ route('productos.edit', $item) }}"
                                                                                class="font-medium text-yellow-500 hover:text-bold"><i
                                                                                    class="fas fa-edit fa-lg me-2"></i></a>
                                                                            <button type="submit"
                                                                                onclick="return confirm('Desea borrar el producto?')"
                                                                                class="font-medium text-red-600  hover:underline"><i
                                                                                    class="fas fa-trash fa-lg me-2"></i></button>

                                                                        </form>

                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3">
                                                                    <span class="sr-only">Imagen</span>
                                                                </th>
                                                                <th scope="col" class="px-6 py-3">
                                                                    Nombre
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
                                                                <th hidden scope="col" class="px-6 py-3">
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
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#example tfoot th').each(function() {
                var title = $(this).text();
                if (title != "imagen") {
                    $(this).html(
                        '<input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" id="' +
                        title + '" type="text" placeholder=' + title + ' />');
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
    <script>
        const grafico1 = document.getElementById('grafico1');
        new Chart(grafico1, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Agosto', 'Septiembre', 'Octubre',
                    'Noviembre', 'Diciembre'
                ],
                datasets: [{
                    label: 'Nº de ventas',
                    data: [{{ $ventasEnero }}, {{ $ventasFebrero }}, {{ $ventasMarzo }},
                        {{ $ventasAbril }}, {{ $ventasMayo }}, {{ $ventasJunio }},
                        {{ $ventasJulio }}, {{ $ventasAgosto }}, {{ $ventasSeptiembre }},
                        {{ $ventasOctubre }}, {{ $ventasNoviembre }}, {{ $ventasDiciembre }}
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var grafico2 = document.getElementById("grafico2");
        var myChart = new Chart(grafico2, {
            type: 'doughnut',
            data: {
                labels:['Apple','Nvidia','Razer','Intel','Sony'],
                datasets: [{
                    label: 'Productos por marca',
                    data: [{{$apple}},{{$nvidia}}, {{$razer}}, {{$intel}},{{$sony}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(250, 110, 0,0.2 )'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(250, 110, 0,0.2)', 
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                
                responsive: true,
                aspectRatio:1.8,
                

            }
        });
    </script>
@endsection
