<x-app-layout>
    <div class="p-6 max-w-7xl mx-auto" style="font-family: 'JetBrains Mono', monospace;">

        <!-- HEADER -->
        <div class="bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 p-6 md:p-8 mb-6 relative">
            <div class="absolute right-6 top-6 text-zinc-100 dark:text-zinc-900 text-4xl select-none font-bold italic">
                [AUTH]
            </div>
            <div class="relative z-10">
                <h1 class="text-2xl md:text-3xl font-bold text-zinc-900 dark:text-zinc-100 uppercase tracking-tight mb-2">
                    Museum Profile Control
                </h1>
                <p class="text-zinc-500 dark:text-zinc-400 text-sm">
                    > Pengaturan Identitas Sistem dan Hak Akses Keamanan
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-6">
            
            <!-- UPDATE PROFILE INFORMATION -->
            <div class="bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 p-6">
                <div class="flex items-center gap-2 mb-6 pb-4 border-b border-zinc-100 dark:border-zinc-900">
                    <div class="w-2 h-2 bg-cyan-500"></div>
                    <h2 class="text-sm font-bold text-zinc-900 dark:text-zinc-100 uppercase tracking-[0.2em]">
                        Identity Information
                    </h2>
                </div>
                
                <div class="max-w-xl text-zinc-900 dark:text-zinc-100">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- UPDATE PASSWORD -->
            <div class="bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 p-6">
                <div class="flex items-center gap-2 mb-6 pb-4 border-b border-zinc-100 dark:border-zinc-900">
                    <div class="w-2 h-2 bg-cyan-500"></div>
                    <h2 class="text-sm font-bold text-zinc-900 dark:text-zinc-100 uppercase tracking-[0.2em]">
                        Security Protocol
                    </h2>
                </div>

                <div class="max-w-xl text-zinc-900 dark:text-zinc-100">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- DELETE ACCOUNT -->
            <div class="bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 p-6 relative overflow-hidden">
                <!-- Decorative Red Stripe for Danger Zone -->
                <div class="absolute top-0 left-0 w-1 h-full bg-red-600"></div>
                
                <div class="flex items-center gap-2 mb-6 pb-4 border-b border-zinc-100 dark:border-zinc-900">
                    <div class="w-2 h-2 bg-red-600 animate-pulse"></div>
                    <h2 class="text-sm font-bold text-red-600 uppercase tracking-[0.2em]">
                        Termination Zone
                    </h2>
                </div>

                <div class="max-w-xl text-zinc-900 dark:text-zinc-100">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>

    <!-- STYLE OVERRIDE (Agar Form Bawaan Laravel Mengikuti Tema) -->
    <style>
        /* Mengubah Heading Form Bawaan */
        section header h2 {
            font-size: 0.875rem !important;
            text-transform: uppercase !important;
            letter-spacing: 0.1em !important;
            font-weight: 700 !important;
            color: #71717a !important; /* Zinc 500 */
        }
        section header p {
            font-size: 0.75rem !important;
            color: #a1a1aa !important; /* Zinc 400 */
            margin-top: 0.25rem !important;
            margin-bottom: 1.5rem !important;
        }
        /* Label Input */
        label {
            font-size: 10px !important;
            text-transform: uppercase !important;
            font-weight: 700 !important;
            letter-spacing: 0.05em !important;
            color: #71717a !important;
        }
        /* Input Field */
        input {
            background-color: transparent !important;
            border: 1px solid #e4e4e7 !important; /* Zinc 200 */
            border-radius: 0 !important;
            font-size: 13px !important;
            color: #18181b !important;
        }
        .dark input {
            border-color: #27272a !important; /* Zinc 800 */
            color: #f4f4f5 !important;
        }
        input:focus {
            border-color: #06b6d4 !important; /* Cyan 500 */
            box-shadow: none !important;
            ring: 0 !important;
        }
        /* Button Utama */
        button[type="submit"], .inline-flex.items-center.px-4.py-2.bg-gray-800 {
            background-color: #18181b !important;
            border-radius: 0 !important;
            text-transform: uppercase !important;
            font-size: 10px !important;
            letter-spacing: 0.1em !important;
            transition: all 0.2s !important;
        }
        .dark button[type="submit"] {
            background-color: #f4f4f5 !important;
            color: #18181b !important;
        }
        button:hover {
            opacity: 0.8 !important;
            box-shadow: 0 0 15px rgba(6, 182, 212, 0.2) !important;
        }
    </style>
</x-app-layout>