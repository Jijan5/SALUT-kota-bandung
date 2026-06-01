<x-admin-layout>
    <x-slot name="title">Data Pendaftar Baru</x-slot>

    <div x-data="{
        showConfirmModal: false,
        pendaftarToDeleteName: '',
        pendaftarToDeleteUrl: '',
        showDrawer: false,
        drawerData: {}
    }" class="max-w-full">

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
                    <h2 class="font-outfit text-xl font-bold text-slate-800">Data Pendaftar Baru</h2>
                    <p class="text-xs text-slate-500 mt-0.5">Kelola dan verifikasi berkas calon mahasiswa</p>
                </div>
                <form action="{{ route('admin.index') }}" method="GET">
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                        <input type="text" name="search" placeholder="Cari nama atau NIK..." value="{{ request('search') }}"
                            class="pl-9 pr-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 w-64">
                    </div>
                </form>
            </div>
        </div>

        <!-- Table Card -->
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
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold
                                    {{ $pendaftar->status === 'diterima' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700' }}">
                                    {{ $pendaftar->status ?? 'Pending' }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-center gap-1.5">
                                    <!-- Detail Button -->
                                    <button @click="
                                        drawerData = {
                                            nama: '{{ addslashes($pendaftar->nama) }}',
                                            nik: '{{ $pendaftar->nik }}',
                                            email: '{{ $pendaftar->email }}',
                                            no_hp: '{{ $pendaftar->no_hp }}',
                                            no_hp_alt: '{{ $pendaftar->no_hp_alternatif }}',
                                            tempat_lahir: '{{ addslashes($pendaftar->tempat_lahir) }}',
                                            tanggal_lahir: '{{ $pendaftar->tanggal_lahir }}',
                                            gender: '{{ $pendaftar->gender }}',
                                            agama: '{{ $pendaftar->agama }}',
                                            status_kawin: '{{ $pendaftar->status }}',
                                            alamat: '{{ addslashes($pendaftar->alamat) }}',
                                            provinsi: '{{ addslashes($pendaftar->provinsi) }}',
                                            kab_kota: '{{ addslashes($pendaftar->kab_kota) }}',
                                            kecamatan: '{{ addslashes($pendaftar->kecamatan) }}',
                                            desa: '{{ addslashes($pendaftar->desa_kelurahan) }}',
                                            kode_pos: '{{ $pendaftar->kode_pos }}',
                                            jalur: '{{ $pendaftar->jalur_program }}',
                                            lokasi_prov: '{{ addslashes($pendaftar->lokasi_ujian_provinsi) }}',
                                            lokasi_kab: '{{ addslashes($pendaftar->lokasi_ujian_kab_kota) }}',
                                            ukuran: '{{ $pendaftar->ukuran_almat }}',
                                            ibu: '{{ addslashes($pendaftar->nama_ibu_kandung) }}',
                                            ipk: '{{ $pendaftar->ipk }}',
                                            no_ijazah: '{{ $pendaftar->no_ijazah }}',
                                            file_foto: '{{ $pendaftar->file_foto ? asset('storage/'.$pendaftar->file_foto) : '' }}',
                                            file_ktp: '{{ $pendaftar->file_ktp ? asset('storage/'.$pendaftar->file_ktp) : '' }}',
                                            file_ijazah: '{{ $pendaftar->file_ijazah ? asset('storage/'.$pendaftar->file_ijazah) : '' }}',
                                            file_transkrip: '{{ $pendaftar->file_transkrip ? asset('storage/'.$pendaftar->file_transkrip) : '' }}',
                                            surat_pernyataan: '{{ $pendaftar->surat_pernyataan ? asset('storage/'.$pendaftar->surat_pernyataan) : '' }}',
                                            file_cv: '{{ $pendaftar->file_cv ? asset('storage/'.$pendaftar->file_cv) : '' }}',
                                            file_ss_pddikti: '{{ $pendaftar->file_ss_pddikti ? asset('storage/'.$pendaftar->file_ss_pddikti) : '' }}',
                                            file_bukti: '{{ $pendaftar->file_bukti_pembayaran ? asset('storage/'.$pendaftar->file_bukti_pembayaran) : '' }}',
                                            surat_pindah: '{{ $pendaftar->surat_keterangan_pindah ? asset('storage/'.$pendaftar->surat_keterangan_pindah) : '' }}'
                                        };
                                        showDrawer = true;"
                                        class="bg-blue-50 hover:bg-blue-100 text-blue-700 px-3 py-1.5 rounded-lg text-xs font-semibold transition">
                                        Detail
                                    </button>

                                    <!-- Edit -->
                                    <a href="{{ route('admin.edit', $pendaftar->id) }}"
                                        class="bg-amber-50 hover:bg-amber-100 text-amber-700 px-3 py-1.5 rounded-lg text-xs font-semibold transition">
                                        Edit
                                    </a>

                                    <!-- Terima -->
                                    <form action="{{ route('admin.terima', $pendaftar->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="bg-emerald-50 hover:bg-emerald-100 text-emerald-700 px-3 py-1.5 rounded-lg text-xs font-semibold transition">
                                            Terima
                                        </button>
                                    </form>

                                    <!-- Hapus -->
                                    <button @click="showConfirmModal=true; pendaftarToDeleteName='{{ addslashes($pendaftar->nama) }}'; pendaftarToDeleteUrl='{{ route('admin.delete', $pendaftar->id) }}'"
                                        class="bg-red-50 hover:bg-red-100 text-red-700 px-3 py-1.5 rounded-lg text-xs font-semibold transition">
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-12 text-slate-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto mb-3 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                                Belum ada data pendaftar.
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

        <!-- ===== DETAIL DRAWER ===== -->
        <div x-show="showDrawer" x-cloak class="fixed inset-0 z-50 flex" @keydown.escape.window="showDrawer=false">
            <!-- Backdrop -->
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="showDrawer=false"></div>

            <!-- Drawer Panel -->
            <div class="relative ml-auto w-full max-w-3xl bg-white shadow-2xl flex flex-col h-full overflow-hidden"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full">

                <!-- Drawer Header -->
                <div class="flex items-center justify-between p-5 border-b border-slate-100 bg-slate-50">
                    <div>
                        <h3 class="font-outfit text-lg font-bold text-slate-800" x-text="drawerData.nama"></h3>
                        <p class="text-xs text-slate-500 mt-0.5">NIK: <span x-text="drawerData.nik"></span></p>
                    </div>
                    <button @click="showDrawer=false" class="p-2 rounded-xl hover:bg-slate-200 transition text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                    </button>
                </div>

                <!-- Drawer Body -->
                <div class="flex-1 overflow-y-auto p-5 space-y-6">

                    <!-- Personal Info -->
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Informasi Pribadi</h4>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-slate-50 rounded-xl p-3"><p class="text-xs text-slate-400">Tempat, Tgl Lahir</p><p class="text-sm font-semibold text-slate-700 mt-0.5" x-text="drawerData.tempat_lahir + ', ' + drawerData.tanggal_lahir"></p></div>
                            <div class="bg-slate-50 rounded-xl p-3"><p class="text-xs text-slate-400">Jenis Kelamin</p><p class="text-sm font-semibold text-slate-700 mt-0.5" x-text="drawerData.gender"></p></div>
                            <div class="bg-slate-50 rounded-xl p-3"><p class="text-xs text-slate-400">Agama</p><p class="text-sm font-semibold text-slate-700 mt-0.5" x-text="drawerData.agama"></p></div>
                            <div class="bg-slate-50 rounded-xl p-3"><p class="text-xs text-slate-400">Status Perkawinan</p><p class="text-sm font-semibold text-slate-700 mt-0.5" x-text="drawerData.status_kawin"></p></div>
                            <div class="bg-slate-50 rounded-xl p-3"><p class="text-xs text-slate-400">Nama Ibu Kandung</p><p class="text-sm font-semibold text-slate-700 mt-0.5" x-text="drawerData.ibu"></p></div>
                            <div class="bg-slate-50 rounded-xl p-3"><p class="text-xs text-slate-400">Ukuran Almamater</p><p class="text-sm font-semibold text-slate-700 mt-0.5" x-text="drawerData.ukuran"></p></div>
                        </div>
                    </div>

                    <!-- Contact & Address -->
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Kontak & Alamat</h4>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-slate-50 rounded-xl p-3"><p class="text-xs text-slate-400">Email</p><p class="text-sm font-semibold text-slate-700 mt-0.5" x-text="drawerData.email"></p></div>
                            <div class="bg-slate-50 rounded-xl p-3"><p class="text-xs text-slate-400">No. HP</p><p class="text-sm font-semibold text-slate-700 mt-0.5" x-text="drawerData.no_hp"></p></div>
                            <div class="bg-slate-50 rounded-xl p-3 col-span-2"><p class="text-xs text-slate-400">Alamat Lengkap</p><p class="text-sm font-semibold text-slate-700 mt-0.5" x-text="drawerData.alamat + ', ' + drawerData.desa + ', ' + drawerData.kecamatan + ', ' + drawerData.kab_kota + ', ' + drawerData.provinsi + ' ' + drawerData.kode_pos"></p></div>
                        </div>
                    </div>

                    <!-- Academic Info -->
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Data Akademik</h4>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="bg-slate-50 rounded-xl p-3"><p class="text-xs text-slate-400">Jalur Program</p><p class="text-sm font-semibold text-slate-700 mt-0.5" x-text="drawerData.jalur"></p></div>
                            <div class="bg-slate-50 rounded-xl p-3"><p class="text-xs text-slate-400">No. Ijazah</p><p class="text-sm font-semibold text-slate-700 mt-0.5" x-text="drawerData.no_ijazah"></p></div>
                            <div class="bg-slate-50 rounded-xl p-3"><p class="text-xs text-slate-400">IPK (RPL)</p><p class="text-sm font-semibold text-slate-700 mt-0.5" x-text="drawerData.ipk || '-'"></p></div>
                            <div class="bg-slate-50 rounded-xl p-3"><p class="text-xs text-slate-400">Lokasi Ujian</p><p class="text-sm font-semibold text-slate-700 mt-0.5" x-text="drawerData.lokasi_kab + ', ' + drawerData.lokasi_prov"></p></div>
                        </div>
                    </div>

                    <!-- Documents -->
                    <div>
                        <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Berkas Dokumen</h4>
                        <div class="grid grid-cols-2 gap-2">
                            <template x-for="doc in [
                                {label: 'Pas Foto', key: 'file_foto'},
                                {label: 'KTP', key: 'file_ktp'},
                                {label: 'Ijazah', key: 'file_ijazah'},
                                {label: 'Transkrip', key: 'file_transkrip'},
                                {label: 'Surat Pernyataan', key: 'surat_pernyataan'},
                                {label: 'CV', key: 'file_cv'},
                                {label: 'Screenshot PDDIKTI', key: 'file_ss_pddikti'},
                                {label: 'Bukti Pembayaran', key: 'file_bukti'},
                                {label: 'Surat Pindah', key: 'surat_pindah'}
                            ]">
                                <div class="flex items-center justify-between bg-slate-50 rounded-xl p-3">
                                    <span class="text-xs font-medium text-slate-600" x-text="doc.label"></span>
                                    <a :href="drawerData[doc.key]" target="_blank"
                                        x-show="drawerData[doc.key]"
                                        class="text-xs font-bold text-blue-600 hover:text-blue-800 transition">
                                        Lihat ↗
                                    </a>
                                    <span x-show="!drawerData[doc.key]" class="text-xs text-slate-400">-</span>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirm Modal -->
        <div x-show="showConfirmModal" x-cloak class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm flex items-center justify-center z-50" @keydown.escape.window="showConfirmModal=false">
            <div @click.away="showConfirmModal=false" class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-sm mx-4">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                </div>
                <h2 class="text-lg font-bold text-center text-slate-800 mb-2">Konfirmasi Hapus</h2>
                <p class="text-sm text-slate-500 text-center mb-6">Yakin hapus data <strong class="text-slate-700" x-text="pendaftarToDeleteName"></strong>? Tindakan ini tidak dapat dibatalkan.</p>
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
