
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"> 
        @livewireStyles
        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body class="h-screen flex items-center justify-center">
        <section class="bg-white dark:bg-gray-900 grid grid-cols-2 gap-8 max-w-screen-lg">
            <div>
                <img class="rounded-xl" src="{{ asset('img/job.png') }}" alt="...">
            </div>
            <div class="p">
                <h1 class="mb-4 text-5xl text-nowrap tracking-tight font-extrabold text-violet-600 dark:text-violet-500">Страница в разработке</h1>
                <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400"><i class="fa-solid fa-paw mr-3"></i>Наш разработчик прокоментривал данную ситуциаю так: <b class="text-violet-500"><i>"Мур-кодить устал, хвост как провода запутался, пора на диван-деплой и кофе-дебаггинг с печеньками!"</i></b>. Пожалуйста, дайте котику отдохнуть и вернитесь сюда позже<i class="fa-solid fa-paw ml-3"></i></p>
                <a href="/" class="inline-flex text-white bg-violet-600 hover:bg-violet-800 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-violet-900 my-4">На главную</a>
            </div>
        </section>
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </body>
</html>