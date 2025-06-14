<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config("app.name", "Laravel") }}</title>
    <link rel="shortcut icon" href="{{ asset("img/logo.png") }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(["resources/css/app.css", "resources/js/app.js"])

    @stack("style")
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include("layouts.navigation")

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow-sm">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const alertEl = document.getElementById('alert');
        const closeBtn = document.getElementById('closeAlert');
        setTimeout(() => {
            if (alertEl) {
                alertEl.style.display = 'none';
            }
        }, 5000);

        closeBtn.addEventListener('click', () => {
            alertEl.style.display = 'none';
        });
    </script>
    @stack("script")
</body>

</html>
