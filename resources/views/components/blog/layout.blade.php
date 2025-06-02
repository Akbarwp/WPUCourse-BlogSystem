<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} | {{ $title }}</title>
        <link rel="shortcut icon" href="{{ asset("img/logo.png") }}" type="image/x-icon">

        <!-- Link -->
        @include('components.blog.link')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-plus-jakarta">
        <x-blog.navbar />
        {{ $slot }}
        <x-blog.footer />

        <!-- Script -->
        @include('components.blog.script')
        @yield('script')
    </body>
</html>
