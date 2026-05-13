<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=jetbrains-mono:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'JetBrains Mono', monospace;
                background-color: #09090b; /* Zinc 950 */
                color: #e4e4e7; /* Zinc 200 */
            }
        </style>
    </head>
    <body class="antialiased selection:bg-cyan-500/30">
        <div class="min-h-screen flex flex-col items-center justify-center relative overflow-hidden">
            <!-- BACKGROUND DECOR -->
            <div class="absolute inset-0 opacity-[0.03] pointer-events-none" 
                 style="background-image: radial-gradient(#fff 1px, transparent 1px); background-size: 40px 40px;"></div>
            
            <!-- SYSTEM STATUS BAR -->
            <div class="absolute top-0 left-0 w-full p-4 flex justify-between items-center text-[10px] uppercase tracking-[0.2em] text-zinc-500 border-b border-zinc-800/50 backdrop-blur-sm z-10">
                <div class="flex items-center gap-4">
                    <span class="flex h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>System Active: {{ config('app.name') }}</span>
                </div>
                <div class="hidden sm:block">
                    Node: Auth_Gate_v1.0.4
                </div>
            </div>

            <!-- MAIN CONTENT -->
            <div class="w-full flex items-center justify-center p-6 z-0">
                {{ $slot }}
            </div>

            <!-- FOOTER DECOR -->
            <div class="absolute bottom-0 right-0 p-4 text-[9px] text-zinc-600 uppercase tracking-widest">
                &copy; {{ date('Y') }} // Secure Terminal
            </div>
        </div>
    </body>
</html>
