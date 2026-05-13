<section>

    <!-- HEADER -->
    <header class="mb-6">
        <h2 class="text-sm font-black text-zinc-400 uppercase tracking-widest">
            {{ __('Security Protocol') }}
        </h2>

        <p class="mt-2 text-xs text-zinc-500 dark:text-zinc-400">
            {{ __('Update your password to maintain museum system security.') }}
        </p>
    </header>

    <!-- FORM -->
    <form method="post" action="{{ route('password.update') }}" class="space-y-6">

        @csrf
        @method('put')

        <!-- CURRENT PASSWORD -->
        <div>
            <x-input-label for="update_password_current_password"
                :value="__('Current Password')"
                class="text-zinc-400" />

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-1 block w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-zinc-100
                       focus:border-sky-500 focus:ring-sky-500/10 rounded-2xl p-4 text-sm font-bold transition-all"
                autocomplete="current-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="mt-2 text-red-400"
            />
        </div>

        <!-- NEW PASSWORD -->
        <div>
            <x-input-label for="update_password_password"
                :value="__('New Password')"
                class="text-zinc-400" />

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-1 block w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-zinc-100
                       focus:border-sky-500 focus:ring-sky-500/10 rounded-2xl p-4 text-sm font-bold transition-all"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="mt-2 text-red-400"
            />
        </div>

        <!-- CONFIRM PASSWORD -->
        <div>
            <x-input-label for="update_password_password_confirmation"
                :value="__('Confirm Password')"
                class="text-zinc-400" />

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-zinc-100
                       focus:border-sky-500 focus:ring-sky-500/10 rounded-2xl p-4 text-sm font-bold transition-all"
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2 text-red-400"
            />
        </div>

        <!-- BUTTON -->
        <div class="flex items-center gap-4">

            <x-primary-button
                class="bg-sky-500 hover:bg-sky-600 text-white font-black uppercase tracking-widest px-8 py-4 rounded-2xl shadow-lg shadow-sky-500/20 transition-all">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-xs font-bold text-sky-500 uppercase tracking-widest"
                >
                    {{ __('Saved.') }}
                </p>
            @endif

        </div>

    </form>
</section>