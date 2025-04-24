<section class="border-t border-violet-600 pb-16 pt-10 antialiased">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <h2 class="text-3xl ml-2 mb-4 font-bold text-gray-700">Избранное</h2>
        <div class="mb-4 flex flex-nowrap overflow-x-scroll border-dotted border-2 p-4 rounded-xl border-violet-600 gap-4 md:p-1 md:grid md:grid-cols-5 md:border-0 md:overflow-auto">
            @if (count($favorite) == 0)
                <div class="md:col-span-5 text-center py-16 text-xl text-gray-700 font-bold w-full">Упс. В избранном пока ничего нет. Скорее посмотрите <a class="text-violet-500 hover:underline" href="/catalog">каталог</a> и добавьте что-нибудь</div>
            @else
                @foreach($favorite as $product)
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
                                    <button wire:click="disLike({{$product->id}})"  class="rounded-lg p-2 rounded-b-full">
                                        <icon class="fa-solid fa-heart text-lg text-red-500"></icon>
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
</section>