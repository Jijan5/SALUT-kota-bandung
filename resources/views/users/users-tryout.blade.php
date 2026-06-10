<x-user-layout>
    <x-slot name="title">Tryout</x-slot>

    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 mb-6">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <div>
                    <h2 class="font-outfit text-xl font-bold text-slate-800">Tryout Online</h2>
                    <p class="text-sm text-slate-500 mt-0.5">Persiapkan diri Anda menghadapi ujian masuk</p>
                </div>
            </div>
        </div>

        <!-- Konten Tryout -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="p-6 md:p-8">
                <h3 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Pilih Tryout
                </h3>

                <p class="text-slate-600 leading-relaxed mb-6">
                    Silakan klik tombol di bawah untuk memulai tryout. Anda akan diarahkan ke halaman tryout eksternal.
                </p>

                <!-- Card Tryout -->
                <div
                    class="border border-slate-200 rounded-2xl p-8 bg-gradient-to-r from-blue-50 via-indigo-50 to-blue-50">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6">

                        <!-- Bagian Kiri: Icon + Teks -->
                        <div class="flex items-center gap-5">
                            <!-- Icon Lingkaran Biru -->
                            <div
                                class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center shadow-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>

                            <!-- Teks -->
                            <div>
                                <h3 class="font-outfit text-xl font-bold text-slate-800">Tryout Online</h3>
                                <p class="text-sm text-slate-500 mt-0.5">Tes kemampuan akademik</p>
                            </div>
                        </div>

                        <!-- Bagian Kanan: Tombol -->
                        <a href="https://bit.ly/TO-MKDU4111-PKn-MP" target="_blank" rel="noopener noreferrer"
                            class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-8 py-3 rounded-xl transition-all duration-300 shadow-md hover:shadow-lg group">
                            <span>Mulai Tryout</span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 group-hover:translate-x-1 transition-transform duration-200"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>

                    </div>
                </div>

                <!-- Informasi Tambahan -->
                <div class="mt-6 bg-amber-50 border border-amber-200 rounded-xl p-5">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-600 mt-0.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-amber-800">Informasi</h4>
                            <p class="text-sm text-amber-700 mt-1">
                                Tryout ini diselenggarakan secara online. Pastikan koneksi internet Anda stabil
                                sebelum memulai tryout. Waktu pengerjaan terbatas, kerjakan soal dengan teliti.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Tips -->
                <div class="mt-6 bg-green-50 border border-green-200 rounded-xl p-5">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 mt-0.5" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <h4 class="font-semibold text-green-800">Tips Mengerjakan Tryout</h4>
                            <ul class="text-sm text-green-700 mt-1 space-y-1 list-disc list-inside">
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
</x-user-layout>
