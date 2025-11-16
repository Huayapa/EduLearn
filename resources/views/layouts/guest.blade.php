<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'EduLearn') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased ">
        <div class="min-h-screen bg-[--body] p-[20px_20px] md:p-[60px_60px] flex flex-col gap-[20px] md:gap-[60px] ">
            <nav class="h-min md:h-[86px] bg-[--fourth] rounded-[20px] p-[20px_40px] flex flex-col md:flex-row justify-center md:justify-between items-center ">
                <h1 class="text-[--secondary] text-4xl text-center md:text-start">Edu<span class="text-[--primary]">Learn</span></h1> 
                <h2 class="text-[--secondary] text-xl text-center md:text-start">Plataforma de Gestión Academica</h2>
            </nav>
            <main class="flex-1 flex flex-col sm:justify-start items-center pt-6 sm:pt-0">
                <div>
                    <a href="/">
                        <x-application-logo class="w-200 h-20 text-[--primary]" />
                    </a>
                </div>
    
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-[--fourth] shadow-md overflow-hidden rounded-lg border border-[--border]  ">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
