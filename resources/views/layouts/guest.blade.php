<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Museum Monitor</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">



        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-zinc-900 dark:text-zinc-100 bg-zinc-50 dark:bg-[#09090b] selection:bg-sky-500/30 transition-colors duration-300">
        <div class="min-h-screen flex flex-col items-center justify-center p-4">
            


            <!-- MAIN CONTENT -->
            <div class="w-full flex items-center justify-center">
                {{ $slot }}
            </div>

            <!-- FOOTER -->
            <div class="mt-12 text-center text-[10px] font-black text-zinc-400 uppercase tracking-widest">
                &copy; {{ date('Y') }} Museum Monitoring System
            </div>
        </div>
    </body>
</html>
