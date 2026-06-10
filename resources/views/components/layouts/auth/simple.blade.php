<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-scholarhub-background antialiased">
        <div
            class="
                flex
                min-h-svh
                items-center
                justify-center
                bg-scholarhub-background
                p-2.5
            "
        >
            {{ $slot }}
        </div>
        @fluxScripts
    </body>
</html>
