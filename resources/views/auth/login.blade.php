<x-guest-layout>

<div class="fixed inset-0 flex items-center justify-center bg-black overflow-hidden">

    <!-- 🖼️ BACKGROUND -->
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1520697222860-7f2f9e5f2c7c')] bg-cover bg-center opacity-30"></div>
    <div class="absolute inset-0 bg-black/85"></div>

    <!-- 🎭 VIGNETTE -->
    <div class="absolute inset-0 pointer-events-none"
         style="background: radial-gradient(circle, transparent 40%, rgba(0,0,0,0.92) 100%);">
    </div>

    <!-- 🔦 EMERALD SPOTLIGHT -->
    <div id="spotlight"
         class="absolute inset-0 opacity-0 transition-opacity duration-1000"
         style="background: radial-gradient(circle at center, rgba(16,185,129,0.22) 0%, transparent 60%);">
    </div>

    <!-- 🚪 PINTU MUSEUM -->
    <div class="absolute inset-0 flex z-20">

        <div id="door-left"
            class="w-1/2 bg-[#0b0f0e] border-r-4 border-emerald-600 transition-transform duration-1000 ease-in-out">
        </div>

        <div id="door-right"
            class="w-1/2 bg-[#0b0f0e] border-l-4 border-emerald-600 transition-transform duration-1000 ease-in-out">
        </div>

    </div>

    <!-- 🎫 LOGIN CARD -->
    <div id="login-card"
        class="relative z-30 w-full max-w-md opacity-0 scale-90 transition-all duration-1000">

        <div class="bg-black/40 backdrop-blur-2xl border border-emerald-500/20 rounded-2xl p-8
                    shadow-[0_0_60px_rgba(16,185,129,0.15)]">

            <!-- TITLE -->
            <h2 class="text-3xl font-bold text-center text-emerald-400">
                Museum Access
            </h2>

            <p class="text-center text-gray-300 text-sm mt-2">
                Enter the exhibition control system
            </p>

            <!-- STATUS -->
            <x-auth-session-status class="mb-4 mt-4 text-emerald-300"
                :status="session('status')" />

            <!-- FORM -->
            <form method="POST" action="{{ route('login') }}" class="mt-6">
                @csrf

                <input type="email" name="email" placeholder="Email"
                    class="w-full mb-3 px-4 py-2 rounded bg-black/50 text-white border border-gray-600
                           focus:border-emerald-400 focus:ring-emerald-400">

                <input type="password" name="password" placeholder="Password"
                    class="w-full mb-3 px-4 py-2 rounded bg-black/50 text-white border border-gray-600
                           focus:border-emerald-400 focus:ring-emerald-400">

                <button class="w-full bg-emerald-500 hover:bg-emerald-600 text-black font-bold py-2 rounded transition">
                    Login
                </button>
            </form>

            <!-- REGISTER -->
            <div class="text-center mt-4">
                <p class="text-sm text-gray-300">
                    Belum punya akses?
                    <a href="{{ route('register') }}"
                       class="text-emerald-400 hover:text-emerald-300 font-semibold">
                        Register
                    </a>
                </p>
            </div>

        </div>
    </div>

</div>

<!-- 🔊 SOUND -->
<audio id="door-sound" src="{{ asset('sounds/door-open.mp3') }}"></audio>

<!-- 🎬 ANIMATION -->
<script>
window.addEventListener("load", () => {

    setTimeout(() => {

        // 🔊 sound
        const sound = document.getElementById("door-sound");
        sound.volume = 0.6;
        sound.play().catch(() => {});

        // 🚪 door open
        document.getElementById("door-left").style.transform = "translateX(-100%)";
        document.getElementById("door-right").style.transform = "translateX(100%)";

        // 🔦 spotlight on
        document.getElementById("spotlight").style.opacity = "1";

        // ✨ show card
        const card = document.getElementById("login-card");
        card.classList.remove("opacity-0", "scale-90");
        card.classList.add("opacity-100", "scale-100");

    }, 500);

});
</script>

</x-guest-layout>