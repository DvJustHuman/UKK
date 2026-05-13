<x-app-layout>
    <div class="p-6 max-w-7xl mx-auto space-y-8">

        <!-- HEADER -->
        <div class="relative overflow-hidden bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 md:p-10 rounded-[2.5rem] shadow-xl shadow-zinc-200/50 dark:shadow-none transition-all duration-300">
            <div class="absolute -right-10 -top-10 text-zinc-100 dark:text-zinc-800/50 text-9xl select-none font-black opacity-20 pointer-events-none">
                USERS
            </div>

            <div class="relative z-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-zinc-900 dark:text-zinc-100 tracking-tight mb-2">
                    Personel <span class="text-sky-500">Sistem</span>
                </h1>
                <p class="text-zinc-500 dark:text-zinc-400 font-medium flex items-center gap-2">
                    👥 Manajemen otorisasi dan identitas pengguna
                </p>

                <div class="flex flex-wrap gap-3 mt-6">
                    <div class="bg-sky-50 dark:bg-sky-500/10 border border-sky-200 dark:border-sky-500/20 px-4 py-2 text-sky-600 dark:text-sky-400 text-xs font-black uppercase tracking-widest rounded-2xl">
                        Total Users: {{ $users->count() }}
                    </div>
                </div>
            </div>
        </div>

        <!-- SUCCESS ALERT -->
        @if(session('success'))
            <div class="bg-emerald-50 dark:bg-emerald-950/20 border border-emerald-200 dark:border-emerald-900/50 p-6 rounded-3xl animate-bounce-subtle">
                <div class="flex items-center gap-4 text-emerald-700 dark:text-emerald-400">
                    <span class="text-2xl">✅</span>
                    <span class="font-bold text-sm uppercase tracking-widest">Update Berhasil: {{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- TABLE AREA -->
        <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 rounded-[2.5rem] shadow-2xl shadow-zinc-200/50 dark:shadow-none overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-zinc-50/50 dark:bg-zinc-950/50 border-b border-zinc-100 dark:border-zinc-800 text-zinc-500 dark:text-zinc-400 text-xs font-black uppercase tracking-[0.2em]">
                            <th class="px-8 py-6">ID User</th>
                            <th class="px-8 py-6">Identitas Pengguna</th>
                            <th class="px-8 py-6">Email Akses</th>
                            <th class="px-8 py-6 text-center">Level Otoritas</th>
                            <th class="px-8 py-6 text-right">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800">
                        @foreach ($users as $user)
                        <tr class="group hover:bg-sky-50/30 dark:hover:bg-sky-500/5 transition-colors">
                            
                            <!-- NOMOR -->
                            <td class="px-8 py-6">
                                <span class="text-xs font-black text-zinc-300 dark:text-zinc-700 group-hover:text-sky-500 transition-colors">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </span>
                            </td>

                            <!-- Nama -->
                            <td class="px-8 py-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center font-bold text-zinc-500 group-hover:bg-sky-500 group-hover:text-white transition-all duration-300">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <span class="text-base font-extrabold text-zinc-900 dark:text-zinc-100 group-hover:text-sky-500 transition-colors">
                                        {{ $user->name }}
                                    </span>
                                </div>
                            </td>

                            <!-- Email -->
                            <td class="px-8 py-6">
                                <span class="text-sm font-medium text-zinc-500 dark:text-zinc-400">
                                    {{ $user->email }}
                                </span>
                            </td>

                            <!-- Role -->
                            <td class="px-8 py-6 text-center">
                                @if($user->role == 'admin')
                                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 text-[10px] font-black uppercase tracking-widest border border-red-100 dark:border-red-900/30">
                                        🛡️ Administrator
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 text-[10px] font-black uppercase tracking-widest border border-zinc-200 dark:border-zinc-700">
                                        👤 User
                                    </span>
                                @endif
                            </td>

                            <!-- Aksi -->
                            <td class="px-8 py-6 text-right">
                                <button onclick="openModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')"
                                    class="p-2 px-4 rounded-xl bg-zinc-50 dark:bg-zinc-800 text-zinc-400 hover:bg-sky-500 hover:text-white transition-all duration-300 font-black text-xs uppercase group-hover:shadow-lg group-hover:shadow-sky-500/20">
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
<div id="modal" class="hidden fixed inset-0 bg-zinc-950/60 backdrop-blur-md flex justify-center items-center z-50 p-4 transition-all duration-300">

    <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 w-full max-w-sm rounded-[2rem] shadow-2xl overflow-hidden animate-bounce-subtle">
        <!-- HEADER -->
        <div class="p-8 border-b border-zinc-100 dark:border-zinc-800 flex justify-between items-center bg-zinc-50/50 dark:bg-zinc-950/50">

            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-sky-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-sky-500/20">
                    📝
                </div>

                <h2 class="text-sm font-black text-zinc-900 dark:text-zinc-100 uppercase tracking-widest">
                    Edit Parameter User
                </h2>
            </div>

            <button onclick="closeModal()"
                class="w-8 h-8 rounded-full flex items-center justify-center bg-zinc-100 dark:bg-zinc-800 text-zinc-500 hover:bg-red-500 hover:text-white transition-all">
                ✕
            </button>

        </div>

        <!-- FORM EDIT -->
        <form id="editForm" method="POST" class="p-6 space-y-4">
            @csrf

            <!-- NAMA -->
            <div class="space-y-2">

                <label class="text-[10px] text-zinc-400 font-black uppercase tracking-widest ml-1">
                    Nama Identitas
                </label>

                <input type="text"
                    name="name"
                    id="name"
                    class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 p-4 text-sm font-bold focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 outline-none transition-all">

            </div>

            <!-- EMAIL -->
            <div class="space-y-2">

                <label class="text-[10px] text-zinc-400 font-black uppercase tracking-widest ml-1">
                    Protokol Email
                </label>

                <input type="email"
                    name="email"
                    id="email"
                    class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 p-4 text-sm font-bold focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 outline-none transition-all">

            </div>

            <!-- ROLE -->
            <div class="space-y-2">

                <label class="text-[10px] text-zinc-400 font-black uppercase tracking-widest ml-1">
                    Level Akses
                </label>

                <select name="role"
                    id="role"
                    class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 p-4 text-sm font-bold focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 outline-none transition-all appearance-none cursor-pointer">

                    <option value="user">User</option>
                    <option value="admin">Administrator</option>

                </select>

            </div>

            <!-- TOMBOL -->
            <div class="flex flex-col gap-3 mt-10">

                <!-- SIMPAN -->
                <button type="submit"
                    class="w-full bg-sky-500 hover:bg-sky-600 text-white py-4 rounded-2xl font-black uppercase tracking-[0.2em] text-xs transition-all shadow-xl shadow-sky-500/20">

                    Simpan Perubahan

                </button>

                <!-- BATAL -->
                <button type="button"
                    onclick="closeModal()"
                    class="w-full bg-zinc-50 dark:bg-zinc-800 text-zinc-500 hover:bg-zinc-100 dark:hover:bg-zinc-700 py-4 rounded-2xl font-black uppercase tracking-[0.2em] text-xs transition-all">

                    Batalkan

                </button>

            </div>

        </form>

        <!-- FORM DELETE -->
        <form id="deleteForm"
            method="POST"
            class="px-10 pb-10"
            onsubmit="return confirm('Yakin ingin menghapus user ini?')">

            @csrf
            @method('DELETE')

            <button type="submit"
                class="w-full bg-red-500 hover:bg-red-600 text-white py-4 rounded-2xl font-black uppercase tracking-[0.2em] text-xs transition-all shadow-xl shadow-red-500/20">

                Hapus User

            </button>

        </form>

    </div>

</div>

<!-- SCRIPT -->
<script>

    function openModal(id, name, email, role) {

        // TAMPILKAN MODAL
        document.getElementById('modal').classList.remove('hidden');

        // ISI INPUT
        document.getElementById('name').value = name;
        document.getElementById('email').value = email;
        document.getElementById('role').value = role;

        // ACTION UPDATE
        document.getElementById('editForm').action =
            '/admin/users/update/' + id;

        // ACTION DELETE
        document.getElementById('deleteForm').action =
            '/admin/users/delete/' + id;
    }

    function closeModal() {

        document.getElementById('modal').classList.add('hidden');

    }

</script>
</x-app-layout>