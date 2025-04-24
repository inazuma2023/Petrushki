<section class="bg-white border-t border-violet-600 pt-10 pb-16 antialiased">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="mx-auto max-w-5xl">
            <h2 class="text-3xl font-bold text-gray-700">Заказы</h2>
            <div class="flex flex-col gap-4 mt-5">
                @if ($orders->isEmpty())
                    <div class="md:col-span-5 text-center py-16 text-xl text-gray-700 font-bold w-full">Упс. Ни одного заказа. Скорее посмотрите <a class="text-violet-500 hover:underline" href="/catalog">каталог</a> и закажите что-нибудь</div>
                @else
                    @foreach ($orders as $order)
                        <div class="border-2 border-dotted border-violet-600 rounded-xl p-6">
                            <div class="flex flex-wrap items-center gap-y-4">
                                <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                    <dt class="text-base font-bold text-gray-500">Номер заказа:</dt>
                                    <dd class="mt-1.5 text-base font-semibold text-gray-700">
                                        <a>#{{$order->number}}</a>
                                    </dd>
                                </dl>
                                <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                    <dt class="text-base font-bold text-gray-500">Дата:</dt>
                                    <dd class="mt-1.5 text-base font-semibold text-gray-700">{{$order->date = date('d.m.Y')}}</dd>
                                </dl>
                                <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                    <dt class="text-base font-bold text-gray-500">Сумма:</dt>
                                    <dd class="mt-1.5 text-base font-semibold text-gray-700">{{$order->total}} ₽</dd>
                                </dl>
                                <dl class="w-1/2 sm:w-1/4 lg:w-auto lg:flex-1">
                                    <dt class="text-base font-bold text-gray-500">Статус:</dt>
                                    @if ($order->status_id == 1)
                                        <dd class="me-2 mt-1.5 inline-flex items-center gap-1 rounded bg-violet-100 px-2.5 py-1 text-xs font-bold text-violet-600">
                                            <icon class="fa-solid fa-boxes"></icon>
                                            {{ App\Models\Status::where('id', $order->status_id)->first()->name }}
                                        </dd>
                                    @endif
                                    @if ($order->status_id == 2)
                                        <dd class="me-2 mt-1.5 inline-flex items-center gap-1 rounded bg-yellow-100 px-2.5 py-1 text-xs font-bold text-yellow-600">
                                            <icon class="fa-solid fa-truck"></icon>
                                            {{ App\Models\Status::where('id', $order->status_id)->first()->name }}
                                        </dd>
                                    @endif
                                    @if ($order->status_id == 3)
                                        <dd class="me-2 mt-1.5 inline-flex items-center gap-1 rounded bg-emerald-100 px-2.5 py-1 text-xs font-bold text-emerald-600">
                                            <icon class="fa-solid fa-shop"></icon>
                                            {{ App\Models\Status::where('id', $order->status_id)->first()->name }}
                                        </dd>
                                    @endif
                                    @if ($order->status_id == 4)
                                        <dd class="me-2 mt-1.5 inline-flex items-center gap-1 rounded bg-teal-100 px-2.5 py-1 text-xs font-bold text-teal-600">
                                            <icon class="fa-solid fa-bell"></icon>
                                            {{ App\Models\Status::where('id', $order->status_id)->first()->name }}
                                        </dd>
                                    @endif
                                    @if ($order->status_id == 5)
                                        <dd class="me-2 mt-1.5 inline-flex items-center gap-1 rounded bg-green-100 px-2.5 py-1 text-xs font-bold text-green-600">
                                            <icon class="fa-solid fa-face-smile"></icon>
                                            {{ App\Models\Status::where('id', $order->status_id)->first()->name }}
                                        </dd>
                                    @endif
                                    @if ($order->status_id == 6)
                                        <dd class="me-2 mt-1.5 inline-flex items-center gap-1 rounded bg-red-100 px-2.5 py-1 text-xs font-bold text-red-500">
                                            <icon class="fa-solid fa-arrow-left"></icon>
                                            {{ App\Models\Status::where('id', $order->status_id)->first()->name }}
                                        </dd>
                                    @endif
                                </dl>
                                <div class="grid sm:grid-cols-2 lg:flex lg:items-center lg:justify-end gap-4">
                                    @if ($order->status_id == 6 ||  $order->status_id == 5)
                                        <button wire:click="repeatOrder({{$order->number}})" class="w-full rounded-lg border border-emerald-500 px-3 py-2 text-center text-sm font-bold text-emerald-500 hover:bg-emerald-500 hover:text-white focus:outline-none focus:ring-0 focus:ring-violet-300 lg:w-auto">Повторить заказ</button>
                                    @elseif ($order->status_id == 1 ||  $order->status_id == 4)
                                        <button wire:click="cancelOrder({{$order->number}})" class="w-full rounded-lg border border-red-500 px-3 py-2 text-center text-sm font-bold text-red-600 hover:bg-red-600 hover:text-white focus:outline-none focus:ring-0 focus:ring-red-300 lg:w-auto">Отменить заказ</button>
                                    @else
                                        <div></div>
                                    @endif
                                    <a href="{{'/order-details?orderInfo='.$order->number}}" class="w-full inline-flex justify-center rounded-lg  border border-violet-600 bg-white px-3 py-2 text-sm font-bold text-violet-600 hover:bg-violet-600 hover:text-white focus:outline-none focus:ring-0 focus:ring-gray-100 lg:w-auto">Детали заказа</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>