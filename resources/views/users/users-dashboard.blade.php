<x-user-layout>
    <x-slot name="title">Dashboard</x-slot>

    <div class="max-w-7xl mx-auto space-y-6">

        <!-- Welcome Banner -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 relative overflow-hidden">
            <div
                class="absolute inset-0 opacity-5 bg-[radial-gradient(circle,_#3b5cff_1px,_transparent_1px)] [background-size:22px_22px]">
            </div>
            <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h2 class="font-outfit text-xl font-bold text-slate-800">Halo,
                        {{ Auth::guard('web')->user()->name }}! 👋</h2>
                    <p class="text-sm text-slate-500 mt-0.5">Berikut adalah status pendaftaran Anda di SALUT Kota
                        Bandung.</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
            </div>
        </div>

        @php
            $pendaftaran = App\Models\SalutPendaftaran::where('user_id', Auth::guard('web')->id())->first();
            $totalPendaftar = App\Models\SalutPendaftaran::count();
            $jumlahDiterima = App\Models\SalutPendaftaran::where('status_pendaftaran', 'diterima')->count();
            $jumlahPending = App\Models\SalutPendaftaran::where('status_pendaftaran', 'pending')->count();
        @endphp

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">

            <!-- Status Pendaftaran -->
            <div
                class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Status</span>
                </div>
                <p class="text-4xl font-extrabold font-outfit mb-1">
                    @if ($pendaftaran)
                        @if ($pendaftaran->status_pendaftaran == 'pending')
                            <span class="text-amber-600">Pending</span>
                        @elseif($pendaftaran->status_pendaftaran == 'diterima')
                            <span class="text-emerald-600">Diterima</span>
                        @else
                            <span class="text-red-600">{{ $pendaftaran->status_pendaftaran }}</span>
                        @endif
                    @else
                        <span class="text-slate-400">Belum Daftar</span>
                    @endif
                </p>
                <p class="text-sm text-slate-500 font-medium">Status Pendaftaran</p>
                <div class="mt-4 h-1 bg-blue-100 rounded-full">
                    <div class="h-1 bg-blue-600 rounded-full"
                        style="width: {{ $pendaftaran ? ($pendaftaran->status_pendaftaran == 'diterima' ? 100 : 50) : 0 }}%">
                    </div>
                </div>
            </div>

            <!-- Jalur Program -->
            <div
                class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-700" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-purple-400 uppercase tracking-wider">Jalur</span>
                </div>
                <p class="text-4xl font-extrabold font-outfit text-slate-800 mb-1">
                    {{ $pendaftaran ? $pendaftaran->jalur_program : '-' }}</p>
                <p class="text-sm text-slate-500 font-medium">Jalur Pendaftaran</p>
                <div class="mt-4 h-1 bg-purple-100 rounded-full">
                    <div class="h-1 bg-purple-500 rounded-full" style="width: 100%"></div>
                </div>
            </div>

            <!-- Tanggal Daftar -->
            <div
                class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-700" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-emerald-400 uppercase tracking-wider">Tanggal</span>
                </div>
                <p class="text-2xl font-extrabold font-outfit text-slate-800 mb-1">
                    {{ $pendaftaran ? $pendaftaran->created_at->format('d/m/Y') : '-' }}</p>
                <p class="text-sm text-slate-500 font-medium">Tanggal Pendaftaran</p>
                <div class="mt-4 h-1 bg-emerald-100 rounded-full">
                    <div class="h-1 bg-emerald-500 rounded-full" style="width: 100%"></div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            @if (!$pendaftaran)
                <a href="{{ route('pendaftaran') }}"
                    class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 hover:shadow-md hover:border-blue-200 transition duration-300 flex items-center space-x-4 group">
                    <div
                        class="w-12 h-12 rounded-xl bg-blue-700 group-hover:bg-blue-800 flex items-center justify-center transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-slate-800">Isi Formulir Pendaftaran</p>
                        <p class="text-xs text-slate-500">Lengkapi data diri Anda</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-slate-300 group-hover:text-blue-500 ml-auto transition" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @else
                <div class="bg-white rounded-2xl p-5 shadow-sm border border-emerald-100 flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="font-bold text-slate-800">Pendaftaran Selesai</p>
                        <p class="text-xs text-slate-500">Data Anda sudah tersimpan</p>
                    </div>
                </div>
            @endif

            <a href="{{ route('landing') }}"
                class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 hover:shadow-md hover:border-blue-200 transition duration-300 flex items-center space-x-4 group">
                <div
                    class="w-12 h-12 rounded-xl bg-slate-600 group-hover:bg-slate-700 flex items-center justify-center transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-slate-800">Kembali ke Beranda</p>
                    <p class="text-xs text-slate-500">Lihat informasi utama</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 text-slate-300 group-hover:text-blue-500 ml-auto transition" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

    </div>
</x-user-layout>
