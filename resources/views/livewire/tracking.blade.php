<div class="border-t border-violet-600">
    <form action="/tracking" method="GET" class="flex items-center w-90 mx-auto my-16">   
        <div class="relative w-full">
            <input type="number" name="tracking" class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-violet-500 focus:border-violet-500 block w-full ps-5 p-2.5" placeholder="Введите номер заказа" required />
        </div>
        <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-violet-600 rounded-lg border-1 border-violet-600 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300">
            Отследить
        </button>
    </form>
    @if (isset($_GET['tracking']))
        @if ($order)
            <ol class="relative w-80 mx-auto border-s mt-5 border-gray-200 flex-col">   
                @if ($order->status_id != 6)               
                    <li class="ms-6 mb-5">
                        @if ($order->status_id > 1)
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-green-100 rounded-full -start-3 ring-8 ring-white">
                                <icon class="fa-solid fa-check text-xs text-green-600"></icon>
                            </span>
                        @else
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-violet-100 rounded-full -start-3 ring-8 ring-white">
                                <icon class="fa-solid fa-boxes text-xs text-violet-600"></icon>
                            </span>
                        @endif
                        <h3 class="mb-1 font-semibold text-gray-700">Формируется</h3>
                    </li>
                    <li class="mb-5 ms-6">
                        <span class="absolute flex items-center justify-center w-6 h-6 bg-green-100 rounded-full -start-3  ring-white">
                            <icon class="fa-solid fa-check text-xs text-green-600"></icon>
                        </span>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Собран</p>
                    </li>
                    <li class="mb-5 ms-6">
                        @if ($order->status_id >= 2)
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-green-100 rounded-full -start-3  ring-white">
                                <icon class="fa-solid fa-check text-xs text-green-600"></icon>
                            </span>
                        @endif
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Передан в доставку</p>
                    </li>
                    <li class="ms-6 mb-5">
                        @if ($order->status_id > 2)
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-green-100 rounded-full -start-3 ring-8 ring-white">
                                <icon class="fa-solid fa-check text-xs text-green-600"></icon>
                            </span>
                        @else
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-yellow-100 rounded-full -start-3 ring-8 ring-white">
                                <icon class="fa-solid fa-truck text-xs text-yellow-600"></icon>
                            </span>
                        @endif
                        <h3 class="mb-1 font-semibold text-gray-700">В пути</h3>
                    </li>
                    <li class="mb-5 ms-6">
                        @if ($order->status_id >= 2)
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-green-100 rounded-full -start-3  ring-white">
                                <icon class="fa-solid fa-check text-xs text-green-600"></icon>
                            </span>
                        @endif
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Прибыл в сортировочный центр</p>
                    </li>
                    <li class="mb-5 ms-6">
                        @if ($order->status_id > 2)
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-green-100 rounded-full -start-3  ring-white">
                                <icon class="fa-solid fa-check text-xs text-green-600"></icon>
                            </span>
                        @endif
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Сортировка</p>
                    </li>
                    <li class="mb-5 ms-6">
                        @if ($order->status_id > 2)
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-green-100 rounded-full -start-3  ring-white">
                                <icon class="fa-solid fa-check text-xs text-green-600"></icon>
                            </span>
                        @endif
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Отправлен в ПВЗ</p>
                    </li>
                    <li class="ms-6 mb-5">
                        @if ($order->status_id > 3)
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-green-100 rounded-full -start-3 ring-8 ring-white">
                                <icon class="fa-solid fa-check text-xs text-green-600"></icon>
                            </span>
                        @else
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-emerald-100 rounded-full -start-3 ring-8 ring-white">
                                <icon class="fa-solid fa-shop text-xs text-emerald-600"></icon>
                            </span>
                        @endif
                        <h3 class="mb-1 font-semibold text-gray-700">Доставлен в ПВЗ</h3>
                    </li>
                    <li class="mb-5 ms-6">
                        @if ($order->status_id > 3)
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-green-100 rounded-full -start-3  ring-white">
                                <icon class="fa-solid fa-check text-xs text-green-600"></icon>
                            </span>
                        @endif
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Разгрузка</p>
                    </li>
                    <li class="ms-6 mb-20">
                        <span class="absolute flex items-center justify-center w-6 h-6 bg-teal-100 rounded-full -start-3 ring-8 ring-white">
                            <icon class="fa-solid fa-bell text-xs text-teal-600"></icon>
                        </span>
                        <h3 class="mb-1 font-semibold text-gray-700">Ждет выдачи</h3>
                    </li>
                @else
                    <li class="ms-6 mb-20">
                        <span class="absolute flex items-center justify-center w-6 h-6 bg-red-100 rounded-full -start-3 ring-8 ring-white">
                            <icon class="fa-solid fa-xmark text-xs text-red-600"></icon>
                        </span>
                        <h3 class="mb-1 font-semibold text-gray-700">Данный заказ был отменен</h3>
                    </li>
                @endif
            </ol>
        @else
            <div class="md:col-span-5 text-center pb-16 text-xl text-gray-700 font-bold w-full">Упс. Такого заказа не найдено. Постмотрите список ваших заказов <a class="text-violet-500 hover:underline" href="/order-list">тут</a></div>
        @endif
    @endif
</div>

