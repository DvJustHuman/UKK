<section class="text-white">

    <!-- HEADER -->
    <header class="mb-6">
        <h2 class="text-xl font-bold text-emerald-400">
            {{ __('') }}
        </h2>

        <p class="mt-1 text-sm text-gray-300">
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
                class="text-emerald-300" />

            <x-text-input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="mt-1 block w-full bg-black/50 border border-gray-600 text-white
                       focus:border-emerald-400 focus:ring-emerald-400 rounded"
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
                class="text-emerald-300" />

            <x-text-input
                id="update_password_password"
                name="password"
                type="password"
                class="mt-1 block w-full bg-black/50 border border-gray-600 text-white
                       focus:border-emerald-400 focus:ring-emerald-400 rounded"
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
                class="text-emerald-300" />

            <x-text-input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="mt-1 block w-full bg-black/50 border border-gray-600 text-white
                       focus:border-emerald-400 focus:ring-emerald-400 rounded"
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
                class="bg-emerald-500 hover:bg-emerald-600 text-black font-bold px-4 py-2 rounded transition">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-emerald-400"
                >
                    {{ __('Saved.') }}
                </p>
            @endif

        </div>

    </form>
</section>