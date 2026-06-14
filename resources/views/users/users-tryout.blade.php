<x-user-layout>
    <x-slot name="title">Tryout Online</x-slot>

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
            0%, 100% {
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
        .animate-float-complex {
            animation: floatComplex 5s ease-in-out infinite;
        }
        .animate-pulse-scale {
            animation: pulseScale 3s ease-in-out infinite;
        }
        .animate-shimmer {
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }
        .delay-700 { animation-delay: 0.7s; }
        .delay-800 { animation-delay: 0.8s; }

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

        /* Spin slow */
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-spin-slow {
            animation: spin-slow 20s linear infinite;
        }
    </style>

    <div class="max-w-7xl mx-auto space-y-6">

        <!-- Header Banner dengan animasi partikel (SAMA SEPERTI PROFILE) -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-slate-900 via-indigo-950 to-blue-900 p-6 text-white shadow-xl shadow-blue-950/20 border border-slate-800 animate-fade-in-down">
            <!-- Tech overlay -->
            <div class="absolute inset-0 opacity-15 bg-[linear-gradient(to_right,#3b82f6_1px,transparent_1px),linear-gradient(to_bottom,#3b82f6_1px,transparent_1px)] bg-[size:3rem_3rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)]"></div>
            
            <!-- Floating particles -->
            <div class="absolute inset-0 overflow-hidden pointer-events-none">
                <div class="absolute top-10 left-10 w-2 h-2 bg-blue-400 rounded-full animate-float-complex"></div>
                <div class="absolute top-20 right-20 w-1.5 h-1.5 bg-indigo-400 rounded-full animate-float-complex" style="animation-delay: 1s; animation-duration: 4s;"></div>
                <div class="absolute bottom-10 left-1/4 w-2.5 h-2.5 bg-blue-300 rounded-full animate-float-complex" style="animation-delay: 2s; animation-duration: 6s;"></div>
                <div class="absolute top-1/2 right-1/3 w-1 h-1 bg-cyan-400 rounded-full animate-float-complex" style="animation-delay: 1.5s; animation-duration: 3.5s;"></div>
                <div class="absolute bottom-20 right-10 w-2 h-2 bg-indigo-300 rounded-full animate-float-complex" style="animation-delay: 0.5s; animation-duration: 4.5s;"></div>
                <div class="absolute top-40 left-1/3 w-1.5 h-1.5 bg-blue-400 rounded-full animate-float-complex" style="animation-delay: 2.5s; animation-duration: 5s;"></div>
                <div class="absolute bottom-32 left-2/3 w-2 h-2 bg-purple-400 rounded-full animate-float-complex" style="animation-delay: 3s; animation-duration: 7s;"></div>
            </div>

            <!-- Pulse glow backgrounds -->
            <div class="absolute -right-10 -top-10 h-40 w-40 rounded-full bg-blue-500/10 blur-3xl animate-pulse-scale"></div>
            <div class="absolute right-1/4 -bottom-12 h-32 w-32 rounded-full bg-indigo-500/20 blur-2xl animate-pulse-scale" style="animation-delay: 1s;"></div>
            <div class="absolute -left-10 top-1/2 h-48 w-48 rounded-full bg-cyan-500/5 blur-3xl animate-pulse-scale" style="animation-delay: 2s;"></div>

            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <h2 class="font-outfit text-2xl font-extrabold tracking-tight text-white drop-shadow-sm flex items-center gap-2">
                        Tryout Online
                        <span class="text-2xl inline-block hover-rotate cursor-pointer">📝</span>
                    </h2>
                    <p class="text-sm text-slate-300/90 mt-1 max-w-xl font-medium">
                        Persiapkan diri Anda menghadapi ujian masuk <span class="text-blue-400 font-semibold animate-pulse">SALUT Kota Bandung</span>.
                    </p>
                </div>
            </div>
        </div>

        <!-- Konten Tryout -->
        <div class="grid grid-cols-1 gap-6">
            
            <!-- Card Pilih Tryout -->
            <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-100/80 hover-lift transition duration-300 animate-fade-in-right delay-100">
                <div class="relative z-10 px-6 py-4 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100">
                    <h4 class="font-bold text-slate-800 flex items-center">
                        <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mr-2 hover-rotate">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        Pilih Tryout
                    </h4>
                </div>
                <div class="p-6">
                    <p class="text-slate-600 leading-relaxed mb-6">
                        Silakan klik tombol di bawah untuk memulai tryout. Anda akan diarahkan ke halaman tryout eksternal.
                    </p>

                    <!-- Card Tryout (dengan gaya yang sama seperti card info di profile) -->
                    <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-blue-50 rounded-xl p-6 border border-blue-100 transition-all duration-300 info-card-hover bounce-on-hover">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                            <!-- Bagian Kiri: Icon + Teks -->
                            <div class="flex items-center gap-5">
                                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center shadow-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-outfit text-xl font-bold text-slate-800">Tryout Online</h3>
                                    <p class="text-sm text-slate-500 mt-0.5">Tes kemampuan akademik</p>
                                </div>
                            </div>
                            <!-- Tombol -->
                            <a href="https://bit.ly/TO-MKDU4111-PKn-MP" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg group">
                                <span>Mulai Tryout</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informasi Tambahan Card -->
            <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-100/80 hover-lift transition duration-300 animate-fade-in-right delay-200">
                <div class="relative z-10 px-6 py-4 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100">
                    <h4 class="font-bold text-slate-800 flex items-center">
                        <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mr-2 hover-rotate">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        Informasi
                    </h4>
                </div>
                <div class="p-6">
                    <div class="bg-amber-50 border border-amber-200 rounded-xl p-5">
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <h4 class="font-semibold text-amber-800">Informasi Tryout</h4>
                                <p class="text-sm text-amber-700 mt-1">
                                    Tryout ini diselenggarakan secara online. Pastikan koneksi internet Anda stabil
                                    sebelum memulai tryout. Waktu pengerjaan terbatas, kerjakan soal dengan teliti.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tips Card -->
            <div class="relative overflow-hidden bg-white rounded-2xl shadow-sm border border-slate-100/80 hover-lift transition duration-300 animate-fade-in-right delay-300">
                <div class="relative z-10 px-6 py-4 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100">
                    <h4 class="font-bold text-slate-800 flex items-center">
                        <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mr-2 hover-rotate">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        Tips Mengerjakan Tryout
                    </h4>
                </div>
                <div class="p-6">
                    <div class="bg-green-50 border border-green-200 rounded-xl p-5">
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <ul class="text-sm text-green-700 space-y-2 list-disc list-inside">
                                    <li>Baca soal dengan teliti sebelum menjawab</li>
                                    <li>Kelola waktu dengan baik</li>
                                    <li>Jangan terpaku pada satu soal yang sulit</li>
                                    <li>Gunakan waktu yang tersedia seefisien mungkin</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-user-layout>