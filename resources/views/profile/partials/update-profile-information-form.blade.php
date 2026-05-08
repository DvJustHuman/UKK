<section class="text-white">

    <!-- HEADER -->
    <header class="mb-6">
        <h2 class="text-xl font-bold text-emerald-400">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-300">
            Update your museum account identity & access.
        </p>
    </header>

    <!-- VERIFICATION FORM (tetap hidden system) -->
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- FORM -->
    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">

        @csrf
        @method('patch')

        <!-- NAME -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-emerald-300" />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full bg-black/50 border border-gray-600 text-white
                       focus:border-emerald-400 focus:ring-emerald-400 rounded"
                :value="old('name', $user->name)"
                required autofocus autocomplete="name"
            />

            <x-input-error class="mt-2 text-red-400" :messages="$errors->get('name')" />
        </div>

        <!-- EMAIL -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-emerald-300" />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full bg-black/50 border border-gray-600 text-white
                       focus:border-emerald-400 focus:ring-emerald-400 rounded"
                :value="old('email', $user->email)"
                required autocomplete="username"
            />

            <x-input-error class="mt-2 text-red-400" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 text-sm text-gray-300">

                    <p>
                        {{ __('Your email address is unverified.') }}
                    </p>

                    <button form="send-verification"
                        class="underline text-emerald-400 hover:text-emerald-300 mt-1">
                        {{ __('Resend verification email') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-emerald-400 font-medium">
                            {{ __('Verification link sent.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- BUTTON -->
        <div class="flex items-center gap-4">

            <x-primary-button
                class="bg-emerald-500 hover:bg-emerald-600 text-black font-bold px-4 py-2 rounded">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
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