<x-app-layout>
    <div class="p-6 max-w-7xl mx-auto space-y-8">

        <!-- HEADER -->
        <div class="relative overflow-hidden bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 md:p-10 rounded-[2.5rem] shadow-xl shadow-zinc-200/50 dark:shadow-none transition-all duration-300">
            <div class="absolute -right-10 -top-10 text-zinc-100 dark:text-zinc-800/50 text-9xl select-none font-black opacity-20 pointer-events-none">
                AUTH
            </div>

            <div class="relative z-10">
                <h1 class="text-3xl md:text-4xl font-extrabold text-zinc-900 dark:text-zinc-100 tracking-tight mb-2">
                    Profil <span class="text-sky-500">Museum</span>
                </h1>
                <p class="text-zinc-500 dark:text-zinc-400 font-medium flex items-center gap-2">
                    🪪 Manajemen identitas dan keamanan otoritas sistem
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-8">
            
            <!-- UPDATE PROFILE INFORMATION -->
            <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 md:p-10 rounded-[2.5rem] shadow-xl shadow-zinc-200/30 dark:shadow-none">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-sky-50 rounded-2xl flex items-center justify-center text-xl">
                        👤
                    </div>
                    <h2 class="text-lg font-black text-zinc-900 dark:text-zinc-100 uppercase tracking-widest">
                        Informasi Identitas
                    </h2>
                </div>
                
                <div class="max-w-2xl text-zinc-900 dark:text-zinc-100">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- UPDATE PASSWORD -->
            <div class="bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 md:p-10 rounded-[2.5rem] shadow-xl shadow-zinc-200/30 dark:shadow-none">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-indigo-50 rounded-2xl flex items-center justify-center text-xl">
                        🔐
                    </div>
                    <h2 class="text-lg font-black text-zinc-900 dark:text-zinc-100 uppercase tracking-widest">
                        Protokol Keamanan
                    </h2>
                </div>

                <div class="max-w-2xl text-zinc-900 dark:text-zinc-100">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- DELETE ACCOUNT -->
            <div class="group relative bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 p-8 md:p-10 rounded-[2.5rem] shadow-xl shadow-zinc-200/30 dark:shadow-none overflow-hidden">
                <div class="absolute top-0 left-0 w-1.5 h-full bg-red-500 opacity-20 group-hover:opacity-100 transition-opacity"></div>
                
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-red-50 rounded-2xl flex items-center justify-center text-xl">
                        ⚠️
                    </div>
                    <h2 class="text-lg font-black text-red-600 uppercase tracking-widest">
                        Zona Penghapusan
                    </h2>
                </div>

                <div class="max-w-2xl text-zinc-900 dark:text-zinc-100">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>

    <!-- GLOBAL OVERRIDE FOR PROFILE FORMS -->
    <style>
        section header h2 {
            font-size: 0.75rem !important;
            text-transform: uppercase !important;
            letter-spacing: 0.2em !important;
            font-weight: 900 !important;
            color: #71717a !important;
        }
        section header p {
            font-size: 0.75rem !important;
            color: #a1a1aa !important;
            margin-top: 0.5rem !important;
            margin-bottom: 2rem !important;
            font-weight: 500 !important;
        }
        label {
            font-size: 10px !important;
            text-transform: uppercase !important;
            font-weight: 900 !important;
            letter-spacing: 0.1em !important;
            color: #52525b !important;
            margin-left: 0.25rem !important;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100% !important;
            background-color: #f8fafc !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 1rem !important;
            padding: 1rem !important;
            font-size: 0.875rem !important;
            font-weight: 700 !important;
            color: #1e293b !important;
            transition: all 0.3s !important;
        }
        .dark input[type="text"], .dark input[type="email"], .dark input[type="password"] {
            background-color: #09090b !important;
            border-color: #27272a !important;
            color: #f4f4f5 !important;
        }
        input:focus {
            border-color: #0ea5e9 !important;
            ring: 4px !important;
            ring-color: rgba(14, 165, 233, 0.1) !important;
            outline: none !important;
        }
        button.inline-flex.items-center.px-4.py-2.bg-gray-800, button.bg-red-600 {
            background-color: #0ea5e9 !important;
            border-radius: 1rem !important;
            text-transform: uppercase !important;
            font-size: 10px !important;
            font-weight: 900 !important;
            letter-spacing: 0.2em !important;
            padding: 1rem 1.5rem !important;
            transition: all 0.3s !important;
            box-shadow: 0 10px 15px -3px rgba(14, 165, 233, 0.2) !important;
        }
        button.bg-red-600 {
            background-color: #ef4444 !important;
            box-shadow: 0 10px 15px -3px rgba(239, 68, 68, 0.2) !important;
        }
        button:hover {
            transform: translateY(-2px) !important;
            opacity: 0.9 !important;
        }
    </style>
</x-app-layout>