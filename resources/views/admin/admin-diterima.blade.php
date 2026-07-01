<x-admin-layout>
    <x-slot name="title">Siswa Diterima</x-slot>

    <div x-data="{ showConfirmModal: false, pendaftarToDeleteName: '', pendaftarToDeleteUrl: '' }" class="max-w-full">

        @if (session('success'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-cloak
                class="fixed top-5 right-5 z-50 bg-emerald-500 text-white px-5 py-3 rounded-2xl shadow-xl font-semibold text-sm flex items-center space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Header & Search -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5 mb-5">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h2 class="font-outfit text-xl font-bold text-slate-800">Data Siswa Diterima</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Daftar calon mahasiswa yang telah disetujui masuk</p>
                </div>
                <div class="flex flex-col sm:flex-row items-center gap-3">
                    <form action="{{ route('admin.diterima') }}" method="GET" class="w-full sm:w-auto">
                        <div class="relative">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                            <input type="text" name="search" placeholder="Cari nama atau email..." value="{{ request('search') }}"
                                class="w-full sm:w-80 pl-9 pr-4 py-2 border border-slate-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition shadow-sm">
                        </div>
                    </form>
                    <a href="{{ route('admin.export.csv') }}" class="flex items-center space-x-2 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-full font-semibold text-sm transition shadow-sm w-full sm:w-auto justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        <span>Export CSV</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-slate-800 text-white">
                            <th class="px-4 py-3 text-left font-semibold text-xs uppercase tracking-wider w-10">No</th>
                            <th class="px-4 py-3 text-left font-semibold text-xs uppercase tracking-wider">Nama</th>
                            <th class="px-4 py-3 text-left font-semibold text-xs uppercase tracking-wider">Email</th>
                            <th class="px-4 py-3 text-left font-semibold text-xs uppercase tracking-wider">No. HP</th>
                            <th class="px-4 py-3 text-left font-semibold text-xs uppercase tracking-wider">Jalur</th>
                            <th class="px-4 py-3 text-left font-semibold text-xs uppercase tracking-wider">Lokasi Ujian</th>
                            <th class="px-4 py-3 text-left font-semibold text-xs uppercase tracking-wider">Tanggal Diterima</th>
                            <th class="px-4 py-3 text-left font-semibold text-xs uppercase tracking-wider">Status</th>
                            <th class="px-4 py-3 text-center font-semibold text-xs uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($datapendaftar as $index => $pendaftar)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-4 py-3 text-slate-500 text-xs">{{ $datapendaftar->firstItem() + $index }}</td>
                            <td class="px-4 py-3">
                                <div class="font-semibold text-slate-800">{{ $pendaftar->nama }}</div>
                                <div class="text-xs text-slate-400">NIK: {{ $pendaftar->nik }}</div>
                            </td>
                            <td class="px-4 py-3 text-slate-600 text-xs">{{ $pendaftar->email }}</td>
                            <td class="px-4 py-3 text-slate-600 text-xs">{{ $pendaftar->no_hp }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold
                                    {{ $pendaftar->jalur_program === 'RPL' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                                    {{ $pendaftar->jalur_program }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-slate-600 text-xs">
                                {{ $pendaftar->lokasi_ujian_kab_kota }}, {{ $pendaftar->lokasi_ujian_provinsi }}
                            </td>
                            <td class="px-4 py-3 text-slate-600 text-xs">
                                {{ $pendaftar->updated_at->format('d M Y') }}
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-emerald-100 text-emerald-700">
                                    ✓ Diterima
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <button @click="showConfirmModal=true; pendaftarToDeleteName='{{ addslashes($pendaftar->nama) }}'; pendaftarToDeleteUrl='{{ route('admin.delete', $pendaftar->id) }}'"
                                    class="bg-red-50 hover:bg-red-100 text-red-700 px-3 py-1.5 rounded-lg text-xs font-semibold transition">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center py-12 text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto mb-3 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                Belum ada siswa yang diterima.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-5 py-4 border-t border-slate-100 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs text-slate-500">
                <span>Menampilkan <strong>{{ $datapendaftar->firstItem() ?? 0 }}</strong>–<strong>{{ $datapendaftar->lastItem() ?? 0 }}</strong> dari <strong>{{ $datapendaftar->total() }}</strong> data</span>
                {{ $datapendaftar->appends(request()->only('search'))->links('pagination::tailwind') }}
            </div>
        </div>

        <!-- Delete Confirm Modal -->
        <div x-show="showConfirmModal" x-cloak class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm flex items-center justify-center z-50" @keydown.escape.window="showConfirmModal=false">
            <div @click.away="showConfirmModal=false" class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-sm mx-4">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                </div>
                <h2 class="text-lg font-bold text-center text-slate-800 mb-2">Konfirmasi Hapus</h2>
                <p class="text-sm text-slate-500 text-center mb-6">Yakin hapus data <strong class="text-slate-700" x-text="pendaftarToDeleteName"></strong>?</p>
                <div class="flex gap-3">
                    <button @click="showConfirmModal=false" class="flex-1 py-2.5 border border-slate-200 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-50 transition">Batal</button>
                    <form :action="pendaftarToDeleteUrl" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-xl text-sm font-semibold transition">Hapus</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-admin-layout>
