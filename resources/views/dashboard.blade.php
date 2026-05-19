<x-app-layout>
    <div class="p-6 max-w-7xl mx-auto space-y-8">

        <!-- HEADER -->
        <div class="relative overflow-hidden bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 md:p-10 rounded-[2.5rem] shadow-xl shadow-zinc-200/50 dark:shadow-none transition-all duration-300">
            <div class="absolute -right-10 -top-10 text-zinc-100 dark:text-zinc-800/50 text-9xl select-none font-black opacity-20 pointer-events-none">
                IOT
            </div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <h1 class="text-3xl md:text-4xl font-extrabold text-zinc-900 dark:text-zinc-100 tracking-tight mb-2">
                        Dashboard <span class="text-sky-500">Monitoring</span>
                    </h1>
                    <p class="text-zinc-500 dark:text-zinc-400 font-medium flex items-center gap-2">
                        📍 Sistem Pemantauan Museum Realtime
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex items-center gap-2 p-1 bg-zinc-50 dark:bg-zinc-950 rounded-2xl border border-zinc-200 dark:border-zinc-800">
                        <a href="{{ route('admin.history') }}" 
                           class="flex items-center gap-2 px-4 py-2 text-[10px] font-black text-zinc-600 dark:text-zinc-400 hover:text-sky-500 uppercase tracking-widest transition-all">
                            Riwayat
                        </a>
                        <div class="w-px h-4 bg-zinc-200 dark:border-zinc-800"></div>
                        <a href="{{ route('admin.history.download') }}" 
                           class="flex items-center gap-2 px-4 py-2 text-[10px] font-black text-zinc-600 dark:text-zinc-400 hover:text-emerald-500 uppercase tracking-widest transition-all">
                            Unduh CSV
                        </a>
                    </div>

                    <div class="flex items-center gap-3 bg-zinc-50 dark:bg-zinc-950 p-2 rounded-2xl border border-zinc-200 dark:border-zinc-800">
                        <div id="systemStatus"
                            class="flex items-center gap-2 px-4 py-2 text-xs font-bold uppercase tracking-wider rounded-xl transition-all duration-300">
                            <span class="w-2 h-2 rounded-full animate-pulse bg-zinc-400"></span>
                            INITIALIZING...
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ALERT -->
        <div id="alertBox" class="hidden animate-bounce-subtle">
            <div class="bg-red-50 dark:bg-red-950/20 border border-red-200 dark:border-red-900/50 p-6 rounded-[2rem] flex items-center gap-5">
                <div class="w-14 h-14 bg-red-100 dark:bg-red-900/40 rounded-2xl flex items-center justify-center text-red-600 dark:text-red-400 text-2xl shadow-lg shadow-red-500/10">
                    ⚠️
                </div>
                <div>
                    <h2 class="text-red-900 dark:text-red-100 font-extrabold text-lg leading-tight uppercase tracking-tight">Kondisi Tidak Ideal</h2>
                    <p class="text-red-700 dark:text-red-400 text-sm font-medium mt-1">Sistem mendeteksi anomali pada lingkungan museum.</p>
                </div>
            </div>
        </div>

        <!-- CARD SENSOR -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- SUHU -->
            <div class="group bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 rounded-[2.5rem] hover:border-sky-500/50 hover:shadow-2xl hover:shadow-sky-500/10 transition-all duration-500">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-12 h-12 bg-sky-50 dark:bg-sky-500/10 rounded-2xl flex items-center justify-center text-xl shadow-sm">
                        🌡️
                    </div>
                    <span class="text-zinc-400 dark:text-zinc-600 font-black text-xl">°C</span>
                </div>
                <p class="text-zinc-500 dark:text-zinc-400 text-xs font-bold uppercase tracking-[0.2em] mb-2">Suhu Ruangan</p>
                <h2 id="suhuText" class="text-4xl font-extrabold text-zinc-900 dark:text-zinc-100 tracking-tighter">-- °C</h2>
                <div class="mt-6 flex items-center gap-2 text-[10px] font-bold text-zinc-400 dark:text-zinc-500 uppercase tracking-widest">
                    🕒 Update Langsung
                </div>
            </div>

            <!-- KELEMBABAN -->
            <div class="group bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 rounded-[2.5rem] hover:border-sky-500/50 hover:shadow-2xl hover:shadow-sky-500/10 transition-all duration-500">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-12 h-12 bg-sky-50 dark:bg-sky-500/10 rounded-2xl flex items-center justify-center text-xl shadow-sm">
                        💧
                    </div>
                    <span class="text-zinc-400 dark:text-zinc-600 font-black text-xl">%RH</span>
                </div>
                <p class="text-zinc-500 dark:text-zinc-400 text-xs font-bold uppercase tracking-[0.2em] mb-2">Kelembaban</p>
                <h2 id="kelembabanText" class="text-4xl font-extrabold text-zinc-900 dark:text-zinc-100 tracking-tighter">-- %RH</h2>
                <div class="mt-6 flex items-center gap-2 text-[10px] font-bold text-zinc-400 dark:text-zinc-500 uppercase tracking-widest">
                    ☁️ Kelembaban Relatif
                </div>
            </div>

            <!-- STATUS -->
            <div class="group bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 rounded-[2.5rem] hover:border-sky-500/50 hover:shadow-2xl hover:shadow-sky-500/10 transition-all duration-500">
                <div class="flex justify-between items-start mb-6">
                    <div id="statusIconBg" class="w-12 h-12 bg-zinc-50 dark:bg-zinc-800/50 rounded-2xl flex items-center justify-center text-xl transition-all duration-500 shadow-sm">
                        <span id="statusIconEmoji">🔍</span>
                    </div>
                    <span class="text-zinc-300 dark:text-zinc-700 text-xl">🔒</span>
                </div>
                <p class="text-zinc-500 dark:text-zinc-400 text-xs font-bold uppercase tracking-[0.2em] mb-2">Kondisi</p>
                <h2 id="statusText" class="text-2xl font-extrabold text-zinc-900 dark:text-zinc-100 tracking-tight uppercase">--</h2>
                <div class="mt-6 flex items-center gap-2 text-[10px] font-bold text-zinc-400 dark:text-zinc-500 uppercase tracking-widest">
                    🛡️ Analisis Keamanan
                </div>
            </div>

            <!-- KIPAS -->
            <div class="group bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 rounded-[2.5rem] hover:border-sky-500/50 hover:shadow-2xl hover:shadow-sky-500/10 transition-all duration-500">
                <div class="flex justify-between items-start mb-6">
                    <div id="fanStatusIconBg" class="w-12 h-12 bg-zinc-50 dark:bg-zinc-800/50 rounded-2xl flex items-center justify-center text-xl transition-all duration-500 shadow-sm">
                        <span id="fanStatusIconEmoji">🌀</span>
                    </div>
                    <div id="fanBadge" class="text-[10px] font-black px-2 py-1 bg-zinc-100 dark:bg-zinc-800 text-zinc-400 rounded-lg">OFF</div>
                </div>
                <p class="text-zinc-500 dark:text-zinc-400 text-xs font-bold uppercase tracking-[0.2em] mb-2">Kipas</p>
                <h2 id="fanStatusText" class="text-2xl font-extrabold text-zinc-900 dark:text-zinc-100 tracking-tight uppercase">Siaga</h2>
                <div class="mt-6 flex items-center gap-2 text-[10px] font-bold text-zinc-400 dark:text-zinc-500 uppercase tracking-widest">
                    ⚙️ Sistem Otomatis
                </div>
            </div>
        </div>

        <!-- GRAFIK -->
        <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 rounded-[2.5rem] shadow-xl shadow-zinc-200/30 dark:shadow-none transition-all duration-300">
            <div class="flex flex-col md:flex-row justify-between md:items-center gap-6 mb-10 pb-6 border-b border-zinc-100 dark:border-zinc-800">
                <div>
                    <h2 class="text-2xl font-extrabold text-zinc-900 dark:text-zinc-100 tracking-tight">Statistik <span class="text-sky-500">Waktu</span></h2>
                    <p class="text-zinc-500 dark:text-zinc-400 font-medium text-sm mt-1">Visualisasi data 10 rekaman terakhir</p>
                </div>
                <div class="flex items-center gap-2 px-4 py-2 bg-sky-50 dark:bg-sky-500/10 text-sky-600 dark:text-sky-400 text-xs font-black uppercase tracking-widest rounded-2xl border border-sky-200 dark:border-sky-500/20">
                    <span class="w-2 h-2 bg-sky-500 rounded-full animate-ping"></span>
                    Live Stream
                </div>
            </div>

            <div class="w-full relative px-4" style="height: 400px;">
                <canvas id="chartSuhu"></canvas>
            </div>
        </div>
    </div>

    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('chartSuhu').getContext('2d');

            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: 'SUHU (°C)',
                            data: [],
                            borderColor: '#0ea5e9', 
                            backgroundColor: 'rgba(14, 165, 233, 0.1)',
                            borderWidth: 4,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 6,
                            pointBackgroundColor: '#0ea5e9',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            yAxisID: 'y'
                        },
                        {
                            label: 'KELEMBABAN (%RH)',
                            data: [],
                            borderColor: '#6366f1', 
                            backgroundColor: 'rgba(99, 102, 241, 0.05)',
                            borderWidth: 4,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 6,
                            pointBackgroundColor: '#6366f1',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            yAxisID: 'y1'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: { mode: 'index', intersect: false },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { 
                                font: { weight: '700', size: 11 },
                                color: '#71717a',
                                padding: 10
                            }
                        },
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                            beginAtZero: false,
                            grid: { color: 'rgba(113, 113, 122, 0.05)' },
                            ticks: { 
                                font: { weight: '700', size: 11 },
                                color: '#71717a',
                                padding: 10
                            }
                        },
                        y1: {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            beginAtZero: false,
                            grid: { drawOnChartArea: false },
                            ticks: { 
                                font: { weight: '700', size: 11 },
                                color: '#71717a',
                                padding: 10
                            }
                        }
                    },
                    plugins: {
                        legend: { 
                            display: true,
                            position: 'top',
                            align: 'end',
                            labels: {
                                font: { weight: '800', size: 12 },
                                color: '#71717a',
                                usePointStyle: true,
                                padding: 30
                            }
                        },
                        tooltip: {
                            backgroundColor: '#18181b',
                            padding: 15,
                            titleFont: { size: 14, weight: '800' },
                            bodyFont: { size: 13, weight: '600' },
                            cornerRadius: 15,
                            displayColors: true
                        }
                    }
                }
            });

            async function loadData() {
                try {
                    const res = await fetch('/api/sensor/latest');
                    const data = await res.json();
                    if (!data.length) return;

const latest = data[0];

console.log("CREATED AT:", latest.created_at);

const suhu = parseFloat(latest.suhu);
const kelembaban = parseFloat(latest.kelembaban);

// ================= STATUS ONLINE / OFFLINE =================
const systemStatus = document.getElementById('systemStatus');

const now = new Date();
const lastUpdate = new Date(
    latest.created_at.replace(' ', 'T')
);
const diffSeconds = Math.abs(now - lastUpdate) / 1000;

if (diffSeconds <= 30) {
    systemStatus.innerHTML =
        '<span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span> SENSOR ONLINE';

    systemStatus.className =
        'flex items-center gap-2 px-4 py-2 text-xs font-extrabold bg-green-500/10 text-green-600 dark:text-green-400 rounded-xl transition-all duration-300';

} else {

    systemStatus.innerHTML =
        '<span class="w-2 h-2 rounded-full bg-red-500 animate-pulse"></span> SENSOR OFFLINE';

    systemStatus.className =
        'flex items-center gap-2 px-4 py-2 text-xs font-extrabold bg-red-500/10 text-red-600 dark:text-red-400 rounded-xl transition-all duration-300';
}

document.getElementById('suhuText').innerText =
    suhu.toFixed(1) + ' °C';

document.getElementById('kelembabanText').innerText =
    kelembaban.toFixed(1) + ' %RH';

                    // Update UI Elements
                    const statusText = document.getElementById('statusText');
                    const statusIconBg = document.getElementById('statusIconBg');
                    const statusIconEmoji = document.getElementById('statusIconEmoji');
                    const alertBox = document.getElementById('alertBox');
                    
                    const fanText = document.getElementById('fanStatusText');
                    const fanIconBg = document.getElementById('fanStatusIconBg');
                    const fanIconEmoji = document.getElementById('fanStatusIconEmoji');
                    const fanBadge = document.getElementById('fanBadge');

                    // LOGIC ANALOGY
                    if (suhu > 25 || kelembaban > 65) {
                        statusText.innerText = 'Tidak Ideal';
                        statusIconBg.className = 'w-12 h-12 bg-orange-500 rounded-2xl flex items-center justify-center shadow-lg shadow-orange-500/20 animate-pulse';
                        statusIconEmoji.innerText = '⚠️';
                        
                        fanText.innerText = 'Aktif';
                        fanIconBg.className = 'w-12 h-12 bg-green-500 rounded-2xl flex items-center justify-center shadow-lg shadow-green-500/20';
                        fanIconEmoji.innerText = '🌀';
                        fanBadge.innerText = 'On';
                        fanBadge.className = 'text-[10px] font-black px-2 py-1 bg-green-500 text-white rounded-lg shadow-md shadow-green-500/10';

                        alertBox.classList.remove('hidden');
                    } else if (suhu < 18 || kelembaban < 50) {
                        statusText.innerText = 'Tidak Ideal';
                        statusIconBg.className = 'w-12 h-12 bg-blue-500 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/20 animate-pulse';
                        statusIconEmoji.innerText = '❄️';
                        
                        fanText.innerText = 'Nonaktif';
                        fanIconBg.className = 'w-12 h-12 bg-zinc-100 dark:bg-zinc-800 rounded-2xl flex items-center justify-center';
                        fanIconEmoji.innerText = '🌀';
                        fanBadge.innerText = 'OFF';
                        fanBadge.className = 'text-[10px] font-black px-2 py-1 bg-zinc-100 dark:bg-zinc-800 text-zinc-400 rounded-lg';

                        alertBox.classList.remove('hidden');
                    } else {
                        statusText.innerText = 'Sangat Nyaman';
                        statusIconBg.className = 'w-12 h-12 bg-sky-500 rounded-2xl flex items-center justify-center shadow-lg shadow-sky-500/20';
                        statusIconEmoji.innerText = '✨';
                        
                        fanText.innerText = 'Standby';
                        fanIconBg.className = 'w-12 h-12 bg-zinc-100 dark:bg-zinc-800 rounded-2xl flex items-center justify-center';
                        fanIconEmoji.innerText = '🌀';
                        fanBadge.innerText = 'OFF';
                        fanBadge.className = 'text-[10px] font-black px-2 py-1 bg-zinc-100 dark:bg-zinc-800 text-zinc-400 rounded-lg';

                        alertBox.classList.add('hidden');
                    }

                    // Update Chart
                    const reversed = [...data].reverse();
                    chart.data.labels = reversed.map(d => {
                        const date = new Date(d.created_at.replace(' ', 'T'));
                        return date.getHours() + ":" + String(date.getMinutes()).padStart(2, '0');
                    });
                    chart.data.datasets[0].data = reversed.map(d => parseFloat(d.suhu));
                    chart.data.datasets[1].data = reversed.map(d => parseFloat(d.kelembaban));
                    chart.update(); 

                } catch (error) {
                    console.error("Error loading data:", error);
                }
            }

            loadData();
            setInterval(loadData, 3000);
        });
    </script>

    <style>
        @keyframes bounce-subtle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }
        .animate-bounce-subtle {
            animation: bounce-subtle 3s infinite ease-in-out;
        }
    </style>
</x-app-layout>