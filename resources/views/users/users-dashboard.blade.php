<x-user-layout>
    <x-slot name="title">Dashboard Calon Mahasiswa</x-slot>

    <!-- Halaman utama dibungkus x-data untuk kontrol modal -->
    <div class="max-w-full" x-data="{ showAlasanModal: false, showResubmitModal: false }">

    <style>
        /* Animasi fade-in-up */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi fade-in-down */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animasi fade-in-left */
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Animasi fade-in-right */
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Animasi zoom-in */
        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Animasi float kompleks */
        @keyframes floatComplex {
            0% {
                transform: translateY(0px) translateX(0px) rotate(0deg);
            }
            25% {
                transform: translateY(-10px) translateX(5px) rotate(5deg);
            }
            50% {
                transform: translateY(0px) translateX(0px) rotate(0deg);
            }
            75% {
                transform: translateY(10px) translateX(-5px) rotate(-5deg);
            }
            100% {
                transform: translateY(0px) translateX(0px) rotate(0deg);
            }
        }

        /* Animasi pulse dengan scale */
        @keyframes pulseScale {
            0%, 100% {
                transform: scale(1);
                opacity: 0.5;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }
        }

        /* Animasi shimmer */
        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }
            100% {
                background-position: 200% 0;
            }
        }

        /* Animasi glow border */
        @keyframes borderGlow {
            0%, 100% {
                border-color: rgba(59, 130, 246, 0.2);
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.1);
            }
            50% {
                border-color: rgba(59, 130, 246, 0.6);
                box-shadow: 0 0 20px 5px rgba(59, 130, 246, 0.2);
            }
        }

        /* Animasi slide-in bounce */
        @keyframes slideInBounce {
            0% {
                opacity: 0;
                transform: translateX(-100%);
            }
            60% {
                transform: translateX(10%);
            }
            80% {
                transform: translateX(-5%);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Animasi spin slow */
        @keyframes spinSlow {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        /* Animasi heartbeat */
        @keyframes heartbeat {
            0%, 100% {
                transform: scale(1);
            }
            25% {
                transform: scale(1.1);
            }
            35% {
                transform: scale(1.05);
            }
            45% {
                transform: scale(1.1);
            }
            55% {
                transform: scale(1);
            }
        }

        /* Animasi wave */
        @keyframes wave {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        /* Animasi shine */
        @keyframes shine {
            0% {
                left: -100%;
            }
            20% {
                left: 100%;
            }
            100% {
                left: 100%;
            }
        }

        /* Class animasi */
        .animate-fade-in-up {
            animation: fadeInUp 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
        .animate-fade-in-down {
            animation: fadeInDown 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
        .animate-fade-in-left {
            animation: fadeInLeft 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
        .animate-fade-in-right {
            animation: fadeInRight 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
        .animate-zoom-in {
            animation: zoomIn 0.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        }
        .animate-slide-bounce {
            animation: slideInBounce 0.8s cubic-bezier(0.68, -0.55, 0.265, 1.55) forwards;
        }
        .animate-float-complex {
            animation: floatComplex 5s ease-in-out infinite;
        }
        .animate-pulse-scale {
            animation: pulseScale 3s ease-in-out infinite;
        }
        .animate-shimmer {
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }
        .animate-border-glow {
            animation: borderGlow 2s ease-in-out infinite;
        }
        .animate-spin-slow {
            animation: spinSlow 20s linear infinite;
        }
        .animate-heartbeat {
            animation: heartbeat 1.5s ease-in-out infinite;
        }
        .animate-wave {
            animation: wave 2s ease-in-out infinite;
        }

        /* Delay classes */
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }

        /* Hover effects */
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .hover-lift:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.2);
        }
        .hover-rotate-icon:hover svg {
            transform: rotate(180deg);
            transition: transform 0.5s ease;
        }
        .bounce-on-hover:hover {
            animation: bounce 0.5s ease;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        /* Stagger grid animation */
        .stagger-grid > * {
            opacity: 0;
            animation: fadeInUp 0.5s ease forwards;
        }
        .stagger-grid > *:nth-child(1) { animation-delay: 0.05s; }
        .stagger-grid > *:nth-child(2) { animation-delay: 0.1s; }
        .stagger-grid > *:nth-child(3) { animation-delay: 0.15s; }

        /* Progress bar animation */
        .progress-fill {
            transition: width 1s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Shine effect on card */
        .shine-effect {
            position: relative;
            overflow: hidden;
        }
        .shine-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
            pointer-events: none;
        }
        .shine-effect:hover::before {
            left: 100%;
            transition: left 0.5s;
        }

        /* Ripple effect */
        .ripple {
            position: relative;
            overflow: hidden;
        }
        .ripple::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        .ripple:hover::after {
            width: 300px;
            height: 300px;
        }
    </style>

    <div class="max-w-7xl mx-auto space-y-6">

        <!-- Welcome Banner Premium dengan animasi -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-slate-900 via-indigo-950 to-blue-900 p-6 text-white shadow-xl shadow-blue-950/20 border border-slate-800 animate-fade-in-down shine-effect">
            <!-- Tech/Abstract Circuit Line Overlays -->
            <div class="absolute inset-0 opacity-15 bg-[linear-gradient(to_right,#3b82f6_1px,transparent_1px),linear-gradient(to_bottom,#3b82f6_1px,transparent_1px)] bg-[size:3rem_3rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)]"></div>
            
            <!-- Floating particles -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-10 left-10 w-2 h-2 bg-blue-400 rounded-full animate-float-complex"></div>
                <div class="absolute top-20 right-20 w-1.5 h-1.5 bg-indigo-400 rounded-full animate-float-complex" style="animation-delay: 1s; animation-duration: 4s;"></div>
                <div class="absolute bottom-10 left-1/4 w-2.5 h-2.5 bg-blue-300 rounded-full animate-float-complex" style="animation-delay: 2s; animation-duration: 6s;"></div>
                <div class="absolute top-1/2 right-1/3 w-1 h-1 bg-cyan-400 rounded-full animate-float-complex" style="animation-delay: 1.5s; animation-duration: 3.5s;"></div>
                <div class="absolute bottom-20 right-10 w-2 h-2 bg-indigo-300 rounded-full animate-float-complex" style="animation-delay: 0.5s; animation-duration: 4.5s;"></div>
                <div class="absolute top-40 left-1/3 w-1.5 h-1.5 bg-blue-400 rounded-full animate-float-complex" style="animation-delay: 2.5s; animation-duration: 5s;"></div>
            </div>

            <!-- Pulse glow backgrounds -->
            <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-blue-500/10 blur-3xl animate-pulse-scale"></div>
            <div class="absolute right-1/4 -bottom-12 h-32 w-32 rounded-full bg-indigo-500/20 blur-2xl animate-pulse-scale" style="animation-delay: 1s;"></div>

            <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h2 class="font-outfit text-2xl font-extrabold tracking-tight text-white drop-shadow-sm">
                        Halo, {{ Auth::guard('web')->user()->name }}!
                    </h2>
                    <p class="text-sm text-slate-300/90 mt-0.5">Berikut adalah status pendaftaran Anda di <span class="text-blue-400 font-semibold animate-pulse">SALUT Kota Bandung</span>.</p>
                </div>
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-blue-500/20 to-indigo-600/20 backdrop-blur-sm flex items-center justify-center border border-blue-400/30 animate-float-complex hover:scale-110 transition-transform duration-300">
                    <img src="{{ asset('images/icon-web.png') }}" alt="Icon Web" class="h-8 w-8 object-contain">
                </div>
            </div>
        </div>

        @php
            $pendaftaran = App\Models\SalutPendaftaran::where('user_id', Auth::guard('web')->id())->first();
            $totalPendaftar = App\Models\SalutPendaftaran::count();
            $jumlahDiterima = App\Models\SalutPendaftaran::where('status_pendaftaran', 'diterima')->count();
            $jumlahPending = App\Models\SalutPendaftaran::where('status_pendaftaran', 'pending')->count();
        @endphp

        <!-- Stats Grid dengan animasi stagger dan efek kaya -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            <!-- Status Pendaftaran Card -->
            <div class="relative overflow-hidden bg-white rounded-2xl p-6 shadow-sm border border-slate-100/80 hover-lift transition-all duration-300 group animate-zoom-in delay-100 shine-effect">
                <!-- Animated progress bar di header -->
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-400 via-orange-500 to-amber-400 animate-shimmer"></div>
                
                <!-- Decorative rotating ring -->
                <div class="absolute -top-10 -right-10 w-32 h-32 rounded-full border-2 border-amber-200/20 animate-spin-slow pointer-events-none"></div>
                <div class="absolute -bottom-10 -left-10 w-32 h-32 rounded-full border-2 border-orange-200/20 animate-spin-slow pointer-events-none" style="animation-direction: reverse;"></div>
                
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center border border-amber-100 group-hover:scale-110 group-hover:bg-amber-100 transition duration-300 group-hover:animate-heartbeat">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600 group-hover:rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest bg-slate-50 px-2 py-1 rounded-md group-hover:bg-amber-50 transition-colors">Status</span>
                </div>
                <p class="text-4xl font-extrabold font-outfit mb-1 group-hover:scale-105 transition-transform duration-300 origin-left">
                    @if ($pendaftaran)
                        @if ($pendaftaran->status_pendaftaran == 'pending')
                            <span class="bg-gradient-to-r from-amber-600 to-orange-500 bg-clip-text text-transparent">Pending</span>
                        @elseif($pendaftaran->status_pendaftaran == 'diterima')
                            <span class="bg-gradient-to-r from-emerald-600 to-teal-500 bg-clip-text text-transparent">Diterima</span>
                        @else
                            <span class="bg-gradient-to-r from-red-600 to-rose-500 bg-clip-text text-transparent">{{ $pendaftaran->status_pendaftaran }}</span>
                        @endif
                    @else
                        <span class="text-slate-400">Belum Daftar</span>
                    @endif
                </p>
                <p class="text-sm text-slate-500 font-medium">Status Pendaftaran</p>
                
                <div class="mt-4 h-1.5 bg-amber-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-amber-500 to-orange-500 rounded-full progress-fill"
                        style="width: {{ $pendaftaran ? ($pendaftaran->status_pendaftaran == 'diterima' ? 100 : 50) : 0 }}%">
                    </div>
                </div>
                
                <!-- Animated dots at bottom -->
                <div class="absolute bottom-3 right-3 flex gap-0.5 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="w-1 h-1 bg-amber-400 rounded-full animate-wave"></div>
                    <div class="w-1 h-1 bg-amber-500 rounded-full animate-wave" style="animation-delay: 0.2s;"></div>
                    <div class="w-1 h-1 bg-orange-500 rounded-full animate-wave" style="animation-delay: 0.4s;"></div>
                </div>
            </div>

            <!-- Jalur Program Card -->
            <div class="relative overflow-hidden bg-gradient-to-b from-white to-purple-50/20 rounded-2xl p-6 shadow-sm border border-purple-100/50 hover-lift transition-all duration-300 group animate-zoom-in delay-200 shine-effect">
                <!-- Animated progress bar di header -->
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-purple-400 via-indigo-500 to-purple-400 animate-shimmer"></div>
                
                <!-- Decorative floating elements -->
                <div class="absolute -top-5 -right-5 w-24 h-24 rounded-full bg-purple-200/20 animate-pulse-scale pointer-events-none"></div>
                <div class="absolute -bottom-5 -left-5 w-24 h-24 rounded-full bg-indigo-200/20 animate-pulse-scale pointer-events-none" style="animation-delay: 1s;"></div>
                
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center border border-purple-100 group-hover:scale-110 group-hover:bg-purple-100 transition duration-300 group-hover:animate-heartbeat">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 group-hover:rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <span class="text-xs font-bold text-purple-400 uppercase tracking-widest bg-purple-50 px-2 py-1 rounded-md group-hover:bg-purple-100 transition-colors">Jalur</span>
                </div>
                <p class="text-4xl font-extrabold font-outfit text-slate-800 mb-1 group-hover:scale-105 transition-transform duration-300 origin-left">
                    {{ $pendaftaran ? $pendaftaran->jalur_program : '-' }}
                </p>
                <p class="text-sm text-slate-500 font-medium">Jalur Pendaftaran</p>
                <div class="mt-4 h-1.5 bg-purple-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-purple-500 to-indigo-500 rounded-full progress-fill" style="width: 100%"></div>
                </div>
                
                <!-- Animated dots at bottom -->
                <div class="absolute bottom-3 right-3 flex gap-0.5 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="w-1 h-1 bg-purple-400 rounded-full animate-wave"></div>
                    <div class="w-1 h-1 bg-purple-500 rounded-full animate-wave" style="animation-delay: 0.2s;"></div>
                    <div class="w-1 h-1 bg-indigo-500 rounded-full animate-wave" style="animation-delay: 0.4s;"></div>
                </div>
            </div>

            <!-- Tanggal Daftar Card -->
            <div class="relative overflow-hidden bg-white rounded-2xl p-6 shadow-sm border border-slate-100/80 hover-lift transition-all duration-300 group animate-zoom-in delay-300 shine-effect">
                <!-- Animated progress bar di header -->
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-emerald-400 via-teal-500 to-emerald-400 animate-shimmer"></div>
                
                <!-- Decorative elements -->
                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-40 h-40 rounded-full bg-emerald-500/5 animate-pulse-scale pointer-events-none"></div>
                
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center border border-emerald-100 group-hover:scale-110 group-hover:bg-emerald-100 transition duration-300 group-hover:animate-heartbeat">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600 group-hover:rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest bg-emerald-50 px-2 py-1 rounded-md group-hover:bg-emerald-100 transition-colors">Tanggal</span>
                </div>
                <p class="text-2xl font-extrabold font-outfit text-slate-800 mb-1 group-hover:scale-105 transition-transform duration-300 origin-left">
                    {{ $pendaftaran ? \Carbon\Carbon::parse($pendaftaran->created_at)->locale('id')->translatedFormat('d F Y') : '-' }}
                </p>
                <p class="text-sm text-slate-500 font-medium">Tanggal Pendaftaran</p>
                <div class="mt-4 h-1.5 bg-emerald-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full progress-fill" style="width: 100%"></div>
                </div>
                
                <!-- Animated dots at bottom -->
                <div class="absolute bottom-3 right-3 flex gap-0.5 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="w-1 h-1 bg-emerald-400 rounded-full animate-wave"></div>
                    <div class="w-1 h-1 bg-emerald-500 rounded-full animate-wave" style="animation-delay: 0.2s;"></div>
                    <div class="w-1 h-1 bg-teal-500 rounded-full animate-wave" style="animation-delay: 0.4s;"></div>
                </div>
            </div>
        </div>

        <!-- Quick Actions dengan animasi premium -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            @if (!$pendaftaran)
                <a href="{{ route('pendaftaran') }}"
                    class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 hover-lift transition-all duration-300 flex items-center space-x-4 group animate-slide-bounce delay-200 shine-effect ripple">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-700 group-hover:scale-110 flex items-center justify-center transition duration-300 shadow-md group-hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white group-hover:rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="font-bold text-slate-800 group-hover:text-blue-600 transition">Isi Formulir Pendaftaran</p>
                        <p class="text-xs text-slate-500 group-hover:text-blue-500 transition">Lengkapi data diri Anda</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-slate-300 group-hover:text-blue-500 ml-auto transition group-hover:translate-x-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @elseif($pendaftaran->status_pendaftaran == 'ditolak')
                <div class="bg-gradient-to-r from-red-500/5 to-rose-500/5 rounded-2xl p-5 shadow-inner border border-red-500/20 flex flex-col sm:flex-row items-center sm:items-start justify-between gap-4 group animate-slide-bounce delay-200">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-red-500 to-rose-600 flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="flex-1 text-center sm:text-left">
                            <p class="font-bold text-slate-800 group-hover:text-red-600 transition">Pendaftaran Ditolak</p>
                            <p class="text-xs text-red-600 font-medium mt-1">Beberapa berkas perlu diperbaiki.</p>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 w-full sm:w-auto">
                        <button @click="showAlasanModal=true" class="px-4 py-2 bg-white border border-red-200 text-red-600 hover:bg-red-50 text-xs font-semibold rounded-xl transition w-full sm:w-auto text-center shadow-sm">
                            Lihat Alasan
                        </button>
                        <button @click="showResubmitModal=true" class="px-4 py-2 bg-gradient-to-r from-red-500 to-rose-600 text-white hover:from-red-600 hover:to-rose-700 text-xs font-semibold rounded-xl transition w-full sm:w-auto text-center shadow-md">
                            Kirim Ulang Berkas
                        </button>
                    </div>
                </div>
            @else
                <div class="bg-gradient-to-r from-emerald-500/5 to-teal-500/5 rounded-2xl p-5 shadow-inner border border-emerald-500/20 flex items-center space-x-4 group animate-slide-bounce delay-200">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center shadow-md group-hover:scale-110 transition-transform duration-300 group-hover:animate-heartbeat">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="font-bold text-slate-800 group-hover:text-emerald-600 transition">Pendaftaran Selesai</p>
                        <p class="text-xs text-emerald-600 font-medium">Data Anda sudah tersimpan ✓</p>
                    </div>
                </div>
            @endif

            <a href="{{ route('landing') }}"
                class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 hover-lift transition-all duration-300 flex items-center space-x-4 group animate-slide-bounce delay-300 shine-effect ripple">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-slate-600 to-slate-800 group-hover:scale-110 flex items-center justify-center transition duration-300 shadow-md group-hover:shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white group-hover:rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="font-bold text-slate-800 group-hover:text-slate-600 transition">Kembali ke Beranda</p>
                    <p class="text-xs text-slate-500">Lihat informasi utama</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 text-slate-300 group-hover:text-blue-500 ml-auto transition group-hover:translate-x-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        @if($pendaftaran && $pendaftaran->status_pendaftaran == 'ditolak')
            <!-- Modal Lihat Alasan -->
            <div x-show="showAlasanModal" x-cloak
                class="fixed inset-0 bg-slate-900/70 backdrop-blur-sm flex items-center justify-center z-50 p-4"
                @keydown.escape.window="showAlasanModal=false">
                <div @click.away="showAlasanModal=false"
                    class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden">
                    <div class="p-5 border-b border-slate-100 flex items-center justify-between bg-red-50/50">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h3 class="font-bold text-slate-800">Alasan Penolakan</h3>
                        </div>
                        <button @click="showAlasanModal=false" class="text-slate-400 hover:text-slate-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="p-6">
                        <div class="bg-slate-50 p-4 rounded-xl text-sm text-slate-700 leading-relaxed mb-4 border border-slate-100">
                            {{ $pendaftaran->alasan_penolakan ?? 'Tidak ada pesan spesifik dari Admin.' }}
                        </div>
                        
                        @if(!empty($pendaftaran->file_ditolak))
                            <h4 class="text-sm font-semibold text-slate-700 mb-2">Berkas yang Perlu Diperbaiki:</h4>
                            <ul class="space-y-2">
                                @foreach($pendaftaran->file_ditolak as $file)
                                    <li class="flex items-center gap-2 text-sm text-red-600 bg-red-50 px-3 py-2 rounded-lg border border-red-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                        {{ ucwords(str_replace('_', ' ', $file)) }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="p-5 border-t border-slate-100 bg-slate-50 text-right">
                        <button @click="showAlasanModal=false" class="px-5 py-2 bg-white border border-slate-200 text-slate-600 rounded-xl font-semibold text-sm hover:bg-slate-100 transition shadow-sm">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal Kirim Ulang Berkas -->
            <div x-show="showResubmitModal" x-cloak
                class="fixed inset-0 bg-slate-900/70 backdrop-blur-sm flex items-center justify-center z-50 p-4"
                @keydown.escape.window="showResubmitModal=false">
                <div @click.away="showResubmitModal=false"
                    class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                    
                    <div class="p-5 border-b border-slate-100 flex items-center justify-between sticky top-0 bg-white z-10">
                        <div>
                            <h3 class="font-bold text-slate-800 text-lg">Kirim Ulang Berkas</h3>
                            <p class="text-xs text-slate-500 mt-1">Silakan upload dokumen yang diminta oleh Admin.</p>
                        </div>
                        <button @click="showResubmitModal=false" class="text-slate-400 hover:text-slate-600 transition bg-slate-100 hover:bg-slate-200 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form action="{{ route('user.resubmit') }}" method="POST" enctype="multipart/form-data" class="p-6">
                        @csrf
                        <div class="space-y-5">
                            @php
                                $fileFields = [
                                    'file_foto' => 'Pas Foto',
                                    'file_ktp' => 'KTP',
                                    'file_ijazah' => 'Ijazah',
                                    'file_transkrip' => 'Transkrip Nilai',
                                    'file_bukti_pembayaran' => 'Bukti Pembayaran',
                                    'surat_pernyataan' => 'Surat Pernyataan',
                                    'file_cv' => 'Curriculum Vitae',
                                    'file_ss_pddikti' => 'Screenshot PDDIKTI',
                                    'file_rpl_pembelajaran' => 'RPL Pembelajaran',
                                    'file_rpl_administrasi' => 'RPL Administrasi',
                                    'file_rpl_ekstrakulikuler' => 'RPL Ekstrakulikuler',
                                    'file_rpl_prestasi' => 'RPL Prestasi',
                                    'surat_keterangan_pindah' => 'Surat Keterangan Pindah'
                                ];
                                $ditolak = $pendaftaran->file_ditolak ?? [];
                            @endphp

                            @foreach($fileFields as $field => $label)
                                @if(in_array($field, $ditolak))
                                    <!-- FILE DITOLAK (BISA DIUPLOAD ULANG) -->
                                    <div class="bg-red-50/50 border border-red-100 rounded-xl p-4">
                                        <label class="block text-sm font-semibold text-slate-800 mb-1">
                                            {{ $label }} <span class="text-red-500">*</span>
                                        </label>
                                        <p class="text-xs text-red-500 mb-3 flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                            Harap upload ulang berkas ini
                                        </p>
                                        <input type="file" name="{{ $field }}" accept="{{ $field === 'file_foto' ? '.png,.jpg,.jpeg' : '.pdf,.png,.jpg,.jpeg' }}" required
                                            class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-red-100 file:text-red-700 hover:file:bg-red-200 transition">
                                    </div>
                                @elseif($pendaftaran->$field)
                                    <!-- FILE DITERIMA (TERKUNCI) -->
                                    <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 flex items-center justify-between opacity-75">
                                        <div>
                                            <label class="block text-sm font-semibold text-slate-600 mb-0.5">
                                                {{ $label }}
                                            </label>
                                            <p class="text-xs text-emerald-600 flex items-center gap-1 font-medium">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                </svg>
                                                Berkas Diterima (Terkunci)
                                            </p>
                                        </div>
                                        <a href="{{ asset('uploads/' . $pendaftaran->$field) }}" target="_blank"
                                            class="text-xs bg-white border border-slate-200 px-3 py-1.5 rounded-lg text-slate-600 font-semibold hover:bg-slate-50 transition">
                                            Lihat Berkas
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="mt-8 flex gap-3">
                            <button type="button" @click="showResubmitModal=false"
                                class="flex-1 py-3 bg-slate-100 text-slate-600 rounded-xl font-semibold text-sm hover:bg-slate-200 transition">
                                Batal
                            </button>
                            <button type="submit"
                                class="flex-1 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl font-semibold text-sm hover:from-blue-700 hover:to-indigo-700 transition shadow-md">
                                Kirim Berkas Perbaikan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif

    </div>

    <script>
        // Animate progress bars when they come into view
        document.addEventListener('DOMContentLoaded', function() {
            const progressBars = document.querySelectorAll('.progress-fill');
            progressBars.forEach(bar => {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const width = bar.style.width;
                            bar.style.width = '0%';
                            setTimeout(() => {
                                bar.style.width = width;
                            }, 100);
                            observer.unobserve(bar);
                        }
                    });
                });
                observer.observe(bar);
            });

            // --- File Preview Logic for Resubmit Modal ---
            const fileInputs = document.querySelectorAll('input[type="file"]');
            fileInputs.forEach(input => {
                input.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    const parent = input.parentElement;
                    
                    // Remove existing preview button if any
                    const existingBtn = parent.querySelector('.preview-btn');
                    if (existingBtn) existingBtn.remove();

                    if (file) {
                        const fileURL = URL.createObjectURL(file);
                        const btn = document.createElement('a');
                        btn.href = fileURL;
                        btn.target = '_blank';
                        btn.className = 'preview-btn mt-3 inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 hover:bg-red-200 text-xs font-bold rounded-lg transition duration-200';
                        btn.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Lihat File (Preview)
                        `;
                        parent.appendChild(btn);
                    }
                });
            });
        });
    </script>
</x-user-layout>