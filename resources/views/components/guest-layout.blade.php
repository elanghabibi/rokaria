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
    {{ $slot }}
</body>
@stack('scripts')
</html>