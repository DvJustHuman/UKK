<x-app-layout>

    <div class="p-6">

        <!-- HEADER -->
<div class="bg-gradient-to-r from-gray-800 to-gray-900 text-white rounded-3xl p-6 md:p-8 shadow-2xl mb-6 overflow-hidden relative">

    <div class="absolute right-0 top-0 opacity-10 text-9xl mr-6 mt-2">
        🏛️
    </div>

    <div class="relative z-10">

        <h1 class="text-3xl md:text-5xl font-bold mb-2">
            Monitoring Suhu Museum
        </h1>

        <p class="text-gray-300 text-lg">
            Sistem monitoring suhu & kelembaban realtime berbasis IoT
        </p>

        <div class="flex flex-wrap gap-3 mt-6">

            <div class="bg-emerald-500/20 border border-emerald-500 px-4 py-2 rounded-2xl text-emerald-400 text-sm">
                ● Sensor Aktif
            </div>

            <div class="bg-cyan-500/20 border border-cyan-500 px-4 py-2 rounded-2xl text-cyan-400 text-sm">
                ⚡ Realtime Monitoring
            </div>

        </div>

    </div>

</div>

        <!-- CARD SENSOR -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

    <!-- SUHU -->
    <div class="bg-white rounded-3xl shadow-xl p-6 border border-gray-100 hover:-translate-y-1 hover:shadow-2xl transition duration-300">

        <div class="flex justify-between items-center mb-4">

            <div>
                <p class="text-gray-500 text-sm">
                    Suhu
                </p>

                <h2 id="suhuText"
                    class="text-4xl font-bold text-gray-800 mt-2">
                    27°C
                </h2>
            </div>

            <div class="w-16 h-16 rounded-2xl bg-red-100 flex items-center justify-center text-3xl">
                🌡️
            </div>

        </div>

        <div class="mt-4 text-sm text-gray-500">
            Update realtime setiap 3 detik
        </div>

    </div>

    <!-- KELEMBABAN -->
    <div class="bg-white rounded-3xl shadow-xl p-6 border border-gray-100 hover:-translate-y-1 hover:shadow-2xl transition duration-300">

        <div class="flex justify-between items-center mb-4">

            <div>
                <p class="text-gray-500 text-sm">
                    Kelembaban
                </p>

                <h2 id="kelembabanText"
                    class="text-4xl font-bold text-gray-800 mt-2">
                    65%
                </h2>
            </div>

            <div class="w-16 h-16 rounded-2xl bg-cyan-100 flex items-center justify-center text-3xl">
                💧
            </div>

        </div>

        <div class="mt-4 text-sm text-gray-500">
            Monitoring kelembaban ruangan
        </div>

    </div>

    <!-- STATUS -->
    <div class="bg-white rounded-3xl shadow-xl p-6 border border-gray-100 hover:-translate-y-1 hover:shadow-2xl transition duration-300">

        <div class="flex justify-between items-center mb-4">

            <div>
                <p class="text-gray-500 text-sm">
                    Status Ruangan
                </p>

                <h2 id="statusText"
                    class="text-3xl font-bold text-emerald-500 mt-2">
                    Aman
                </h2>
            </div>

            <div class="w-16 h-16 rounded-2xl bg-emerald-100 flex items-center justify-center text-3xl">
                ✅
            </div>

        </div>

        <div class="mt-4 text-sm text-gray-500">
            Kondisi lingkungan museum
        </div>

    </div>

</div>


        <!-- ALERT -->
     <div id="alertBox"
class="hidden mb-6 bg-gradient-to-r from-red-500 to-orange-500 text-white rounded-3xl p-5 shadow-2xl animate-pulse">

    <div class="flex items-center gap-4">

        <div class="text-5xl">
            🚨
        </div>

        <div>
            <h2 class="text-2xl font-bold">
                Peringatan Suhu Tinggi
            </h2>

            <p class="text-red-100 mt-1">
                Suhu museum melebihi batas aman.
            </p>
        </div>

    </div>

</div>


        <!-- GRAFIK -->
       <div class="bg-white rounded-3xl shadow-2xl p-6 mb-6 border border-gray-100">

    <div class="flex justify-between items-center mb-6">

        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                Grafik Suhu Realtime
            </h2>

            <p class="text-gray-500 mt-1">
                Monitoring perubahan suhu museum
            </p>
        </div>

        <div class="bg-emerald-100 text-emerald-600 px-4 py-2 rounded-2xl text-sm font-semibold">
            Live Data
        </div>

    </div>

    <div class="w-full overflow-x-auto">
        <canvas id="chartSuhu"></canvas>
    </div>

</div>

<!-- KONTROL KIPAS -->
<div class="mt-6">

    <div class="bg-white rounded-3xl shadow-2xl p-6 border border-gray-100">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">

            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    🌀 Kontrol Kipas
                </h2>

                <p class="text-gray-500 mt-1 text-sm">
                    Kendali sistem pendingin ruangan museum
                </p>
            </div>

            <div class="bg-blue-100 text-blue-600 px-4 py-2 rounded-2xl text-sm font-semibold">
                Manual Control
            </div>

        </div>

        <!-- BUTTON CONTROL -->
        <form method="POST" action="/admin/kipas" class="flex flex-col md:flex-row gap-4">

            @csrf

            <!-- ON -->
            <button name="status" value="on"
                class="flex-1 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white py-4 rounded-2xl shadow-lg transition duration-300 hover:scale-105 flex items-center justify-center gap-2">

                <span class="text-xl">🟢</span>
                <span class="font-semibold">Nyalakan Kipas</span>

            </button>

            <!-- OFF -->
            <button name="status" value="off"
                class="flex-1 bg-gradient-to-r from-red-500 to-rose-600 hover:from-red-600 hover:to-rose-700 text-white py-4 rounded-2xl shadow-lg transition duration-300 hover:scale-105 flex items-center justify-center gap-2">

                <span class="text-xl">🔴</span>
                <span class="font-semibold">Matikan Kipas</span>

            </button>

        </form>

        <!-- STATUS INFO -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">

            <div class="bg-gray-50 rounded-2xl p-4 border">

                <p class="text-gray-500 text-sm">
                    Status Sistem
                </p>

                <p class="text-green-500 font-bold text-lg mt-1">
                    ● Ready
                </p>

            </div>

            <div class="bg-gray-50 rounded-2xl p-4 border">

                <p class="text-gray-500 text-sm">
                    Mode Operasi
                </p>

                <p class="text-blue-500 font-bold text-lg mt-1">
                    Manual
                </p>

            </div>

        </div>

    </div>

</div>

    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        const ctx = document.getElementById('chartSuhu');

        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Suhu',
                    data: [],
                    borderWidth: 3,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                animation: {
                    duration: 500
                },
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });

        async function loadData() {

            const res = await fetch('/api/sensor/latest');
            const data = await res.json();

            if (!data.length) return;

            const latest = data[0];
            const suhu = Number(latest.suhu);

            // UPDATE TEXT
            document.getElementById('suhuText').innerText = suhu + ' °C';
            document.getElementById('kelembabanText').innerText = latest.kelembaban + ' %';

            // STATUS
            let statusEl = document.getElementById('statusText');
            let alertBox = document.getElementById('alertBox');

            if (suhu > 30) {
                statusEl.innerText = 'Panas';
                statusEl.className = 'px-4 py-2 rounded text-white bg-red-500 text-lg';

                alertBox.classList.remove('hidden');

            } else if (suhu < 20) {
                statusEl.innerText = 'Dingin';
                statusEl.className = 'px-4 py-2 rounded text-white bg-blue-500 text-lg';

                alertBox.classList.add('hidden');

            } else {
                statusEl.innerText = 'Aman';
                statusEl.className = 'px-4 py-2 rounded text-white bg-green-500 text-lg';

                alertBox.classList.add('hidden');
            }

            // CHART
            const reversed = [...data].reverse();

            chart.data.labels = reversed.map(d => d.id);
            chart.data.datasets[0].data = reversed.map(d => d.suhu);

            chart.update();
        }

        loadData();
        setInterval(loadData, 3000);

    </script>

</x-app-layout>