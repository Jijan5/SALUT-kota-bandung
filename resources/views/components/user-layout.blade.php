<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Dashboard User' }} - SALUT Kota Bandung</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('images/icon-web.png') }}">
    <style>
        [x-cloak] {
            display: none !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .font-outfit {
            font-family: 'Outfit', sans-serif;
        }

        .sidebar-nav-link {
            @apply flex items-center space-x-3 px-4 py-2.5 rounded-xl text-slate-300 hover:bg-white/10 hover:text-white font-medium text-sm transition duration-200;
        }

        .sidebar-nav-link.active {
            @apply bg-white/15 text-white font-semibold;
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(148, 163, 184, 0.3);
            border-radius: 99px;
        }
    </style>
</head>

<body class="bg-slate-100 antialiased">
    <div x-data="{ sidebarOpen: window.innerWidth >= 1024 }" @resize.window="if (window.innerWidth >= 1024) { sidebarOpen = true } else { sidebarOpen = false }">

        <!-- Mobile Backdrop -->
        <div x-show="sidebarOpen" x-cloak class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-20 lg:hidden" @click="sidebarOpen = false" x-transition.opacity></div>

        <!-- ===== SIDEBAR ===== -->
        <aside
            class="fixed inset-y-0 left-0 z-30 w-64 flex flex-col bg-gradient-to-b from-slate-900 to-blue-950 text-white transform transition-transform duration-300 ease-in-out shadow-2xl"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">

            <!-- Logo -->
            <div class="flex items-center space-x-3 p-6 border-b border-white/10">
                <img src="{{ asset('images/icon-web.png') }}" alt="Logo" class="h-10 w-auto">
                <div>
                    <span class="block font-outfit font-extrabold text-sm leading-tight">SALUT BANDUNG</span>
                    <span class="block text-blue-300 text-[10px] font-medium tracking-wider uppercase">User Panel</span>
                </div>
            </div>

            <!-- Navigation -->
            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
                <p class="text-[10px] font-bold uppercase tracking-widest text-slate-500 px-4 mb-3">Menu Utama</p>

                <a href="{{ route('user.dashboard') }}"
                    class="flex items-center space-x-3 px-4 py-2.5 rounded-xl text-slate-300 hover:bg-white/10 hover:text-white font-medium text-sm transition duration-200 {{ request()->routeIs('user.dashboard') ? 'bg-white/15 text-white font-semibold' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                @php
                    $pendaftaran = App\Models\SalutPendaftaran::where('user_id', Auth::guard('web')->id())->first();
                @endphp

                <!-- Menu Form Pendaftaran - Hanya muncul jika BELUM daftar -->
                @if (!$pendaftaran)
                    <a href="{{ route('pendaftaran') }}"
                        class="flex items-center space-x-3 px-4 py-2.5 rounded-xl text-slate-300 hover:bg-white/10 hover:text-white font-medium text-sm transition duration-200 {{ request()->routeIs('pendaftaran') ? 'bg-white/15 text-white font-semibold' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>Form Pendaftaran</span>
                    </a>
                @endif

                <a href="{{ route('user.profile') }}"
                    class="flex items-center space-x-3 px-4 py-2.5 rounded-xl text-slate-300 hover:bg-white/10 hover:text-white font-medium text-sm transition duration-200 {{ request()->routeIs('user.profile') ? 'bg-white/15 text-white font-semibold' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>Profil</span>
                </a>

                <a href="{{ route('user.tryout') }}"
                    class="flex items-center space-x-3 px-4 py-2.5 rounded-xl text-slate-300 hover:bg-white/10 hover:text-white font-medium text-sm transition duration-200 {{ request()->routeIs('user.tryout') ? 'bg-white/15 text-white font-semibold' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>Tryout</span>
                </a>
            </nav>

            <!-- User/Logout section -->
            <div class="p-4 border-t border-white/10">
                <div class="flex items-center space-x-3 mb-3">
                    <div
                        class="w-9 h-9 rounded-full bg-blue-600/40 flex items-center justify-center text-blue-200 font-bold text-sm">
                        {{ substr(Auth::guard('web')->user()->name ?? 'U', 0, 1) }}
                    </div>
                    <div>
                        <span
                            class="block text-sm font-semibold text-white">{{ Auth::guard('web')->user()->name ?? 'User' }}</span>
                        <span class="block text-xs text-slate-400">{{ Auth::guard('web')->user()->email ?? '' }}</span>
                    </div>
                </div>
                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center justify-center space-x-2 bg-red-600/20 hover:bg-red-600/40 border border-red-500/30 text-red-300 hover:text-red-200 text-sm font-semibold py-2.5 px-4 rounded-xl transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- ===== MAIN CONTENT ===== -->
        <div class="flex-1 flex flex-col transition-all duration-300 ease-in-out min-h-screen ml-0"
            :class="sidebarOpen ? 'lg:ml-64' : 'lg:ml-0'">

            <!-- Top Header Bar -->
            <header
                class="sticky top-0 z-20 bg-white/90 backdrop-blur-md border-b border-slate-200 shadow-sm h-16 flex items-center px-6">
                <!-- Sidebar Toggle -->
                <button @click.stop="sidebarOpen = !sidebarOpen"
                    class="text-slate-600 hover:text-blue-700 p-2 rounded-xl hover:bg-slate-100 transition duration-200 mr-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- Page Title -->
                <div class="flex items-center space-x-2">
                    <div class="w-1.5 h-5 bg-blue-700 rounded-full"></div>
                    <h1 class="font-outfit text-lg font-bold text-slate-800">{{ $title ?? 'Dashboard' }}</h1>
                </div>

                <!-- Right side -->
                <div class="ml-auto flex items-center space-x-4 text-sm text-slate-500">
                    <span class="hidden sm:block">Selamat datang,
                        {{ Auth::guard('web')->user()->name ?? 'User' }}</span>
                    <a href="/" target="_blank"
                        class="flex items-center space-x-1.5 bg-slate-100 hover:bg-blue-50 hover:text-blue-700 px-3 py-1.5 rounded-lg transition text-xs font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        <span>Lihat Situs</span>
                    </a>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-6 bg-slate-100">
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="text-center text-xs text-slate-400 py-4 border-t border-slate-200 bg-white">
                &copy; 2026 SALUT Kota Bandung &middot; Universitas Terbuka &middot; Panel User
            </footer>
        </div>
    </div>
</body>

</html>
