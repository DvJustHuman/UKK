<x-app-layout>

<div class="py-10 bg-black/50 min-h-screen relative">

    <!-- BACKGROUND -->
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1520697222860-7f2f9e5f2c7c')] bg-cover bg-center opacity-20"></div>
    <div class="absolute inset-0 bg-black/85"></div>

    <!-- CONTENT -->
    <div class="relative max-w-3xl mx-auto px-6">

        <!-- TITLE -->
        <h2 class="text-3xl font-bold text-emerald-400 mb-6">
            Museum Profile Control
        </h2>

        <!-- CARD -->
        <div class="bg-black/40 backdrop-blur-2xl border border-emerald-500/20 rounded-2xl p-6
                    shadow-[0_0_40px_rgba(16,185,129,0.12)]">

            <div class="text-gray-300 text-sm mb-4">
                Manage your museum system identity & access
            </div>

            <!-- UPDATE PROFILE INFORMATION -->
            @include('profile.partials.update-profile-information-form')

        </div>

        <!-- PASSWORD -->
        <div class="mt-6 bg-black/40 backdrop-blur-2xl border border-emerald-500/20 rounded-2xl p-6
                    shadow-[0_0_40px_rgba(16,185,129,0.12)]">

            <h3 class="text-lg font-semibold text-emerald-300 mb-2">
                Security Access
            </h3>

            @include('profile.partials.update-password-form')

        </div>

        <!-- DELETE ACCOUNT -->
        <div class="mt-6 bg-black/40 backdrop-blur-2xl border border-red-500/20 rounded-2xl p-6">

            <h3 class="text-lg font-semibold text-red-400 mb-2">
                Danger Zone
            </h3>

            @include('profile.partials.delete-user-form')

        </div>

    </div>
</div>

</x-app-layout>