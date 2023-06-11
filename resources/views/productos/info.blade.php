@extends('layouts.base')

@section('content')
    <section class="my-10 bg-gray-200">
        <section class="py-20">
            <div class="container px-4 mx-auto">
                <div class="max-w-xl lg:max-w-6xl mx-auto">
                    <div class="flex flex-wrap -mx-4 mb-12">
                        <div class="w-full lg:w-1/2 px-4 mb-12 lg:mb-0">
                            <div class="lg:w-112">
                                <img alt="ecommerce"
                                    class="w-full object-cover object-center rounded  shadow-md border-gray-200"
                                    src="{{ Storage::url($producto->imagen) }}">
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2 px-4">
                            <div class="max-w-lg">
                                <h2 class="text-3xl font-black mb-1">{{ $producto->nombre }}</h2>
                                <span class="block text-sm font-bold mb-5">{{ $producto->marca->nombre }}</span>

                                <span class="block text-2xl font-black text-blue-500 mb-4">{{ $producto->precio }}€</span>
                                <p class="font-bold mb-2">{{ $producto->descripcion }}</p>
                                <ul class="list-disc list-inside font-medium mb-6">
                                    @foreach (explode('-', $producto->caracteristicas) as $fields)
                                        <li>{{ $fields }}</li>
                                    @endforeach
                                </ul>


                            </div>
                            <div class="flex flex-wrap sm:flex-nowrap items-center -mx-2 mb-6">
                                <div class="flex-grow-1 w-full px-2 mb-4">
                                    <a class="group relative inline-block h-12 w-full -mb-2 bg-blueGray-900 rounded-md"
                                        href="#">
                                        <div class="absolute top-0 left-0  w-full h-full">


                                            <form method="POST" action="{{route('agregarProducto')}}">
                                                @csrf
                                                
                                                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                                                <input type="hidden" name="precio" value="{{ $producto->precio }}">

                                                <button type="submit"
                                                    class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Añadir
                                                    al carrito</button>
                                            </form>

                                        </div>
                                    </a>
                                </div>
                                <div class="w-auto px-2 mb-4">

                                </div>

                            </div>
                            <span class="block text-sm font-black mb-2">Comparte en tus redes sociales</span>
                            <div>
                                <a href="" class="inline-block text-blue-500 hover:text-indigo-500 mr-6"
                                    href="#">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.6349 20.7272V12.766H16.3583L16.7669 9.66243H13.6349V7.68126C13.6349 6.78299 13.8882 6.17083 15.203 6.17083L16.8771 6.17015V3.39421C16.5876 3.35731 15.5938 3.27271 14.4371 3.27271C12.0217 3.27271 10.3681 4.71878 10.3681 7.37389V9.66243H7.63647V12.766H10.3681V20.7272H13.6349Z"
                                            fill="currentColor"></path>
                                        <mask id="mask0_601_10113" style="mask-type:alpha" maskunits="userSpaceOnUse"
                                            x="7" y="3" width="10" height="18">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M13.6349 20.7272V12.766H16.3583L16.7669 9.66243H13.6349V7.68126C13.6349 6.78299 13.8882 6.17083 15.203 6.17083L16.8771 6.17015V3.39421C16.5876 3.35731 15.5938 3.27271 14.4371 3.27271C12.0217 3.27271 10.3681 4.71878 10.3681 7.37389V9.66243H7.63647V12.766H10.3681V20.7272H13.6349Z"
                                                fill="white"></path>
                                        </mask>
                                    </svg>
                                </a>
                                <a class="inline-block text-blue-500 hover:text-indigo-500 mr-6" href="#">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M21.8181 6.14598C21.1356 6.44844 20.4032 6.65356 19.6336 6.74513C20.4194 6.27462 21.0208 5.52831 21.3059 4.64177C20.5689 5.0775 19.7553 5.39389 18.8885 5.56541C18.1943 4.82489 17.2069 4.36365 16.1118 4.36365C14.0108 4.36365 12.3072 6.06719 12.3072 8.16707C12.3072 8.46489 12.3408 8.75577 12.4057 9.03392C9.24434 8.87513 6.44104 7.3605 4.56483 5.05895C4.23686 5.61986 4.05028 6.27344 4.05028 6.9711C4.05028 8.29107 4.72243 9.45574 5.74225 10.1371C5.11877 10.1163 4.53237 9.94477 4.01901 9.65968V9.70719C4.01901 11.5498 5.33086 13.0876 7.07031 13.4376C6.75161 13.5234 6.41555 13.5709 6.06789 13.5709C5.82222 13.5709 5.58464 13.5466 5.35171 13.5002C5.8361 15.0125 7.24067 16.1123 8.90483 16.1424C7.6034 17.1623 5.96243 17.7683 4.1801 17.7683C3.87301 17.7683 3.57052 17.7498 3.27271 17.7162C4.95655 18.7974 6.95561 19.4279 9.10416 19.4279C16.1026 19.4279 19.928 13.6312 19.928 8.60398L19.9153 8.11147C20.6627 7.57834 21.3094 6.90853 21.8181 6.14598Z"
                                            fill="currentColor"></path>
                                        <mask id="mask0_601_10114" style="mask-type:alpha" maskunits="userSpaceOnUse"
                                            x="3" y="4" width="19" height="16">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M21.8181 6.14598C21.1356 6.44844 20.4032 6.65356 19.6336 6.74513C20.4194 6.27462 21.0208 5.52831 21.3059 4.64177C20.5689 5.0775 19.7553 5.39389 18.8885 5.56541C18.1943 4.82489 17.2069 4.36365 16.1118 4.36365C14.0108 4.36365 12.3072 6.06719 12.3072 8.16707C12.3072 8.46489 12.3408 8.75577 12.4057 9.03392C9.24434 8.87513 6.44104 7.3605 4.56483 5.05895C4.23686 5.61986 4.05028 6.27344 4.05028 6.9711C4.05028 8.29107 4.72243 9.45574 5.74225 10.1371C5.11877 10.1163 4.53237 9.94477 4.01901 9.65968V9.70719C4.01901 11.5498 5.33086 13.0876 7.07031 13.4376C6.75161 13.5234 6.41555 13.5709 6.06789 13.5709C5.82222 13.5709 5.58464 13.5466 5.35171 13.5002C5.8361 15.0125 7.24067 16.1123 8.90483 16.1424C7.6034 17.1623 5.96243 17.7683 4.1801 17.7683C3.87301 17.7683 3.57052 17.7498 3.27271 17.7162C4.95655 18.7974 6.95561 19.4279 9.10416 19.4279C16.1026 19.4279 19.928 13.6312 19.928 8.60398L19.9153 8.11147C20.6627 7.57834 21.3094 6.90853 21.8181 6.14598Z"
                                                fill="white"></path>
                                        </mask>
                                    </svg>
                                </a>
                                <a class="inline-block text-blue-500 hover:text-indigo-500 mr-6" href="#">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.6007 2.18176H16.3992C19.3874 2.18176 21.8184 4.61276 21.8182 7.60069V16.3992C21.8182 19.3871 19.3874 21.8181 16.3992 21.8181H7.6007C4.61276 21.8181 2.18188 19.3872 2.18188 16.3992V7.60069C2.18188 4.61276 4.61276 2.18176 7.6007 2.18176ZM16.3993 20.0759C18.4267 20.0759 20.0761 18.4266 20.0761 16.3992H20.076V7.60069C20.076 5.57343 18.4266 3.924 16.3992 3.924H7.6007C5.57343 3.924 3.92412 5.57343 3.92412 7.60069V16.3992C3.92412 18.4266 5.57343 20.076 7.6007 20.0759H16.3993ZM6.85721 12.0001C6.85721 9.16418 9.16425 6.85709 12.0001 6.85709C14.8359 6.85709 17.1429 9.16418 17.1429 12.0001C17.1429 14.8358 14.8359 17.1428 12.0001 17.1428C9.16425 17.1428 6.85721 14.8358 6.85721 12.0001ZM8.62805 11.9999C8.62805 13.8592 10.1408 15.3718 12.0001 15.3718C13.8593 15.3718 15.3721 13.8592 15.3721 11.9999C15.3721 10.1405 13.8594 8.62784 12.0001 8.62784C10.1407 8.62784 8.62805 10.1405 8.62805 11.9999Z"
                                            fill="currentColor"></path>
                                        <mask id="mask0_601_10115" style="mask-type:alpha" maskunits="userSpaceOnUse"
                                            x="2" y="2" width="20" height="20">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.6007 2.18176H16.3992C19.3874 2.18176 21.8184 4.61276 21.8182 7.60069V16.3992C21.8182 19.3871 19.3874 21.8181 16.3992 21.8181H7.6007C4.61276 21.8181 2.18188 19.3872 2.18188 16.3992V7.60069C2.18188 4.61276 4.61276 2.18176 7.6007 2.18176ZM16.3993 20.0759C18.4267 20.0759 20.0761 18.4266 20.0761 16.3992H20.076V7.60069C20.076 5.57343 18.4266 3.924 16.3992 3.924H7.6007C5.57343 3.924 3.92412 5.57343 3.92412 7.60069V16.3992C3.92412 18.4266 5.57343 20.076 7.6007 20.0759H16.3993ZM6.85721 12.0001C6.85721 9.16418 9.16425 6.85709 12.0001 6.85709C14.8359 6.85709 17.1429 9.16418 17.1429 12.0001C17.1429 14.8358 14.8359 17.1428 12.0001 17.1428C9.16425 17.1428 6.85721 14.8358 6.85721 12.0001ZM8.62805 11.9999C8.62805 13.8592 10.1408 15.3718 12.0001 15.3718C13.8593 15.3718 15.3721 13.8592 15.3721 11.9999C15.3721 10.1405 13.8594 8.62784 12.0001 8.62784C10.1407 8.62784 8.62805 10.1405 8.62805 11.9999Z"
                                                fill="white"></path>
                                        </mask>
                                    </svg>
                                </a>
                                <a class="inline-block text-blue-500 hover:text-indigo-500" href="#">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.2 3H4.8C3.81 3 3 3.81 3 4.8V19.2C3 20.19 3.81 21 4.8 21H19.2C20.19 21 21 20.19 21 19.2V4.8C21 3.81 20.19 3 19.2 3ZM8.4 18.3H5.7V10.2H8.4V18.3ZM7.05 8.67C6.15 8.67 5.43 7.95 5.43 7.05C5.43 6.15 6.15 5.43 7.05 5.43C7.95 5.43 8.67 6.15 8.67 7.05C8.67 7.95 7.95 8.67 7.05 8.67ZM18.3 18.3H15.6V13.53C15.6 12.81 14.97 12.18 14.25 12.18C13.53 12.18 12.9 12.81 12.9 13.53V18.3H10.2V10.2H12.9V11.28C13.35 10.56 14.34 10.02 15.15 10.02C16.86 10.02 18.3 11.46 18.3 13.17V18.3Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mt-2 bg-gray-200">
                <div class="mt-10">
                    <h1 class="mb-4 text-3xl font-extrabold text-gray-700  md:text-5xl lg:text-4xl">Últimas <span
                            class="text-transparent bg-clip-text bg-gradient-to-r to-blue-700 from-blue-400">novedades.</span>
                    </h1>
                    <div class="grid gap-6 grid-cols-1  sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                        @foreach ($ultimosProductos as $item)
                            <div
                                class="w-full max-w-sm mx-auto border border-gray-200 rounded-md shadow-lg overflow-hidden">
                                <div class="flex items-end shadow justify-end h-80 w-full bg-cover object-cover"
                                    style="background-image: url('{{ Storage::url($item->imagen) }}')">
                                    <form method="POST" action="{{ route('agregarProducto') }}">
                                        @csrf
                                        
                                        <input type="hidden" name="producto_id" value="{{ $item->id }}">
                                        <input type="hidden" name="precio" value="{{ $item->precio }}">
                                        <button type="submit"
                                            class="p-2.5 rounded-full bg-blue-600 text-white mx-5 -mb-10 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path
                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                <div class="px-5 py-3 bg-gray-800 ">
                                    <h3 class="text-gray-200  font-bold font-sans uppercase">{{ $item->nombre }}</h3>
                                    <span class="text-gray-100 mt-2 font-thin">{{ $item->precio }}€</span>
                                </div>
                            </div>
                        @endforeach
                       


                    </div>
                </div>
            </div>
            </main>


            </div>

            </div>
            </div>
        </section>
    </section>
@endsection
