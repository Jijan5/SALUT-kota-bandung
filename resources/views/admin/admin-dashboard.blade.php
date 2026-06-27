<x-admin-layout>
    <x-slot name="title">Dashboard</x-slot>

    <div class="max-w-7xl mx-auto space-y-6">

        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-blue-900 to-indigo-900 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle,_#fff_1px,_transparent_1px)] [background-size:22px_22px]"></div>
            <div class="relative z-10">
                <h2 class="font-outfit text-2xl font-bold mb-1">Selamat Datang, Admin!</h2>
                <p class="text-blue-200 text-sm">Berikut adalah ringkasan data pendaftaran calon mahasiswa terkini di SALUT Kota Bandung.</p>
            </div>
            <div class="absolute right-6 top-1/2 -translate-y-1/2 opacity-20 hidden sm:block">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">

            <!-- Total Pendaftar -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total</span>
                </div>
                <p class="text-4xl font-extrabold font-outfit text-slate-800 mb-1">{{ $totalPendaftar ?? 0 }}</p>
                <p class="text-sm text-slate-500 font-medium">Total Pendaftar</p>
                <div class="mt-4 h-1 bg-blue-100 rounded-full">
                    <div class="h-1 bg-blue-600 rounded-full" style="width: 100%"></div>
                </div>
            </div>

            <!-- Siswa Diterima -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-emerald-400 uppercase tracking-wider">Diterima</span>
                </div>
                <p class="text-4xl font-extrabold font-outfit text-slate-800 mb-1">{{ $jumlahDiterima ?? 0 }}</p>
                <p class="text-sm text-slate-500 font-medium">Siswa Diterima</p>
                @php $pctDiterima = $totalPendaftar > 0 ? round(($jumlahDiterima / $totalPendaftar) * 100) : 0; @endphp
                <div class="mt-4 h-1 bg-emerald-100 rounded-full">
                    <div class="h-1 bg-emerald-500 rounded-full" style="width: {{ $pctDiterima }}%"></div>
                </div>
            </div>

            <!-- Pending -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-amber-400 uppercase tracking-wider">Pending</span>
                </div>
                <p class="text-4xl font-extrabold font-outfit text-slate-800 mb-1">{{ $jumlahPending ?? 0 }}</p>
                <p class="text-sm text-slate-500 font-medium">Menunggu Verifikasi</p>
                @php $pctPending = $totalPendaftar > 0 ? round(($jumlahPending / $totalPendaftar) * 100) : 0; @endphp
                <div class="mt-4 h-1 bg-amber-100 rounded-full">
                    <div class="h-1 bg-amber-500 rounded-full" style="width: {{ $pctPending }}%"></div>
                </div>
            </div>

            <!-- Ditolak -->
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 hover:shadow-md transition duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-red-400 uppercase tracking-wider">Ditolak</span>
                </div>
                <p class="text-4xl font-extrabold font-outfit text-slate-800 mb-1">{{ $jumlahDitolak ?? 0 }}</p>
                <p class="text-sm text-slate-500 font-medium">Perlu Diperbaiki</p>
                @php $pctDitolak = $totalPendaftar > 0 ? round(($jumlahDitolak / $totalPendaftar) * 100) : 0; @endphp
                <div class="mt-4 h-1 bg-red-100 rounded-full">
                    <div class="h-1 bg-red-500 rounded-full" style="width: {{ $pctDitolak }}%"></div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            <a href="{{ route('admin.index') }}" class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 hover:shadow-md hover:border-blue-200 transition duration-300 flex items-center space-x-4 group">
                <div class="w-12 h-12 rounded-xl bg-blue-700 group-hover:bg-blue-800 flex items-center justify-center transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-slate-800">Lihat Semua Pendaftar</p>
                    <p class="text-xs text-slate-500">Verifikasi & kelola berkas</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-300 group-hover:text-blue-500 ml-auto transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <a href="{{ route('admin.diterima') }}" class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 hover:shadow-md hover:border-emerald-200 transition duration-300 flex items-center space-x-4 group">
                <div class="w-12 h-12 rounded-xl bg-emerald-600 group-hover:bg-emerald-700 flex items-center justify-center transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-slate-800">Siswa Diterima</p>
                    <p class="text-xs text-slate-500">Daftar siswa disetujui</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-300 group-hover:text-emerald-500 ml-auto transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <a href="{{ route('admin.ditolak') }}" class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 hover:shadow-md hover:border-red-200 transition duration-300 flex items-center space-x-4 group">
                <div class="w-12 h-12 rounded-xl bg-red-600 group-hover:bg-red-700 flex items-center justify-center transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-slate-800">Siswa Ditolak</p>
                    <p class="text-xs text-slate-500">Daftar perlu diperbaiki</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-slate-300 group-hover:text-red-500 ml-auto transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

    </div>
</x-admin-layout>