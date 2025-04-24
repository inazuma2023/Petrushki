<section class="bg-white border-t border-violet-600 py-8 antialiased md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <h2 class="text-3xl ml-2 font-bold text-gray-700">Корзина</h2>
        <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
            @if (!$cart)
                <div class="md:col-span-5 text-center py-16 text-xl text-gray-700 font-bold w-full">Упс. В корзине пока ничего нет. Скорее посмотрите <a class="text-violet-500 hover:underline" href="/catalog">каталог</a> и добавьте что-нибудь</div>
            @else
                <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                    <div class="space-y-6">
                        @foreach ($cart as $product)
                            <div class="relative rounded-lg border border-violet-300 bg-white shadow-sm shadow-violet-500 p-4 md:p-6">
                                <div class="absolute top-2 left-2">
                                    @if(App\Models\Cart::where('product_id', $product->id)->where('user_id', auth()->user()->id)->first()->active)
                                        <input checked wire:click="activeToggle({{ $product->article }})"  value="{{$product->article}}" id="{{$product->article}}" name="{{$product->active}}"  class="w-6 h-6 border border-gray-300 rounded bg-gray-50 focus:ring-0 text-violet-600 focus:ring-violet-300" type="checkbox" />
                                    @else
                                        <input wire:click="activeToggle({{ $product->article }})"  value="{{$product->article}}" id="{{$product->article}}" name="{{$product->active}}" class="w-6 h-6 border border-gray-300 rounded bg-gray-50 focus:ring-0 text-violet-600 focus:ring-violet-300" type="checkbox" />
                                    @endif
                                </div>
                                <div class="space-y-4  md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                    <a href="{{'/product?product='.$product->article}}" class="shrink-0 md:order-1">
                                        <img class="mx-auto w-20 h-20 rounded-xl" src="{{ asset('/storage/products/'.$product->article.'.png') }}" alt="..." />
                                    </a>
                                    <div class="flex items-center justify-between md:order-3 md:justify-end">
                                        <div class="flex items-center">
                                            <button  wire:click="decrement({{$product->id}})" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-violet-400 bg-violet-100 hover:bg-violet-200 focus:outline-none focus:ring-2 focus:ring-gray-100">
                                                <svg class="h-2.5 w-2.5 text-violet-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <div class="px-4">{{App\Models\Cart::where('product_id', $product->id)->where('user_id', auth()->user()->id)->first()?->quantity}}</div>
                                            <button wire:click="increment({{$product->id}})"  class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-violet-400 bg-violet-100 hover:bg-violet-200 focus:outline-none focus:ring-2 focus:ring-gray-100">
                                                <svg class="h-2.5 w-2.5 text-violet-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="flex flex-col min-w-34 justify-end items-end gap-1">
                                            <p class="text-xl font-bold text-gray-700">{{$product->price_with_discount}} ₽</p>
                                            @if ($product->discount > 0)
                                                <p class="font-semibold line-through leading-tight text-gray-400">{{ $product->price }} ₽</p>
                                                <div class="rounded bg-violet-100 w-fit px-1 py-0.5 text-xs font-bold text-violet-600"> 
                                                    -{{ $product->discount }} % 
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                        <a href="{{'/product?product='.$product->article}}" class="text-base font-semibold text-gray-700">{{$product->name}}</a>
                                        <div class="flex mt-2 items-center gap-4">
                                            <button wire:click="likeToggle({{$product->id}})" class="inline-flex gap-2 p-2 rounded-lg border border-violet-500 items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                                                @if (in_array($product->id, $favorites))
                                                    <icon class="fa-solid fa-heart text-red-500"></icon>
                                                @else
                                                    <icon class="fa-regular fa-heart"></icon>
                                                @endif
                                            </button>
                                            <button wire:click="deleteCart({{$product->id}})" class="inline-flex border rounded-lg border-red-500 p-2 items-center text-sm font-medium text-red-500 hover:underline">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                    <div class="space-y-4 rounded-lg border border-violet-300 bg-white shadow-sm shadow-violet-500 p-4 sm:p-6">
                        <p class="text-xl font-semibold text-gray-700">Детали заказа</p>
                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500">Сумма без скидки</dt>
                                    <dd class="text-base font-medium text-gray-700">{{ (int)$start }} ₽</dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500">Скидка</dt>
                                    <dd class="text-base font-medium text-red-500">{{ (int)$discount }} ₽</dd>
                                </dl>
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500">Доставка</dt>
                                    <dd class="text-base font-medium text-green-500">Бесплатно</dd>
                                </dl>
                            </div>
                            <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2">
                                <dt class="text-base font-bold text-gray-700">Итоговая сумма</dt>
                                <dd class="text-base font-bold text-gray-700">{{ (int)$total }} ₽</dd>
                            </dl>
                        </div>
                        <a href="/order-summary" class="flex w-full items-center justify-center rounded-lg bg-violet-700 px-5 py-2.5 text-sm font-bold text-white hover:bg-violet-800 focus:outline-none focus:ring-4 focus:ring-violet-300">Перейти к оформлению</a>
                        <div class="flex items-center justify-center gap-2">
                            <span class="text-sm font-normal text-gray-500"> или </span>
                            <a href="/catalog" title="" class="inline-flex items-center gap-2 text-sm font-semibold text-violet-600 underline">
                                Вернуться к покупкам
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>