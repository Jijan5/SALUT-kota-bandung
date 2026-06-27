<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Admin - SALUT Kota Bandung</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="{{ asset('images/icon-web.png') }}">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .font-outfit { font-family: 'Outfit', sans-serif; }
        .bg-grid { background-image: radial-gradient(circle, rgba(255,255,255,0.08) 1px, transparent 1px); background-size: 28px 28px; }
        @keyframes float { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-12px); } }
        .float-animation { animation: float 5s ease-in-out infinite; }
        input:focus { outline: none; }
    </style>
</head>
<body class="min-h-screen bg-slate-50 flex">

    <!-- Left Panel - Brand -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-slate-900 via-blue-950 to-indigo-950 relative overflow-hidden flex-col justify-between p-12">
        <!-- Grid background -->
        <div class="absolute inset-0 bg-grid opacity-60"></div>
        <!-- Glow blobs -->
        <div class="absolute top-20 right-20 w-72 h-72 bg-blue-600/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-64 h-64 bg-indigo-600/20 rounded-full blur-3xl"></div>

        <!-- Top brand -->
        <div class="relative z-10 flex items-center space-x-3">
            <img src="{{ asset('images/icon-web.png') }}" alt="Logo" class="h-12 w-auto drop-shadow-lg">
            <div>
                <span class="block font-outfit font-extrabold text-white text-xl tracking-tight leading-tight">SALUT KOTA BANDUNG</span>
                <span class="block text-blue-300 text-xs font-medium tracking-widest uppercase">Portal Administrasi</span>
            </div>
        </div>

        <!-- Center illustration card -->
        <div class="relative z-10 text-center">
            <div class="float-animation inline-block mb-8">
                <div class="w-32 h-32 rounded-3xl bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center mx-auto shadow-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
            </div>
            <h2 class="font-outfit text-3xl font-bold text-white mb-3">Panel Manajemen Pendaftar</h2>
            <p class="text-blue-200/80 text-sm max-w-xs mx-auto leading-relaxed">
                Kelola seluruh data pendaftaran calon mahasiswa Universitas Terbuka secara efisien, aman, dan terstruktur.
            </p>

            <!-- Stat cards -->
            <div class="grid grid-cols-3 gap-4 mt-10 max-w-sm mx-auto">
                <div class="bg-white/8 backdrop-blur-sm border border-white/10 rounded-2xl p-3">
                    <div class="text-2xl font-bold font-outfit text-white">✓</div>
                    <div class="text-xs text-blue-300 mt-0.5">Verifikasi</div>
                </div>
                <div class="bg-white/8 backdrop-blur-sm border border-white/10 rounded-2xl p-3">
                    <div class="text-2xl font-bold font-outfit text-white"></div>
                    <div class="text-xs text-blue-300 mt-0.5">Berkas</div>
                </div>
                <div class="bg-white/8 backdrop-blur-sm border border-white/10 rounded-2xl p-3">
                    <div class="text-2xl font-bold font-outfit text-white"></div>
                    <div class="text-xs text-blue-300 mt-0.5">Laporan</div>
                </div>
            </div>
        </div>

        <!-- Bottom copyright -->
        <div class="relative z-10 text-blue-400/60 text-xs text-center">
            &copy; 2026 SALUT Kota Bandung · Universitas Terbuka
        </div>
    </div>

    <!-- Right Panel - Login Form -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12">
        <div class="w-full max-w-md">
            <!-- Mobile logo -->
            <div class="flex items-center space-x-3 mb-8 lg:hidden">
                <img src="{{ asset('images/icon-web.png') }}" alt="Logo" class="h-10 w-auto">
                <span class="font-outfit font-bold text-slate-800 text-lg">SALUT KOTA BANDUNG</span>
            </div>

            <!-- Heading -->
            <div class="mb-8">
                <h1 class="font-outfit text-3xl font-extrabold text-slate-900 mb-2">Selamat Datang</h1>
                <p class="text-slate-500 text-sm">Masuk ke panel administrator untuk mengelola data pendaftar mahasiswa.</p>
            </div>

            <!-- Error alert -->
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl text-sm flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <strong class="font-bold block mb-1">Login Gagal</strong>
                        @foreach ($errors->all() as $error)
                            <span class="block">{{ $error }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Email Admin</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input id="email" name="email" type="email" required autofocus value="{{ old('email') }}"
                            placeholder="admin@salutbandung.com"
                            class="w-full pl-12 pr-4 py-3.5 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm bg-slate-50/50">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password" name="password" type="password" required
                            placeholder="••••••••••"
                            class="w-full pl-12 pr-12 py-3.5 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm bg-slate-50/50">
                        <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 transition">
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3.5 px-6 rounded-2xl transition duration-300 flex items-center justify-center space-x-2 shadow-lg shadow-blue-500/20 mt-2">
                    <span>Masuk ke Dashboard</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </button>
            </form>

            <!-- Back to site -->
            <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                <a href="/" class="inline-flex items-center space-x-2 text-sm text-slate-500 hover:text-blue-700 transition font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        </div>
    </div>

    <script>
        const toggleBtn = document.getElementById('togglePassword');
        const passInput = document.getElementById('password');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function() {
                const type = passInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passInput.setAttribute('type', type);
                const icon = document.getElementById('eyeIcon');
                if (type === 'text') {
                    icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />`;
                } else {
                    icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
                }
            });
        }
    </script>
</body>
</html>
