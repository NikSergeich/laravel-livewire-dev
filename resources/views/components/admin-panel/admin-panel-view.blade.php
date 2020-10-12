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
    <body class="font-sans antialiased flex flex-col h-screen">
        <div class="bg-gray-900 text-white flex justify-between px-6 py-6">
            <div class="flex items-center space-x-4">
                <a href="#">
                    Logo
                </a>
                <a href="#">
                    Header
                </a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#">
                    Link
                </a>
            </div>
        </div>
        <div class="flex flex-1 overflow-y-hidden">
            <div class="bg-gray-800 w-48 flex-none overflow-y-auto">

                <x-admin-panel.admin-nav-link href="{{ route('admin.home') }}" :active="request()->routeIs('admin.home')">
                    Home
                </x-admin-panel.admin-nav-link>

                <x-admin-panel.admin-nav-link href="{{ route('categories.index') }}" :active="request()->routeIs('categories.index')">
                    Категории (рубрики)
                </x-admin-panel.admin-nav-link>

            </div>
            <div class="flex-1 overflow-y-auto px-8 py-8 bg-gray-100">
                {{ $header }}

                {{ $slot }}
            </div>
        </div>

    @livewireScripts
    </body>
</html>
