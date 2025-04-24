<footer class="bg-gray-50 antialiased">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <div class="border-b border-gray-300 py-6 md:py-8 lg:py-16">
            <div class="items-start gap-6 md:gap-8 lg:flex 2xl:gap-24">
                <div class="grid min-w-0 flex-1 grid-cols-1 gap-6 md:gap-8 lg:grid-cols-4">
                    <div>
                        <h6 class="mb-4 text-sm font-semibold uppercase text-gray-900">Интерент-магазин</h6>
                        <ul class="space-y-3">
                            <li>
                                <a href="/dev" title="" class="text-gray-500 hover:text-gray-900">Лицензия</a>
                            </li>
                            <li>
                                <a href="/user" title="" class="text-gray-500 font-semibold hover:text-gray-900">Помощь</a>
                            </li>
                            <li>
                                <a href="/dev" title="" class="text-gray-500 hover:text-gray-900">Доставка и оплата</a>
                            </li>
                            <li>
                                <a href="/dev" title="" class="text-gray-500 hover:text-gray-900">Политика конфиденциальности</a>
                            </li>
                            <li>
                                <a href="/dev" title="" class="text-gray-500 hover:text-gray-900">Карта сайта</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h6 class="mb-4 text-sm font-semibold uppercase text-gray-900">Компания</h6>
                        <ul class="space-y-3">
                            <li>
                                <a href="/dev" title="" class="text-gray-500 hover:text-gray-900">О компании</a>
                            </li>
                            <li>
                                <a href="/dev" title="" class="text-gray-500 hover:text-gray-900">Инвесторам</a>
                            </li>
                            <li>
                                <a href="/dev" title="" class="text-gray-500 hover:text-gray-900">Пресс-центр</a>
                            </li>
                            <li>
                                <a href="/dev" title="" class="text-gray-500 hover:text-gray-900">Вакансии</a>
                            </li>
                            <li>
                                <a href="/dev" title="" class="text-gray-500 hover:text-gray-900">Контакты</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hidden lg:block">
                        <h6 class="mb-4 text-sm font-semibold uppercase text-gray-900">Покупателям</h6>
                        <ul class="space-y-3">
                            <li>
                                <a href="/dev" title="" class="text-gray-500 hover:text-gray-900">Оплата</a>
                            </li>
                            <li>
                                <a href="/dev" title="" class="text-gray-500 hover:text-gray-900">Акции</a>
                            </li>
                            <li>
                                <a href="/dev" title="" class="text-gray-500 hover:text-gray-900">Промокоды</a>
                            </li>
                            <li>
                                <a href="/dev" title="" class="text-gray-500 hover:text-gray-900">Бренды</a>
                            </li>
                            <li>
                                <a href="/dev" title="" class="text-gray-500 hover:text-gray-900">Магазины сети</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hidden lg:block">
                        <h6 class="mb-4 text-sm font-semibold uppercase text-gray-900">Каталог</h6>
                        @php
                            $catalog_1 = 'href="/catalog?category=1"';
                            $catalog_2 = 'href="/catalog?category=2"';
                            $catalog_3 = 'href="/catalog?category=3"';
                            $catalog_4 = 'href="/catalog?category=4"';
                            $catalog_5 = 'href="/catalog?category=5"';
                            $catalog_6 = 'href="/catalog?category=6"';
                            $notAuth='data-modal-target="popup-modal" data-modal-toggle="popup-modal"'; 
                        @endphp
                        <ul class="space-y-3">
                            <li>
                                <a <?php echo auth()->check() ? $catalog_1 : $notAuth; ?> class="text-gray-500 hover:text-gray-900">Товары для кошек</a>
                            </li>
                            <li>
                                <a <?php echo auth()->check() ? $catalog_2 : $notAuth; ?> class="text-gray-500 hover:text-gray-900">Товары для собак</a>
                            </li>
                            <li>
                                <a <?php echo auth()->check() ? $catalog_3 : $notAuth; ?> class="text-gray-500 hover:text-gray-900">Товары для птиц</a>
                            </li>
                            <li>
                                <a <?php echo auth()->check() ? $catalog_4 : $notAuth; ?> class="text-gray-500 hover:text-gray-900">Товары для грызунов</a>
                            </li>
                            <li>
                                <a <?php echo auth()->check() ? $catalog_5 : $notAuth; ?> class="text-gray-500 hover:text-gray-900">Аквариумистика</a>
                            </li>
                            <li>
                                <a <?php echo auth()->check() ? $catalog_6 : $notAuth; ?> class="text-gray-500 hover:text-gray-900">Ветаптека</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-6 md:py-8">
            <div class="gap-4 space-y-5 xl:flex xl:items-center xl:justify-between xl:space-y-0">
                <div class="shrink-0 text-lg">
                    <a href="/">
                        <icon class="block w-auto fa-solid fa-paw">
                        <span class="tracking-widest">Petrushki</span>
                    </a>
                </div>
                <ul class="flex flex-wrap items-center gap-4 text-xl text-gray-900  xl:justify-center">
                    <li><a href="#" title="" class="font-medium hover:underline text-sm border-r border-gray-900 pr-4"> +7 (960) 774 72 93 </a></li>
                    <li><a href="#" title="" class="font-medium hover:underline"> <icon class="fa-brands fa-telegram"></icon> </a></li>
                    <li><a href="#" title="" class="font-medium hover:underline"> <icon class="fa-brands fa-whatsapp"></icon> </a></li>
                    <li><a href="#" title="" class="font-medium hover:underline"> <icon class="fa-brands fa-vk"></icon> </a></li>
                    <li><a href="#" title="" class="font-medium hover:underline"> <icon class="fa-brands fa-square-odnoklassniki"></icon> </a></li>
                </ul>
                <p class="text-sm text-gray-500">© 2024 Petrushki. Все права защищены</p>
            </div>
        </div>
    </div>
</footer>