<section class="py-8 bg-white md:py-16 antialiased border-t border-violet-600">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0 mt-4">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
            <div class="shrink-0 mx-auto"> 
                <img class="mx-auto  w-full rounded-xl" src="{{ asset('/storage/products/'.$product->article.'.png') }}" alt="..." />
            </div>
            <div class="mt-6 sm:mt-8 lg:mt-0">
                <h1  class="text-3xl font-bold text-gray-700">{{$product->name}}</h1>
                <div class="mt-4 flex flex-col gap-2">
                    <div class="flex gap-2 items-center">
                        <p class="text-3xl font-extrabold leading-tight text-gray-700">{{ $product->price_with_discount }} ₽</p>
                        @if ($product->discount > 0)
                            <p class="text-lg font-semibold line-through leading-tight text-gray-400">{{ $product->price }} ₽</p>
                            <div class="me-2 rounded bg-violet-100 px-2.5 py-0.5 text-sm font-bold text-violet-600"> 
                                -{{ $product->discount }} % 
                            </div>
                        @endif
                    </div>
                    <div class="mt-2 flex items-center gap-1">
                        <div class="flex items-center">
                            <svg class="h-4 w-4 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                            </svg>
                        </div>
                        @php
                            $count = $reviews->count();
                            $total = 0;
                            foreach ($reviews as $review) {
                                $total += $review->rating;
                            }
                            $total > 0 ? $average = $total / $count : $average = 0;
                        @endphp
                        <p class="font-bold text-gray-700">{{ number_format($average, 1) }}</p>
                        @if ($count)
                            <p class="font-medium text-gray-400">({{ $count }})</p>
                        @else
                            <p class="font-medium text-gray-400">(нет отзывов)</p>
                        @endif
                    </div>  
                </div>
                <div class="mt-6 flex gap-2  md:gap-5">
                    <button wire:poll="refresh()" wire:click="likeToggle({{$product->id}})" class="flex items-center justify-center rounded-lg py-2 px-3 border-2 border-violet-600 rounded-b-full text-violet-600">
                        @if (in_array($product->id, $favorites))
                            <div class="flex gap-2 items-center">
                                <icon class="fa-solid fa-heart text-lg text-red-500"></icon>
                            </div>
                        @else
                            <div class="flex gap-2 items-center">
                                <icon class="fa-regular fa-heart text-lg"></icon>
                            </div>
                        @endif
                    </button>
                    @if (in_array($product->id, $inCart))
                        <a href="/cart" class="inline-flex items-center justify-center w-full  gap-3 rounded-lg bg-violet-100 border-2 border-violet-600 px-10 py-2 font-bold text-violet-600 hover:bg-violet-300 focus:outline-none focus:ring-4  focus:ring-violet-300">
                            <icon class="fa-solid fa-arrow-right"></icon>
                            Корзина
                        </a>
                    @else
                        <button wire:click="addCart({{$product->id}})" class="inline-flex w-full items-center justify-center gap-3 border-2 border-violet-600 py-2 px-10 rounded-lg  bg-violet-700 font-bold text-white hover:bg-violet-800 focus:outline-none focus:ring-4  focus:ring-violet-300">
                            <icon class="fa-solid fa-shopping-cart"></icon>
                            В корзину
                        </button>
                    @endif
                </div>
                <hr class="my-6 md:my-8 border-violet-300" />
                <p class="mb-6 text-gray-500">
                    {{$product->description}}
                </p>
            </div>
        </div>
    </div>
    <section class="bg-white py-8 antialiased md:py-16 mt-10">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-5">
                    <h2 class="text-3xl font-bold text-gray-700">Отзывы</h2>
                    <div class="flex items-center gap-1">
                        <div class="flex items-center">
                            <svg class="h-6 w-6 text-yellow-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.8 4.2a2 2 0 0 0-3.6 0L8.4 8.4l-4.6.3a2 2 0 0 0-1.1 3.5l3.5 3-1 4.4c-.5 1.7 1.4 3 2.9 2.1l3.9-2.3 3.9 2.3c1.5 1 3.4-.4 3-2.1l-1-4.4 3.4-3a2 2 0 0 0-1.1-3.5l-4.6-.3-1.8-4.2Z" />
                            </svg>
                        </div>
                        <p class="font-bold text-xl text-gray-700">{{ number_format($average, 1) }} / 5</p>
                        @if ($count)
                            <p class="font-medium text-xl text-gray-400">({{ $count }})</p>
                        @else
                            <p class="font-medium text-xl text-gray-400">(нет отзывов)</p>
                        @endif
                    </div>
                </div>
                <button type="button" data-modal-target="review-modal" data-modal-toggle="review-modal" class="rounded-lg w-full md:w-64 bg-violet-600 px-5 py-3 font-bold text-white hover:bg-violet-800 focus:outline-none focus:ring-4 focus:ring-violet-300">Написать отзыв</button>
            </div>
            <div class="mt-5">
                @if (count($reviews->where('moderation', 1)) == 0) 
                    <div class="w-full text-center py-16 text-xl text-gray-700 font-bold">Станьте первым, кто оставит отзыв об этом товаре!</div>
                @else
                    @foreach ($reviews as $review)
                        @if ($review->moderation)
                        <div class="gap-3 pb-6 sm:flex sm:items-start mb-4 border-2 border-dotted border-violet-600 rounded-xl px-6 py-4">
                            <div class="shrink-0 space-y-2 sm:w-48 md:w-72">
                                @for ($i = 1; $i <= 5; $i++)
                                    <button type="button">
                                        <svg class="h-6 w-6 {{ $i <= $review->rating ? 'text-yellow-300' : 'text-gray-300'  }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                    </button>
                                @endfor
                                <div class="space-y-0.5">
                                    @if (\App\Models\User::where('id', $review->user_id)->first()->fullname == 'Не указан. Чтобы добавить, пожалуйста, отредактируйте профль')
                                        <p class="text-lg  font-bold text-gray-700">{{ \App\Models\User::where('id', $review->user_id)->first()->name }}</p>
                                    @else
                                        <p class="text-lg  font-bold text-gray-700">{{ \App\Models\User::where('id', $review->user_id)->first()->fullname }}</p>
                                    @endif
                                    <p class="text-sm font-semibold text-gray-500">{{ $review->created_at = date('d.m.Y') }}</p>
                                </div>
                            </div>

                            <div class="mt-4 min-w-0 flex-1 space-y-4 sm:mt-0">
                                <p class="text-base font-normal text-gray-500">{{ $review->text }}</p>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <div wire:ignore.self id="review-modal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 antialiased">
        <div class="relative max-h-full w-full max-w-screen-md p-4">
            <div class="relative rounded-lg bg-white shadow">
                <div class="flex items-center justify-between rounded-t border-b border-violet-400 p-4 md:p-5">
                    <div>
                        <h3 class="text-xl font-bold text-gray-700">Добавить отзыв</h3>
                    </div>
                    <button type="button" class="absolute right-5 top-5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900" data-modal-toggle="review-modal">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form class="p-4 md:p-5" wire:submit.prevent="createReview({{$product->id}})">
                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <label for="rate" class="mb-2 block text-sm font-bold text-gray-700">Оценка</label>
                            <div id="rate" class="flex items-center">
                                @for ($i = 1; $i <= 5; $i++)
                                    <button type="button" wire:click="rate({{ $i }})">
                                        <svg class="h-6 w-6 {{ $i <= $rating ? 'text-yellow-300' : 'text-gray-300'  }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                        </svg>
                                    </button>
                                @endfor
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="mb-2 block text-sm font-bold text-gray-700">Отзыв</label>
                            <textarea id="description" type="text" wire:model="review" rows="6" class="mb-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-700 focus:border-violet-500 focus:ring-violet-500" required></textarea>
                        </div>
                    </div>
                    <div class="border-t border-violet-400 pt-4 md:pt-5">
                        <button type="submit" class="me-2 inline-flex items-center rounded-lg bg-violet-600 border-2 px-5 py-2.5 text-center text-sm font-bold text-white hover:bg-violet-700 focus:outline-none focus:ring-4 focus:ring-violet-300">Оставить отзыв</button>
                        <button type="button" data-modal-toggle="review-modal" class="me-2 rounded-lg border-2 border-violet-500 bg-white px-5 py-2.5 text-sm font-bold text-violet-600 hover:bg-gray-100 hover:text-violet-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100">Отменить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>