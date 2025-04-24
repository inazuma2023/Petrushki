<section class="bg-white pb-16 pt-10 antialiasedborder-t border-violet-600">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="mx-auto max-w-5xl">
            <h2 class="text-3xl font-bold text-gray-700">Оплата заказа</h2>
            <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12">
                @if (!isset($_GET['method']) || isset($_GET['method']) && $_GET['method'] == 'mir' || $_GET['method'] == 'visa')
                    <form wire:submit.prevent="pay()" class="w-full rounded-lg border p-4 border-violet-300 bg-white shadow-sm shadow-violet-500 sm:p-6 lg:max-w-xl lg:p-8">
                        <div class="mb-6 grid grid-cols-2 gap-4">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="rate" class="mb-2 block text-sm font-bold text-gray-700">Имя (указанное на карте)</label>
                                <input type="text" id="full_name" wire:model="name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-violet-500 focus:ring-violet-500" placeholder="Ivan Ivanov" />
                                @error('name') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="rate" class="mb-2 block text-sm font-bold text-gray-700">Номер карты</label>
                                <input type="text" id="card-number-input" wire:model="number" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 pe-10 text-sm text-gray-900 focus:border-violet-500 focus:ring-violet-500" placeholder="xxxx-xxxx-xxxx-xxxx" />
                                @error('number') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                            </div>
                            <div>
                                <label for="rate" class="mb-2 block text-sm font-bold text-gray-700">Срок дейтсвия</label>
                                <input  type="text" wire:model="data" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-9 text-sm text-gray-900 focus:border-violet-500 focus:ring-violet-500" placeholder="12/25" />
                                @error('data') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                            </div>
                            <div>
                                <label for="rate" class="mb-2 block text-sm font-bold text-gray-700">CVV</label>
                                <input type="number" id="cvv-input" wire:model="cvv" aria-describedby="helper-text-explanation" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-violet-500 focus:ring-violet-500" placeholder="•••" />
                                @error('cvv') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                            </div>
                        </div>
                        <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-violet-700 px-5 py-2.5 text-sm font-bold text-white hover:bg-violet-800 focus:outline-none focus:ring-4  focus:ring-violet-300">Оплатить</button>
                    </form>
                @else
                    <div class="w-full rounded-lg border p-1 border-violet-300 bg-white shadow-sm shadow-violet-500 lg:max-w-xl">
                        <img wire:click="paySbp()" class="rounded-md" src="{{ asset('img/qr_oplata.png') }}" alt="..." />
                    </div>
                @endif
                <div class="mt-6 grow sm:mt-8 lg:mt-0">
                    <div class="space-y-4 border border-violet-300 shadow-sm shadow-violet-500 bg-violet-50 rounded-lg p-6">
                        <div class="space-y-2">
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-semibold text-gray-500">Сумма без скидки</dt>
                                <dd class="text-base font-semibold text-gray-900">{{ (int)$start }} ₽</dd>
                            </dl>
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-semibold text-gray-500">Скидка</dt>
                                <dd class="text-base font-semibold text-red-500">{{ (int)$discount }} ₽</dd>
                            </dl>
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-semibold text-gray-500">Доставка</dt>
                                <dd class="text-base font-semibold text-green-500">Бесплатно</dd>
                            </dl>
                        </div>
                        <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2">
                            <dt class="text-lg font-bold text-gray-900">Итоговая сумма</dt>
                            <dd class="text-lg font-bold text-gray-900">{{(int) $total }} ₽</dd>
                        </dl>
                    </div>
                    <div class="mt-6 flex items-center justify-center gap-8">
                        @if (!isset($_GET['method']) || isset($_GET['method']) && $_GET['method'] == 'mir')
                            <a href="/payment?method=mir" class="block border-2 border-violet-500 rounded-lg p-1">
                                <img class="h-10 w-auto rounded-lg" src="{{ asset('img/mir.png') }}" alt="..." />
                            </a>
                        @else
                            <a href="/payment?method=mir" class="block border-0 border-violet-500 rounded-lg p-1">
                                <img class="h-10 w-auto rounded-lg" src="{{ asset('img/mir.png') }}" alt="..." />
                            </a>
                        @endif
                        @if (isset($_GET['method']) && $_GET['method'] == 'visa')
                            <a href="/payment?method=visa" class="block border-2 border-violet-500 rounded-lg p-1">
                                <img class="h-10 w-auto rounded-lg" src="{{ asset('img/visa.png') }}" alt="..." />
                            </a>
                        @else
                            <a href="/payment?method=visa" class="block border-0 border-violet-500 rounded-lg p-1">
                                <img class="h-10 w-auto rounded-lg" src="{{ asset('img/visa.png') }}" alt="..." />
                            </a>                        
                        @endif
                        @if (isset($_GET['method']) && $_GET['method'] == 'sbp')
                            <a href="/payment?method=sbp" class="block border-2 border-violet-500 rounded-lg p-1">
                                <img class="h-10 w-auto rounded-lg" src="{{ asset('img/sbp.png') }}" alt="..." />
                            </a>
                        @else
                            <a href="/payment?method=sbp" class="block border-0 border-violet-500 rounded-lg p-1">
                                <img class="h-10 w-auto rounded-lg" src="{{ asset('img/sbp.png') }}" alt="..." />
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

