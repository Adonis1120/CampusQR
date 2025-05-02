@props([
    'title' => null,
    'layout' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>{{ $title ?? 'Welcome' }} | CampusQR</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Rubik&family=Mitr&display=swap" rel="stylesheet">

        <link rel="icon" type="image/svg+xml" href="{{ Vite::asset('resources/img/stci-logo.png') }}">

        <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
        @fluxAppearance
        <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    </head>

    @if ($layout == "app")
        <body class="app-body">
    @elseif ($layout == "auth")
        <body class="auth-body">
    @else
        <body class="guest-body">
    @endif