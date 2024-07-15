<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="shortcut icon" href="{{ asset('logo-tab.png') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('logo-tab.png') }}" type="image/x-icon">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <style>
            body {
                background-image: url('https://lh3.googleusercontent.com/places/ANXAkqGsE-hfOTyuPH8MpXoSozyFllzPG0_3ggXheqOqXb1-iSYM0RSXJ5HfwcM3PGWp8EESh0ddty6SUv_KoMz3l6f-vC2vkFyF2t0=s1600-h2944');
                background-size: cover;
                background-repeat: no-repeat;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="loader"></div>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div>
                <a href="/">
                    <img class="w-full h-20 fill-current text-gray-500" src="{{ asset('logo-brand.png') }}" alt="Logo Altrak1978">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
