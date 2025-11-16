<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'EduLearn') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    </body>
</html>
