<x-app-layout>
    <div class="p-6 max-w-7xl mx-auto" style="font-family: 'JetBrains Mono', monospace;">

        <!-- HEADER (Match with History Version) -->
        <div class="bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 p-6 md:p-8 mb-6 relative">
            <div class="absolute right-6 top-6 text-zinc-100 dark:text-zinc-900 text-4xl select-none font-bold">
                [USERS]
            </div>

            <div class="relative z-10">
                <h1 class="text-2xl md:text-3xl font-bold text-zinc-900 dark:text-zinc-100 uppercase tracking-tight mb-2">
                    Daftar User
                </h1>
                <p class="text-zinc-500 dark:text-zinc-400 text-sm">
                    > Manajemen otorisasi dan identitas personel sistem
                </p>

                <div class="flex flex-wrap gap-3 mt-6">
                    <div class="border border-zinc-300 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-900 px-3 py-1 text-zinc-600 dark:text-zinc-400 text-xs uppercase tracking-wider">
                        [ TOTAL USERS: {{ $users->count() }} ]
                    </div>
                </div>
            </div>
        </div>

        <!-- SUCCESS ALERT (Minimalist) -->
        @if(session('success'))
            <div class="mb-6 border-l-4 border-green-500 bg-green-50 dark:bg-green-950/20 p-4 transition-all">
                <div class="flex items-center gap-3 text-green-700 dark:text-green-400 text-xs uppercase font-bold tracking-widest">
                    <span>[!] Update Successful: {{ session('success') }}</span>
                </div>
            </div>
        @endif

        <!-- TABLE AREA -->
        <div class="bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 overflow-hidden shadow-sm">
            
            <div class="p-4 border-b border-zinc-100 dark:border-zinc-800 bg-zinc-50/50 dark:bg-zinc-900/50">
                <p class="text-[10px] text-zinc-500 uppercase tracking-[0.2em]">
                    > Daftar User
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-zinc-200 dark:border-zinc-800 text-zinc-500 dark:text-zinc-400 text-xs uppercase tracking-widest">
                            <th class="px-6 py-4 font-bold"># UID</th>
                            <th class="px-6 py-4 font-bold">Identity</th>
                            <th class="px-6 py-4 font-bold">Email</th>
                            <th class="px-6 py-4 font-bold text-center">Privilege</th>
                            <th class="px-6 py-4 font-bold text-right">Operations</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800">
                        @foreach ($users as $user)
                        <tr class="hover:bg-zinc-50 dark:hover:bg-zinc-900 transition-colors group">
                            
                            <!-- ID -->
                            <td class="px-6 py-4 text-sm font-bold text-zinc-400 dark:text-zinc-600">
                                [{{ str_pad($user->id, 3, '0', STR_PAD_LEFT) }}]
                            </td>

                            <!-- Nama -->
                            <td class="px-6 py-4 text-sm font-bold text-zinc-900 dark:text-zinc-100 uppercase tracking-tighter">
                                {{ $user->name }}
                            </td>

                            <!-- Email -->
                            <td class="px-6 py-4 text-xs text-zinc-500 dark:text-zinc-500 lowercase">
                                {{ $user->email }}
                            </td>

                            <!-- Role Badge (Style consistent with "Status" in history) -->
                            <td class="px-6 py-4 text-center">
                                @if($user->role == 'admin')
                                    <span class="text-[10px] font-bold text-red-600 dark:text-red-500 border border-red-200 dark:border-red-900/50 px-2 py-0.5 uppercase tracking-tighter">
                                        ADMIN
                                    </span>
                                @else
                                    <span class="text-[10px] font-bold text-zinc-500 dark:text-zinc-400 border border-zinc-200 dark:border-zinc-800 px-2 py-0.5 uppercase tracking-tighter">
                                        USER
                                    </span>
                                @endif
                            </td>

                            <!-- Aksi -->
                            <td class="px-6 py-4 text-right">
                                <button onclick="openModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->role }}')"
                                    class="text-[10px] font-bold text-zinc-400 hover:text-zinc-900 dark:hover:text-white uppercase transition-all tracking-widest">
                                    [ EDIT ]
                                </button>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL (Match with Industrial Theme) -->
    <div id="modal" class="hidden fixed inset-0 bg-zinc-950/40 backdrop-blur-sm flex justify-center items-center z-50 p-4">
        <div class="bg-white dark:bg-zinc-950 border border-zinc-300 dark:border-zinc-800 w-full max-w-md shadow-2xl overflow-hidden">
            
            <div class="p-4 border-b border-zinc-100 dark:border-zinc-800 flex justify-between items-center bg-zinc-50 dark:bg-zinc-900/50">
                <h2 class="text-xs font-bold text-zinc-900 dark:text-zinc-100 uppercase tracking-widest">
                    >> Edit User Parameters
                </h2>
                <button onclick="closeModal()" class="text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition">
                    [X]
                </button>
            </div>

            <form id="editForm" method="POST" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="text-[10px] text-zinc-400 uppercase mb-2 block font-bold">Identity Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-zinc-100 p-3 text-sm focus:border-zinc-900 dark:focus:border-zinc-400 outline-none transition uppercase">
                </div>

                <div>
                    <label class="text-[10px] text-zinc-400 uppercase mb-2 block font-bold">Email Protocol</label>
                    <input type="email" name="email" id="email"
                        class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-zinc-100 p-3 text-sm focus:border-zinc-900 dark:focus:border-zinc-400 outline-none transition">
                </div>

                <div>
                    <label class="text-[10px] text-zinc-400 uppercase mb-2 block font-bold">Access Privilege</label>
                    <select name="role" id="role"
                        class="w-full bg-zinc-50 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-zinc-100 p-3 text-sm focus:border-zinc-900 dark:focus:border-zinc-400 outline-none transition uppercase">
                        <option value="user">USER</option>
                        <option value="admin">ADMIN</option>
                    </select>
                </div>

                <div class="flex justify-end gap-3 mt-8 pt-4">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 text-xs font-bold text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition uppercase">
                        Discard
                    </button>
                    <button type="submit"
                        class="px-5 py-2 bg-zinc-900 dark:bg-zinc-100 text-white dark:text-zinc-900 text-xs font-bold uppercase tracking-widest transition">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id, name, email, role) {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('name').value = name;
            document.getElementById('email').value = email;
            document.getElementById('role').value = role;
            document.getElementById('editForm').action = '/admin/users/update/' + id;
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>
</x-app-layout>