<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Monitoring Suhu Museum</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">



    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-zinc-900 dark:text-zinc-100 selection:bg-sky-500/30">
    <div class="min-h-screen bg-zinc-50 dark:bg-[#09090b] flex flex-col transition-colors duration-300">

        @include('layouts.navigation')

        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- 🔥 INI KUNCINYA -->
        <main class="flex-1 w-full">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>

    </div>

    @stack('scripts')
<script>
function updateClock() {
    const clockEl = document.getElementById("live-clock");
    if (!clockEl) return;
    
    const now = new Date();
    let h = String(now.getHours()).padStart(2, '0');
    let m = String(now.getMinutes()).padStart(2, '0');
    let s = String(now.getSeconds()).padStart(2, '0');

    clockEl.innerText = `${h}:${m}:${s}`;
}

setInterval(updateClock, 1000);
updateClock();
</script>
</body>
</html>