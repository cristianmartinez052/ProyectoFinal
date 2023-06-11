<x-app-layout>
    <style>
        @layer utilities {

            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
        }
    </style>

    <div class="container mx-auto mb-10 bg-gray-200">
        <div class=" bg-gray-200" style="padding-top: 7rem">
            <h1 class="mb-10 text-center text-3xl leading-10 font-bold">Productos del carrito</h1>
            @if (count(Cart::content()))
                <div class="mx-auto  max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
                    <div class="rounded-lg md:w-2/3">
                        @foreach (Cart::content() as $item)
                            <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                <img src="{{ Storage::url($item->options->imagen) }}" alt="product-image"
                                    class="w-full rounded-lg sm:w-40" />
                                <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                    <div class="mt-5 sm:mt-0">
                                        <h2 class="text-lg font-bold text-gray-900">{{ $item->name }}</h2>

                                    </div>
                                    <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
                                        <div class="flex items-center border-gray-100">
                                            <a href="/decrementar/{{$item->rowId}}"
                                                class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                                - </a>
                                            <input class="h-8 w-8 border border-gray-100 bg-white text-center text-xs outline-none"
                                                type="number" value="{{ $item->qty }}" min="1" />
                                            <a href="/incrementar/{{$item->rowId}}"
                                                class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50">
                                                + </a>
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <p class="text-sm">{{ $item->price }} €</p>
                                            <a href="/eliminarItem/{{$item->rowId}}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <!-- Sub total -->
                    <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                        <div class="mb-2 flex justify-between">
                            <p class="text-gray-700">Subtotal</p>
                            <p class="text-gray-700">{{ Cart::subtotal() }} €</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-gray-700">Envío</p>
                            <p class="text-gray-700">0.00 €</p>
                        </div>
                        <hr class="my-4" />
                        <div class="flex justify-between">
                            <p class="text-lg font-bold">Total</p>
                            <div class="">
                                <p class="mb-1 text-lg text-right font-bold">{{ Cart::subtotal() }} €</p>
                                <p class="text-sm text-gray-700">Impuestos incluidos</p>
                            </div>
                        </div>
                        <div class="flex justify-center mt-5">
                            <a href="/confirmarCarrito"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2">Realizar
                            pedido</a>
                        </div>
                        
                    </div>
                </div>
            @else
                <div class="my-3 mx-auto px-4">
                    <p class="text-lg whitespace-nowrap text-center text-gray-800 fw-bold mb-3">Tu carrito de compra
                        está
                        vacío
                    </p>
                    <div class="flex justify-center">
                        <a href="#"
                            class=" text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full shadow-lg text-sm px-3 py-2.5 text-center mb-1">Explorar
                            artículos</a>
                    </div>
                </div>
            @endif

        </div>
        <hr class="my-5 border border-gray-400" />
        <div class="mt-10">
            <h1 class="mb-10 text-left text-3xl leading-3 font-bold">Otros usuarios tambien compraron</h1>
            <div
                class="grid  grid-flow-row gap-4 text-neutral-600 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($productos as $item)
                    <div class="w-full max-w-sm  bg-white border  rounded-md shadow-md ">

                        <div class="flex flex-col items-center pb-10">

                            <img class="object-cover h-42 w-96   my-5" src="{{ Storage::url($item->imagen) }}"
                                alt="Bonnie image" />

                            <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $item->nombre }}
                            </h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $item->precio }}€</span>
                            <div class="flex justify-center mt-4 space-x-3 md:mt-6">
                                <form method="POST" action="{{ route('agregarProducto') }}">
                                    @csrf
                                    <input type="hidden" name="producto_id" value="{{ $item->id }}">
                                    <input type="hidden" name="precio" value="{{ $item->precio }}">
                                    <button type="submit"
                                        class=" inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Añadir
                                        al carrito</button>
                                    <a href="{{ route('productos.show', $item) }}"
                                        class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Leer
                                        más</a>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="my-2 w-full mx-auto">{{ $productos->links('vendor.pagination.simple-tailwind') }}</div>
        </div>
    </div>
    
        
    

</x-app-layout>
