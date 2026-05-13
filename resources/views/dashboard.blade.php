<x-app-layout>

    <div class="p-6 max-w-7xl mx-auto" style="font-family: 'JetBrains Mono', monospace;">

        <!-- HEADER -->
        <div class="bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 p-6 md:p-8 mb-6 relative">
            <div class="absolute right-6 top-6 text-zinc-200 dark:text-zinc-800 text-4xl select-none font-bold italic">
                [SYSTEM]
            </div>

            <div class="relative z-10">
                <h1 class="text-2xl md:text-3xl font-bold text-zinc-900 dark:text-zinc-100 uppercase tracking-tight mb-2">
                    Monitoring Suhu Museum
                </h1>
                <p class="text-zinc-500 dark:text-zinc-400 text-sm">
                    > Sistem monitoring suhu & kelembaban realtime berbasis IoT
                </p>

               <div class="flex flex-wrap gap-3 mt-6">

    <div class="border border-zinc-300 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900 px-3 py-1 text-zinc-600 dark:text-zinc-400 text-xs uppercase tracking-wider">
        [ STATUS: REALTIME ]
    </div>

    <!-- STATUS SENSOR LIVE -->
    <div id="systemStatus"
        class="border border-red-500 bg-red-50 dark:bg-red-950/30 px-3 py-1 text-red-600 dark:text-red-400 text-xs uppercase tracking-wider">
        ● SENSOR OFFLINE
    </div>

</div>
            </div>
        </div>

        <!-- ALERT -->
        <div id="alertBox" class="hidden mb-6 bg-red-50 dark:bg-red-950/30 border border-red-500 text-red-700 dark:text-red-400 p-4">
            <div class="flex items-center gap-4">
                <div class="text-2xl font-bold">[!]</div>
                <div>
                    <h2 class="text-sm font-bold uppercase tracking-wider">Peringatan Suhu Tinggi</h2>
                    <p class="text-xs mt-1">Suhu museum melebihi batas aman. Segera lakukan tindakan.</p>
                </div>
            </div>
        </div>

        <!-- CARD SENSOR -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-6">
            <!-- SUHU -->
            <div class="bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 p-5 hover:border-zinc-400 dark:hover:border-zinc-600 transition-colors">
                <div class="flex justify-between items-start mb-2">
                    <p class="text-zinc-500 dark:text-zinc-400 text-xs uppercase tracking-wider">[ Suhu ]</p>
                    <div class="text-zinc-400 dark:text-zinc-600">°C</div>
                </div>
                <h2 id="suhuText" class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mt-2">-- °C</h2>
                <div class="mt-4 text-[10px] text-zinc-400 dark:text-zinc-500 uppercase">> Update: 3s</div>
            </div>

            <!-- KELEMBABAN -->
            <div class="bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 p-5 hover:border-zinc-400 dark:hover:border-zinc-600 transition-colors">
                <div class="flex justify-between items-start mb-2">
                    <p class="text-zinc-500 dark:text-zinc-400 text-xs uppercase tracking-wider">[ Kelembaban ]</p>
                    <div class="text-zinc-400 dark:text-zinc-600">%</div>
                </div>
                <h2 id="kelembabanText" class="text-3xl font-bold text-zinc-900 dark:text-zinc-100 mt-2">-- %</h2>
                <div class="mt-4 text-[10px] text-zinc-400 dark:text-zinc-500 uppercase">> Kelembaban Relatif</div>
            </div>

            <!-- STATUS -->
            <div class="bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 p-5 hover:border-zinc-400 dark:hover:border-zinc-600 transition-colors">
                <div class="flex justify-between items-start mb-2">
                    <p class="text-zinc-500 dark:text-zinc-400 text-xs uppercase tracking-wider">[ Status Ruangan ]</p>
                    <div id="statusIcon" class="text-zinc-400 dark:text-zinc-600">--</div>
                </div>
                <h2 id="statusText" class="text-2xl font-bold text-zinc-900 dark:text-zinc-100 mt-2 uppercase tracking-tight">--</h2>
                <div class="mt-4 text-[10px] text-zinc-400 dark:text-zinc-500 uppercase">> Kondisi Lingkungan</div>
            </div>

            <!-- STATUS KIPAS -->
            <div class="bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 p-5 hover:border-zinc-400 dark:hover:border-zinc-600 transition-colors">
                <div class="flex justify-between items-start mb-2">
                    <p class="text-zinc-500 dark:text-zinc-400 text-xs uppercase tracking-wider">[ Kipas ]</p>
                    <div id="fanStatusIcon" class="text-zinc-400 dark:text-zinc-600">OFF</div>
                </div>
                <h2 id="fanStatusText" class="text-2xl font-bold text-zinc-900 dark:text-zinc-100 mt-2 uppercase tracking-tight">[ MATI ]</h2>
                <div class="mt-4 text-[10px] text-zinc-400 dark:text-zinc-500 uppercase">> Auto Cooling</div>
            </div>


        </div>

        <!-- GRAFIK -->
        <div class="bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 p-6 mb-6">
            <div class="flex justify-between items-center mb-6 pb-4 border-b border-zinc-100 dark:border-zinc-800">
                <div>
                    <h2 class="text-lg font-bold text-zinc-900 dark:text-zinc-100 uppercase tracking-wider">Grafik Suhu Realtime</h2>
                    <p class="text-zinc-500 dark:text-zinc-400 text-xs mt-1">> Timeline perubahan suhu</p>
                </div>
                <div class="border border-green-500 bg-green-50 dark:bg-green-950/30 text-green-600 dark:text-green-400 px-3 py-1 text-xs uppercase tracking-wider animate-pulse">
                    [ LIVE DATA ]
                </div>
            </div>

            <div class="w-full relative" style="height: 350px;">
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
                            borderColor: '#ef4444', 
                            borderWidth: 2,
                            fill: false,
                            tension: 0.35,
                            pointRadius: 3,
                            yAxisID: 'y'
                        },
                        {
                            label: 'KELEMBABAN (%)',
                            data: [],
                            borderColor: '#3b82f6', 
                            borderWidth: 2,
                            fill: false,
                            tension: 0.35,
                            pointRadius: 3,
                            yAxisID: 'y1'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { 
                                font: { family: "'JetBrains Mono', monospace", size: 10 },
                                color: '#71717a'
                            }
                        },
                        y: {
                            type: 'linear',
                            display: true,
                            position: 'left',
                            beginAtZero: false,
                            grid: { color: 'rgba(113, 113, 122, 0.05)' },
                            ticks: { 
                                font: { family: "'JetBrains Mono', monospace", size: 10 },
                                color: '#71717a'
                            }
                        },
                        y1: {
                            type: 'linear',
                            display: true,
                            position: 'right',
                            beginAtZero: false,
                            grid: { drawOnChartArea: false },
                            ticks: { 
                                font: { family: "'JetBrains Mono', monospace", size: 10 },
                                color: '#71717a'
                            }
                        }
                    },
                    plugins: {
                        legend: { 
                            display: true,
                            labels: {
                                font: { family: "'JetBrains Mono', monospace", size: 10 },
                                color: '#71717a',
                                usePointStyle: true,
                                padding: 20
                            }
                        },
                        tooltip: {
                            backgroundColor: '#18181b',
                            titleFont: { family: "'JetBrains Mono', monospace" },
                            bodyFont: { family: "'JetBrains Mono', monospace" },
                            cornerRadius: 0
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
                    const suhu = parseFloat(latest.suhu);

                    // ================= STATUS ONLINE / OFFLINE =================
const systemStatus = document.getElementById('systemStatus');

const lastUpdate = new Date(latest.created_at.replace(' ', 'T'));
const now = new Date();
const diffSeconds = Math.abs(now - lastUpdate) / 1000;

if (diffSeconds <= 15) {

    systemStatus.innerText = '● SENSOR AKTIF';

    systemStatus.className =
        'border border-green-500 bg-green-50 dark:bg-green-950/30 px-3 py-1 text-green-600 dark:text-green-400 text-xs uppercase tracking-wider';

} else {

    systemStatus.innerText = '● SENSOR OFFLINE';

    systemStatus.className =
        'border border-red-500 bg-red-50 dark:bg-red-950/30 px-3 py-1 text-red-600 dark:text-red-400 text-xs uppercase tracking-wider';
}

                    document.getElementById('suhuText').innerText = suhu.toFixed(1) + ' °C';
                    document.getElementById('kelembabanText').innerText = latest.kelembaban + ' %';

                    // Update Status & Alert
                    let statusEl = document.getElementById('statusText');
                    let statusIcon = document.getElementById('statusIcon');
                    let alertBox = document.getElementById('alertBox');
                    let alertTitle = alertBox.querySelector('h2');
                    let alertDesc = alertBox.querySelector('p');
                    
                    let fanText = document.getElementById('fanStatusText');
                    let fanIcon = document.getElementById('fanStatusIcon');


                    const kelembaban = parseFloat(latest.kelembaban);

                    // LOGIC ANALOGY
                    if (suhu > 28 || kelembaban > 65) {
                        // Kondisi Panas & Lembab
                        statusEl.innerText = 'Tidak Nyaman';
                        statusIcon.innerText = '⚠️';
                        
                        fanText.innerText = '[ AKTIF ]';
                        fanIcon.innerText = 'ON';
                        fanIcon.className = 'text-green-500 font-bold';
                        

                        

                        alertBox.classList.remove('hidden');
                        alertTitle.innerText = 'Peringatan: Suhu Tidak Stabil';
                        alertDesc.innerText = 'Sistem Otomatis Aktif Dikarenakan Suhu Tidak Stabil.';

                    } else if (suhu < 18 || kelembaban < 50) {
                        // Kondisi Dingin & Kering
                        statusEl.innerText = 'Tidak Nyaman';
                        statusIcon.innerText = '❄️';
                        
                        fanText.innerText = '[ MATI ]';
                        fanIcon.innerText = 'OFF';
                        fanIcon.className = 'text-zinc-400 dark:text-zinc-600';

                        alertBox.classList.remove('hidden');
                        alertTitle.innerText = 'Peringatan: Suhu Tidak Stabil';
                        alertDesc.innerText = 'Sistem Otomatis Aktif Dikarenakan Suhu Tidak Stabil.';

                    } else if (suhu >= 18 && suhu <= 28) {
                        // Kondisi Nyaman (Range 18 - 28)
                        statusEl.innerText = 'Nyaman';
                        statusIcon.innerText = '✨';
                        
                        fanText.innerText = '[ MATI ]';
                        fanIcon.innerText = 'OFF';
                        fanIcon.className = 'text-zinc-400 dark:text-zinc-600';

                        alertBox.classList.add('hidden');
                    } else {
                        // Kondisi diluar range spesifik (Normal/Lainnya)
                        statusEl.innerText = 'Normal';
                        statusIcon.innerText = '●';
                        
                        fanText.innerText = '[ MATI ]';
                        fanIcon.innerText = 'OFF';
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
</x-app-layout>