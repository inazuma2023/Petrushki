<section class="py-8 antialiased md:py-12 border-t border-violet-600">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
            <div class="flex flex-col gap-3 w-full">
                <h2 class="text-3xl ml-2 font-bold text-gray-700">Каталог</h2>
                <div class="flex flex-col justify-between w-full py-2 px-1">
                    <div class="flex gap-3 flex-nowrap overflow-x-scroll p-1 mb-2">
                        <a href="/catalog?category=1" class="flex gap-2 items-center border-violet-300 w-fit p-2 bg-white shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                            <icon class="fa-solid fa-cat text-violet-500"></icon> 
                            <span class="text-sm font-semibold text-gray-700">Кошки</span>
                        </a>
                        <a href="/catalog?category=2" class="flex gap-2 items-center border-violet-300 w-fit p-2 bg-white shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                            <icon class="fa-solid fa-dog  text-violet-500"></icon> 
                            <span class="text-sm font-semibold text-gray-700">Собаки</span>
                        </a>
                        <a href="/catalog?category=3" class="flex gap-2 items-center border-violet-300 w-fit p-2 bg-white shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                            <icon class="fa-solid fa-otter  text-violet-500"></icon> 
                            <span class="text-sm font-semibold text-gray-700">Грызуны</span>
                        </a>
                        <a href="/catalog?category=5" class="flex gap-2 items-center border-violet-300 w-fit p-2 bg-white shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                            <icon class="fa-solid fa-dove  text-violet-500"></icon> 
                            <span class="text-sm font-semibold text-gray-700">Птицы</span>
                        </a>
                        <a href="/catalog?category=4" class="flex gap-2 items-center border-violet-300 w-fit p-2 bg-white shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                            <icon class="fa-solid fa-fish  text-violet-500"></icon> 
                            <span class="text-sm font-semibold text-gray-700">Аквариумистика</span>
                        </a>
                        <a href="/catalog?category=6" class="flex gap-2 items-center border-violet-300 w-fit p-2 bg-white shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                            <icon class="fa-solid fa-suitcase-medical  text-violet-500"></icon> 
                            <span class="text-sm font-semibold text-gray-700">Ветаптека</span>
                        </a>
                    </div>
                    <div class="flex gap-3 flex-nowrap overflow-x-scroll p-1">
                        <button id="SortBtn" data-dropdown-toggle="SortList" class="flex gap-2 items-center border-violet-300 w-fit p-2 bg-white shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                            <icon class="fa-solid fa-arrow-up-a-z  text-violet-500"></icon> 
                            <span class="text-sm font-semibold text-gray-700">{{ $sortDropActive }}</span>
                            <svg class="w-4 h-4 text-violet-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                            </svg>
                        </button>
                        <div id="SortList" class="z-50 hidden w-44 divide-y rounded-lg bg-white shadow-lg border border-violet-100 shadow-violet-400" data-popper-placement="bottom">
                            <ul class="p-2 text-left text-sm font-medium text-gray-500" aria-labelledby="sortDropdownButton">
                                @foreach ($sortDropItems as $item)
                                    @if ($item == $sortDropActive)
                                        <li>
                                            @if(isset($_GET['priceFrom']) && $_GET['priceTo'])
                                                <a href="{{ isset($_GET['category']) ? '/catalog?sortBy='.$item.'&category='.$_GET['category'].'&priceFrom='.$_GET['priceFrom'].'&priceTo='.$_GET['priceTo'] : '/catalog?sortBy='.$item.'&priceFrom='.$_GET['priceFrom'].'&priceTo='.$_GET['priceTo']}}" class="group inline-flex w-full items-center text-nowrap rounded-md px-3 py-2 text-sm text-violet-600 font-bold hover:bg-violet-100 hover:text-violet-600">{{$item}}</a>
                                            @else
                                                <a href="{{ isset($_GET['category']) ? '/catalog?sortBy='.$item.'&category='.$_GET['category'] : '/catalog?sortBy='.$item}}" class="group inline-flex w-full items-center text-nowrap rounded-md px-3 py-2 text-sm text-violet-600 font-bold hover:bg-violet-100 hover:text-violet-600">{{$item}}</a>
                                            @endif
                                        </li>
                                    @else
                                        <li>
                                            @if(isset($_GET['priceFrom']) && $_GET['priceTo'])
                                                <a href="{{ isset($_GET['category']) ? '/catalog?sortBy='.$item.'&category='.$_GET['category'].'&priceFrom='.$_GET['priceFrom'].'&priceTo='.$_GET['priceTo'] : '/catalog?sortBy='.$item.'&priceFrom='.$_GET['priceFrom'].'&priceTo='.$_GET['priceTo']}}" class="group inline-flex w-full items-center text-nowrap rounded-md px-3 py-2 text-sm text-gray-700 hover:bg-violet-100 hover:text-gray-700">{{$item}}</a>
                                            @else
                                                <a href="{{ isset($_GET['category']) ? '/catalog?sortBy='.$item.'&category='.$_GET['category'] : '/catalog?sortBy='.$item}}"class="group inline-flex w-full items-center text-nowrap rounded-md px-3 py-2 text-sm text-gray-700 hover:bg-violet-100 hover:text-gray-700">{{$item}}</a>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <button id="BrandBtn" data-modal-target="brandModal" data-modal-toggle="brandModal" class="flex gap-2 items-center border-violet-300 w-fit p-2 bg-white shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                            <icon class="fa-solid fa-web-awesome  text-violet-500"></icon> 
                            <span class="text-sm font-semibold text-gray-700">Бренд</span>
                        </button>
                        <button id="DiscountBtn" data-modal-target="discountModal" data-modal-toggle="discountModal" class="flex gap-2 items-center border-violet-300 w-fit p-2 bg-white shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                            <icon class="fa-solid fa-tag  text-violet-500"></icon> 
                            <span class="text-sm font-semibold text-gray-700">Скидка</span>
                        </button>
                        <button id="PriceBtn" data-modal-target="priceModal" data-modal-toggle="priceModal" class="flex gap-2 items-center border-violet-300 w-fit p-2 bg-white shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                            <icon class="fa-solid fa-coins  text-violet-500"></icon> 
                            <span class="text-sm font-semibold text-gray-700">Цена</span>
                        </button>
                        <a href="/catalog" class="flex gap-2 items-center border-violet-200 bg-violet-200 w-fit p-2 shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                            <icon class="fa-solid fa-xmark  text-violet-500"></icon> 
                            <span class="text-sm font-semibold text-violet-600">Очистить</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4 flex flex-nowrap overflow-x-scroll border-dotted border-2 p-4 rounded-xl border-violet-600 gap-4 md:p-1 md:grid md:grid-cols-5 md:border-0 md:overflow-auto">
            @if (count($catalog) == 0)
                <div class="md:col-span-5 text-center py-16 text-xl text-gray-700 font-bold">Упс. По данному запросу ничего не найдено</div>
            @else
                @foreach($catalog as $product)
                    <div class="rounded-lg border min-w-62 md:min-w-44 border-violet-300 bg-white p-4 shadow-sm shadow-violet-500 hover:scale-102">
                        <div>
                            <a href="{{'/product?product='.$product->article}}">
                                <img class="mx-auto h-full rounded-xl" src="{{ asset('/storage/products/'.$product->article.'.png') }}" alt="..." />
                            </a>
                        </div>
                        <div class="pt-6">
                            <div class="mb-2 flex items-center justify-between gap-4">
                                @if ($product->discount > 0)
                                    <span class="me-2 rounded bg-violet-100 px-2.5 py-0.5 text-sm font-bold text-violet-600"> -{{ $product->discount }} % </span>
                                @else
                                    <div></div>
                                @endif
                                <div class="flex items-center justify-end gap-1">
                                    <button wire:click="likeToggle({{$product->id}})"  class="rounded-lg p-2 rounded-b-full">
                                        @if (in_array($product->id, $favorites))
                                            <icon class="fa-solid fa-heart text-lg text-red-500"></icon>
                                        @else
                                            <icon class="fa-regular fa-heart text-lg"></icon>
                                        @endif
                                    </button>
                                </div>
                            </div>
                            <a href="{{'/product?product='.$product->article}}" class="font-semibold leading-tight text-gray-700 hover:underline">{{ \Illuminate\Support\Str::limit($product->name, 30, $end='...') }}</a>
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
                                    <p class="text-sm font-medium text-gray-500">Быстрая доставка</p>
                                </li>
                                <li class="flex items-center gap-2">
                                    <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500">Лучшая цена</p>
                                </li>
                            </ul>
                            <div class="mt-2 gap-2 flex flex-col justify-between">
                                <div class="flex gap-2 items-center">
                                    <p class="text-2xl font-extrabold leading-tight text-gray-700">{{ $product->price_with_discount }} ₽</p>
                                    @if ($product->discount > 0)
                                        <p class="text-lg font-semibold line-through leading-tight text-gray-400">{{ $product->price }} ₽</p>
                                    @endif
                                </div>
                                @if (in_array($product->id, $inCart))
                                    <a href="/cart" class="inline-flex items-center justify-center gap-3 rounded-lg bg-violet-100 border-2 border-violet-600 px-5 py-2 font-bold text-violet-600 hover:bg-violet-300 focus:outline-none focus:ring-4  focus:ring-violet-300">
                                        <icon class="fa-solid fa-arrow-right"></icon>
                                        Корзина
                                    </a>
                                @else
                                    <button wire:click="addCart({{$product->id}})" class="inline-flex items-center justify-center gap-3 border-2 border-violet-600 p-2 rounded-lg  bg-violet-700 px-5 font-bold text-white hover:bg-violet-800 focus:outline-none focus:ring-4  focus:ring-violet-300">
                                        <icon class="fa-solid fa-shopping-cart"></icon>
                                        В корзину
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div wire:ignore.self id="brandModal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 antialiased">
        <div class="relative max-h-full p-4">
            <div class="relative rounded-lg bg-white shadow">
                <div class="flex items-center justify-between rounded-t border-b border-violet-400 p-4 md:p-5">
                    <div>
                        <h3 class="text-xl font-bold text-gray-700">Бренд</h3>
                    </div>
                    <button type="button" class="absolute right-5 top-5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-700" data-modal-toggle="brandModal">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form class="p-4 md:p-5" method="Get">
                    <div class="mb-4 flex flex-col gap-2 overflow-y-scroll h-86 border-2 border-dotted border-violet-600 rounded-xl p-4">
                        @foreach($brands as $brand)
                            @foreach($catalog as $item)
                                @if ($brand->id == $item->brand_id)
                                    @if(isset($_GET[$brand->name]))
                                        <div class="flex items-center gap-5 w-72">
                                            <input checked class="rounded-md w-5.5 h-5.5 text-violet-600 border-violet-600 focus: ring-0" type="checkbox" id="brand-{{ $brand->id }}" name="{{ $brand->name }}">
                                            <label class="text-gray-700 font-semibold" for="brand-{{ $brand->id }}">{{ $brand->name }}</label>
                                        </div>
                                    @else
                                        <div class="flex items-center gap-5 w-72">
                                            <input class="rounded-md w-5.5 h-5.5 text-violet-600 border-violet-600 focus: ring-0" type="checkbox" id="brand-{{ $brand->id }}" name="{{ $brand->name }}">
                                            <label class="text-gray-700 font-semibold" for="brand-{{ $brand->id }}">{{ $brand->name }}</label>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div class="border-t border-violet-400 pt-4 md:pt-5">
                        <button type="submit" class="me-2 inline-flex items-center rounded-lg bg-violet-600 border-2 px-5 py-2.5 text-center text-sm font-bold text-white hover:bg-violet-700 focus:outline-none focus:ring-4 focus:ring-violet-300">Применить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div wire:ignore.self id="discountModal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 antialiased">
        <div class="relative max-h-full p-4">
            <div class="relative rounded-lg bg-white shadow">
                <div class="flex items-center justify-between rounded-t border-b border-violet-400 p-4 md:p-5">
                    <div>
                        <h3 class="text-xl font-bold text-gray-700">Скидка</h3>
                    </div>
                    <button type="button" class="absolute right-5 top-5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-700" data-modal-toggle="discountModal">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form class="p-4 md:p-5" method="GET">
                    <div class="mb-4 flex flex-col gap-2 pb-8">
                    @if(isset($_GET['dis']) && $_GET['dis'] == 'dis10')
                            <div class="flex items-center gap-5 w-72">
                                <input checked class="w-5.5 h-5.5 text-violet-600 border-violet-600 focus: ring-0" type="radio" value="dis10" name="dis">
                                <label class="text-gray-700 font-semibold" for="dis10">От 10% и выше</label>
                            </div>
                        @else
                            <div class="flex items-center gap-5 w-72">
                                <input class="w-5.5 h-5.5 text-violet-600 border-violet-600 focus: ring-0" type="radio" value="dis10" name="dis">
                                <label class="text-gray-700 font-semibold" for="dis10">От 10% и выше</label>
                            </div>
                        @endif
                        @if(isset($_GET['dis']) && $_GET['dis'] == 'dis30')
                            <div class="flex items-center gap-5 w-72">
                                <input checked class="w-5.5 h-5.5 text-violet-600 border-violet-600 focus: ring-0" type="radio" value="dis30" name="dis">
                                <label class="text-gray-700 font-semibold" for="dis30">От 30% и выше</label>
                            </div>
                        @else
                            <div class="flex items-center gap-5 w-72">
                                <input class="w-5.5 h-5.5 text-violet-600 border-violet-600 focus: ring-0" type="radio" value="dis30" name="dis">
                                <label class="text-gray-700 font-semibold" for="dis30">От 30% и выше</label>
                            </div>
                        @endif
                        @if(isset($_GET['dis']) && $_GET['dis'] == 'dis50')
                            <div class="flex items-center gap-5 w-72">
                                <input checked class="w-5.5 h-5.5 text-violet-600 border-violet-600 focus: ring-0" type="radio" value="dis50" name="dis">
                                <label class="text-gray-700 font-semibold" for="dis50">От 50% и выше</label>
                            </div>
                        @else
                            <div class="flex items-center gap-5 w-72">
                                <input class="w-5.5 h-5.5 text-violet-600 border-violet-600 focus: ring-0" type="radio" value="dis50" name="dis">
                                <label class="text-gray-700 font-semibold" for="dis50">От 50% и выше</label>
                            </div>
                        @endif
                        @if(isset($_GET['dis']) && $_GET['dis'] == 'dis70')
                            <div class="flex items-center gap-5 w-72">
                                <input checked class="w-5.5 h-5.5 text-violet-600 border-violet-600 focus: ring-0" type="radio" value="dis70" name="dis">
                                <label class="text-gray-700 font-semibold" for="dis70">От 70% и выше</label>
                            </div>
                        @else
                            <div class="flex items-center gap-5 w-72">
                                <input class="w-5.5 h-5.5 text-violet-600 border-violet-600 focus: ring-0" type="radio" value="dis70" name="dis">
                                <label class="text-gray-700 font-semibold" for="dis70">От 70% и выше</label>
                            </div>
                        @endif
                    </div>
                    <div class="border-t border-violet-400 pt-4 md:pt-5">
                        <button type="submit" class="me-2 inline-flex items-center rounded-lg bg-violet-600 border-2 px-5 py-2.5 text-center text-sm font-bold text-white hover:bg-violet-700 focus:outline-none focus:ring-4 focus:ring-violet-300">Применить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div wire:ignore.self id="priceModal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 antialiased">
        <div class="relative max-h-full p-4">
            <div class="relative rounded-lg bg-white shadow">
                <div class="flex items-center justify-between rounded-t border-b border-violet-400 p-4 md:p-5">
                    <div>
                        <h3 class="text-xl font-bold text-gray-700">Цена</h3>
                    </div>
                    <button type="button" class="absolute right-5 top-5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-700" data-modal-toggle="priceModal">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form class="p-4 md:p-5" method="GET">
                    <div class="mb-4 flex gap-2 pb-4">
                        <div>
                            <label for="priceFrom" class="mb-2 block text-sm font-bold text-gray-700">Цена от:</label>
                            <input value="{{$priceFrom}}" name="priceFrom" id="priceFrom" type="number"  class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-violet-600 focus:border-violet-600 block w-full p-2.5">
                        </div>
                        <div>
                            <label for="priceTo" class="mb-2 block text-sm font-bold text-gray-700">Цена до:</label>
                            <input value="{{$priceTo}}" name="priceTo" id="priceTo" type="number"  class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-violet-600 focus:border-violet-600 block w-full p-2.5">
                        </div>
                        @if (isset($_GET['category']))
                            <input type="hidden" name="category" value="{{isset($_GET['category']) ? $_GET['category'] : ''}}">
                        @endif
                    </div>
                    <div class="border-t border-violet-400 pt-4 md:pt-5">
                        <button type="submit" class="me-2 inline-flex items-center rounded-lg bg-violet-600 border-2 px-5 py-2.5 text-center text-sm font-bold text-white hover:bg-violet-700 focus:outline-none focus:ring-4 focus:ring-violet-300">Применить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
