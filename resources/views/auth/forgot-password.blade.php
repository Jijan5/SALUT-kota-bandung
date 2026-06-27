<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - SALUT Kota Bandung</title>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
            </div>
            <h2 class="font-outfit text-3xl font-bold text-white mb-3">Lupa Password?</h2>
            <p class="text-blue-200/80 text-sm max-w-sm mx-auto leading-relaxed">
                Verifikasi data diri pendaftaran Anda untuk mengatur ulang password secara mandiri.
            </p>
        </div>

        <div class="relative z-10 text-blue-400/60 text-xs text-center">
            &copy; {{ date('Y') }} SALUT Kota Bandung · Universitas Terbuka
        </div>
    </div>

    <!-- Right Panel -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 overflow-y-auto max-h-screen">
        <div class="w-full max-w-lg">
            <div class="flex items-center justify-center space-x-3 mb-8 lg:hidden">
                <img src="{{ asset('images/icon-web.png') }}" alt="Logo" class="h-10 w-auto">
                <span class="font-outfit font-bold text-slate-800 text-lg">SALUT KOTA BANDUNG</span>
            </div>

            <div class="mb-8">
                <h3 class="text-2xl font-bold text-slate-800 font-outfit mb-2">Verifikasi Data Diri</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    Masukkan data yang sesuai dengan formulir pendaftaran Anda untuk mereset password.
                </p>
            </div>

            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl mb-6 flex items-start shadow-sm">
                    <svg class="h-5 w-5 mr-3 mt-0.5 text-emerald-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="text-sm">{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 flex items-start shadow-sm">
                    <svg class="h-5 w-5 mr-3 mt-0.5 text-red-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <ul class="text-sm space-y-1 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('password.reset.custom') }}" method="POST" class="space-y-5">
                @csrf
                
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Email Akun</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input type="email" name="email" value="{{ old('email') }}" required class="pl-10 w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-all text-slate-700 shadow-sm" placeholder="Contoh: budi@email.com">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">NIK (Nomor Induk Kependudukan)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                            </svg>
                        </div>
                        <input type="text" name="nik" value="{{ old('nik') }}" required class="pl-10 w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-all text-slate-700 shadow-sm" placeholder="16 Digit NIK">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Tanggal Lahir</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required class="pl-10 w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-all text-slate-700 shadow-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Nama Ibu Kandung</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </div>
                            <input type="text" name="nama_ibu_kandung" value="{{ old('nama_ibu_kandung') }}" required class="pl-10 w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-all text-slate-700 shadow-sm" placeholder="Nama Ibu">
                        </div>
                    </div>
                </div>

                <div class="border-t border-slate-100 my-6 pt-4"></div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Password Baru</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input type="password" name="new_password" required minlength="6" class="pl-10 w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-all text-slate-700 shadow-sm" placeholder="Minimal 6 karakter">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Konfirmasi Password Baru</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input type="password" name="new_password_confirmation" required minlength="6" class="pl-10 w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 transition-all text-slate-700 shadow-sm" placeholder="Ketik ulang password baru">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3.5 px-6 rounded-xl transition duration-300 shadow-lg shadow-blue-500/30 flex justify-center items-center group">
                        <span>Reset Password</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-xs text-slate-500 bg-slate-100 p-3 rounded-xl border border-slate-200">
                    <span class="font-semibold text-slate-700">Catatan:</span> Jika Anda belum pernah mengisi formulir data diri pendaftaran sama sekali, fitur ini tidak dapat digunakan. Silakan hubungi Admin via WhatsApp (+62 812-1112-1855) untuk bantuan.
                </p>
            </div>

            <div class="mt-6 pt-6 border-t border-slate-100 text-center">
                <a href="{{ route('user.login') }}" class="inline-flex items-center space-x-2 text-sm text-slate-500 hover:text-blue-700 transition font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span>Kembali ke Halaman Login</span>
                </a>
            </div>
        </div>
    </div>

</body>
</html>
