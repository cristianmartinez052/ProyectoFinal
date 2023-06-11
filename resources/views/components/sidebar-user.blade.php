<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
    <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar"
        aria-controls="sidebar-multi-level-sidebar" type="button"
        class="inline-flex items-center p-2  ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        style="margin-top:4rem;">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="sidebar-multi-level-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0"
        aria-label="Sidebar" style="margin-top: 0rem;">
        <div class="h-full px-3 py-4 overflow-y-auto shadow-lg bg-gray-50">
            <a href="#" class="flex items-center pl-2.5 mb-2">
                <img src="{{Storage::url('logos/user.png')}}" class="h-10 mr-3 sm:h-10" alt="Panel Control Logo" />
                <span class="self-center text-xl leading-10 font-semibold whitespace-nowrap">Mi cuenta</span>
                <div class="pt-2 mt-4 space-y-2 font-medium border-t border-gray-300">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ route('profile.show') }}"
                            class="flex items-center p-2 text-gray-500 rounded-lg  hover:bg-gray-200">
                            <svg aria-hidden="true"
                                class="w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3">Mis datos</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('mispedidos')}}" class="flex items-center p-2 text-gray-500 rounded-lg hover:bg-gray-200">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Mis pedidos</span>
                        </a>
                    </li>
                 
                </ul>
        </div>
    </aside>

</div>