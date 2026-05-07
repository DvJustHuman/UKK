<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-col">

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

        const createdAt =
            new Date(latest.created_at);

        const now =
            new Date();

        const diff =
            (now - createdAt) / 1000;

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
</body>
</html>