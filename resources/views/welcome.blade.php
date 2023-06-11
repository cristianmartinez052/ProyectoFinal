@extends('layouts.base')
@section('content')
    <style>
        section {
            --opacidad-negro: 0.5;
            background-image: linear-gradient(rgba(0, 0, 0, var(--opacidad-negro)), rgba(0, 0, 0, var(--opacidad-negro))), url({{ Storage::url($ultimaPortada->imagen) }});
        }

        #contenido {}
    </style>


    <div class="container mx-auto pt-20">

        <section class="bg-center bg-no-repeat   bg-gray-700">
            <div class="px-4 mx-auto max-w-screen-xl text-center  lg:py-56">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                    Nuevo {{ $ultimaPortada->producto->nombre }} {{ $ultimaPortada->producto->id }}</h1>
                <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">
                    {{ $ultimaPortada->titulo }}</p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                    <form method="POST" action="{{ route('agregarProducto') }}">
                        @csrf
                        <input type="hidden" name="producto_id" value="{{ $ultimaPortada->producto->id }}">
                        <input type="hidden" name="precio" value="{{ $ultimaPortada->producto->precio }}">
                        <button type="submit"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            Comprar ya
                            <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <a href="{{ route('productos.show', $ultimaPortada->producto) }}"
                            class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg border border-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                            Leer más
                        </a>
                    </form>
                </div>
            </div>
        </section>
        <div class="my-3">

            <div
                class="grid  grid-flow-row gap-4 text-neutral-600 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 justify-items-center">
                @foreach ($productos as $item)
                    <div class="w-full max-w-sm  bg-gray-800 border border-gray-600 rounded-md shadow-xxl ">

                        <div class="flex flex-col items-center pb-10">

                            <img class="object-cover h-42 w-96   my-5" src="{{ Storage::url($item->imagen) }}"
                                alt="Bonnie image" />

                            <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $item->nombre }}</h5>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $item->precio }}€</span>
                            <div class="flex mt-4 space-x-3 md:mt-6">
                                <form method="POST" action="{{ route('agregarProducto') }}">
                                    @csrf
                                    <input type="hidden" name="producto_id" value="{{ $item->id }}">
                                    <input type="hidden" name="precio" value="{{ $item->precio }}">
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Añadir
                                        al carrito</button>
                                    <a href="{{ route('productos.show', $item) }}"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Leer
                                        más</a>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="my-3 w-full mx-auto">{{ $productos->links('vendor.pagination.simple-tailwind') }}</div>

            <div class="mt-4 ">


                <div class="grid grid-cols-2 gap-2 pb-20">
                    
                        <aside
                            class="bg-center shadow w-full h-96 bg-no-repeat bg-[url('https://assets3.razerzone.com/_5SCDe3ECp_gBrI2xoLq1ocgOBE=/1500x1000/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh26%2Fha9%2F9090918449182%2Frazer-tomahawk-a1-1500x1000_0.jpg')] bg-gray-700 bg-blend-multiply rounded-lg">
                            <div class="px-4 mx-auto  text-center py-20 lg:py-25">
                                <h1
                                    class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-white md:text-3xl lg:text-5xl">
                                    Componentes</h1>
                                    <p class="mb-8 text-md font-normal text-gray-300 lg:text-lg sm:px-16 lg:px-48"><span class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">Construye tu poder:</span>personaliza tu victoria: los mejores componentes para tu PC</p>
                                <div
                                    class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                                    <a href="{{ route('catalogo', 1) }}"
                                        class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                                        Ver más
                                        <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>

                                </div>
                            </div>
                        </aside>
                        <aside
                        class="bg-center h- w-full h-96 bg-no-repeat bg-[url('https://assets3.razerzone.com/kXDM40fNUS-3fzHeejJWxrrLE-Y=/1500x1000/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh98%2Fh1f%2F9140864221214%2Fviper-8khz-1500x1000-01.jpg')] bg-gray-700 bg-blend-multiply rounded-lg">
                        <div class="px-4 mx-auto  text-center py-20 lg:py-25">
                            <h1
                                class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-white md:text-3xl lg:text-5xl">
                                Gaming</h1>
                                <p class="mb-8 text-md font-normal text-gray-300 lg:text-lg sm:px-16 lg:px-48">Desata tu potencial de juego, vive la <span class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">adrenalina</span> del gaming</p>
                            <div
                                class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                                <a href="{{ route('catalogo', 5) }}"
                                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                                    Ver más
                                    <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>

                            </div>
                        </div>
                    </aside>
                    <aside
                    class="bg-center h- w-full h-96 bg-no-repeat bg-[url('https://assets3.razerzone.com/Pl5kIw_IRiXfbDMEsLWPBa6e-wM=/1500x1000/https%3A%2F%2Fhybrismediaprod.blob.core.windows.net%2Fsys-master-phoenix-images-container%2Fh96%2Fhf8%2F9407843663902%2F220531-barracuda-pro-1500x1000-3.jpg')] bg-gray-700 bg-blend-multiply rounded-lg">
                    <div class="px-4 mx-auto  text-center py-20 lg:py-25">
                        <h1
                            class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-white md:text-3xl lg:text-5xl">
                            Periféricos</h1>
                            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-lg sm:px-16 lg:px-48">Potencia tu experiencia, <span class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">domina el juego</span> con nuestros periféricos de alto rendimiento</p>
                        <div
                            class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                            <a href="{{ route('catalogo', 2) }}"
                                class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                                Ver más
                                <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>

                        </div>
                    </div>
                </aside>
                <aside
                class="bg-center h- w-full h-96 bg-no-repeat bg-[url('https://assets2.razerzone.com/images/pnx.assets/dd0c32673320708bb1ca3cbe56938293/razer-kaira-pro-for-playstation-hero-desktop.jpg')] bg-gray-700 bg-blend-multiply rounded-lg">
                <div class="px-4 mx-auto  text-center py-20 lg:py-25">
                    <h1
                        class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-white md:text-3xl lg:text-5xl">
                        Consolas y videojuegos</h1>
                        <p class="mb-8 text-lg text-center font-normal text-gray-300 lg:text-lg sm:px-16 lg:px-48">Sumérgete en un mundo de <span class="text-transparent bg-clip-text bg-gradient-to-r to-blue-600 from-sky-400">aventuras:</span>a tu tienda de videojuegos</p>
                    <div
                        class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('catalogo', 4)}}"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            Ver más
                            <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>

                    </div>
                </div>
            </aside>
                    




                </div>


            </div>
        </div>


    </div>
@endsection
