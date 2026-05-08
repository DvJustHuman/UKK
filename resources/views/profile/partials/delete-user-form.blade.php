<section class="space-y-6 text-white">

    <!-- HEADER -->
    <header>
        <h2 class="text-xl font-bold text-red-400">
            {{ __('') }}
        </h2>

        <p class="mt-1 text-sm text-gray-300">
            {{ __('Once your account is deleted, all data will be permanently removed from the museum system.') }}
        </p>
    </header>

    <!-- DELETE BUTTON -->
    <x-danger-button
        class="bg-red-600 hover:bg-red-700 text-white font-bold px-4 py-2 rounded transition"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        {{ __('Delete Account') }}
    </x-danger-button>

    <!-- MODAL -->
    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="post" action="{{ route('profile.destroy') }}"
              class="p-6 bg-black text-white rounded-lg">

            @csrf
            @method('delete')

            <!-- TITLE -->
            <h2 class="text-lg font-bold text-red-400">
                {{ __('Confirm Account Deletion') }}
            </h2>

            <p class="mt-2 text-sm text-gray-300">
                {{ __('This action is permanent. Enter your password to confirm deletion.') }}
            </p>

            <!-- PASSWORD -->
            <div class="mt-6">
                <x-input-label for="password"
                    value="{{ __('Password') }}"
                    class="text-red-300 sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full bg-black/60 border border-gray-600 text-white
                           focus:border-red-500 focus:ring-red-500 rounded"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error
                    :messages="$errors->userDeletion->get('password')"
                    class="mt-2 text-red-400"
                />
            </div>

            <!-- ACTION BUTTONS -->
            <div class="mt-6 flex justify-end gap-3">

                <x-secondary-button
                    class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded"
                    x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button
                    class="bg-red-600 hover:bg-red-700 text-white font-bold px-4 py-2 rounded">
                    {{ __('Delete Account') }}
                </x-danger-button>

            </div>

        </form>

    </x-modal>

</section>