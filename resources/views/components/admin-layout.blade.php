<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
</head>
<body class="flex flex-col overflow-hidden">
    <div class="h-12 bg-gray-800 text-white flex">
        <a href="#" class="inline-flex items-center  hover:bg-opacity-50 hover:bg-gray-900 px-4">Link #1</a>
    </div>
    <div class="h-screen flex flex-1">
        <div class="w-48 flex-none bg-gray-700 overflow-y-auto">
            <div class="flex flex-col text-white">
                <a href="{{ route('admin.home') }}" class="w-full inline-flex items-center hover:bg-opacity-50 hover:bg-gray-800 px-4 py-2">Главная</a>
                <a href="{{ route('admin.category') }}" class="w-full inline-flex items-center hover:bg-opacity-50 hover:bg-gray-800 px-4 py-2">Категории</a>
            </div>
        </div>
        <div class="flex-1 px-8 py-8 overflow-y-auto">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $header }}
            </h1>

            <main class="py-6">
                {{ $slot }}
            </main>
        </div>
    </div>

@livewireScripts
</body>
</html>
