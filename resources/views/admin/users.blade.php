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
                                        👤 Pengunjung
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
<div id="modal" class="hidden fixed inset-0 bg-zinc-900/40 dark:bg-zinc-950/80 backdrop-blur-sm flex justify-center items-center z-50 p-4 transition-all duration-300">

    <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 w-full max-w-md rounded-[2.5rem] shadow-2xl overflow-hidden transform transition-all animate-bounce-subtle">
        <!-- HEADER -->
        <div class="px-8 py-6 border-b border-zinc-100 dark:border-zinc-800 flex justify-between items-center bg-zinc-50/50 dark:bg-zinc-900/50">

            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-2xl bg-sky-50 dark:bg-sky-500/10 flex items-center justify-center border border-sky-100 dark:border-sky-500/20 text-sky-500 shadow-inner">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-sm font-black text-zinc-900 dark:text-white uppercase tracking-widest leading-tight">
                        Edit User
                    </h2>
                    <p class="text-[10px] font-bold text-zinc-500 dark:text-zinc-400 mt-1 uppercase tracking-wider">
                        Perbarui Parameter
                    </p>
                </div>
            </div>

            <button onclick="closeModal()" class="w-10 h-10 rounded-full flex items-center justify-center bg-zinc-100 dark:bg-zinc-800 text-zinc-500 hover:bg-zinc-200 dark:hover:bg-zinc-700 hover:text-zinc-900 dark:hover:text-white transition-all">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>

        </div>

        <div class="p-8">
            <!-- FORM EDIT -->
            <form id="editForm" method="POST" class="space-y-6">
                @csrf

                <!-- NAMA -->
                <div class="space-y-2">
                    <label class="text-[11px] text-zinc-500 dark:text-zinc-400 font-bold uppercase tracking-widest ml-1">
                        Nama Identitas
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                        </div>
                        <input type="text" name="name" id="name" class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 py-3.5 pl-12 pr-4 text-sm font-bold focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 outline-none transition-all">
                    </div>
                </div>

                <!-- EMAIL -->
                <div class="space-y-2">
                    <label class="text-[11px] text-zinc-500 dark:text-zinc-400 font-bold uppercase tracking-widest ml-1">
                        Protokol Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        </div>
                        <input type="email" name="email" id="email" class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 py-3.5 pl-12 pr-4 text-sm font-bold focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 outline-none transition-all">
                    </div>
                </div>

                <!-- ROLE -->
                <div class="space-y-2">
                    <label class="text-[11px] text-zinc-500 dark:text-zinc-400 font-bold uppercase tracking-widest ml-1">
                        Level Akses
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-10">
                            <svg class="w-5 h-5 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        </div>
                        <select name="role" id="role" class="w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-2xl text-zinc-900 dark:text-zinc-100 py-3.5 pl-12 pr-10 text-sm font-bold focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 outline-none transition-all appearance-none cursor-pointer relative">
                            <option value="pengunjung">Pengunjung</option>
                            <option value="admin">Administrator</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-zinc-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                    </div>
                </div>

                <!-- TOMBOL -->
                <div class="flex gap-4 mt-10 pt-2">
                    <button type="button" onclick="closeModal()" class="flex-1 bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 hover:bg-zinc-200 dark:hover:bg-zinc-700 py-4 rounded-2xl font-black uppercase tracking-[0.2em] text-[10px] transition-all">
                        Batalkan
                    </button>
                    <button type="submit" class="flex-1 bg-sky-500 hover:bg-sky-600 text-white py-4 rounded-2xl font-black uppercase tracking-[0.2em] text-[10px] transition-all shadow-xl shadow-sky-500/20">
                        Simpan
                    </button>
                </div>
            </form>
        </div>

        <!-- FORM DELETE -->
        <div class="px-8 pb-8 pt-0 bg-zinc-50/50 dark:bg-zinc-900/30 border-t border-zinc-100 dark:border-zinc-800 flex justify-center">
            <form id="deleteForm" method="POST" class="w-full" onsubmit="return confirm('Yakin ingin menghapus user ini? Tindakan ini tidak dapat dibatalkan.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full flex items-center justify-center gap-2 py-4 mt-6 text-[10px] font-black uppercase tracking-[0.2em] text-red-500 hover:text-white hover:bg-red-500 border border-red-100 dark:border-red-500/20 hover:border-red-500 dark:bg-red-500/5 rounded-2xl transition-all shadow-sm hover:shadow-xl hover:shadow-red-500/20">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    Hapus Pengguna
                </button>
            </form>
        </div>

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