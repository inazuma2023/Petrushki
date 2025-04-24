<section class="pb-40 pt-10 antialiased fixed w-screen h-screen overflow-y-scroll -mt-20 bg-white z-50">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">{{ isset($_GET['adminTab']) ? $_GET['adminTab'] : "Панель администратора" }}</h2>
            <a href="/adminer" title="" class="flex items-center text-base font-medium text-violet-700 hover:underline">
                Главная
                <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                </svg>
            </a>
        </div>
        @if (!isset($_GET['adminTab']))
        <div class="grid gap-4 sm:grid-cols-4 lg:grid-cols-6">
            <a id="CreateBtn" data-modal-target="CreateModal" data-modal-toggle="CreateModal" class="flex flex-col gap-5 items-center rounded-lg border border-gray-200 bg-white px-4 py-16 hover:bg-gray-50 ">
                <icon class="fa-solid fa-plus text-2xl"></icon> 
                <span class="text-sm font-medium text-gray-900 ">Создать новый товар</span>
            </a>
            <a href="/adminer?adminTab=Все товары" class="flex flex-col gap-5 items-center rounded-lg border border-gray-200 bg-white px-4 py-16 hover:bg-gray-50 ">
                <icon class="fa-solid fa-boxes text-2xl"></icon> 
                <span class="text-sm font-medium text-gray-900 ">Все товары</span>
            </a>
            <a href="/adminer?adminTab=Товары на главной" class="flex flex-col gap-5 items-center rounded-lg border border-gray-200 bg-white px-4 py-16 hover:bg-gray-50 ">
                <icon class="fa-solid fa-house text-2xl"></icon> 
                <span class="text-sm font-medium text-gray-900 ">Товары на главной</span>
            </a>
            <a href="/adminer?adminTab=Пользователи" class="flex flex-col gap-5 items-center rounded-lg border border-gray-200 bg-white px-4 py-16 hover:bg-gray-50 ">
                <icon class="fa-solid fa-user text-2xl"></icon> 
                <span class="text-sm font-medium text-gray-900 ">Пользователи</span>
            </a>
            <a href="/adminer?adminTab=Активные заказы" class="flex flex-col gap-5 items-center rounded-lg border border-gray-200 bg-white px-4 py-16 hover:bg-gray-50 ">
                <icon class="fa-solid fa-table-list text-2xl"></icon> 
                <span class="text-sm font-medium text-gray-900 ">Активные заказы</span>
            </a>
            <a href="/adminer?adminTab=Завершенные заказы" class="flex flex-col gap-5 items-center rounded-lg border border-gray-200 bg-white px-4 py-16 hover:bg-gray-50 ">
                <icon class="fa-solid fa-check-to-slot text-2xl"></icon> 
                <span class="text-sm font-medium text-gray-900 ">Завершенные заказы</span>
            </a>
            <a href="/adminer?adminTab=Отмененные заказы" class="flex flex-col gap-5 items-center rounded-lg border border-gray-200 bg-white px-4 py-16 hover:bg-gray-50 ">
                <icon class="fa-solid fa-square-xmark text-2xl"></icon> 
                <span class="text-sm font-medium text-gray-900 ">Отмененные заказы</span>
            </a>
            <a href="/adminer?adminTab=Модерация отзывов" class="flex flex-col gap-5 items-center rounded-lg border border-gray-200 bg-white px-4 py-16 hover:bg-gray-50 ">
                <icon class="fa-solid fa-comment text-2xl"></icon> 
                <span class="text-sm font-medium text-gray-900 ">Модерация отзывов</span>
            </a>
        </div>
        @endif
        @if (isset($_GET['adminTab']) && $_GET['adminTab'] == 'Все товары')
            <div class="mb-4 gap-4 md:mb-8 grid lg:grid-cols-5 ">
                @foreach($products as $product)
                    <div class="rounded-lg border relative border-gray-200 bg-white p-6 shadow-sm">
                        <div class="rounded-lg flex gap-2 bg-white absolute p-2 border-2 border-dotted border-violet-600">
                            <button data-modal-target="{{$product->article}}" data-modal-toggle="{{$product->article}}" class="flex items-center justify-center rounded-lg p-1.5 border-2 border-red-400 rounded-b-full text-red-400">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <button data-modal-target="{{'edit'.$product->article}}" data-modal-toggle="{{'edit'.$product->article}}" class="flex items-center justify-center rounded-lg p-1.5 border-2 border-violet-500 rounded-b-full text-violet-500">
                                <i class="fa-solid fa-edit"></i>
                            </button>
                            <div id="{{$product->article}}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow-2xl shadow-gray-500">
                                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="{{$product->article}}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500">Вы уверены, что хотите удалить данный товар?</h3>
                                            <button wire:click="delProduct({{$product->article}})" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                Удалить
                                            </button>
                                            <button data-modal-hide="{{$product->article}}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Отменить</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div wire:ignore.self id="{{'edit'.$product->article}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-screen-lg h-full md:h-auto">
                                    <div class="relative p-4 bg-white rounded-lg shadow-2xl shadow-gray-500 sm:p-5">
                                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                                            <h3 class="text-lg font-semibold text-gray-900 ">
                                                Добавить новый товар
                                            </h3>
                                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-toggle="{{'edit'.$product->article}}">
                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            </button>
                                        </div>
                                        <form wire:submit.prevent="editProduct({{$product->article}})">
                                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                                <div>
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Наименование</label>
                                                    <input wire:model="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-600 focus:border-violet-600 block w-full p-2.5 " >
                                                    @error('name') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                                                </div>
                                                <div>
                                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Категория</label>
                                                    <select wire:model="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 ">
                                                        <option selected="">Выберите категорию</option>
                                                        <option value="1">Кошки</option>
                                                        <option value="2">Собаки</option>
                                                        <option value="3">Грызуны</option>
                                                        <option value="4">Птицы</option>
                                                        <option value="5">Аквариумистика</option>
                                                        <option value="6">Ветаптека</option>
                                                    </select>
                                                    @error('category') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                                                </div>
                                                <div>
                                                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 ">Бренд</label>
                                                    <select wire:model="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 ">
                                                        <option selected="">Выберите бренд</option>
                                                        @foreach (App\Models\Brand::all() as $brand)
                                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                        @endforeach
                                                    </select>                            
                                                    @error('brand') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                                                </div>
                                                <div>
                                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Цена</label>
                                                    <input wire:model="price" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-600 focus:border-violet-600 block w-full p-2.5 ">
                                                    @error('price') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                                                </div>
                                                <div>
                                                    <label for="discount" class="block mb-2 text-sm font-medium text-gray-900 ">Скидка</label>
                                                    <input wire:model="discount" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-600 focus:border-violet-600 block w-full p-2.5 " >
                                                    @error('discount') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                                                </div>
                                                <div class="sm:col-span-2">
                                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Описание</label>
                                                    <textarea wire:model="description" type="text" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-violet-500 focus:border-violet-500 " ></textarea>                    
                                                    @error('description') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                                                </div>
                                            </div>
                                            <div class="flex items-center gap-5">
                                                <button type="submit" class="text-white inline-flex items-center bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                                                    Сохранить
                                                </button>
                                                <button data-modal-hide="{{'edit'.$product->article}}" type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Отменить</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="h-40">
                            <a>
                                <img class="mx-auto h-full" src="{{ asset('/storage/products/'.$product->article.'.png') }}" alt="..." />
                            </a>
                        </div>
                        <div class="pt-6">
                            <div class="mb-2 flex items-center justify-between gap-4">
                                <span class="me-2 rounded bg-violet-100 px-2.5 py-0.5 text-xs font-medium text-violet-800"> -{{ $product->discount }} % </span>
                            </div>
                            <a class="font-semibold leading-tight text-gray-900 hover:underline ">{{ \Illuminate\Support\Str::limit($product->name, 35, $end='...') }}</a>
                            <div class="mt-2 flex items-center gap-1">
                                <div class="flex items-center">
                                    <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                    </svg>
                                </div>
                                @php
                                    $rating = \App\Models\Review::all()->where('product_id', $product->id);
                                    $count = $rating->count();
                                    $total = 0;
                                    foreach ($rating as $review) {
                                        $total += $review->rating;
                                    }
                                    $total > 0 ? $average = $total / $count : $average = 0;
                                @endphp
                                <p class="text-sm font-bold text-gray-700">{{ number_format($average, 1) }}</p>
                                @if ($count)
                                    <p class="text-sm font-medium text-gray-400">({{ $count }})</p>
                                @else
                                    <p class="text-sm font-medium text-gray-400">(нет отзывов)</p>
                                @endif
                            </div>
                            <ul class="mt-2 flex flex-col">
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500 ">Быстрая доставка</p>
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500 ">Лучшая цена</p>
                                </li>
                            </ul>
                            <div class="mt-2 gap-2 flex flex-col justify-between">
                                <div class="flex gap-2 items-center">
                                    <p class="text-2xl font-extrabold leading-tight text-gray-900 ">{{ $product->price_with_discount }} ₽</p>
                                    <p class="text-lg font-semibold line-through leading-tight text-gray-400 ">{{ $product->price }} ₽</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        @if (isset($_GET['adminTab']) && $_GET['adminTab'] == 'Товары на главной')
            <div class="mb-4 gap-4 md:mb-8 grid lg:grid-cols-5 border-b-2 border-gray-600 pb-4">
                @foreach($products as $product)
                    @if($product->inHome)
                        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm ">
                            <div class="h-40">
                                <a href="{{'/product?product='.$product->article}}">
                                    <img class="mx-auto h-full" src="{{ asset('/storage/products/'.$product->article.'.png') }}" alt="..." />
                                </a>
                            </div>
                            <div class="pt-6">
                                <div class="mb-2 flex items-center justify-between gap-4">
                                    <span class="me-2 rounded bg-violet-100 px-2.5 py-0.5 text-xs font-medium text-violet-800 "> -{{ $product->discount }} % </span>
                                </div>
                                <a href="#" class="font-semibold leading-tight text-gray-900 hover:underline ">{{ \Illuminate\Support\Str::limit($product->name, 30, $end='...') }}</a>
                                <div class="mt-2 flex items-center gap-1">
                                    <div class="flex items-center">
                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                        </svg>
                                    </div>
                                    @php
                                        $rating = \App\Models\Review::all()->where('product_id', $product->id);
                                        $count = $rating->count();
                                        $total = 0;
                                        foreach ($rating as $review) {
                                            $total += $review->rating;
                                        }
                                        $total > 0 ? $average = $total / $count : $average = 0;
                                    @endphp
                                    <p class="text-sm font-bold text-gray-700">{{ number_format($average, 1) }}</p>
                                    @if ($count)
                                        <p class="text-sm font-medium text-gray-400">({{ $count }})</p>
                                    @else
                                        <p class="text-sm font-medium text-gray-400">(нет отзывов)</p>
                                    @endif
                                </div>
                                <ul class="mt-2 flex flex-col">
                                    <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500 ">Быстрая доставка</p>
                                    </li>
                                    <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500 ">Лучшая цена</p>
                                    </li>
                                </ul>
                                <div class="mt-2 gap-2 flex flex-col justify-between">
                                    <div class="flex gap-2 items-center">
                                        <p class="text-2xl font-extrabold leading-tight text-gray-900 ">{{ $product->price_with_discount }} ₽</p>
                                        <p class="text-lg font-semibold line-through leading-tight text-gray-400 ">{{ $product->price }} ₽</p>
                                    </div>
                                    @if($product->inHome)
                                        <button wire:click="delHome({{$product->id}})" class="inline-flex items-center justify-center gap-3 border-2 border-red-500 p-2 rounded-lg  bg-white px-5 font-bold text-red-500 hover:bg-red-100 focus:outline-none focus:ring-4  focus:ring-red-300 ">
                                            Убрать с главной
                                        </button>
                                    @else
                                        <button wire:click="inHome({{$product->id}})" class="inline-flex items-center justify-center gap-3 border-2 border-violet-600 p-2 rounded-lg  bg-violet-700 px-5 font-bold text-white hover:bg-violet-800 focus:outline-none focus:ring-4  focus:ring-violet-300 ">
                                            <icon class="fa-solid fa-home"></icon>
                                            На главную
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="mb-4 gap-4 md:mb-8 grid lg:grid-cols-5 ">
                @foreach($products as $product)
                    @if(!$product->inHome)
                        <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm ">
                            <div class="h-40">
                                <a href="{{'/product?product='.$product->article}}">
                                    <img class="mx-auto h-full" src="{{ asset('/storage/products/'.$product->article.'.png') }}" alt="..." />
                                </a>
                            </div>
                            <div class="pt-6">
                                <div class="mb-2 flex items-center justify-between gap-4">
                                    <span class="me-2 rounded bg-violet-100 px-2.5 py-0.5 text-xs font-medium text-violet-800 "> -{{ $product->discount }} % </span>
                                </div>
                                <a href="#" class="font-semibold leading-tight text-gray-900 hover:underline ">{{ \Illuminate\Support\Str::limit($product->name, 30, $end='...') }}</a>
                                <div class="mt-2 flex items-center gap-2">
                                    <div class="flex items-center">
                                        <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-gray-900 ">4.9</p>
                                    <p class="text-sm font-medium text-gray-500 ">(4,775)</p>
                                </div>
                                <ul class="mt-2 flex flex-col">
                                    <li class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                        </svg>
                                        <p class="text-sm font-medium text-gray-500 ">Быстрая доставка</p>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <svg class="h-4 w-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                        </svg>
                                        <p class="text-sm font-medium text-gray-500 ">Лучшая цена</p>
                                    </li>
                                </ul>
                                <div class="mt-2 gap-2 flex flex-col justify-between">
                                    <div class="flex gap-2 items-center">
                                        <p class="text-2xl font-extrabold leading-tight text-gray-900 ">{{ $product->price_with_discount }} ₽</p>
                                        <p class="text-lg font-semibold line-through leading-tight text-gray-400 ">{{ $product->price }} ₽</p>
                                    </div>
                                    @if($product->inHome)
                                        <button wire:click="delHome({{$product->id}})" class="inline-flex items-center justify-center gap-3 border-2 border-red-500 p-2 rounded-lg  bg-white px-5 font-bold text-red-500 hover:bg-red-100 focus:outline-none focus:ring-4  focus:ring-red-300 ">
                                            Убрать с главной
                                        </button>
                                    @else
                                        <button wire:click="inHome({{$product->id}})" class="inline-flex items-center justify-center gap-3 border-2 border-violet-600 p-2 rounded-lg  bg-violet-700 px-5 font-bold text-white hover:bg-violet-800 focus:outline-none focus:ring-4  focus:ring-violet-300 ">
                                            <icon class="fa-solid fa-home"></icon>
                                            На главную
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
        @if (isset($_GET['adminTab']) && $_GET['adminTab'] == 'Пользователи')
            <div class="grid grid-cols-3 gap-2">
                @foreach ($users as $user)
                    @if ($user->email !== 'admin@admin.com')
                        <a class="flex items-center rounded-lg border border-gray-200 bg-white p-2 hover:bg-gray-50 ">
                            <icon class="fa-solid fa-user text-gray-600 text-2xl px-4"></icon>
                            <div class="px-2 flex flex-col gap-1">
                                <div class="font-semibold text-gray-900">{{$user->name}}</div>
                                <div class="font-semibold text-sm text-gray-600">{{$user->email}}</div>
                                <div class="font-semibold text-sm text-gray-600">Зарегистрирован: {{$user->created_at}}</div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        @endif
        @if (isset($_GET['adminTab']) && $_GET['adminTab'] == 'Модерация отзывов')
            <div class="mt-6 flow-root sm:mt-8">
                @if (count($reviews->where('moderation, 0')) == 0)
                    <div class="text-gray-500 font-bold text-lg">Пусто</div>
                @endif
                @foreach ($reviews as $review)
                    @if (!$review->moderation)
                        <div class="gap-3 pb-6 sm:flex sm:items-start mb-4 border-b border-gray-300">
                            <div class="shrink-0 space-y-2 sm:w-48 md:w-72">
                                @for ($i = 1; $i <= 5; $i++)
                                    <button type="button">
                                        <svg class="h-6 w-6 {{ $i <= $review->rating ? 'text-yellow-300' : 'text-gray-300'  }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                    </button>
                                @endfor
                                <div class="space-y-0.5">
                                    <p class="text-base font-semibold text-gray-900 ">{{ \App\Models\User::where('id', $review->user_id)->first()->name }}</p>
                                    <p class="text-sm font-normal text-gray-500 ">{{ $review->created_at }}</p>
                                </div>
                            </div>
                            <div class="mt-4 min-w-0 flex-1 space-y-4 sm:mt-0">
                                <p class="text-base font-normal text-gray-500 ">{{ $review->text }}</p>
                            </div>
                            <div class="flex flex-col gap-2">
                                <button type="button" wire:click="deleteReview({{ $review->id }})" class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-200 ">Отклонить</button>
                                <button type="button" wire:click="allowReview({{ $review->id }})" class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-medium text-white bg-violet-600 border border-violet-600 rounded-md hover:bg-violet-500  ">Принять</button>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
        @if (isset($_GET['adminTab']) && $_GET['adminTab'] == 'Активные заказы')
            <div class="mt-6 flow-root sm:mt-8">
                @if (count($orders) == 0)
                    <div class="text-gray-500 font-bold text-lg">Пусто</div>
                @endif
                @foreach ($orders as $order)
                    @if ($order->status_id != 6 && $order->status_id != 5)
                        <div class="divide-y divide-gray-200 ">
                            <div class="flex flex-wrap items-center gap-y-4 py-6">
                                <div class="grid grid-cols-8 w-full gap-5 text-wrap border-gray-400 border-b pb-8">
                                    <div class="flex flex-col gap-2">
                                        <div class="text-base font-medium text-gray-500 ">Номер заказа:</div>
                                        <div class="font-semibold">#{{$order->number}}</div>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="text-base font-medium text-gray-500 ">Дата:</div>
                                        <div class="font-semibold">{{$order->date}}</div>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="text-base font-medium text-gray-500 ">Сумма:</div>
                                        <div class="font-semibold">{{$order->total}} ₽</div>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="text-base font-medium text-gray-500 ">Клиент:</div>
                                        <div class="font-semibold">{{ \App\Models\User::where('id', $order->user_id)->first()->name }}</div>
                                    </div>
                                    <div class="flex flex-col gap-2 col-span-2">
                                        <div class="text-base font-medium text-gray-500 ">Почта:</div>
                                        <div class="font-semibold">{{ \App\Models\User::where('id', $order->user_id)->first()->email }}</div>
                                    </div>
                                    <div class="col-span-2">
                                        <button wire:click="changeStatus({{ $order->number }})" class="p-2 bg-violet-600 text-white font-semibold rounded-lg">Следующий этап доставки</button>
                                    </div>
                                    <div class="flex flex-col gap-2 col-span-3">
                                        <div class="text-base font-medium text-gray-500 ">Адрес пункта выдачи:</div>
                                        <div class="font-semibold">{{ \App\Models\User::where('id', $order->user_id)->first()->address_delivery }}</div>
                                    </div>
                                    <div class="flex flex-col gap-2 col-span-2 border-2 border-dotted border-violet-600 w-fit p-2 rounded-lg">
                                        <div class="text-base font-medium text-gray-500 ">Статус:</div>
                                        <div class="font-semibold">{{ App\Models\Status::where('id', $order->status_id)->first()->name  }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
        @if (isset($_GET['adminTab']) && $_GET['adminTab'] == 'Отмененные заказы')
            <div class="mt-6 flow-root sm:mt-8">
                @if (count($orders->where('status_id', 6)) == 0)
                    <div class="text-gray-500 font-bold text-lg">Пусто</div>
                @endif
                @foreach ($orders as $order)
                    @if ($order->status_id == 6)
                        <div class="divide-y divide-gray-200 ">
                            <div class="flex flex-wrap items-center gap-y-4 py-6">
                                <div class="grid grid-cols-8 w-full gap-5 text-wrap border-gray-400 border-b pb-8">
                                    <div class="flex flex-col gap-2">
                                        <div class="text-base font-medium text-gray-500 ">Номер заказа:</div>
                                        <div class="font-semibold">#{{$order->number}}</div>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="text-base font-medium text-gray-500 ">Дата:</div>
                                        <div class="font-semibold">{{$order->date}}</div>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="text-base font-medium text-gray-500 ">Сумма:</div>
                                        <div class="font-semibold">{{$order->total}} ₽</div>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="text-base font-medium text-gray-500 ">Клиент:</div>
                                        <div class="font-semibold">{{ \App\Models\User::where('id', $order->user_id)->first()->name }}</div>
                                    </div>
                                    <div class="flex flex-col gap-2 col-span-2">
                                        <div class="text-base font-medium text-gray-500 ">Почта:</div>
                                        <div class="font-semibold">{{ \App\Models\User::where('id', $order->user_id)->first()->email }}</div>
                                    </div>
                                    
                                
                                    <div class="flex flex-col gap-2 col-span-3">
                                        <div class="text-base font-medium text-gray-500 ">Адрес пункта выдачи:</div>
                                        <div class="font-semibold">{{ \App\Models\User::where('id', $order->user_id)->first()->address_delivery }}</div>
                                    </div>
                                    <div class="flex flex-col gap-2 col-span-3">
                                        <div class="text-base font-medium text-gray-500 ">Адрес доставки курьером:</div>
                                        <div class="font-semibold">{{ \App\Models\User::where('id', $order->user_id)->first()->address_courier }}</div>
                                    </div>
                                    <div class="flex flex-col gap-2 col-span-2">
                                        <div class="text-base font-medium text-gray-500 ">Статус:</div>
                                        <div class="font-semibold">{{ App\Models\Status::where('id', $order->status_id)->first()->name  }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
        @if (isset($_GET['adminTab']) && $_GET['adminTab'] == 'Завершенные заказы')
            <div class="mt-6 flow-root sm:mt-8">
                @if (count($orders->where('status_id', 5)) == 0)
                    <div class="text-gray-500 font-bold text-lg">Пусто</div>
                @endif
                @foreach ($orders as $order)
                    @if ($order->status_id == 5)
                        <div class="divide-y divide-gray-200 ">
                            <div class="flex flex-wrap items-center gap-y-4 py-6">
                                <div class="grid grid-cols-8 w-full gap-5 text-wrap border-gray-400 border-b pb-8">
                                    <div class="flex flex-col gap-2">
                                        <div class="text-base font-medium text-gray-500 ">Номер заказа:</div>
                                        <div class="font-semibold">#{{$order->number}}</div>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="text-base font-medium text-gray-500 ">Дата:</div>
                                        <div class="font-semibold">{{$order->date}}</div>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="text-base font-medium text-gray-500 ">Сумма:</div>
                                        <div class="font-semibold">{{$order->total}} ₽</div>
                                    </div>
                                    <div class="flex flex-col gap-2">
                                        <div class="text-base font-medium text-gray-500 ">Клиент:</div>
                                        <div class="font-semibold">{{ \App\Models\User::where('id', $order->user_id)->first()->name }}</div>
                                    </div>
                                    <div class="flex flex-col gap-2 col-span-2">
                                        <div class="text-base font-medium text-gray-500 ">Почта:</div>
                                        <div class="font-semibold">{{ \App\Models\User::where('id', $order->user_id)->first()->email }}</div>
                                    </div>
                            
                                    <div class="flex flex-col gap-2 col-span-3">
                                        <div class="text-base font-medium text-gray-500 ">Адрес пункта выдачи:</div>
                                        <div class="font-semibold">{{ \App\Models\User::where('id', $order->user_id)->first()->address_delivery }}</div>
                                    </div>
                                    <div class="flex flex-col gap-2 col-span-3">
                                        <div class="text-base font-medium text-gray-500 ">Адрес доставки курьером:</div>
                                        <div class="font-semibold">{{ \App\Models\User::where('id', $order->user_id)->first()->address_courier }}</div>
                                    </div>
                                    <div class="flex flex-col gap-2 col-span-2">
                                        <div class="text-base font-medium text-gray-500 ">Статус:</div>
                                        <div class="font-semibold">{{ App\Models\Status::where('id', $order->status_id)->first()->name  }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif

        <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl mt-10 mb-2">Регламенты</h2>
        <ul class="font-semibold text-violet-500">
            <li>
                <a href="/accessibility">Регламент мониторинга доступности</a>
            </li>
            <li>
                <a href="/backup">Регламент резервного копирования</a>
            </li>
            <li>
                <a href="/security">Регламент проверки безопасности</a>
            </li>
        </ul>
    </div>

    <div wire:ignore.self id="CreateModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-screen-lg h-full md:h-auto">
            <div class="relative p-4 bg-white rounded-lg shadow-2xl shadow-gray-500 sm:p-5">
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 ">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Добавить новый товар
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-toggle="CreateModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <form wire:submit.prevent="createProduct">
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Наименование</label>
                            <input wire:model="name" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-600 focus:border-violet-600 block w-full p-2.5 " >
                            @error('name') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                        </div>
                        <div>
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 ">Категория</label>
                            <select wire:model="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 ">
                                <option selected="">Выберите категорию</option>
                                <option value="1">Кошки</option>
                                <option value="2">Собаки</option>
                                <option value="3">Грызуны</option>
                                <option value="4">Птицы</option>
                                <option value="5">Аквариумистика</option>
                                <option value="6">Ветаптека</option>
                            </select>
                            @error('category') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                        </div>
                        <div>
                            <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 ">Бренд</label>
                            <select wire:model="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 ">
                                <option selected="">Выберите бренд</option>
                                @foreach (App\Models\Brand::all() as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>                            
                            @error('brand') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                        </div>
                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">Цена</label>
                            <input wire:model="price" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-600 focus:border-violet-600 block w-full p-2.5 ">
                            @error('price') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                        </div>
                        <div>
                            <label for="discount" class="block mb-2 text-sm font-medium text-gray-900 ">Скидка</label>
                            <input wire:model="discount" type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-600 focus:border-violet-600 block w-full p-2.5 " >
                            @error('discount') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">Добавить фото товара</label>
                            <input type="file" wire:model="product_image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50  focus:outline-none " id="file_input" type="file">
                            @error('product_image') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Описание</label>
                            <textarea wire:model="description" type="text" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-violet-500 focus:border-violet-500 " ></textarea>                    
                            @error('description') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-violet-700 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Добавить товар
                    </button>
                </form>
            </div>
        </div>
    </div>

</section>