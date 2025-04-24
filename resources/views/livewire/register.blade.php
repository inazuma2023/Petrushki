
<section class="bg-gray-50 w-screen h-screen fixed z-50 -mt-20">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="shrink-0 text-lg mb-5">
            <a>
                <icon class="block w-auto fa-solid fa-paw">
                <span class="tracking-widest">Petrushki</span>
            </a>
        </div>
        <div class="w-full bg-white rounded-lg border border-violet-300 shadow-sm shadow-violet-500 md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h2 class="text-2xl font-bold text-gray-700">Зарегистрировать аккаунт</h2>
                <form class="space-y-4 md:space-y-6" wire:submit.prevent="register">
                    <div>
                        <label for="rate" class="mb-2 block text-sm font-bold text-gray-700">Имя</label>
                        <input wire:model="name"  name="name" id="name" type="text"  class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-violet-600 focus:border-violet-600 block w-full p-2.5">
                        @error('name') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                    </div>
                    <div>
                        <label for="rate" class="mb-2 block text-sm font-bold text-gray-700">Почта</label>
                        <input wire:model="email" type="email"  name="email" id="email"  class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-violet-600 focus:border-violet-600 block w-full p-2.5">
                        @error('email') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                    </div>
                    <div>
                        <label for="rate" class="mb-2 block text-sm font-bold text-gray-700">Пароль</label>
                        <input wire:model="password" type="password" name="password" id="password"   class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-violet-600 focus:border-violet-600 block w-full p-2.5">
                        @error('password') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                    </div>
                    <div>
                        <label for="rate" class="mb-2 block text-sm font-bold text-gray-700">Повторите пароль</label>
                        <input wire:model="confirm_password" type="password" name="confirm_password" id="confirm_password"   class="bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-violet-600 focus:border-violet-600 block w-full p-2.5">
                        @error('confirm_password') <span class="text-red-500 text-xs">* {{ $message }}</span> @enderror 
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" aria-describedby="terms" type="checkbox" class="w-4.5 h-4.5 border border-gray-300 rounded bg-gray-50 focus:ring-0 text-violet-600 focus:ring-violet-300" >
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-semibold text-gray-500">Я согласен с <a class="font-medium text-violet-600 hover:underline" href="#">Политикой конфиденциальности</a></label>
                        </div>
                    </div>
                    <button type="submit" class="w-full text-white bg-violet-600 hover:bg-violet-700 focus:ring-0 focus:outline-none focus:ring-violet-300 font-bold rounded-lg text-sm px-5 py-2.5 text-center">Зарегистрироваться</button>
                    <p class="text-sm font-light text-gray-500">
                        Уже есть аккаунт? <a href="/login" class="font-medium text-violet-600 hover:underline">Войти</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
   
   

