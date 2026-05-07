<x-app-layout>

        <!-- STATUS -->
        <div class="bg-white shadow rounded-2xl p-6 mb-6">
            <h2 class="text-2xl font-bold mb-4 text-red-500">
                Keterangan Status
            </h2>

            <div class="space-y-3">

                <div class="flex items-center gap-3">
                    <span class="bg-blue-500 text-white px-3 py-1 rounded">
                        Dingin
                    </span>
                    <p>Suhu di bawah 20°C</p>
                </div>

                <div class="flex items-center gap-3">
                    <span class="bg-green-500 text-white px-3 py-1 rounded">
                        Aman
                    </span>
                    <p>Suhu antara 20°C - 30°C</p>
                </div>

                <div class="flex items-center gap-3">
                    <span class="bg-red-500 text-white px-3 py-1 rounded">
                        Panas
                    </span>
                    <p>Suhu di atas 30°C</p>
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
                <li>Gunakan kontrol kipas jika suhu terlalu panas.</li>
                <li>Admin dapat membuka menu user untuk mengatur pengguna.</li>
            </ol>
        </div>

        <!-- FOOTER -->
        <div class="text-center text-gray-500 mt-8">
            Sistem Monitoring Museum IoT - Laravel & ESP8266
        </div>

    </div>

</x-app-layout>