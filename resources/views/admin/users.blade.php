<x-app-layout>

    <div class="p-6">

        <!-- HEADER -->
        <div class="bg-gradient-to-r from-gray-800 to-gray-900 text-white rounded-3xl p-6 shadow-2xl mb-6">

            <h1 class="text-3xl font-bold">
                👥 Daftar User
            </h1>

            <p class="text-gray-300 mt-2">
                Kelola pengguna sistem monitoring museum
            </p>

        </div>

        <!-- SUCCESS -->
        @if(session('success'))

            <div class="mb-4 p-4 bg-green-500 text-white rounded-2xl shadow-lg">
                {{ session('success') }}
            </div>

        @endif

        <!-- TABLE -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-gray-50">

                        <tr>

                            <th class="text-left px-6 py-4 font-semibold text-gray-600">
                                ID
                            </th>

                            <th class="text-left px-6 py-4 font-semibold text-gray-600">
                                Nama
                            </th>

                            <th class="text-left px-6 py-4 font-semibold text-gray-600">
                                Email
                            </th>

                            <th class="text-left px-6 py-4 font-semibold text-gray-600">
                                Role
                            </th>

                            <th class="text-left px-6 py-4 font-semibold text-gray-600">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($users as $user)

                            <tr class="border-t hover:bg-gray-50 transition duration-200">

                                <td class="px-6 py-4">
                                    {{ $user->id }}
                                </td>

                                <td class="px-6 py-4 font-semibold">
                                    {{ $user->name }}
                                </td>

                                <td class="px-6 py-4 text-gray-600">
                                    {{ $user->email }}
                                </td>

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 rounded-xl text-sm font-semibold text-white

                                        {{ $user->role == 'admin'
                                            ? 'bg-red-500'
                                            : 'bg-blue-500' }}">

                                        {{ $user->role }}

                                    </span>

                                </td>

                                <td class="px-6 py-4">

                                    <button

                                        onclick="openModal(
                                            {{ $user->id }},
                                            '{{ $user->name }}',
                                            '{{ $user->email }}',
                                            '{{ $user->role }}'
                                        )"

                                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl shadow transition duration-300">

                                        Edit

                                    </button>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- MODAL -->
    <div id="modal"
        class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm flex justify-center items-center z-50 p-4">

        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-md p-6">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-bold text-gray-800">
                    ✏ Edit User
                </h2>

                <button onclick="closeModal()"
                    class="w-10 h-10 rounded-xl bg-gray-100 hover:bg-gray-200 transition">

                    ✕

                </button>

            </div>

            <form id="editForm" method="POST">

                @csrf

                <input type="text"
                    name="name"
                    id="name"
                    class="w-full border border-gray-200 rounded-2xl p-3 mb-4 focus:ring-2 focus:ring-emerald-500 outline-none"
                    placeholder="Nama">

                <input type="email"
                    name="email"
                    id="email"
                    class="w-full border border-gray-200 rounded-2xl p-3 mb-4 focus:ring-2 focus:ring-emerald-500 outline-none"
                    placeholder="Email">

                <select name="role"
                    id="role"
                    class="w-full border border-gray-200 rounded-2xl p-3 mb-4 focus:ring-2 focus:ring-emerald-500 outline-none">

                    <option value="user">
                        User
                    </option>

                    <option value="admin">
                        Admin
                    </option>

                </select>

                <div class="flex justify-end gap-3">

                    <button type="button"
                        onclick="closeModal()"
                        class="px-5 py-3 rounded-2xl bg-gray-300 hover:bg-gray-400 text-gray-800 transition">

                        Batal

                    </button>

                    <button type="submit"
                        class="px-5 py-3 rounded-2xl bg-emerald-500 hover:bg-emerald-600 text-white shadow-lg transition">

                        Simpan

                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- JS -->
    <script>

        function openModal(id, name, email, role) {

            document.getElementById('modal')
                .classList.remove('hidden');

            document.getElementById('name').value =
                name;

            document.getElementById('email').value =
                email;

            document.getElementById('role').value =
                role;

            document.getElementById('editForm').action =
                '/admin/users/update/' + id;
        }

        function closeModal() {

            document.getElementById('modal')
                .classList.add('hidden');
        }

    </script>

</x-app-layout>