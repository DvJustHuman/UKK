<section class="space-y-6">

    <!-- HEADER -->
    <header>
        <h2 class="text-sm font-bold text-red-600 uppercase tracking-[0.2em]">
            Penghapusan Akun
        </h2>

        <p class="mt-2 text-xs text-zinc-500 dark:text-zinc-400">
            > Setelah akun Anda dihapus, semua data akan dihapus secara permanen dari Sistem Kontrol Museum.
        </p>
    </header>

    <!-- DELETE BUTTON (OUTER) -->
    <button
        class="border border-red-600 bg-transparent hover:bg-red-600 text-red-600 hover:text-white text-[10px] font-bold uppercase tracking-widest px-4 py-2 transition-all duration-200"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        Lakukan Penghapusan
    </button>

    <!-- MODAL -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="post" action="{{ route('profile.destroy') }}"
              class="p-6 bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800"
              style="font-family: 'JetBrains Mono', monospace;">

            @csrf
            @method('delete')

            <!-- TITLE -->
            <h2 class="text-lg font-bold text-zinc-900 dark:text-zinc-100 uppercase tracking-tight">
                Konfirmasi Penghapusan
            </h2>

            <p class="mt-2 text-xs text-zinc-500 dark:text-zinc-400">
                > Tindakan ini bersifat permanen. Masukkan kata sandi Anda untuk mengonfirmasi penghentian akses sistem.
            </p>

            <!-- PASSWORD INPUT -->
            <div class="mt-6">
                <x-input-label for="password" value="Kata Sandi" class="sr-only" />

                <input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full bg-transparent border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-zinc-100 focus:border-red-600 focus:ring-0 text-sm"
                    placeholder="MASUKKAN KATA SANDI UNTUK MELANJUTKAN"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-[10px] uppercase font-bold text-red-600" />
            </div>

            <!-- ACTION BUTTONS -->
            <div class="mt-6 flex justify-end gap-3">

                <!-- Tombol Cancel (Benerin warna di sini) -->
                <button 
                    type="button"
                    class="bg-zinc-200 dark:bg-zinc-800 hover:bg-zinc-300 dark:hover:bg-zinc-700 text-zinc-700 dark:text-zinc-300 px-4 py-2 text-[10px] font-bold uppercase tracking-widest transition-colors"
                    x-on:click="$dispatch('close')">
                    Batal
                </button>

                <!-- Tombol Delete (Confirm) -->
                <button 
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 text-[10px] font-bold uppercase tracking-widest shadow-[0_0_15px_rgba(220,38,38,0.3)] transition-all">
                    Konfirmasi Hapus
                </button>

            </div>

        </form>

    </x-modal>

</section>