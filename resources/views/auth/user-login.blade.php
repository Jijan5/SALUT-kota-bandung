<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Daftar - SALUT Kota Bandung</title>
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
        .tab-active {
            border-bottom: 2px solid #1d4ed8;
            color: #1e3a8a;
            font-weight: 600;
        }
    </style>
</head>
<body class="min-h-screen bg-slate-50 flex">

    <!-- Left Panel -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-slate-900 via-blue-950 to-indigo-950 relative overflow-hidden flex-col justify-between p-12">
        <div class="absolute inset-0 bg-grid opacity-60"></div>
        <div class="absolute top-20 right-20 w-72 h-72 bg-blue-600/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-64 h-64 bg-indigo-600/20 rounded-full blur-3xl"></div>

        <div class="relative z-10 flex items-center space-x-3">
            <img src="{{ asset('images/icon-web.png') }}" alt="Logo" class="h-12 w-auto drop-shadow-lg">
            <div>
                <span class="block font-outfit font-extrabold text-white text-xl tracking-tight leading-tight">SALUT KOTA BANDUNG</span>
                <span class="block text-blue-300 text-xs font-medium tracking-widest uppercase">Pendaftaran Mahasiswa Baru</span>
            </div>
        </div>

        <div class="relative z-10 text-center">
            <div class="float-animation inline-block mb-8">
                <div class="w-32 h-32 rounded-3xl bg-white/10 backdrop-blur-sm border border-white/20 flex items-center justify-center mx-auto shadow-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
            </div>
            <h2 class="font-outfit text-3xl font-bold text-white mb-3" id="leftPanelTitle">Masuk ke Akun Anda</h2>
            <p class="text-blue-200/80 text-sm max-w-xs mx-auto leading-relaxed" id="leftPanelDesc">
                Silakan login dengan email dan password yang sudah terdaftar.
            </p>
        </div>

        <div class="relative z-10 text-blue-400/60 text-xs text-center">
            &copy; 2026 SALUT Kota Bandung · Universitas Terbuka
        </div>
    </div>

    <!-- Right Panel -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12">
        <div class="w-full max-w-md">
            <div class="flex items-center space-x-3 mb-8 lg:hidden">
                <img src="{{ asset('images/icon-web.png') }}" alt="Logo" class="h-10 w-auto">
                <span class="font-outfit font-bold text-slate-800 text-lg">SALUT KOTA BANDUNG</span>
            </div>

            <!-- Tab Navigation -->
            <div class="flex border-b border-slate-200 mb-8">
                <button id="loginTab" class="flex-1 py-3 text-center font-medium text-slate-600 hover:text-blue-700 transition tab-active">
                    Login
                </button>
                <button id="registerTab" class="flex-1 py-3 text-center font-medium text-slate-600 hover:text-blue-700 transition">
                    Daftar Akun
                </button>
            </div>

            <!-- SUCCESS ALERT (Register Berhasil) -->
            @if (session('success'))
                <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-5 py-4 rounded-2xl text-sm flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <strong class="font-bold block mb-1">Berhasil!</strong>
                        <span class="block">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- Error Alert -->
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl text-sm flex items-start space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <strong class="font-bold block mb-1">Gagal</strong>
                        @foreach ($errors->all() as $error)
                            <span class="block">{{ $error }}</span>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Form Login -->
            <div id="loginForm">
                <form method="POST" action="{{ route('user.login.submit') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input id="email" name="email" type="email" required autofocus value="{{ old('email') }}"
                                placeholder="email@example.com"
                                class="w-full pl-12 pr-4 py-3.5 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm bg-slate-50/50">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">Kata Sandi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="login_password" name="password" type="password" required
                                placeholder="••••••••••"
                                class="w-full pl-12 pr-12 py-3.5 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm bg-slate-50/50">
                            <button type="button" onclick="togglePassword('login_password', 'eyeIconLogin')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 transition">
                                <svg id="eyeIconLogin" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3.5 px-6 rounded-2xl transition duration-300 flex items-center justify-center space-x-2 shadow-lg shadow-blue-500/20 mt-2">
                        <span>Login & Lanjutkan</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Form Register -->
            <div id="registerForm" style="display: none;">
                <form method="POST" action="{{ route('user.register.submit') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label for="reg_name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <input id="reg_name" name="name" type="text" required value="{{ old('name') }}"
                                placeholder="Nama lengkap"
                                class="w-full pl-12 pr-4 py-3.5 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm bg-slate-50/50">
                        </div>
                    </div>

                    <div>
                        <label for="reg_email" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input id="reg_email" name="email" type="email" required value="{{ old('email') }}"
                                placeholder="email@example.com"
                                class="w-full pl-12 pr-4 py-3.5 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm bg-slate-50/50">
                        </div>
                    </div>

                    <div>
                        <label for="reg_password" class="block text-sm font-semibold text-slate-700 mb-2">Kata Sandi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            <input id="reg_password" name="password" type="password" required
                                placeholder="Minimal 6 karakter"
                                class="w-full pl-12 pr-12 py-3.5 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm bg-slate-50/50">
                            <button type="button" onclick="togglePassword('reg_password', 'eyeIconReg')" class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-slate-600 transition">
                                <svg id="eyeIconReg" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div>
                        <label for="reg_password_confirmation" class="block text-sm font-semibold text-slate-700 mb-2">Konfirmasi Kata Sandi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <input id="reg_password_confirmation" name="password_confirmation" type="password" required
                                placeholder="Ulangi kata sandi"
                                class="w-full pl-12 pr-4 py-3.5 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm bg-slate-50/50">
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-blue-700 hover:bg-blue-800 text-white font-bold py-3.5 px-6 rounded-2xl transition duration-300 flex items-center justify-center space-x-2 shadow-lg shadow-blue-500/20 mt-2">
                        <span>Daftar & Lanjutkan</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </button>
                </form>
            </div>

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
        function togglePassword(fieldId, iconId) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById(iconId);
            const type = field.getAttribute('type') === 'password' ? 'text' : 'password';
            field.setAttribute('type', type);
            if (type === 'text') {
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />`;
            } else {
                icon.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
            }
        }

        const loginTab = document.getElementById('loginTab');
        const registerTab = document.getElementById('registerTab');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        const leftPanelTitle = document.getElementById('leftPanelTitle');
        const leftPanelDesc = document.getElementById('leftPanelDesc');

        loginTab.addEventListener('click', function() {
            loginTab.classList.add('tab-active');
            registerTab.classList.remove('tab-active');
            loginForm.style.display = 'block';
            registerForm.style.display = 'none';
            leftPanelTitle.innerText = 'Masuk ke Akun Anda';
            leftPanelDesc.innerText = 'Silakan login dengan email dan password yang sudah terdaftar.';
        });

        registerTab.addEventListener('click', function() {
            registerTab.classList.add('tab-active');
            loginTab.classList.remove('tab-active');
            registerForm.style.display = 'block';
            loginForm.style.display = 'none';
            leftPanelTitle.innerText = 'Buat Akun Baru';
            leftPanelDesc.innerText = 'Daftar sekarang untuk mengakses formulir pendaftaran.';
        });

        // Show register form if there are registration errors
        @if($errors->has('name') || $errors->has('password') || $errors->has('password_confirmation'))
            registerTab.click();
        @endif
    </script>
</body>
</html>