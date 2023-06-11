<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>ComputerZone</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
        <title>{{ config('app.name', 'ComputerZone') }}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Styles -->
        @livewireStyles
    </head>
<body>
    
<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
        </button>
        <a href="{{ route('inicio') }}" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">ComputerZone</span>
        </a>
        <div class="flex items-center  mr-5 md:order-2">
            
                <div class="ml-3 relative">
                    <x-dropdown align="right" width="60">
                        <x-slot name="trigger">

                            <a href="#"
                                class="relative inline-flex items-center p-3 text-sm font-medium text-center text-white rounded-lg focus:outline-none">
                                <i class="fa-solid fa-cart-shopping fa-xl"></i>
                                @if (Cart::content()->count())
                                    <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full -top-2 -right-2">
                                        {{{Cart::content()->count()}}}
                                    </div>
                                @endif
                            </a>

                        </x-slot>

                        <x-slot name="content">
                            <div class="w-90">
                                <!--Resumen del carrito---->
                                @if (count(Cart::content()))
                                    <div class="flex flex-col max-w-md p-6 py-3 space-y-4 divide-y sm:w-96 sm:p-10 divide-gray-700 text-gray-100">
                                        <h2 class="text-2xl font-semibold">Tu carrito</h2>
                                        <ul class="flex flex-col pt-4 space-y-2">
                                            @foreach (Cart::content() as $item)
                                            <li class="flex items-start justify-between">
                                                <h3 class="my-1">{{$item->name}}
                                                    <span class="text-sm text-blue-500">x{{$item->qty}}</span>
                                                </h3>
                                                <div class="text-right my-1">
                                                    <span class="block">{{number_format($item->qty*$item->price),2}} €</span>
                                                    
                                                </div>
                                                
                                            </li>
                                            @endforeach
                                            <a href="/eliminarCarrito" type="button" class="flex items-center px-2 py-1 pl-0 space-x-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current text-white">
                                                    <path d="M96,472a23.82,23.82,0,0,0,23.579,24H392.421A23.82,23.82,0,0,0,416,472V152H96Zm32-288H384V464H128Z"></path>
                                                    <rect width="32" height="200" x="168" y="216"></rect>
                                                    <rect width="32" height="200" x="240" y="216"></rect>
                                                    <rect width="32" height="200" x="312" y="216"></rect>
                                                    <path d="M328,88V40c0-13.458-9.488-24-21.6-24H205.6C193.488,16,184,26.542,184,40V88H64v32H448V88ZM216,48h80V88H216Z"></path>
                                                </svg>
                                                <span class="text-white">Vaciar carrito</span>
                                            </a>
                                        </ul>
                                        <div class="space-y-6 my-4">
                                            <div class="flex justify-between my-3">
                                                <span>Total</span>
                                                <span class="font-semibold">{{Cart::subtotal()}} </span>
                                            </div>
                                            <div class="flex justify-center">
                                                <a href="{{route('carrito')}}" class=" w-full text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full shadow-lg text-sm px-3 py-2.5 text-center mb-1">Finalizar compra</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                @else
                                    <div class="my-3 mx-auto px-4">
                                    
                                        <p class="text-sm whitespace-nowrap text-center text-white fw-bold mb-3">Tu carrito de compra está vacío</p>
                                        <div class="flex justify-center">
                                            <a href="#" class=" text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full shadow-lg text-sm px-3 py-2.5 text-center mb-1">Explorar artículos</a>
                                        </div>
                                    </div>
                                @endif
                                
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            
           
            @if (Route::has('login'))
                @auth
                    <!-- Teams Dropdown -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="ml-3 relative">
                            <x-dropdown align="right" width="40">
                                <x-slot name="trigger">
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 mt-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white   focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->currentTeam->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                            </svg>
                                        </button>
                                    </span>
                                </x-slot>

                                <x-slot name="content">
                                    <div class="w-60 bg-gray-800">
                                        <!-- Team Management -->
                                        <div class="block px-4 py-2 text-sm text-white font-bold">
                                            {{ __('Manage Team') }}
                                        </div>

                                        <!-- Team Settings -->
                                        <x-dropdown-link
                                            href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                            {{ __('Team Settings') }}
                                        </x-dropdown-link>

                                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                            <x-dropdown-link href="{{ route('teams.create') }}">
                                                {{ __('Create New Team') }}
                                            </x-dropdown-link>
                                        @endcan

                                        <div class="border-t border-gray-200"></div>

                                        <!-- Team Switcher -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endif

                    <!-- Settings Dropdown -->
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-11 w-11 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-sm border-b font-semibold leading-4 border-gray-700 text-gray-200">
                                    {{ __('Manage Account') }}
                                </div>
                                <!----El panel de control solo lo verán administradores---->
                                @if (Auth::user()->is_admin)
                                    <x-dropdown-link href="{{ route('dashboard') }}">
                                        {{ __('Panel de Control') }}
                                    </x-dropdown-link>
                                @endif

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <!----Si el usuario es administrador no verá el siguiente link------>
                                @if (Auth::user())
                                    <x-dropdown-link href="{{ route('mispedidos') }}">
                                        {{ __('Mis Pedidos') }}
                                    </x-dropdown-link>
                                @endif
                                

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class=""></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <a href="{{ route('login') }}"
                        class="text-white bg-blue-700  focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2  hover:bg-blue-700 focus:outline-none">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm md:px-5 md:py-2.5 mr-1 md:mr-2 text-center px-4 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Registrarme</a>
                    @endif
                @endauth
            @endif

            <button data-collapse-toggle="mega-menu-icons" type="button"
                class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 text-gray-400 hover:bg-gray-700 focus:ring-gray-600"
                aria-controls="mega-menu-icons" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>

        </div>
        <div id="mega-menu-icons" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
            <ul class="flex flex-col mt-4 font-medium md:flex-row md:space-x-8 md:mt-0">
                <li>
                    <a href="{{ route('inicio') }}"
                        class="block py-2 pl-3 pr-4 text-gray-200  border-b active:text-blue-600 border-gray-100  md:hover:bg-transparent md:border-0  md:p-0   hover:bg-gray-700 hover:text-blue-500 hover:bg-transparent dark:border-gray-700"
                        aria-current="page" :active="request() - > routeIs('inicio')">Home</a>
                </li>
                <li>
                    <button id="mega-menu-icons-dropdown-button" data-dropdown-toggle="mega-menu-icons-dropdown"
                        class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-200 border-b border-gray-100 md:w-auto hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0  hover:text-blue-50">
                        Nuestros Productos
                        <svg aria-hidden="true" class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div id="mega-menu-icons-dropdown"
                        class="absolute z-10 hidden grid w-auto grid-cols-2 text-sm bg-gray-800 border border-gray-700 rounded-lg shadow-sm dark:border-gray-700 md:grid-cols-3">
                        <div class="p-4 pb-0 mb-3  md:pb-4 text-white">
                            <ul class="space-y-4" aria-labelledby="mega-menu-icons-dropdown-button">
                                <li>
                                    <a href="#"
                                        class="flex items-center text-white dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                        <span class="sr-only">About us</span>
                                        <svg class="w-4 h-4 mr-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                            fill="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path d="M16.5 7.5h-9v9h9v-9z"></path>
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                d="M8.25 2.25A.75.75 0 019 3v.75h2.25V3a.75.75 0 011.5 0v.75H15V3a.75.75 0 011.5 0v.75h.75a3 3 0 013 3v.75H21A.75.75 0 0121 9h-.75v2.25H21a.75.75 0 010 1.5h-.75V15H21a.75.75 0 010 1.5h-.75v.75a3 3 0 01-3 3h-.75V21a.75.75 0 01-1.5 0v-.75h-2.25V21a.75.75 0 01-1.5 0v-.75H9V21a.75.75 0 01-1.5 0v-.75h-.75a3 3 0 01-3-3v-.75H3A.75.75 0 013 15h.75v-2.25H3a.75.75 0 010-1.5h.75V9H3a.75.75 0 010-1.5h.75v-.75a3 3 0 013-3h.75V3a.75.75 0 01.75-.75zM6 6.75A.75.75 0 016.75 6h10.5a.75.75 0 01.75.75v10.5a.75.75 0 01-.75.75H6.75a.75.75 0 01-.75-.75V6.75z">
                                            </path>
                                        </svg>
                                        Componentes
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center text-white dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                        <span class="sr-only">Library</span>
                                        <svg class="w-4 h-4 mr-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                            fill="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 5C11.4477 5 11 5.44772 11 6V10C11 10.5523 11.4477 11 12 11C12.5523 11 13 10.5523 13 10V6C13 5.44772 12.5523 5 12 5Z"
                                                fill="currentColor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M4 8C4 3.58172 7.58172 0 12 0C16.4183 0 20 3.58172 20 8V16C20 20.4183 16.4183 24 12 24C7.58172 24 4 20.4183 4 16V8ZM18 8V16C18 19.3137 15.3137 22 12 22C8.68629 22 6 19.3137 6 16V8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8Z"
                                                fill="currentColor" />
                                        </svg>
                                        Periféricos
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center text-white dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                        <span class="sr-only">Resources</span>
                                        <svg class="w-4 h-4 mr-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                            fill="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path d="M10.5 18.75a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"></path>
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                d="M8.625.75A3.375 3.375 0 005.25 4.125v15.75a3.375 3.375 0 003.375 3.375h6.75a3.375 3.375 0 003.375-3.375V4.125A3.375 3.375 0 0015.375.75h-6.75zM7.5 4.125C7.5 3.504 8.004 3 8.625 3H9.75v.375c0 .621.504 1.125 1.125 1.125h2.25c.621 0 1.125-.504 1.125-1.125V3h1.125c.621 0 1.125.504 1.125 1.125v15.75c0 .621-.504 1.125-1.125 1.125h-6.75A1.125 1.125 0 017.5 19.875V4.125z">
                                            </path>
                                        </svg>
                                        Smartphones y Telefonía
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="p-4 pb-0 text-gray-900 md:pb-4 dark:text-white">
                            <ul class="space-y-4">
                                <li>
                                    <a href="#"
                                        class="flex items-center text-white dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                        <span class="sr-only">Blog</span>
                                        <svg class="w-4 h-4 mr-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                            aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                                clip-rule="evenodd"></path>
                                            <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                                        </svg>
                                        Consolas y videojuegos
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center text-white dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                        <span class="sr-only">Newsletter</span>
                                        <svg class="w-5 h-5 mr-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                            fill="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15.4695 11.2929C15.0789 10.9024 14.4458 10.9024 14.0553 11.2929C13.6647 11.6834 13.6647 12.3166 14.0553 12.7071C14.4458 13.0976 15.0789 13.0976 15.4695 12.7071C15.86 12.3166 15.86 11.6834 15.4695 11.2929Z"
                                                fill="currentColor" />
                                            <path
                                                d="M16.1766 9.17156C16.5671 8.78103 17.2003 8.78103 17.5908 9.17156C17.9813 9.56208 17.9813 10.1952 17.5908 10.5858C17.2003 10.9763 16.5671 10.9763 16.1766 10.5858C15.7861 10.1952 15.7861 9.56208 16.1766 9.17156Z"
                                                fill="currentColor" />
                                            <path
                                                d="M19.7121 11.2929C19.3216 10.9024 18.6885 10.9024 18.2979 11.2929C17.9074 11.6834 17.9074 12.3166 18.2979 12.7071C18.6885 13.0976 19.3216 13.0976 19.7121 12.7071C20.1027 12.3166 20.1027 11.6834 19.7121 11.2929Z"
                                                fill="currentColor" />
                                            <path
                                                d="M16.1766 13.4142C16.5671 13.0237 17.2003 13.0237 17.5908 13.4142C17.9813 13.8048 17.9813 14.4379 17.5908 14.8284C17.2003 15.219 16.5671 15.219 16.1766 14.8284C15.7861 14.4379 15.7861 13.8048 16.1766 13.4142Z"
                                                fill="currentColor" />
                                            <path d="M6 13H4V11H6V9H8V11H10V13H8V15H6V13Z" fill="currentColor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7 5C3.13401 5 0 8.13401 0 12C0 15.866 3.13401 19 7 19H17C20.866 19 24 15.866 24 12C24 8.13401 20.866 5 17 5H7ZM17 7H7C4.23858 7 2 9.23858 2 12C2 14.7614 4.23858 17 7 17H17C19.7614 17 22 14.7614 22 12C22 9.23858 19.7614 7 17 7Z"
                                                fill="currentColor" />
                                        </svg>
                                        Gaming
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center text-white dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                        <span class="sr-only">Playground</span>
                                        <svg class="w-4 h-4 mr-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                            fill="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z"></path>
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z">
                                            </path>
                                        </svg>
                                        Audio, Foto y Vídeo
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="p-4 text-gray-900 dark:text-white">
                            <ul class="space-y-4">
                                <li>
                                    <a href="#"
                                        class="flex items-center text-white dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                        <span class="sr-only">Contact Us</span>
                                        <svg class="w-4 h-4 mr-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                            fill="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                            <path d="M19.5 6h-15v9h15V6z"></path>
                                            <path clip-rule="evenodd" fill-rule="evenodd"
                                                d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v11.25C1.5 17.16 2.34 18 3.375 18H9.75v1.5H6A.75.75 0 006 21h12a.75.75 0 000-1.5h-3.75V18h6.375c1.035 0 1.875-.84 1.875-1.875V4.875C22.5 3.839 21.66 3 20.625 3H3.375zm0 13.5h17.25a.375.375 0 00.375-.375V4.875a.375.375 0 00-.375-.375H3.375A.375.375 0 003 4.875v11.25c0 .207.168.375.375.375z">
                                            </path>
                                        </svg>
                                        Televisores
                                    </a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center text-white dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-500 group">
                                        <span class="sr-only">Support Center</span>
                                        <svg class="w-4 h-4 mr-2 text-gray-400 dark:text-gray-500 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                                            aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Soporte
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>
                
            </ul>
        </div>
    </div>
  </nav>
 
 </button>
 <!-- component -->
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 flex flex-col shadow-lg px-5 py-8 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0">
   

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav class="-mx-3 space-y-6 ">
            <div class="space-y-3 ">
                <label class="px-3 text-sm text-gray-900 uppercase font-extrabold ">Perfil</label>

                <a class="flex items-center px-3 py-2 text-gray-900 transition-colors duration-300 transform rounded-lg  hover:bg-gray-300" href="{{route('profile.show')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                    </svg>

                    <span class="mx-2 text-sm text-gray-700 font-medium">Mis datos</span>
                </a>

              
            </div>

            <div class="space-y-3 ">
                <label class="px-3 text-sm text-gray-900 uppercase font-black">pedidos</label>

                <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg  hover:bg-gray-300 " href="{{route('mispedidos')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>

                    <span class="mx-2 text-sm font-medium">Mis pedidos</span>
                </a>

               
            </div>
        </nav>
    </div>
</aside>
  
  <div class="p-4 sm:ml-64">
      @yield('content')
     </div>
  </div>
   <!----footer-------->
   <footer class="z-40 bottom-0  fixed  left-0 w-full p-5  border-t border-gray-800 shadow md:flex md:items-center md:justify-between md:p-6 bg-gray-800">
    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">Cristian Martínez Barroso</a>. 2ºDAW
    </span>
    <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
        <li>
            <a href="#" class="mr-4 hover:underline md:mr-6">About</a>
        </li>
        <li>
            <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
        </li>
        <li>
            <a href="#" class="mr-4 hover:underline md:mr-6">Licensing</a>
        </li>
        <li>
            <a href="#" class="hover:underline">Contact</a>
        </li>
    </ul>
</footer>
</body>
</html>