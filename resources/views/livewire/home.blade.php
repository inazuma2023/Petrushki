<div>
    <section class="bg-violet-600 antialiased">
        <div class="mx-auto grid max-w-screen-xl px-4 pb-8 md:grid-cols-12 lg:gap-16 xl:gap-0">
            <div class="content-center justify-self-start md:col-span-7 md:text-start">
                <h1 class="mb-4 mt-5 mb:mt-0 text-3xl text-white font-extrabold leading-none tracking-tight md:max-w-2xl md:text-5xl xl:text-6xl">Замурчательные предложения</h1>
                <p class="mb-4 max-w-2xl text-white  md:mb-12 md:text-lg lg:mb-5 lg:text-xl">Новинки для ваших питомцев каждый день!</p>
                @php
                    $catalog='href="/catalog"';
                    $catalog_1 = 'href="/catalog?category=1"';
                    $catalog_2 = 'href="/catalog?category=2"';
                    $catalog_3 = 'href="/catalog?category=3"';
                    $catalog_4 = 'href="/catalog?category=4"';
                    $catalog_5 = 'href="/catalog?category=5"';
                    $catalog_6 = 'href="/catalog?category=6"';
                    $brand_1 = 'href="/catalog?ProPlan=on"';
                    $brand_2 = 'href="/catalog?Пижон=on"';
                    $brand_3 = 'href="/catalog?RIO=on"';
                    $brand_4 = 'href="/catalog?Triol=on"';
                    $brand_5 = 'href="/catalog?Tetra=on"';
                    $brand_6 = 'href="/catalog?Fiory=on"';
                    $brand_7 = 'href="/catalog?HappyJungle=on"';
                    $notAuth='data-modal-target="popup-modal" data-modal-toggle="popup-modal"'; 
                @endphp
                <a <?php echo auth()->check() ? $catalog : $notAuth; ?> class="inline-block rounded-lg bg-white px-6 py-4 text-center font-bold text-violet-600 focus:outline-none focus:ring-4 focus:ring-violet-300 ">
                    <icon class="fa-solid fa-boxes text-xl"></icon>
                    <span class="ml-2">Каталог</span>
                </a>
            </div>
            <div class="hidden md:col-span-5 md:justify-center md:mt-0 md:flex ">
                <img class="w-90 rounded-b-full" src="{{ asset('img/b_2.png') }}" alt="shopping illustration" />
            </div>
        </div>
    </section>
    <section class="py-12 antialiased md:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
                <h2 class="font-bold text-gray-700 text-3xl">Категории</h2>
                <a <?php echo auth()->check() ? $catalog : $notAuth; ?> class="flex items-center text-base font-medium text-violet-700 hover:underline ">
                    Все товары
                    <svg class="ms-1 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </a>
            </div>
            <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                <a <?php echo auth()->check() ? $catalog_1 : $notAuth; ?> class="flex gap-2 items-center border-violet-300 bg-white p-3 shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                    <icon class="fa-solid fa-cat text-violet-500 text-xl"></icon> 
                    <span class="text-sm font-semibold text-gray-700">Кошки</span>
                </a>
                <a <?php echo auth()->check() ? $catalog_2 : $notAuth; ?> class="flex gap-2 items-center border-violet-300 bg-white p-3 shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                    <icon class="fa-solid fa-dog  text-violet-500 text-xl"></icon> 
                    <span class="text-sm font-semibold text-gray-700">Собаки</span>
                </a>
                <a <?php echo auth()->check() ? $catalog_3 : $notAuth; ?> class="flex gap-2 items-center border-violet-300 bg-white p-3 shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                    <icon class="fa-solid fa-otter  text-violet-500 text-xl"></icon> 
                    <span class="text-sm font-semibold text-gray-700">Грызуны</span>
                </a>
                <a <?php echo auth()->check() ? $catalog_5 : $notAuth; ?> class="flex gap-2 items-center border-violet-300 bg-white p-3 shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                    <icon class="fa-solid fa-dove  text-violet-500 text-xl"></icon> 
                    <span class="text-sm font-semibold text-gray-700">Птицы</span>
                </a>
                <a <?php echo auth()->check() ? $catalog_4 : $notAuth; ?> class="flex gap-2 items-center border-violet-300 bg-white p-3 shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                    <icon class="fa-solid fa-fish  text-violet-500 text-xl"></icon> 
                    <span class="text-sm font-semibold text-gray-700">Аквариумистика</span>
                </a>
                <a <?php echo auth()->check() ? $catalog_6 : $notAuth; ?> class="flex gap-2 items-center border-violet-300 bg-white p-3 shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                    <icon class="fa-solid fa-suitcase-medical  text-violet-500 text-xl"></icon> 
                    <span class="text-sm font-semibold text-gray-700">Ветаптека</span>
                </a>
            </div>
        </div>
    </section>
    <section class="py-4 antialiased md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-700">Популярные товары</h2>
                </div>
            </div>
            <div class="mb-4 gap-4 md:mb-8 flex flex-nowrap overflow-x-scroll border-dotted border-2 p-4 rounded-xl border-violet-600">
                @foreach($products_in_home as $product)
                    <div class="rounded-lg border min-w-64 border-violet-300 bg-white p-6 shadow-sm shadow-violet-500 hover:scale-102">
                        <div>
                            @if (auth()->check())
                                <a href="{{ '/product?product='.$product->article}}">
                                    <img class="mx-auto h-full rounded-xl" src="{{ asset('/storage/products/'.$product->article.'.png') }}" alt="..." />
                                </a>  
                            @else
                                <a data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                                    <img class="mx-auto h-full rounded-xl" src="{{ asset('/storage/products/'.$product->article.'.png') }}" alt="..." />
                                </a>  
                            @endif
                        </div>
                        <div class="pt-6">
                            <div class="mb-2 flex items-center justify-between gap-4">
                                @if ($product->discount > 0)
                                    <span class="me-2 rounded bg-violet-100 px-2.5 py-0.5 text-sm font-bold text-violet-600"> -{{ $product->discount }} % </span>
                                @else
                                    <div></div>
                                @endif
                                <div class="flex items-center justify-end gap-1">
                                    @if (auth()->check())
                                        <button wire:click="likeToggle({{$product->id}})" class="rounded-lg p-2 rounded-b-full">
                                            @if (in_array($product->id, $favorites))
                                                <icon class="fa-solid fa-heart text-lg text-red-500"></icon>
                                            @else
                                                <icon class="fa-regular fa-heart text-lg"></icon>
                                            @endif
                                        </button>
                                    @else
                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="rounded-lg p-2 rounded-b-full">
                                            <icon class="fa-regular fa-heart text-lg"></icon>
                                        </button>
                                    @endif
                                </div>
                            </div>
                            @if (auth()->check())
                                <a href="{{ '/product?product='.$product->article}}" class="font-semibold leading-tight text-gray-700 hover:underline">{{ \Illuminate\Support\Str::limit($product->name, 35, $end='...') }}</a>
                            @else
                                <a data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="font-semibold leading-tight text-gray-700 hover:underline">{{ \Illuminate\Support\Str::limit($product->name, 35, $end='...') }}</a>
                            @endif
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
                                    @if (auth()->check())
                                        <button wire:click="addCart({{$product->id}})" class="inline-flex items-center justify-center gap-3 border-2 border-violet-600 p-2 rounded-lg  bg-violet-700 px-5 font-bold text-white hover:bg-violet-800 focus:outline-none focus:ring-4  focus:ring-violet-300">
                                            <icon class="fa-solid fa-shopping-cart"></icon>
                                            В корзину
                                        </button>
                                    @else
                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="inline-flex items-center justify-center gap-3 border-2 border-violet-600 p-2 rounded-lg  bg-violet-700 px-5 font-bold text-white hover:bg-violet-800 focus:outline-none focus:ring-4  focus:ring-violet-300">
                                            <icon class="fa-solid fa-shopping-cart"></icon>
                                            В корзину
                                        </button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="md:block hidden mx-auto max-w-screen-xl px-4 mb-16 mt-16 2xl:px-0">
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-700">Любимые бренды</h2>
                </div>
            </div>
            <div class="grid gap-4 grid-cols-7">
                <a <?php echo auth()->check() ? $brand_1 : $notAuth; ?> class="flex flex-col items-center justify-between border-violet-300 bg-white p-5 shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                    <img class="rounded-lg" src="{{ asset('img/brands/brand_7.png') }}" alt="brand">
                    <span class="text-sm font-bold text-gray-700">Pro Plan</span>
                </a>
                <a <?php echo auth()->check() ? $brand_2 : $notAuth; ?> class="flex flex-col items-center justify-between border-violet-300 bg-white p-5 shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                    <img class="rounded-lg" src="{{ asset('img/brands/brand_1.png') }}" alt="brand">
                    <span class="text-sm font-bold text-gray-700">Пижон</span>
                </a>
                <a <?php echo auth()->check() ? $brand_3 : $notAuth; ?> class="flex flex-col items-center justify-between border-violet-300 bg-white p-5 shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                    <img class="rounded-lg" src="{{ asset('img/brands/brand_3.png') }}" alt="brand">
                    <span class="text-sm font-bold text-gray-700">RIO</span>
                </a>
                <a <?php echo auth()->check() ? $brand_4 : $notAuth; ?> class="flex flex-col items-center justify-between border-violet-300 bg-white p-5 shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                    <img class="rounded-lg" src="{{ asset('img/brands/brand_6.png') }}" alt="brand">
                    <span class="text-sm font-bold text-gray-700">Triol</span>
                </a>
                <a <?php echo auth()->check() ? $brand_5 : $notAuth; ?> class="flex flex-col items-center justify-between border-violet-300 bg-white p-5 shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                    <img class="rounded-lg" src="{{ asset('img/brands/brand_2.png') }}" alt="brand">
                    <span class="text-sm font-bold text-gray-700">Tetra</span>
                </a>
                <a <?php echo auth()->check() ? $brand_6 : $notAuth; ?> class="flex flex-col items-center justify-between border-violet-300 bg-white p-5 shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                    <img class="rounded-lg" src="{{ asset('img/brands/brand_5.png') }}" alt="brand">
                    <span class="text-sm font-bold text-gray-700">Fiory</span>
                </a>
                <a <?php echo auth()->check() ? $brand_7 : $notAuth; ?> class="flex flex-col items-center justify-between border-violet-300 bg-white p-5 shadow-sm shadow-violet-500 hover:scale-102 rounded-lg">
                    <img class="rounded-lg" src="{{ asset('img/brands/brand_4.png') }}" alt="brand">
                    <span class="text-sm font-bold text-gray-700">Happy Jungle</span>
                </a>
            </div>
        </div>
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0 md:mt-0 mt-10 mb-10">
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-700">Невероятные скидки</h2>
                </div>
            </div>
            <div class="mb-4 gap-4 md:mb-8 flex flex-nowrap overflow-x-scroll border-dotted border-2 p-4 rounded-xl border-rose-400">
                @foreach($big_sales as $product)
                    <div class="rounded-lg border min-w-64 border-rose-200 bg-white p-6 shadow-sm shadow-rose-300 hover:scale-102">
                        <div>
                            @if (auth()->check())
                                <a href="{{ '/product?product='.$product->article}}">
                                    <img class="mx-auto h-full rounded-xl" src="{{ asset('/storage/products/'.$product->article.'.png') }}" alt="..." />
                                </a>  
                            @else
                                <a data-modal-target="popup-modal" data-modal-toggle="popup-modal">
                                    <img class="mx-auto h-full rounded-xl" src="{{ asset('/storage/products/'.$product->article.'.png') }}" alt="..." />
                                </a>  
                            @endif
                        </div>
                        <div class="pt-2">
                            <div class="mb-2 flex items-center justify-between gap-4">
                                @if ($product->discount > 0)
                                    <span class="me-2 rounded bg-rose-100 px-2.5 py-0.5 text-sm font-bold text-rose-500"> -{{ $product->discount }} % </span>
                                @else
                                    <div></div>
                                @endif
                                <div class="flex items-center justify-end gap-1">
                                    @if (auth()->check())
                                        <button wire:click="likeToggle({{$product->id}})" class="rounded-lg p-2 rounded-b-full">
                                            @if (in_array($product->id, $favorites))
                                                <icon class="fa-solid fa-heart text-lg text-red-500"></icon>
                                            @else
                                                <icon class="fa-regular fa-heart text-lg"></icon>
                                            @endif
                                        </button>
                                    @else
                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="rounded-lg p-2 rounded-b-full">
                                            <icon class="fa-regular fa-heart text-lg"></icon>
                                        </button>
                                    @endif
                                </div>
                            </div>
                            @if (auth()->check())
                                <a href="{{ '/product?product='.$product->article}}" class="font-semibold leading-tight text-gray-700 hover:underline">{{ \Illuminate\Support\Str::limit($product->name, 35, $end='...') }}</a>
                            @else
                                <a data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="font-semibold leading-tight text-gray-700 hover:underline">{{ \Illuminate\Support\Str::limit($product->name, 35, $end='...') }}</a>
                            @endif
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
                                    <svg class="h-4 w-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.891 15.107 15.11 8.89m-5.183-.52h.01m3.089 7.254h.01M14.08 3.902a2.849 2.849 0 0 0 2.176.902 2.845 2.845 0 0 1 2.94 2.94 2.849 2.849 0 0 0 .901 2.176 2.847 2.847 0 0 1 0 4.16 2.848 2.848 0 0 0-.901 2.175 2.843 2.843 0 0 1-2.94 2.94 2.848 2.848 0 0 0-2.176.902 2.847 2.847 0 0 1-4.16 0 2.85 2.85 0 0 0-2.176-.902 2.845 2.845 0 0 1-2.94-2.94 2.848 2.848 0 0 0-.901-2.176 2.848 2.848 0 0 1 0-4.16 2.849 2.849 0 0 0 .901-2.176 2.845 2.845 0 0 1 2.941-2.94 2.849 2.849 0 0 0 2.176-.901 2.847 2.847 0 0 1 4.159 0Z"/>
                                    </svg>
                                    <p class="text-sm font-medium text-gray-500">Большая скидка</p>
                                </li>
                            </ul>
                            <div class="mt-2 gap-2 flex flex-col justify-between">
                                <div class="flex gap-2 items-center">
                                    <p class="text-2xl font-extrabold leading-tight text-gray-700">{{ $product->price_with_discount }} ₽</p>
                                    <p class="text-lg font-semibold line-through leading-tight text-gray-400">{{ $product->price }} ₽</p>
                                </div>
                                @if (in_array($product->id, $inCart))
                                    <a href="/cart" class="inline-flex items-center justify-center gap-3 rounded-lg bg-rose-100 border-2 border-rose-400 px-5 py-2 font-bold text-rose-400 hover:bg-rose-200 focus:outline-none focus:ring-4  focus:ring-violet-300">
                                        <icon class="fa-solid fa-arrow-right"></icon>
                                        Корзина
                                    </a>
                                @else
                                    @if (auth()->check())
                                        <button wire:click="addCart({{$product->id}})" class="inline-flex items-center justify-center gap-3 border-2 border-rose-400 p-2 rounded-lg  bg-rose-400 px-5 font-bold text-white hover:bg-rose-500 focus:outline-none focus:ring-4  focus:ring-violet-300">
                                            <icon class="fa-solid fa-shopping-cart"></icon>
                                            В корзину
                                        </button>
                                    @else
                                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="inline-flex items-center justify-center gap-3 border-2 border-rose-400 p-2 rounded-lg  bg-rose-400 px-5 font-bold text-white hover:bg-rose-500 focus:outline-none focus:ring-4  focus:ring-violet-300">
                                            <icon class="fa-solid fa-shopping-cart"></icon>
                                            В корзину
                                        </button>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="bg-violet-600 antialiased">
        <div class="mx-auto grid max-w-screen-xl px-4 pt-8 md:grid-cols-12 lg:gap-16 xl:gap-0">
            <div class="hidden md:col-span-5 md:justify-center md:mt-0 md:flex ">
                <img class="w-90 rounded-t-full" src="{{ asset('img/b_2.png') }}" alt="shopping illustration" />
            </div>
            <div class="content-center justify-self-start md:col-span-7 md:text-start">
                <h1 class="mb-4 mt-2 mb:mt-0 text-3xl text-white font-extrabold leading-none tracking-tigh md:text-5xl xl:text-6xl">Зоомагазин Petrushki.ru</h1>
                <p class="mb-4 text-white md:mb-12 md:text-lg lg:mb-5 lg:text-xl">Покупайте зоотовары легко и быстро в нашем интернет-магазине. Заказывайте всё, что нужно для любимого питомца, доставка - тогда, когда удобно вам! Мы представлены ведущие мировые и российские бренды, а также эксклюзивные марки, которые продаются только у нас.</p>
                <a <?php echo auth()->check() ? $catalog : $notAuth; ?> class="inline-block rounded-lg bg-white w-full px-6 py-3 text-center font-bold text-violet-600 focus:outline-none focus:ring-4 focus:ring-violet-300 mb-5">
                    <icon class="fa-solid fa-boxes"></icon>
                    <span class="ml-2">Каталог</span>
                </a>
            </div>
        </div>
    </section>

    <div wire:ignore.self id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-lg max-h-full">
            <div class="relative bg-white rounded-lg shadow-sm">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-violet-500 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="mb-5 font-normal text-gray-500">Извите, но чтобы взаимодействовать с интерфейсом сайта, вам необходимо <strong>войти</strong> или <strong>зарегистрироваться</strong>. А также вы можете воспользоваться <a href="/user" class="text-violet-600 underline font-bold">руководством пользовтаеля</a></h3>
                    <div class="flex">
                        <a href="/login" class="mr-2 w-full block text-white font-bold bg-violet-600 hover:bg-violet-700 focus:ring-0 focus:outline-none focus:ring-violet-300 rounded-lg text-sm px-5 py-2.5 text-center">Войти</a>
                        <a href="/register" class="w-full block text-violet-600 font-bold bg-violet-100 hover:bg-violet-200 focus:ring-0 focus:outline-none focus:ring-violet-300 rounded-lg text-sm px-5 py-2.5 text-center">Зарегистрироваться</a>                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>