<x-app-layout>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-6">Riwayat Data Sensor</h1>

        <div class="bg-white shadow rounded-2xl p-5 overflow-x-auto">

            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="p-3">No</th>
                        <th class="p-3">Suhu (°C)</th>
                        <th class="p-3">Kelembaban (%)</th>
                        <th class="p-3">Waktu</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data as $index => $item)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3">{{ $data->firstItem() + $index }}</td>
                            <td class="p-3">{{ $item->suhu }}</td>
                            <td class="p-3">{{ $item->kelembaban }}</td>
                            <td class="p-3">
                                {{ $item->created_at->format('d M Y H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-3 text-center text-gray-500">
                                Belum ada data
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

        <!-- PAGINATION -->
        <div class="mt-4">
            {{ $data->links() }}
        </div>

    </div>
</x-app-layout>