<x-user-layout>
    <x-slot name="title">Profil Saya</x-slot>

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

        /* Animasi float lebih kompleks */
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

            0%,
            100% {
                transform: scale(1);
                opacity: 0.4;
            }

            50% {
                transform: scale(1.3);
                opacity: 0.7;
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

        /* Animasi border running */
        @keyframes borderRun {
            0% {
                border-color: rgba(59, 130, 246, 0.2);
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.1);
            }

            50% {
                border-color: rgba(59, 130, 246, 0.8);
                box-shadow: 0 0 20px 5px rgba(59, 130, 246, 0.3);
            }

            100% {
                border-color: rgba(59, 130, 246, 0.2);
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.1);
            }
        }

        /* Animasi slide-in dengan bounce */
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
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        .animate-border-run {
            animation: borderRun 2s ease-in-out infinite;
        }

        /* Delay classes */
        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        .delay-400 {
            animation-delay: 0.4s;
        }

        .delay-500 {
            animation-delay: 0.5s;
        }

        .delay-600 {
            animation-delay: 0.6s;
        }

        .delay-700 {
            animation-delay: 0.7s;
        }

        .delay-800 {
            animation-delay: 0.8s;
        }

        /* Hover effects */
        .hover-glow:hover {
            filter: drop-shadow(0 0 15px rgba(59, 130, 246, 0.5));
            transition: all 0.3s ease;
        }

        .hover-rotate:hover {
            transform: rotate(180deg);
            transition: transform 0.5s ease;
        }

        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.2);
        }

        /* Card hover effect yang konsisten untuk semua card info */
        .info-card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .info-card-hover:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 20px 25px -12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Bounce effect untuk hover */
        .bounce-on-hover:hover {
            animation: bounce 0.5s ease;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Stagger animation untuk cards */
        .stagger-grid>* {
            opacity: 0;
            animation: fadeInUp 0.5s ease forwards;
        }

        .stagger-grid>*:nth-child(1) {
            animation-delay: 0.05s;
        }

        .stagger-grid>*:nth-child(2) {
            animation-delay: 0.1s;
        }

        .stagger-grid>*:nth-child(3) {
            animation-delay: 0.15s;
        }

        .stagger-grid>*:nth-child(4) {
            animation-delay: 0.2s;
        }

        .stagger-grid>*:nth-child(5) {
            animation-delay: 0.25s;
        }

        .stagger-grid>*:nth-child(6) {
            animation-delay: 0.3s;
        }

        /* Typing effect untuk status */
        .typing-status {
            overflow: hidden;
            border-right: 2px solid;
            white-space: nowrap;
            animation: typing 2s steps(40, end), blink-caret 0.75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent;
            }

            50% {
                border-color: orange;
            }
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
            background: rgba(59, 130, 246, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .ripple:hover::after {
            width: 300px;
            height: 300px;
        }

        /* Spin slow */
        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin-slow {
            animation: spin-slow 20s linear infinite;
        }
    </style>

    <div class="max-w-7xl mx-auto space-y-6">

        <!-- Header Banner dengan animasi partikel lebih banyak -->
        <div
            class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-slate-900 via-indigo-950 to-blue-900 p-6 text-white shadow-xl shadow-blue-950/20 border border-slate-800 animate-fade-in-down">
            <!-- Tech overlay -->
            <div
                class="absolute inset-0 opacity-15 bg-[linear-gradient(to_right,#3b82f6_1px,transparent_1px),linear-gradient(to_bottom,#3b82f6_1px,transparent_1px)] bg-[size:3rem_3rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)]">
            </div>

            <!-- Floating particles lebih banyak -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-10 left-10 w-2 h-2 bg-blue-400 rounded-full animate-float-complex"></div>
                <div class="absolute top-20 right-20 w-1.5 h-1.5 bg-indigo-400 rounded-full animate-float-complex"
                    style="animation-delay: 1s; animation-duration: 4s;"></div>
                <div class="absolute bottom-10 left-1/4 w-2.5 h-2.5 bg-blue-300 rounded-full animate-float-complex"
                    style="animation-delay: 2s; animation-duration: 6s;"></div>
                <div class="absolute top-1/2 right-1/3 w-1 h-1 bg-cyan-400 rounded-full animate-float-complex"
                    style="animation-delay: 1.5s; animation-duration: 3.5s;"></div>
                <div class="absolute bottom-20 right-10 w-2 h-2 bg-indigo-300 rounded-full animate-float-complex"
                    style="animation-delay: 0.5s; animation-duration: 4.5s;"></div>
                <div class="absolute top-40 left-1/3 w-1.5 h-1.5 bg-blue-400 rounded-full animate-float-complex"
                    style="animation-delay: 2.5s; animation-duration: 5s;"></div>
                <div class="absolute bottom-32 left-2/3 w-2 h-2 bg-purple-400 rounded-full animate-float-complex"
                    style="animation-delay: 3s; animation-duration: 7s;"></div>
            </div>

            <!-- Pulse glow backgrounds -->
            <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-blue-500/10 blur-3xl animate-pulse-scale">
            </div>
            <div class="absolute right-1/4 -bottom-12 h-32 w-32 rounded-full bg-indigo-500/20 blur-2xl animate-pulse-scale"
                style="animation-delay: 1s;"></div>
            <div class="absolute -left-10 top-1/2 h-48 w-48 rounded-full bg-cyan-500/5 blur-3xl animate-pulse-scale"
                style="animation-delay: 2s;"></div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <h2
                        class="font-outfit text-2xl font-extrabold tracking-tight text-white drop-shadow-sm flex items-center gap-2">
                        Profil Saya
                        <span class="text-2xl inline-block hover-rotate cursor-pointer">👤</span>
                    </h2>
                    <p class="text-sm text-slate-300/90 mt-1 max-w-xl font-medium">
                        Informasi data diri dan pendaftaran Anda di <span
                            class="text-blue-400 font-semibold animate-pulse">SALUT Kota Bandung</span>.
                    </p>
                </div>

                <!-- Action Button dengan ripple effect -->
                <a href="{{ route('user.profile.edit') }}"
                    class="group ripple inline-flex items-center gap-2 bg-blue-600/90 hover:bg-blue-600 backdrop-blur-sm text-white px-5 py-2.5 rounded-xl transition-all duration-300 shadow-md hover:shadow-blue-500/25 border border-blue-400/30 hover:scale-105 hover:shadow-xl">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 group-hover:rotate-12 transition-transform duration-300 group-hover:animate-bounce"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    <span class="font-semibold text-sm group-hover:tracking-wider transition-all">Edit Profil</span>
                </a>
            </div>
        </div>

        @php
            $pendaftaran = App\Models\SalutPendaftaran::where('user_id', Auth::guard('web')->id())->first();
        @endphp

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Sidebar Info -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Profile Picture Card dengan efek 3D -->
                <div
                    class="relative overflow-hidden bg-white rounded-2xl p-6 shadow-sm border border-slate-100/80 hover-lift transition-all duration-300 text-center animate-slide-bounce">
                    <!-- Decorative rotating rings -->
                    <div
                        class="absolute -top-10 -right-10 w-40 h-40 rounded-full border-2 border-blue-200/20 animate-spin-slow pointer-events-none">
                    </div>
                    <div class="absolute -bottom-10 -left-10 w-40 h-40 rounded-full border-2 border-indigo-200/20 animate-spin-slow pointer-events-none"
                        style="animation-direction: reverse;"></div>
                    <div
                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-48 h-48 rounded-full bg-gradient-to-r from-blue-400/10 to-indigo-400/10 animate-pulse-scale">
                    </div>

                    <div class="relative z-10">
                        <div class="relative inline-block group">
                            <div
                                class="absolute inset-0 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 blur-md opacity-40 group-hover:opacity-60 transition animate-pulse-scale">
                            </div>
                            @if ($pendaftaran && $pendaftaran->file_foto)
                                <img src="{{ asset('storage/' . $pendaftaran->file_foto) }}" alt="Profile Photo"
                                    class="w-32 h-32 rounded-full object-cover mx-auto border-4 border-white shadow-lg relative z-10 group-hover:scale-110 transition duration-300 group-hover:rotate-6">
                            @else
                                <div
                                    class="w-32 h-32 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center mx-auto shadow-lg relative z-10 group-hover:scale-110 transition duration-300">
                                    <span class="text-4xl font-bold text-white animate-pulse">
                                        {{ substr(Auth::guard('web')->user()->name ?? 'U', 0, 1) }}
                                    </span>
                                </div>
                            @endif
                            <!-- Badge online indicator -->
                            <div
                                class="absolute bottom-2 right-2 w-4 h-4 bg-green-500 rounded-full border-2 border-white animate-pulse">
                            </div>
                        </div>
                        <h3 class="mt-4 text-xl font-bold text-slate-800 hover:text-blue-600 transition-colors">
                            {{ $pendaftaran && $pendaftaran->nama ? $pendaftaran->nama : Auth::guard('web')->user()->name }}
                        </h3>
                        <p class="text-sm text-slate-500 break-all">{{ Auth::guard('web')->user()->email }}</p>

                        @if ($pendaftaran)
                            <div class="mt-4 pt-4 border-t border-slate-100">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold shadow-sm transition-all duration-300 hover:scale-110 cursor-pointer typing-status
                                    @if ($pendaftaran->status_pendaftaran == 'diterima') bg-emerald-100 text-emerald-700
                                    @elseif($pendaftaran->status_pendaftaran == 'pending') bg-amber-100 text-amber-700
                                    @else bg-red-100 text-red-700 @endif">
                                    {{ ucfirst($pendaftaran->status_pendaftaran) }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Quick Info Card dengan progress bar animasi -->
                <div
                    class="relative overflow-hidden bg-gradient-to-b from-white to-blue-50/20 rounded-2xl p-6 shadow-sm border border-blue-100/50 hover-lift transition duration-300 animate-fade-in-left delay-100">
                    <div class="absolute right-0 bottom-0 opacity-5 pointer-events-none animate-float-complex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 text-blue-900" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>

                    <!-- Animated progress bar di header -->
                    <div
                        class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-400 via-indigo-500 to-purple-500 animate-shimmer">
                    </div>

                    <h4 class="font-bold text-slate-800 mb-4 flex items-center relative z-10">
                        <div
                            class="w-7 h-7 rounded-lg bg-blue-100 flex items-center justify-center mr-2 animate-pulse-scale">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        Informasi Cepat
                    </h4>

                    <div class="space-y-4 text-sm relative z-10">
                        <div
                            class="flex justify-between items-center border-b border-slate-100 pb-2 hover:bg-blue-50/30 p-2 rounded-lg transition-all hover:translate-x-1">
                            <span class="text-slate-500">Status Pendaftaran</span>
                            <span class="font-semibold text-slate-800">
                                {{ $pendaftaran ? ucfirst($pendaftaran->status_pendaftaran) : 'Belum Daftar' }}
                            </span>
                        </div>
                        <div
                            class="flex justify-between items-center border-b border-slate-100 pb-2 hover:bg-blue-50/30 p-2 rounded-lg transition-all hover:translate-x-1">
                            <span class="text-slate-500">Jalur Program</span>
                            <span
                                class="font-semibold text-slate-800">{{ $pendaftaran && $pendaftaran->jalur_program ? $pendaftaran->jalur_program : '-' }}</span>
                        </div>
                        <div
                            class="flex justify-between items-center border-b border-slate-100 pb-2 hover:bg-blue-50/30 p-2 rounded-lg transition-all hover:translate-x-1">
                            <span class="text-slate-500">Tanggal Daftar</span>
                            <span class="font-semibold text-slate-800">
                                {{ $pendaftaran && $pendaftaran->created_at
                                    ? $pendaftaran->created_at->locale('id')->translatedFormat('d F Y')
                                    : '-' }}
                            </span>
                        </div>
                        @if ($pendaftaran && $pendaftaran->no_ijazah)
                            <div
                                class="flex justify-between items-center border-b border-slate-100 pb-2 hover:bg-blue-50/30 p-2 rounded-lg transition-all hover:translate-x-1">
                                <span class="text-slate-500">No. Ijazah</span>
                                <span class="font-semibold text-slate-800">{{ $pendaftaran->no_ijazah }}</span>
                            </div>
                        @endif
                        @if ($pendaftaran && $pendaftaran->ipk)
                            <div
                                class="flex justify-between items-center hover:bg-blue-50/30 p-2 rounded-lg transition-all hover:translate-x-1">
                                <span class="text-slate-500">IPK</span>
                                <span class="font-semibold text-slate-800">{{ $pendaftaran->ipk }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">

                @if ($pendaftaran)
                    <!-- Data Pribadi -->
                    @if (
                        $pendaftaran->nama ||
                            $pendaftaran->nik ||
                            $pendaftaran->tempat_lahir ||
                            $pendaftaran->tanggal_lahir ||
                            $pendaftaran->gender ||
                            $pendaftaran->agama ||
                            $pendaftaran->status ||
                            $pendaftaran->no_hp ||
                            $pendaftaran->no_hp_alternatif ||
                            $pendaftaran->nama_ibu_kandung ||
                            $pendaftaran->ukuran_almat)
                        <div
                            class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-100/80 hover-lift transition duration-300 animate-fade-in-right delay-100">
                            <div
                                class="relative z-10 px-6 py-4 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100">
                                <h4 class="font-bold text-slate-800 flex items-center">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mr-2 hover-rotate">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    Data Pribadi
                                </h4>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 stagger-grid">
                                    <div class="space-y-4">
                                        @if ($pendaftaran->nama)
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider flex items-center gap-1">
                                                    Nama Lengkap
                                                </label>
                                                <p class="text-slate-800 font-semibold mt-1">👤{{ $pendaftaran->nama }}
                                                </p>
                                            </div>
                                        @endif
                                        @if ($pendaftaran->nik)
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider flex items-center gap-1">
                                                    NIK
                                                </label>
                                                <p class="text-slate-800 font-semibold mt-1">🆔{{ $pendaftaran->nik }}
                                                </p>
                                            </div>
                                        @endif
                                        @if ($pendaftaran->tempat_lahir || $pendaftaran->tanggal_lahir)
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">Tempat,
                                                    Tanggal Lahir</label>
                                                <p class="text-slate-800 font-semibold mt-1">📅
                                                    {{ $pendaftaran->tempat_lahir ?: '-' }},
                                                    {{ $pendaftaran->tanggal_lahir ? \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->locale('id')->translatedFormat('d F Y') : '-' }}
                                                </p>
                                            </div>
                                        @endif
                                        @if ($pendaftaran->gender)
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">Jenis
                                                    Kelamin</label>
                                                <p class="text-slate-800 font-semibold mt-1">
                                                    {{ $pendaftaran->gender == 'laki-laki' ? '👨 Laki-laki' : ($pendaftaran->gender == 'perempuan' ? '👩 Perempuan' : $pendaftaran->gender) }}
                                                </p>
                                            </div>
                                        @endif
                                        @if ($pendaftaran->agama)
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">Agama</label>
                                                <p class="text-slate-800 font-semibold mt-1">🕊️
                                                    {{ $pendaftaran->agama }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="space-y-4">
                                        @if ($pendaftaran->status)
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">Status</label>
                                                <p class="text-slate-800 font-semibold mt-1">📌
                                                    {{ $pendaftaran->status }}</p>
                                            </div>
                                        @endif
                                        @if ($pendaftaran->no_hp)
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">No.
                                                    HP</label>
                                                <p class="text-slate-800 font-semibold mt-1">📱
                                                    {{ $pendaftaran->no_hp }}</p>
                                            </div>
                                        @endif
                                        @if ($pendaftaran->no_hp_alternatif)
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">No.
                                                    HP Alternatif</label>
                                                <p class="text-slate-800 font-semibold mt-1">📞
                                                    {{ $pendaftaran->no_hp_alternatif }}</p>
                                            </div>
                                        @endif
                                        @if ($pendaftaran->nama_ibu_kandung)
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">Nama
                                                    Ibu Kandung</label>
                                                <p class="text-slate-800 font-semibold mt-1">👩‍👧
                                                    {{ $pendaftaran->nama_ibu_kandung }}</p>
                                            </div>
                                        @endif
                                        @if ($pendaftaran->ukuran_almat)
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">Ukuran
                                                    Almat</label>
                                                <p class="text-slate-800 font-semibold mt-1">👕
                                                    {{ $pendaftaran->ukuran_almat }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Alamat -->
                    @if (
                        $pendaftaran->alamat ||
                            $pendaftaran->provinsi ||
                            $pendaftaran->kab_kota ||
                            $pendaftaran->kecamatan ||
                            $pendaftaran->desa_kelurahan ||
                            $pendaftaran->kode_pos ||
                            $pendaftaran->alamat_pengirim_modul)
                        <div
                            class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-100/80 hover-lift transition duration-300 animate-fade-in-right delay-200">
                            <div
                                class="relative z-10 px-6 py-4 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100">
                                <h4 class="font-bold text-slate-800 flex items-center">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mr-2 hover-rotate">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    Alamat
                                </h4>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 stagger-grid">
                                    <div class="space-y-4">
                                        @if ($pendaftaran->alamat)
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">🏠
                                                    Alamat Sesuai KTP</label>
                                                <p class="text-slate-800 font-semibold mt-1">
                                                    {{ $pendaftaran->alamat }}</p>
                                            </div>
                                        @endif
                                        @if ($pendaftaran->desa_kelurahan && $pendaftaran->desa_kelurahan != 'NULL')
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">📍
                                                    Desa/Kelurahan</label>
                                                <p class="text-slate-800 font-semibold mt-1">
                                                    {{ $pendaftaran->desa_kelurahan }}</p>
                                            </div>
                                        @endif
                                        @if ($pendaftaran->kab_kota && $pendaftaran->kab_kota != 'NULL')
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">🏙️
                                                    Kabupaten/Kota</label>
                                                <p class="text-slate-800 font-semibold mt-1">
                                                    {{ $pendaftaran->kab_kota }}</p>
                                            </div>
                                        @endif
                                        @if ($pendaftaran->kode_pos && $pendaftaran->kode_pos != 'NULL')
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">📮
                                                    Kode Pos</label>
                                                <p class="text-slate-800 font-semibold mt-1">
                                                    {{ $pendaftaran->kode_pos }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="space-y-4">
                                        @if ($pendaftaran->kecamatan && $pendaftaran->kecamatan != 'NULL')
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">🗺️
                                                    Kecamatan</label>
                                                <p class="text-slate-800 font-semibold mt-1">
                                                    {{ $pendaftaran->kecamatan }}</p>
                                            </div>
                                        @endif
                                        @if ($pendaftaran->provinsi && $pendaftaran->provinsi != 'NULL')
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">🌍
                                                    Provinsi</label>
                                                <p class="text-slate-800 font-semibold mt-1">
                                                    {{ $pendaftaran->provinsi }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                @if ($pendaftaran->alamat_lain && $pendaftaran->alamat_lain != 'NULL' && $pendaftaran->alamat_lain != '')
                                    <div class="mt-4 pt-4 border-t border-slate-100">
                                        <div
                                            class="bg-gradient-to-r from-blue-50/50 to-indigo-50/50 rounded-xl p-4 border border-blue-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                            <label
                                                class="text-xs font-bold text-blue-600 uppercase tracking-wider flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 animate-float-complex" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                                </svg>
                                                Alamat Lainnya/Domisili
                                            </label>
                                            <p class="text-slate-700 mt-2">{{ $pendaftaran->alamat_lain }}</p>
                                        </div>
                                    </div>
                                @endif

                                @if ($pendaftaran->alamat_pengirim_modul)
                                    <div class="mt-4 pt-4">
                                        <div
                                            class="bg-gradient-to-r from-emerald-50 to-teal-50 rounded-xl p-5 border border-emerald-100 transition-all duration-300 info-card-hover bounce-on-hover animate-border-run">
                                            <div class="flex items-start gap-2 mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 text-emerald-600 mt-0.5 animate-bounce"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                                </svg>
                                                <label class="text-sm font-bold text-emerald-800">📦 Alamat Pengiriman
                                                    Modul</label>
                                            </div>
                                            <div class="pl-7">
                                                @php
                                                    $alamatPengiriman = $pendaftaran->alamat_pengirim_modul;
                                                    $alamatText = '';

                                                    if (
                                                        strtolower($alamatPengiriman) == 'ya' ||
                                                        strtolower($alamatPengiriman) == 'y'
                                                    ) {
                                                        if (
                                                            $pendaftaran->alamat_lain &&
                                                            $pendaftaran->alamat_lain != 'NULL' &&
                                                            $pendaftaran->alamat_lain != ''
                                                        ) {
                                                            $alamatText = nl2br(e($pendaftaran->alamat_lain));
                                                        } else {
                                                            $alamatParts = [];
                                                            if (
                                                                $pendaftaran->alamat &&
                                                                $pendaftaran->alamat != 'NULL' &&
                                                                $pendaftaran->alamat != ''
                                                            ) {
                                                                $alamatParts[] = e($pendaftaran->alamat);
                                                            }
                                                            if (
                                                                $pendaftaran->desa_kelurahan &&
                                                                $pendaftaran->desa_kelurahan != 'NULL' &&
                                                                $pendaftaran->desa_kelurahan != ''
                                                            ) {
                                                                $alamatParts[] =
                                                                    'Kelurahan ' . e($pendaftaran->desa_kelurahan);
                                                            }
                                                            if (
                                                                $pendaftaran->kecamatan &&
                                                                $pendaftaran->kecamatan != 'NULL' &&
                                                                $pendaftaran->kecamatan != ''
                                                            ) {
                                                                $alamatParts[] =
                                                                    'Kecamatan ' . e($pendaftaran->kecamatan);
                                                            }
                                                            if (
                                                                $pendaftaran->kab_kota &&
                                                                $pendaftaran->kab_kota != 'NULL' &&
                                                                $pendaftaran->kab_kota != ''
                                                            ) {
                                                                $alamatParts[] = e($pendaftaran->kab_kota);
                                                            }
                                                            if (
                                                                $pendaftaran->provinsi &&
                                                                $pendaftaran->provinsi != 'NULL' &&
                                                                $pendaftaran->provinsi != ''
                                                            ) {
                                                                $alamatParts[] =
                                                                    'Provinsi ' . e($pendaftaran->provinsi);
                                                            }
                                                            if (
                                                                $pendaftaran->kode_pos &&
                                                                $pendaftaran->kode_pos != 'NULL' &&
                                                                $pendaftaran->kode_pos != ''
                                                            ) {
                                                                $alamatParts[] =
                                                                    'Kode Pos ' . e($pendaftaran->kode_pos);
                                                            }
                                                            $alamatText = implode(', ', $alamatParts);
                                                        }
                                                    } else {
                                                        if (
                                                            $pendaftaran->alamat_lain &&
                                                            $pendaftaran->alamat_lain != 'NULL' &&
                                                            $pendaftaran->alamat_lain != ''
                                                        ) {
                                                            $alamatText = nl2br(e($pendaftaran->alamat_lain));
                                                        } else {
                                                            $alamatText =
                                                                '<span class="text-red-500 italic">Belum diisi</span>';
                                                        }
                                                    }
                                                @endphp
                                                <p class="text-slate-700 leading-relaxed">{!! $alamatText !!}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Lokasi Ujian -->
                    @if ($pendaftaran->lokasi_ujian_provinsi || $pendaftaran->lokasi_ujian_kab_kota)
                        <div
                            class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-100/80 hover-lift transition duration-300 animate-fade-in-right delay-300">
                            <div
                                class="relative z-10 px-6 py-4 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100">
                                <h4 class="font-bold text-slate-800 flex items-center">
                                    <div
                                        class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mr-2 hover-rotate">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    Lokasi Ujian
                                </h4>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 stagger-grid">
                                    <div class="space-y-4">
                                        @if ($pendaftaran->lokasi_ujian_provinsi)
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">🌏
                                                    Provinsi Ujian</label>
                                                <p class="text-slate-800 font-semibold mt-1">
                                                    {{ $pendaftaran->lokasi_ujian_provinsi }}</p>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="space-y-4">
                                        @if ($pendaftaran->lokasi_ujian_kab_kota)
                                            <div
                                                class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 transition-all duration-300 info-card-hover bounce-on-hover">
                                                <label
                                                    class="text-xs font-bold text-slate-400 uppercase tracking-wider">🏢
                                                    Kab/Kota Ujian</label>
                                                <p class="text-slate-800 font-semibold mt-1">
                                                    {{ $pendaftaran->lokasi_ujian_kab_kota }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Dokumen yang Diupload -->
@if (
    $pendaftaran->file_foto ||
    $pendaftaran->file_ktp ||
    $pendaftaran->file_ijazah ||
    $pendaftaran->file_bukti_pembayaran ||
    $pendaftaran->file_transkrip ||
    $pendaftaran->surat_pernyataan ||
    $pendaftaran->file_cv ||
    $pendaftaran->file_ss_pddikti ||
    $pendaftaran->file_rpl_pembelajaran ||
    $pendaftaran->file_rpl_administrasi ||
    $pendaftaran->file_rpl_ekstrakulikuler ||
    $pendaftaran->file_rpl_prestasi ||
    $pendaftaran->surat_keterangan_pindah)
<div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-100/80 hover-lift transition duration-300 animate-fade-in-right delay-400">
    <div class="relative z-10 px-6 py-4 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100">
        <h4 class="font-bold text-slate-800 flex items-center">
            <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mr-2 hover-rotate">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            Dokumen yang Diupload
            <div class="ml-3 flex gap-1">
                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse" style="animation-delay: 0.5s;"></div>
                <div class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
            </div>
        </h4>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 stagger-grid">
            @if ($pendaftaran->file_foto)
                <div class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 group">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">📸 Pas Foto Resmi</label>
                    <p class="mt-2"><a href="{{ asset('storage/' . $pendaftaran->file_foto) }}" target="_blank" class="text-blue-600 hover:text-blue-700 text-sm font-semibold flex items-center gap-1 group-hover:gap-2 transition-all"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg> Lihat Pas Foto</a></p>
                </div>
            @endif
            @if ($pendaftaran->file_ktp)
                <div class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 group">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">🆔 Scan KTP Asli</label>
                    <p class="mt-2"><a href="{{ asset('storage/' . $pendaftaran->file_ktp) }}" target="_blank" class="text-blue-600 hover:text-blue-700 text-sm font-semibold flex items-center gap-1 group-hover:gap-2 transition-all"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg> Lihat KTP</a></p>
                </div>
            @endif
            @if ($pendaftaran->file_ijazah)
                <div class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 group">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">🎓 Scan Ijazah Terakhir</label>
                    <p class="mt-2"><a href="{{ asset('storage/' . $pendaftaran->file_ijazah) }}" target="_blank" class="text-blue-600 hover:text-blue-700 text-sm font-semibold flex items-center gap-1 group-hover:gap-2 transition-all"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg> Lihat Ijazah</a></p>
                </div>
            @endif
            @if ($pendaftaran->file_transkrip)
                <div class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 group">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">📊 Transkrip Nilai / SKHUN</label>
                    <p class="mt-2"><a href="{{ asset('storage/' . $pendaftaran->file_transkrip) }}" target="_blank" class="text-blue-600 hover:text-blue-700 text-sm font-semibold flex items-center gap-1 group-hover:gap-2 transition-all"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg> Lihat Transkrip</a></p>
                </div>
            @endif
            @if ($pendaftaran->file_bukti_pembayaran)
                <div class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 group">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">💰 Bukti Transfer Pembayaran</label>
                    <p class="mt-2"><a href="{{ asset('storage/' . $pendaftaran->file_bukti_pembayaran) }}" target="_blank" class="text-blue-600 hover:text-blue-700 text-sm font-semibold flex items-center gap-1 group-hover:gap-2 transition-all"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg> Lihat Bukti Bayar</a></p>
                </div>
            @endif
            @if ($pendaftaran->surat_pernyataan)
                <div class="bg-slate-50/50 rounded-xl p-3 border border-slate-100 group">
                    <label class="text-xs font-bold text-slate-400 uppercase tracking-wider">📄 Surat Pernyataan Keabsahan Berkas</label>
                    <p class="mt-2"><a href="{{ asset('storage/' . $pendaftaran->surat_pernyataan) }}" target="_blank" class="text-blue-600 hover:text-blue-700 text-sm font-semibold flex items-center gap-1 group-hover:gap-2 transition-all"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-1 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg> Lihat Surat Pernyataan</a></p>
                </div>
            @endif
        </div>
    </div>
</div>
@endif
                @else
                    <!-- Belum Mendaftar dengan efek 3D dan confetti -->
                    <div
                        class="relative overflow-hidden bg-gradient-to-br from-slate-50 to-white rounded-2xl p-12 shadow-xl border border-slate-100 text-center animate-fade-in-up delay-300">
                        <!-- Decorative elements -->
                        <div
                            class="absolute inset-0 opacity-10 bg-[radial-gradient(circle,_#3b5cff_1px,_transparent_1px)] [background-size:24px_24px]">
                        </div>
                        <div
                            class="absolute -top-20 -right-20 w-80 h-80 rounded-full bg-blue-500/5 blur-3xl animate-pulse-scale">
                        </div>
                        <div class="absolute -bottom-20 -left-20 w-80 h-80 rounded-full bg-indigo-500/5 blur-3xl animate-pulse-scale"
                            style="animation-delay: 1s;"></div>
                        <div
                            class="absolute top-10 left-10 w-20 h-20 rounded-full bg-yellow-400/10 blur-2xl animate-float-complex">
                        </div>

                        <div class="relative z-10">
                            <!-- Animated icon -->
                            <div
                                class="w-28 h-28 mx-auto bg-gradient-to-br from-amber-100 to-orange-100 rounded-full flex items-center justify-center mb-6 shadow-xl animate-float-complex">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-14 w-14 text-amber-600 animate-bounce" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>

                            <h3 class="text-3xl font-bold text-slate-800 mb-3 animate-pulse">Belum Melakukan
                                Pendaftaran</h3>
                            <p class="text-slate-500 mb-8 max-w-md mx-auto">Anda belum mengisi formulir pendaftaran.
                                Silakan lengkapi data diri Anda terlebih dahulu untuk melanjutkan proses seleksi.</p>

                            <a href="{{ route('pendaftaran') }}"
                                class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 mr-2 group-hover:rotate-12 transition-transform duration-300"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Isi Formulir Pendaftaran Sekarang
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4 ml-2 group-hover:translate-x-1 transition" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>

                            <!-- Animated dots -->
                            <div class="mt-8 flex justify-center gap-1">
                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"
                                    style="animation-delay: 0.2s;"></div>
                                <div class="w-2 h-2 bg-blue-600 rounded-full animate-pulse"
                                    style="animation-delay: 0.4s;"></div>
                                <div class="w-2 h-2 bg-indigo-500 rounded-full animate-pulse"
                                    style="animation-delay: 0.6s;"></div>
                                <div class="w-2 h-2 bg-indigo-600 rounded-full animate-pulse"
                                    style="animation-delay: 0.8s;"></div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Alert untuk success pendaftaran -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                backdrop: true,
                allowOutsideClick: false
            });
        </script>
    @endif

    <!-- Alert untuk error -->
    @if ($errors->any())
        <script>
            let errorMessages = [];

            @if ($errors->has('nik'))
                errorMessages.push('• NIK sudah terdaftar. Silakan gunakan NIK lain.');
            @endif

            @if ($errors->has('no_hp'))
                errorMessages.push('• Nomor HP sudah terdaftar. Silakan gunakan nomor HP lain.');
            @endif

            @if ($errors->has('email'))
                errorMessages.push('• Email sudah terdaftar. Silakan gunakan email lain.');
            @endif

            @if ($errors->has('file_foto'))
                errorMessages.push('• {{ $errors->first('file_foto') }}');
            @endif

            @if ($errors->has('file_ktp'))
                errorMessages.push('• {{ $errors->first('file_ktp') }}');
            @endif

            @if ($errors->has('file_ijazah'))
                errorMessages.push('• {{ $errors->first('file_ijazah') }}');
            @endif

            @if ($errors->has('surat_pernyataan'))
                errorMessages.push('• {{ $errors->first('surat_pernyataan') }}');
            @endif

            @if ($errors->has('file_bukti_pembayaran'))
                errorMessages.push('• {{ $errors->first('file_bukti_pembayaran') }}');
            @endif

            @if (
                $errors->any() &&
                    !$errors->has('nik') &&
                    !$errors->has('no_hp') &&
                    !$errors->has('email') &&
                    !$errors->has('file_foto') &&
                    !$errors->has('file_ktp') &&
                    !$errors->has('file_ijazah') &&
                    !$errors->has('surat_pernyataan') &&
                    !$errors->has('file_bukti_pembayaran'))
                errorMessages.push('• {{ $errors->first() }}');
            @endif

            let errorText = errorMessages.join('\n');

            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                html: errorText.replace(/\n/g, '<br>'),
                confirmButtonColor: '#dc2626',
                confirmButtonText: 'OK',
                allowOutsideClick: false
            });
        </script>
    @endif
</x-user-layout>
