<section class="bg-white border-t border-violet-600 pb-16 pt-10 antialiased dark:bg-gray-900">
    <div class="mx-auto max-w-screen-lg px-4 2xl:px-0">
        <h2 class="text-3xl ml-2 font-bold text-gray-700 mb-4">Профиль</h2>
        <div class="py-4 md:py-8 border-t border-violet-600">
            <div class="mb-4 grid gap-4 sm:grid-cols-2 sm:gap-8 lg:gap-16">
                <div class="space-y-4">
                    <div class="flex space-x-4">
                        <img class="h-16 w-16 rounded-lg" src="{{ asset('/storage/avatar/'.auth()->user()->id.'.png') }}" alt="avatar" />
                        <div>
                            <h2 class="flex items-center text-xl font-bold leading-none text-gray-700 dark:text-white sm:text-2xl">{{auth()->user()->name}}</h2>
                            <span data-modal-target="editAvatar" data-modal-toggle="editAvatar" class=" cursor-pointer mt-2 inline-block rounded bg-violet-100 px-2.5 py-0.5 text-xs font-medium text-violet-800 dark:bg-violet-900 dark:text-violet-300"> 
                                <icon class="fa-solid fa-camera"></icon>
                                Изменеить фото
                            </span>
                        </div>
                    </div>
                        <dl class="">
                            <dt class="font-semibold text-gray-700 dark:text-white">Полное имя</dt>
                            <dd class="text-gray-500 dark:text-gray-400">{{auth()->user()->fullname}}</dd>
                        </dl>
                        <dl class="">
                            <dt class="font-semibold text-gray-700 dark:text-white">Почта</dt>
                            <dd class="text-gray-500 dark:text-gray-400">{{auth()->user()->email}}</dd>
                        </dl>
                        <dl class="">
                            <dt class="font-semibold text-gray-700 dark:text-white">Телефон</dt>
                            <dd class="text-gray-500 dark:text-gray-400">{{auth()->user()->phone}}</dd>
                        </dl>
                        <dl class="">
                            <dt class="font-semibold text-gray-700 dark:text-white">Последний пункт выдачи</dt>
                            <dd class="text-gray-500 dark:text-gray-400">{{auth()->user()->address_delivery}}</dd>
                        </dl>
                    </div>
                    <div class="grid md:grid-cols-3 grid-cols-2 md:gap-x-20 gap-x-5 gap-y-10 mt-5">
                        <div class="flex flex-col gap-1 justify-center items-center">
                            <i class="fa-solid fa-comment text-[35px] text-violet-600"></i>
                            <div class="text-sm font-semibold text-gray-700 text-nowrap">Отзывов оставлено</div>
                            <div class="font-bold text-lg text-gray-500">{{count(App\Models\Review::where('user_id', auth()->user()->id)->get())}}</div>
                        </div>
                        <div class="flex flex-col gap-1 justify-center items-center">
                            <i class="fa-solid fa-heart text-[35px] text-violet-600"></i>
                            <div class="text-sm font-semibold text-gray-700 text-nowrap">Добавлено в избранное</div>
                            <div class="font-bold text-lg text-gray-500">{{count(App\Models\Favorite::where('user_id', auth()->user()->id)->get())}}</div>
                        </div>
                        <div class="flex flex-col gap-1 justify-center items-center">
                            <i class="fa-solid fa-coins text-[35px] text-violet-600"></i>
                            <div class="text-sm font-semibold text-gray-700 text-nowrap">Денег потрачено</div>
                            <div class="font-bold text-lg text-gray-500">{{auth()->user()->total}} ₽</div>
                        </div>
                        <div class="flex flex-col gap-1 justify-center items-center">
                            <i class="fa-solid fa-percent text-[35px] text-violet-600"></i>
                            <div class="text-sm font-semibold text-gray-700 text-nowrap">Денег сэкономлено</div>
                            <div class="font-bold text-lg text-gray-500">{{auth()->user()->discount}} ₽</div>
                        </div>
                        <div class="flex flex-col gap-1 justify-center items-center">
                            <i class="fa-solid fa-boxes-packing text-[35px] text-violet-600"></i>
                            <div class="text-sm font-semibold text-gray-700 text-nowrap">Заказов сделано</div>
                            <div class="font-bold text-lg text-gray-500">{{count(App\Models\Order::where('user_id', auth()->user()->id)->get())}}</div>
                        </div>
                        <div class="flex flex-col gap-1 justify-center items-center">
                            <i class="fa-solid fa-rectangle-xmark text-[35px] text-violet-600"></i>
                            <div class="text-sm font-semibold text-gray-700 text-nowrap">Заказов отменено</div>
                            <div class="font-bold text-lg text-gray-500">{{count(App\Models\Order::where('user_id', auth()->user()->id)->where('status_id', 6)->get())}}</div>
                        </div>        
                    </div>
                </div>
                <button type="button" data-modal-target="editProfile" data-modal-toggle="editProfile" class="inline-flex w-full items-center justify-center rounded-lg bg-violet-700 mt-2 px-5 py-2.5 text-sm font-bold text-white hover:bg-violet-800 focus:outline-none focus:ring-4 focus:ring-violet-300 dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800 sm:w-auto">
                    <svg class="-ms-0.5 me-1.5 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"></path>
                    </svg>
                    Редактировать профиль
                </button>
            </div>
        </div>
        <div wire:ignore.self id="editProfile" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden antialiased md:inset-0">
            <div class=" relative max-h-full w-full max-w-lg p-4">
                <div class="relative rounded-lg bg-white shadow dark:bg-gray-800">
                    <div class="flex items-center justify-between rounded-t border-b border-violet-400 p-4 dark:border-gray-700 md:p-5">
                        <h3 class="text-xl font-bold text-gray-700">Редактирование профиля</h3>
                        <button type="button" class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-700 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editProfile">
                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form class="p-4 md:p-5" wire:submit.prevent="editProfile()">
                        <div class="mb-5 grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="rate" class="mb-2 block text-sm font-bold text-gray-700">Имя и фамилия</label>
                                <input type="text" wire:model="fullname" id="full_name_info_modal" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-700 focus:border-violet-500 focus:ring-violet-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-violet-500 dark:focus:ring-violet-500"  />
                                @error('fullname') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="rate" class="mb-2 block text-sm font-bold text-gray-700">Телефон</label>
                                <input type="tel" wire:model="phone" id="full_name_info_modal" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-700 focus:border-violet-500 focus:ring-violet-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-violet-500 dark:focus:ring-violet-500"  />
                                @error('phone') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                            </div>
                        </div>
                        <div class="border-t border-violet-400 pt-4 dark:border-gray-700 md:pt-5">
                            <button type="submit" class="me-2 inline-flex items-center rounded-lg bg-violet-700 px-5 py-2.5 text-center text-sm font-bold text-white hover:bg-violet-800 focus:outline-none focus:ring-4 focus:ring-violet-300 dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800">Сохранить</button>
                            <button type="button" data-modal-toggle="editProfile" class="me-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-bold text-gray-700 hover:bg-gray-100 hover:text-violet-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Отмена</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div wire:ignore.self id="editAvatar" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden antialiased md:inset-0">
            <div class=" relative max-h-full w-full max-w-lg p-4">
                <div class="relative rounded-lg bg-white shadow dark:bg-gray-800">
                    <div class="flex items-center justify-between rounded-t border-b border-violet-400 p-4 dark:border-gray-700 md:p-5">
                        <h3 class="text-xl font-bold text-gray-700">Изменить аватар</h3>
                        <button type="button" class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-700 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editAvatar">
                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form class="p-4 md:p-5" wire:submit.prevent="editAvatar()">
                        <div class="mb-5 grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div class="col-span-2">
                                <label for="rate" class="mb-2 block text-sm font-bold text-gray-700">Изменить аватар</label>
                                <input type="file" wire:model="avatar" class="block w-full text-sm text-gray-700 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                                @error('avatar') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                            </div>  
                        </div>
                        <div class="border-t border-violet-400 pt-4 dark:border-gray-700 md:pt-5">
                            <button type="submit" class="me-2 inline-flex items-center rounded-lg bg-violet-700 px-5 py-2.5 text-center text-sm font-bold text-white hover:bg-violet-800 focus:outline-none focus:ring-4 focus:ring-violet-300 dark:bg-violet-600 dark:hover:bg-violet-700 dark:focus:ring-violet-800">Сохранить</button>
                            <button type="button" data-modal-toggle="editAvatar" class="me-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-bold text-gray-700 hover:bg-gray-100 hover:text-violet-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Отмена</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>