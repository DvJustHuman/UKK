<x-app-layout>

        <!-- STATUS -->
        <div class="bg-white shadow rounded-2xl p-6 mb-6">
            <h2 class="text-2xl font-bold mb-4 text-red-500">
                Keterangan Status
            </h2>

            <div class="space-y-3">

                <div class="flex items-center gap-3">
                    <span class="bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                        ✨ Nyaman
                    </span>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400 font-medium">Suhu 18°C - 28°C & Kelembaban 50% - 65%. Kondisi ruangan ideal.</p>
                </div>

                <div class="flex items-center gap-3">
                    <span class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                        ⚠️ Tidak Nyaman
                    </span>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400 font-medium">Suhu > 28°C / < 18°C, atau Kelembaban > 65% / < 50%. Sistem otomatis aktif.</p>
                </div>

            </div>
        </div>

        <!-- PANDUAN -->
        <div class="bg-white shadow rounded-2xl p-6 mb-6">
            <h2 class="text-2xl font-bold mb-4 text-purple-600">
                Panduan Penggunaan
            </h2>

            <ol class="list-decimal pl-6 space-y-3 text-gray-700 leading-7">
                <li>Login menggunakan akun yang telah terdaftar.</li>
                <li>Buka halaman dashboard untuk melihat data sensor realtime.</li>
                <li>Perhatikan status suhu ruangan.</li>
                <li>Jika kondisi ruangan tidak nyaman, maka sistem akan otomatis menstabilkan.</li>
                <li>Anda dapat melihat riwayat suhu di halaman riwayat.</li>
                <li>Buka halaman about untuk melihat informasi lebih detail.</li>
            </ol>
        </div>


        <!-- FOOTER -->
        <div class="text-center text-gray-500 mt-8">
            Sistem Monitoring Museum IoT - Laravel & ESP8266
        </div>

    </div>

</x-app-layout>