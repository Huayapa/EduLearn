<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'EduLearn') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased overflow-x-hidden">
        <div class="h-screen bg-[--body] text-[--subtext] flex p-[20px] gap-[20px]">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main class="flex-1 flex flex-col bg-[--fourth] rounded-[20px] gap-[10px] p-[20px] w-full overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
        @if (session('success'))
            <div 
                x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 3000)"
                class="fixed top-5 left-1/2 transform -translate-x-1/2 
                    bg-green-600 text-white px-5 py-3 rounded-lg shadow-lg 
                    transition-all duration-500"
            >
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div 
                x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 5000)"
                class="fixed top-5 left-1/2 transform -translate-x-1/2
                    bg-red-600 text-white px-5 py-3 rounded-lg shadow-lg
                    transition-all duration-500 max-w-[90%] w-auto text-center"
            >
                {{-- Mostrar solo el primer error o todos --}}
                {{ $errors->first() }}
            </div>
        @endif
        
    </body>

</html>
