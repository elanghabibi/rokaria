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
<body class="bg-gray-50 w-full min-h-screen font-inter">
    <x-header/>

    <main class="min-h-screen w-full max-md:space-y-4">
        {{ $slot }}
    </main>

    <x-footer/>

    @auth
    <a href="{{ route('project.create') }}">
        <div class="fixed bottom-14 right-14 w-16 aspect-square rounded-full bg-gray-950 text-gray-50 flex items-center justify-center text-4xl max-md:text-2xl">
            <span class="flex items-center justify-center"><i class="bx bx-plus"></i></span>
        </div>
    </a>
    @endauth

    <x-cta-login/>
    <x-toast/>
</body>
@stack('scripts')
</html>