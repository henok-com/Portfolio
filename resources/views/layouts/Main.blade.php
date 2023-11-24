<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habteyes Muluneh</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/fontawesome/css/all.css') }}" />
    <script src="{{ asset('/JS/Alpine/alpine.js') }}" defer></script>
</head>
<body class="hidden-overflow-x">
    @if(!Route::is("home"))
        @include("partials.header")
    @endif
    <main class="flex flex-column w-full" style="min-height: 100vh;">
    <div class="background fixed top-left" style="top: 0; right:
    0; left: 0; bottom: 0;">
        <div class="blur fixed top-left w-full h-full transparentBackgroundColorFourth"></div>
        <div class="circleLime" style="--i: 1"></div>
        <div class="circleSun" style="--i: 2"></div>
        <div class="circleBlue" style="--i: 3"></div>
        <div class="circleBlack" style="--i: 4"></div>
    </div>    
        <x-success />
        <x-error />
        @yield("content")
    </main>
    @include("partials.footer")
    <script src="{{ asset('/JS/index.js') }}"></script>
</body>
</html>
