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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    @livewireStyles
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    <!-- Page Heading -->
    <header class="sticky top-0 bg-white shadow h-24">
        <div class="flex justify-between align-middle">
            <!-- Logo -->
            <div class="fixed top-0 left-0 px-6 py-4 sm:block">
                <a href="/">
                    <x-application-logo class="block w-auto fill-current text-gray-600"/>
                </a>
            </div>

            @if (Route::has('login'))
                <div class="fixed top-0 right-0 px-6 p-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                           class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                           class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>

    <!-- Page Content -->
    <main>
        <div class="py-12">
            <div class="mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <livewire:tips/>
                </div>
            </div>
        </div>
    </main>

    @livewireScripts
</div>
</body>
</html>
