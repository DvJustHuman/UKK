<section>

    <!-- HEADER -->
    <header class="mb-6">
        <h2 class="text-sm font-black text-zinc-400 uppercase tracking-widest">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-2 text-xs text-zinc-500 dark:text-zinc-400">
            {{ __('Update your museum account identity & access.') }}
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
            <x-input-label for="name" :value="__('Name')" class="text-zinc-400" />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-zinc-100
                       focus:border-sky-500 focus:ring-sky-500/10 rounded-2xl p-4 text-sm font-bold transition-all"
                :value="old('name', $user->name)"
                required autofocus autocomplete="name"
            />

            <x-input-error class="mt-2 text-red-400" :messages="$errors->get('name')" />
        </div>

        <!-- EMAIL -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-zinc-400" />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full bg-zinc-50 dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 text-zinc-900 dark:text-zinc-100
                       focus:border-sky-500 focus:ring-sky-500/10 rounded-2xl p-4 text-sm font-bold transition-all"
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
                        class="underline text-sky-500 hover:text-sky-600 mt-1">
                        {{ __('Resend verification email') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sky-500 font-medium">
                            {{ __('Verification link sent.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- BUTTON -->
        <div class="flex items-center gap-4">

            <x-primary-button
                class="bg-sky-500 hover:bg-sky-600 text-white font-black uppercase tracking-widest px-8 py-4 rounded-2xl shadow-lg shadow-sky-500/20 transition-all">
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
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