<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? '' }} | Rokaria</title>
    <link href='https://cdn.boxicons.com/3.0.6/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/3.0.6/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 w-full min-h-screen font-inter">
    <header class="h-fit w-full top-0 fixed left-0 bg-gray-50 px-12 py-4 items-center flex">
        <span><a href="{{ route('profile.index') }}" class="h-fit flex w-fit items-center text-2xl"><i class="bx bx-chevron-left"></i></a></span>
        <h1 class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-lg">{{ $header }}</h1>
    </header>

    <main class="w-full min-h-screen pt-14">
        {{ $slot }}
    </main>
</body>
@stack('scripts')
</html>