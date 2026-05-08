<x-app-layout>

    <div class="p-6">

        <!-- HERO -->
        <div class="bg-gradient-to-r from-slate-800 via-gray-900 to-black text-white rounded-3xl p-6 md:p-8 shadow-2xl mb-6 relative overflow-hidden">

            <!-- ICON BG -->
            <div class="absolute right-0 top-0 opacity-10 text-9xl mr-6 mt-2">
                📈
            </div>

            <div class="relative z-10">

                <h1 class="text-3xl md:text-5xl font-bold">
                    History Monitoring
                </h1>

                <p class="text-gray-300 mt-3 text-lg">
                    Riwayat suhu & kelembaban museum secara realtime
                </p>

                <div class="flex flex-wrap gap-3 mt-6">

                    <div class="bg-emerald-500/20 border border-emerald-500 px-4 py-2 rounded-2xl text-emerald-400 text-sm">
                        ● Data Realtime
                    </div>

                    <div class="bg-cyan-500/20 border border-cyan-500 px-4 py-2 rounded-2xl text-cyan-400 text-sm">
                        📡 Sensor Monitoring
                    </div>

                </div>

            </div>

        </div>

        <!-- TABLE -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">

            <!-- HEADER -->
            <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row md:justify-between md:items-center gap-4">

                <div>

                    <h2 class="text-2xl font-bold text-gray-800">
                        Data Sensor
                    </h2>

                    <p class="text-gray-500 mt-1">
                        Monitoring histori data sensor museum
                    </p>

                </div>

                <div class="bg-gray-100 px-4 py-2 rounded-2xl text-gray-700 text-sm font-semibold">

                    Total Data:
                    {{ $data->total() }}

                </div>

            </div>

            <!-- TABLE CONTENT -->
            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-gray-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-gray-600 font-semibold">
                                No
                            </th>

                            <th class="px-6 py-4 text-left text-gray-600 font-semibold">
                                Suhu
                            </th>

                            <th class="px-6 py-4 text-left text-gray-600 font-semibold">
                                Kelembaban
                            </th>

                            <th class="px-6 py-4 text-left text-gray-600 font-semibold">
                                Status
                            </th>

                            <th class="px-6 py-4 text-left text-gray-600 font-semibold">
                                Waktu
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($data as $item)

                            <tr class="border-t hover:bg-gray-50 transition duration-200">

                                <!-- NOMOR -->
                                <td class="px-6 py-4 font-semibold text-gray-700">

                                    {{ $data->firstItem() + $loop->index }}

                                </td>

                                <!-- SUHU -->
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-2">

                                        <div class="w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center">
                                            🌡
                                        </div>

                                        <span class="font-bold text-lg text-gray-800">

                                            {{ $item->suhu }}°C

                                        </span>

                                    </div>

                                </td>

                                <!-- KELEMBABAN -->
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-2">

                                        <div class="w-10 h-10 rounded-xl bg-cyan-100 flex items-center justify-center">
                                            💧
                                        </div>

                                        <span class="font-bold text-lg text-gray-800">

                                            {{ $item->kelembaban }}%

                                        </span>

                                    </div>

                                </td>

                                <!-- STATUS -->
                                <td class="px-6 py-4">

                                    @if($item->suhu > 30)

                                        <span class="bg-red-100 text-red-600 px-4 py-2 rounded-2xl text-sm font-bold">

                                            🔥 Panas

                                        </span>

                                    @elseif($item->suhu < 20)

                                        <span class="bg-blue-100 text-blue-600 px-4 py-2 rounded-2xl text-sm font-bold">

                                            ❄ Dingin

                                        </span>

                                    @else

                                        <span class="bg-emerald-100 text-emerald-600 px-4 py-2 rounded-2xl text-sm font-bold">

                                            ✅ Aman

                                        </span>

                                    @endif

                                </td>

                                <!-- WAKTU -->
                                <td class="px-6 py-4 text-gray-500">

                                    <div class="flex flex-col">

                                        <span>

                                            {{ $item->created_at->format('d M Y') }}

                                        </span>

                                        <span class="text-sm text-gray-400">

                                            {{ $item->created_at->format('H:i:s') }}

                                        </span>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5"
                                    class="px-6 py-10 text-center text-gray-500">

                                    Belum ada data sensor

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <!-- PAGINATION -->
        <div class="mt-6">

            {{ $data->links() }}

        </div>

    </div>

</x-app-layout>