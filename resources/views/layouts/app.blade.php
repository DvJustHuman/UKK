<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-mono antialiased text-zinc-900 dark:text-zinc-100">
    <div class="min-h-screen bg-white dark:bg-zinc-950 flex flex-col">

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

async function checkSensorStatus() {

    try {

        const res =
            await fetch('/api/sensor/latest');

        const data =
            await res.json();

        if (!data.length) return;

        const latest = data[0];

        const createdAt = new Date(latest.created_at.replace(' ', 'T') + 'Z');
        const now = new Date();
        const diff = (now - createdAt) / 1000;

        const status =
            document.getElementById('systemStatus');

        if (diff > 10) {

            status.innerText =
                '● Sensor Offline';

            status.className =
                'bg-red-500/20 border border-red-500 px-4 py-2 rounded-2xl text-red-400 text-sm';

        } else {

            status.innerText =
                '● Sensor Aktif';

            status.className =
                'bg-green-500/20 border border-green-500 px-4 py-2 rounded-2xl text-green-400 text-sm';

        }

    } catch (e) {

        console.log(e);

    }

}

checkSensorStatus();

setInterval(checkSensorStatus, 5000);

</script>
<script>
function updateClock() {
    const now = new Date();

    let h = String(now.getHours()).padStart(2, '0');
    let m = String(now.getMinutes()).padStart(2, '0');
    let s = String(now.getSeconds()).padStart(2, '0');

    document.getElementById("live-clock").innerText = `${h}:${m}:${s}`;
}

setInterval(updateClock, 1000);
updateClock();
</script>
</body>
</html>