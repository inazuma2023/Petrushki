<nav class="bg-white antialiased">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-8">
                <div class="shrink-0 text-lg">
                    <a href="/">
                        <icon class="block w-auto fa-solid fa-paw">
                        <span class="tracking-widest">Petrushki</span>
                    </a>
                </div>
                @php
                    $catalog='href="/catalog"';
                    $catalog_1 = 'href="/catalog?category=1"';
                    $catalog_2 = 'href="/catalog?category=2"';
                    $notAuth='data-modal-target="popup-modal" data-modal-toggle="popup-modal"'; 
                @endphp
                <ul class="hidden lg:flex items-center justify-start gap-6 md:gap-8 py-3 sm:justify-center">
                    <li>
                        <a <?php echo auth()->check() ? $catalog_1 : $notAuth; ?> class="flex text-sm font-semibold text-gray-500 hover:text-gray-700 hover:scale-105">
                        Кошки
                        </a>
                    </li>
                    <li class="shrink-0">
                        <a <?php echo auth()->check() ? $catalog_2 : $notAuth; ?> class="flex text-sm font-semibold text-gray-500 hover:text-gray-700 hover:scale-105">
                        Собаки
                        </a>
                    </li>
                    <li class="shrink-0">
                        <a <?php echo auth()->check() ? $catalog : $notAuth; ?>class="flex text-sm font-semibold text-gray-500 hover:text-gray-700 hover:scale-105">
                        Другие питомцы
                        </a>
                    </li>
                </ul>
            </div>
            <form method="GET" action="/catalog" class="lg:flex hidden items-center xl:w-4/12 mx-auto ">   
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <input type="text" name="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-violet-500 focus:border-violet-500 block w-full ps-5 p-2.5" placeholder="Искать на Petrushki.ru" required />
                </div>
                <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-violet-600 rounded-lg border-2 border-violet-600 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </button>
            </form>
            <div class="flex items-center md:gap-5 gap-2">
                <a <?php echo auth()->check() ? $catalog : $notAuth; ?> class="inline-flex gap-2 items-center border-2 border-violet-600 bg-violet-600 rounded-lg justify-center py-2.5 px-4 text-white hover:bg-violet-700 text-sm font-medium leading-none">
                    <icon class="text-lg fa-solid fa-boxes"></icon> 
                    <span class="font-sans font-bold text-sm hidden lg:block">Каталог</span>
                </a>
                <button type="button" data-collapse-toggle="ecommerce-navbar-menu-1" aria-controls="ecommerce-navbar-menu-1" aria-expanded="false" class="inline-flex lg:hidden items-center justify-center hover:bg-gray-100 rounded-md p-2 text-gray-700">
                    <span class="sr-only">
                        Open Menu
                    </span>
                    <icon class="fa-solid fa-search text-lg"></icon>            
                </button>
                @if (auth()->check())
                    <a href="/cart" class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 text-sm font-medium leading-none text-gray-700">
                        <icon class="text-lg fa-solid fa-shopping-cart">  
                    </a>
                    <button id="userDropdownButton1" data-dropdown-toggle="userDropdown1" type="button" class="flex gap-1 items-center rounded-lg justify-center p-2 hover:bg-gray-100 text-sm font-medium leading-none text-gray-700">
                        <icon class="text-lg fa-solid fa-user">  
                    </button>
                    <div id="userDropdown1" class="hidden z-10 w-56  overflow-hidden overflow-y-auto rounded-lg border border-violet-100 shadow-lg shadow-violet-400 bg-white antialiased">
                        <ul class="p-2 text-left text-sm font-medium text-gray-500">
                            <li><a class="flex items-center text-nowrap rounded-md px-3 py-2 text-sm text-gray-700 hover:bg-violet-100 hover:text-gray-700" href="/profile"> Профиль </a></li>
                            <li><a class="flex items-center text-nowrap rounded-md px-3 py-2 text-sm text-gray-700 hover:bg-violet-100 hover:text-gray-700"  href="/order-list"> Заказы </a></li>
                            <li><a class="flex items-center text-nowrap rounded-md px-3 py-2 text-sm text-gray-700 hover:bg-violet-100 hover:text-gray-700"  href="/tracking"> Отследить заказ </a></li>
                            <li><a class="flex items-center text-nowrap rounded-md px-3 py-2 text-sm text-gray-700 hover:bg-violet-100 hover:text-gray-700"  href="/favorite"> Избранное </a></li>
                            <hr class="my-2 text-violet-400 w-44 mx-auto">
                            <li><button class="flex w-full items-center text-nowrap rounded-md px-3 py-2 text-sm text-red-500 hover:bg-red-100 border-violet-400" wire:click="logout"> Выйти </button></li>
                        </ul>
                    </div>
                @else
                    <a href="/login" class="w-full block text-violet-600 font-bold bg-violet-100 hover:bg-violet-200 focus:ring-0 focus:outline-none border-2 border-violet-600 focus:ring-violet-300 rounded-lg text-sm px-5 py-2.5 text-center">Войти</a>                
                @endif
            </div>
        </div>
        <div id="ecommerce-navbar-menu-1" class=" hidden mt-4">
            <form method="GET" action="/catalog" class="flex items-center xl:w-4/12 mx-auto ">   
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <input type="text" name="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-violet-500 focus:border-violet-500 block w-full ps-5 p-2.5" placeholder="Искать на Petrushki.ru" required />
                </div>
                <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-violet-700 rounded-lg border border-violet-700 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>
    </div>
</nav>
