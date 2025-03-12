<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Recipes</title>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</head>

<body class="font-inter overflow-x-hidden">

    <x-header />

    <main class="pt-18 min-h-[calc(100vh-19rem)]">
        {{ $slot }}
    </main>

    <x-footer />

</body>

</html>
