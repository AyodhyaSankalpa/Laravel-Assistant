<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Assistant - Your AI Coding Partner</title>
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxAppearance
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-950 font-sans antialiased selection:bg-zinc-900 selection:text-white dark:selection:bg-white dark:selection:text-zinc-900 text-zinc-900 dark:text-zinc-100 transition-colors duration-300">
        
        {{-- Navigation Bar --}}
        <nav class="fixed top-0 left-0 w-full z-50 transition-all duration-300 backdrop-blur-md bg-white/70 dark:bg-zinc-950/70 border-b border-zinc-200/50 dark:border-zinc-800/50" x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
            <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <x-app-logo class="h-9 w-auto" />
                </div>

                <div class="flex items-center gap-6">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('chat') }}" class="text-sm font-medium hover:text-zinc-500 transition-colors">Launch Assistant</a>
                            <a href="{{ route('profile.edit') }}" class="text-sm font-medium hover:text-zinc-500 transition-colors">Settings</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium hover:text-zinc-500 transition-colors">Log In</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 px-5 py-2.5 rounded-full text-sm font-medium hover:bg-zinc-800 dark:hover:bg-zinc-200 transition-all shadow-sm">Get Started</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        {{-- Hero Section --}}
        <section class="relative pt-44 pb-32 overflow-hidden">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <div class="relative z-10">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-zinc-100 dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 text-xs font-semibold uppercase tracking-wider mb-8">
                            <span class="flex h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            Now Powered by Gemini
                        </div>
                        <h1 class="text-6xl lg:text-7xl font-bold tracking-tight mb-8 leading-[1.05]">
                            Accelerate Your <span class="text-zinc-400 dark:text-zinc-500 italic">Laravel</span> Workflow.
                        </h1>
                        <p class="text-xl text-zinc-600 dark:text-zinc-400 mb-10 leading-relaxed max-w-xl">
                            Meet your intelligent assistant for Eloquent, Livewire, and all things PHP. Get instant answers, clean code samples, and expert architectural advice.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            @auth
                                <a href="{{ route('chat') }}" class="bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 px-8 py-4 rounded-2xl text-lg font-semibold hover:bg-zinc-800 dark:hover:bg-zinc-200 transition-all shadow-xl shadow-zinc-500/10 flex items-center gap-3">
                                    Continue Chatting
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            @else
                                <a href="{{ route('register') }}" class="bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 px-8 py-4 rounded-2xl text-lg font-semibold hover:bg-zinc-800 dark:hover:bg-zinc-200 transition-all shadow-xl shadow-zinc-500/10 flex items-center gap-3">
                                    Start Building
                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            @endauth
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute -inset-4 bg-zinc-400/20 dark:bg-white/5 rounded-[3rem] blur-2xl -z-10"></div>
                        <div class="rounded-[2.5rem] overflow-hidden border border-zinc-200 dark:border-zinc-800 shadow-2xl bg-zinc-50 dark:bg-zinc-900 relative">
                            <img src="/images/welcome-hero.png" alt="Laravel Assistant AI Illustration" class="w-full h-auto object-cover transform transition-transform hover:scale-105 duration-700">
                            
                            {{-- Floating Badges --}}
                            <div class="absolute top-6 right-6 backdrop-blur-md bg-white/30 dark:bg-black/30 border border-white/20 dark:border-white/5 px-4 py-2 rounded-xl text-xs font-medium text-white shadow-lg">
                                Laravel 13 Ready
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Features Section --}}
        <section class="py-32 bg-zinc-50 dark:bg-zinc-900/50 border-y border-zinc-200 dark:border-zinc-800/50">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid md:grid-cols-3 gap-12">
                    <div class="group">
                        <div class="h-14 w-14 rounded-2xl bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 flex items-center justify-center mb-8 shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 italic">Modern PHP Mastery</h3>
                        <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed text-lg">
                            Get advice tailored for the newest PHP features and Laravel 13+ syntax. Attributes, Enums, and advanced typing are standard.
                        </p>
                    </div>

                    <div class="group">
                        <div class="h-14 w-14 rounded-2xl bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 flex items-center justify-center mb-8 shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 italic">Full-Stack Intelligence</h3>
                        <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed text-lg">
                            From complex Eloquent relationships to intricate Livewire interactions, get help across the entire TALL stack.
                        </p>
                    </div>

                    <div class="group">
                        <div class="h-14 w-14 rounded-2xl bg-zinc-900 dark:bg-white text-white dark:text-zinc-900 flex items-center justify-center mb-8 shadow-lg group-hover:scale-110 transition-transform duration-300">
                            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 italic">Best Practices First</h3>
                        <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed text-lg">
                            No shortcuts. The assistant prioritizes security, scalability, and clean architecture based on industry standards.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- Footer --}}
        <footer class="py-20 bg-white dark:bg-zinc-950">
            <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="flex items-center gap-4">
                    <x-app-logo class="h-7 w-auto" />
                </div>
                <div class="text-zinc-400 dark:text-zinc-600 text-sm font-medium">
                    &copy; {{ date('Y') }} Laravel Assistant. Developed by <a href="https://ayodhyasankalpa.github.io/">Ayodhya Sankalpa</a>.
                </div>
                <div class="flex gap-6">
                    <a href="https://laravel.com" class="text-zinc-400 dark:text-zinc-600 hover:text-zinc-900 dark:hover:text-white transition-colors">Laravel</a>
                    <a href="https://livewire.laravel.com" class="text-zinc-400 dark:text-zinc-600 hover:text-zinc-900 dark:hover:text-white transition-colors">Livewire</a>
                    <a href="https://fluxui.dev" class="text-zinc-400 dark:text-zinc-600 hover:text-zinc-900 dark:hover:text-white transition-colors">Flux UI</a>
                </div>
            </div>
        </footer>

        @fluxScripts
    </body>
</html>
