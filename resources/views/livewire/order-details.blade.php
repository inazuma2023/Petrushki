<section class="bg-white py-8 antialiased md:py-16 mb-10 border-t border-violet-600">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="mx-auto max-w-3xl">
            <div class="mt-2">
                <div class="flex justify-between items-center">
                    <h2 class="text-3xl font-bold text-gray-700">Детали заказа #{{$order->number}}</h2>
                    <a href="/order-list" class="flex items-center text-base font-semibold text-violet-600">
                        <svg class="ml-1 h-5 w-5 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                        </svg>
                        Заказы
                    </a>
                </div>
                <div class="flex gap-2 items-center mt-8">
                    <div class="text-base font-bold text-gray-500">Статус:</div>
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
                    </div>
                    <div class="flex gap-2 items-center mt-2">
                        <div class="text-base font-bold text-gray-500">Адрес пункта выдачи:</div>
                        <div class="text-sm font-semibold text-gray-700">{{ $order->pick_up }}</div>
                    </div>
                </div>
                <div class="mt-8">
                    <div class="relative overflow-x-auto border-b border-t border-violet-400">
                        <table class="w-full text-left font-medium text-gray-900 md:table-fixed">
                            <tbody class="divide-y divide-violet-400">
                                @foreach($orderItems as $orderItem)
                                    @php
                                        $item = App\Models\Product::where('id', $orderItem->product_id)->first();
                                    @endphp
                                    <tr>
                                        <td class="py-4 md:w-[350px] w-[200px]">
                                            <div class="flex items-center gap-4">
                                                <a href="{{'/product?product='.$item->article}}" class="flex items-center aspect-square w-10 h-10 shrink-0">
                                                    <img class="mx-auto rounded-xl" src="{{ asset('/storage/products/'.$item->article.'.png') }}" alt="..." />
                                                </a>
                                                <a href="{{'/product?product='.$item->article}}" class="font-semibold text-sm">{{$item->name}}</a>
                                            </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    
