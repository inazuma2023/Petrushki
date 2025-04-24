<section class="bg-white py-8 antialiased md:py-16 border-t border-violet-600">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="mx-auto max-w-3xl">
            <h2 class="text-3xl font-bold text-gray-700 mt-5">Информация о заказе</h2>
            <div class="mt-6 space-y-4 border-b border-t border-violet-400 py-8 sm:mt-8">
                <div class="grid md:grid-cols-2 gap-10">
                    <form wire:submit.prevent="saveDelivery()">
                        <label for="rate" class="mb-2 block text-sm font-bold text-gray-700">Адрес удобного пункта выдачи</label>   
                        <select wire:model="delivery" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-violet-500 focus:border-violet-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-violet-500 dark:focus:border-violet-500">
                            <option selected>Выберите пункт выдачи</option>
                            @foreach (App\Models\PickUp::all() as $p)
                                <option value="{{$p->address}}">{{$p->address}}</option>
                            @endforeach
                        </select>   
                        <button type="submit" class="me-2 mt-3 inline-flex items-center rounded-lg bg-violet-700 px-5 py-2.5 text-center text-sm font-bold text-white hover:bg-violet-800 focus:outline-none focus:ring-4 focus:ring-violet-300 dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800">Выбрать</button>
                        @error('delivery') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                    </form>
                    <div>
                        <label for="rate" class="mb-2 block text-sm font-bold text-gray-700">Доставка курьером</label>   
                        <div class="flex">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox" class="w-4.5 h-4.5 border border-gray-300 rounded bg-gray-50 focus:ring-0 text-violet-600 focus:ring-violet-300" >
                            </div>
                            <div class="ml-2 text-sm">
                                <label for="remember" class="text-gray-500 font-semibold">Доставить курьером</label>
                            </div>
                        </div>
                        <span class="text-xs text-gray-500">*если выбрать данную опцию, то после приема товара в ПВЗ с вами свяжется курьер, чтобы уточнить необходимую информацию</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="relative overflow-x-auto border-b border-violet-400">
                    <table class="w-full text-left font-medium text-gray-700 md:table-fixed">
                        <tbody class="divide-y divide-violet-400">
                            @foreach ($summary as $product)
                                <tr class="flex items-center justify-between">
                                    <td class="py-4 md:w-[350px] w-[200px]">
                                        <div class="flex items-center gap-4">
                                            <a href="{{'/product?product='.$product->article}}" class="flex items-center aspect-square w-10 h-10 shrink-0">
                                                <img class="mx-auto rounded-xl" src="{{ asset('/storage/products/'.$product->article.'.png') }}" alt="..." />
                                            </a>
                                            <a href="{{'/product?product='.$product->article}}" class="font-semibold text-sm">{{$product->name}}</a>
                                        </div>
                                    </td>
                                    <td class="text-sm font-normal text-gray-700"><span class="font-extrabold">{{$product->price_with_discount}} ₽</span>  x  {{App\Models\Cart::where('product_id', $product->id)->where('user_id', auth()->user()->id)->first()->quantity}} шт.</td>
                                    <td>
                                        <p class="font-extrabold leading-tight text-sm md:text-lg text-gray-700">{{App\Models\Cart::where('product_id', $product->id)->where('user_id', auth()->user()->id)->first()->quantity * $product->price_with_discount}} ₽</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 space-y-6">
                    <h4 class="text-xl font-semibold text-gray-700">Детали заказа</h4>
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-gray-500">Сумма без скидки</dt>
                                <dd class="text-base font-medium text-gray-700">{{(int)$start}} ₽</dd>
                            </dl>
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-gray-500">Скидка</dt>
                                <dd class="text-base font-medium text-red-500">{{(int)$discount}} ₽</dd>
                            </dl>
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-gray-500">Доставка</dt>
                                <dd class="text-base font-medium text-green-500">Бесплатно</dd>
                            </dl>
                        </div>
                        <dl class="flex items-center justify-between gap-4 border-t border-violet-400 pt-2">
                            <dt class="text-lg font-bold text-gray-700">Итого</dt>
                            <dd class="text-lg font-bold text-gray-700">{{(int)$total}} ₽</dd>
                        </dl>
                    </div>
                    <div class="gap-4 sm:flex sm:items-center mb-10 pt-3">
                        <a href="/cart" class="block text-center w-full rounded-lg  border border-violet-400 bg-white px-5  py-2.5 text-sm font-bold text-violet-600 hover:bg-violet-100 hover:text-violet-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100">Вернуться в корзину</a>
                        @if (auth()->user()->address_delivery != 'Выберите пункт выдачи')
                            <a href="/payment" disabled class="mt-4 flex w-full items-center justify-center rounded-lg bg-violet-700  px-5 py-2.5 text-sm font-bold text-white hover:bg-violet-800 focus:outline-none focus:ring-4 focus:ring-violet-300 sm:mt-0">Перейти к оплате</a>
                        @else
                            <a class="mt-4 flex w-full items-center justify-center rounded-lg bg-violet-300 px-5 py-2.5 text-sm font-bold text-white hover:bg-violet-400 focus:outline-none focus:ring-4 focus:ring-violet-300 sm:mt-0">Сначала выберите ПВЗ</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    
