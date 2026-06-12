<x-user-layout>
    <x-slot name="title">Profil Saya</x-slot>

    <div class="max-w-7xl mx-auto space-y-6">

        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 relative overflow-hidden">
            <div
                class="absolute inset-0 opacity-5 bg-[radial-gradient(circle,_#3b5cff_1px,_transparent_1px)] [background-size:22px_22px]">
            </div>

            <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                <!-- Text -->
                <div>
                    <h2 class="font-outfit text-xl font-bold text-slate-800 flex items-center gap-2">
                        Profil Saya
                        <span class="text-xl">👤</span>
                    </h2>

                    <p class="text-sm text-slate-500 mt-0.5">
                        Informasi data diri dan pendaftaran Anda.
                    </p>
                </div>

                <!-- Action -->
                <a href="{{ route('user.profile.edit') }}"
                    class="group inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl transition-all duration-300 shadow-sm hover:shadow-md">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 group-hover:rotate-12 transition-transform duration-300" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>

                    <span class="font-semibold text-sm">
                        Edit Profil
                    </span>
                </a>
            </div>
        </div>


        @php
            $pendaftaran = App\Models\SalutPendaftaran::where('user_id', Auth::guard('web')->id())->first();
        @endphp

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Sidebar Info -->
            <div class="lg:col-span-1 space-y-6">
                <!-- Profile Picture Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 text-center">
                    <div class="relative inline-block">
                        @if ($pendaftaran && $pendaftaran->file_foto)
                            <img src="{{ asset('storage/' . $pendaftaran->file_foto) }}" alt="Profile Photo"
                                class="w-32 h-32 rounded-full object-cover mx-auto border-4 border-blue-100">
                        @else
                            <div
                                class="w-32 h-32 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center mx-auto">
                                <span class="text-4xl font-bold text-white">
                                    {{ substr(Auth::guard('web')->user()->name ?? 'U', 0, 1) }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <h3 class="mt-4 text-xl font-bold text-slate-800">{{ $pendaftaran && $pendaftaran->nama ? $pendaftaran->nama : Auth::guard('web')->user()->name }}</h3>
                    <p class="text-sm text-slate-500">{{ Auth::guard('web')->user()->email }}</p>

                    @if ($pendaftaran)
                        <div class="mt-4 pt-4 border-t border-slate-100">
                            <span
                                class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                @if ($pendaftaran->status_pendaftaran == 'diterima') bg-emerald-100 text-emerald-700
                                @elseif($pendaftaran->status_pendaftaran == 'pending') bg-amber-100 text-amber-700
                                @else bg-red-100 text-red-700 @endif">
                                {{ ucfirst($pendaftaran->status_pendaftaran) }}
                            </span>
                        </div>
                    @endif
                </div>

                <!-- Quick Info Card -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                    <h4 class="font-bold text-slate-800 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Informasi Cepat
                    </h4>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-500">Status Pendaftaran</span>
                            <span class="font-semibold text-slate-700">
                                {{ $pendaftaran ? ucfirst($pendaftaran->status_pendaftaran) : 'Belum Daftar' }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Jalur Program</span>
                            <span
                                class="font-semibold text-slate-700">{{ $pendaftaran && $pendaftaran->jalur_program ? $pendaftaran->jalur_program : '-' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-slate-500">Tanggal Daftar</span>

                            <span class="font-semibold text-slate-700">
                                {{ $pendaftaran && $pendaftaran->created_at
                                    ? $pendaftaran->created_at->locale('id')->translatedFormat('d F Y')
                                    : '-' }}
                            </span>
                        </div>
                        @if ($pendaftaran && $pendaftaran->no_ijazah)
                            <div class="flex justify-between">
                                <span class="text-slate-500">No. Ijazah</span>
                                <span class="font-semibold text-slate-700">{{ $pendaftaran->no_ijazah }}</span>
                            </div>
                        @endif
                        @if ($pendaftaran && $pendaftaran->ipk)
                            <div class="flex justify-between">
                                <span class="text-slate-500">IPK</span>
                                <span class="font-semibold text-slate-700">{{ $pendaftaran->ipk }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">

                @if ($pendaftaran)
                    <!-- Data Pribadi -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                        <div class="px-6 py-4 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100">
                            <h4 class="font-bold text-slate-800 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                Data Pribadi
                            </h4>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @if ($pendaftaran->nama)
                                    <div>
                                        <label class="text-xs font-semibold text-slate-400 uppercase">Nama
                                            Lengkap</label>
                                        <p class="text-slate-800 font-medium mt-1">{{ $pendaftaran->nama }}</p>
                                    </div>
                                @endif
                                @if ($pendaftaran->nik)
                                    <div>
                                        <label class="text-xs font-semibold text-slate-400 uppercase">NIK</label>
                                        <p class="text-slate-800 font-medium mt-1">{{ $pendaftaran->nik }}</p>
                                    </div>
                                @endif
                                @if ($pendaftaran->tempat_lahir || $pendaftaran->tanggal_lahir)
                                    <div>
                                        <label class="text-xs font-semibold text-slate-400 uppercase">
                                            Tempat, Tanggal Lahir
                                        </label>

                                        <p class="text-slate-800 font-medium mt-1">
                                            {{ $pendaftaran->tempat_lahir ?: '-' }},
                                            {{ $pendaftaran->tanggal_lahir
                                                ? \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->locale('id')->translatedFormat('d F Y')
                                                : '-' }}
                                        </p>
                                    </div>
                                @endif
                                @if ($pendaftaran->gender)
                                    <div>
                                        <label class="text-xs font-semibold text-slate-400 uppercase">Jenis
                                            Kelamin</label>
                                        <p class="text-slate-800 font-medium mt-1">
                                            {{ $pendaftaran->gender == 'laki-laki' ? 'Laki-laki' : ($pendaftaran->gender == 'perempuan' ? 'Perempuan' : $pendaftaran->gender) }}
                                        </p>
                                    </div>
                                @endif
                                @if ($pendaftaran->agama)
                                    <div>
                                        <label class="text-xs font-semibold text-slate-400 uppercase">Agama</label>
                                        <p class="text-slate-800 font-medium mt-1">{{ $pendaftaran->agama }}</p>
                                    </div>
                                @endif
                                @if ($pendaftaran->status)
                                    <div>
                                        <label class="text-xs font-semibold text-slate-400 uppercase">Status</label>
                                        <p class="text-slate-800 font-medium mt-1">{{ $pendaftaran->status }}</p>
                                    </div>
                                @endif
                                @if ($pendaftaran->no_hp)
                                    <div>
                                        <label class="text-xs font-semibold text-slate-400 uppercase">No. HP</label>
                                        <p class="text-slate-800 font-medium mt-1">{{ $pendaftaran->no_hp }}</p>
                                    </div>
                                @endif
                                @if ($pendaftaran->no_hp_alternatif)
                                    <div>
                                        <label class="text-xs font-semibold text-slate-400 uppercase">No. HP
                                            Alternatif</label>
                                        <p class="text-slate-800 font-medium mt-1">{{ $pendaftaran->no_hp_alternatif }}
                                        </p>
                                    </div>
                                @endif
                                @if ($pendaftaran->nama_ibu_kandung)
                                    <div>
                                        <label class="text-xs font-semibold text-slate-400 uppercase">Nama Ibu
                                            Kandung</label>
                                        <p class="text-slate-800 font-medium mt-1">{{ $pendaftaran->nama_ibu_kandung }}
                                        </p>
                                    </div>
                                @endif
                                @if ($pendaftaran->ukuran_almat)
                                    <div>
                                        <label class="text-xs font-semibold text-slate-400 uppercase">Ukuran
                                            Almat</label>
                                        <p class="text-slate-800 font-medium mt-1">{{ $pendaftaran->ukuran_almat }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Alamat -->
                    @if (
                        $pendaftaran->alamat ||
                            $pendaftaran->provinsi ||
                            $pendaftaran->kab_kota ||
                            $pendaftaran->kecamatan ||
                            $pendaftaran->desa_kelurahan ||
                            $pendaftaran->kode_pos ||
                            $pendaftaran->alamat_pengirim_modul)
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                            <div class="px-6 py-4 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100">
                                <h4 class="font-bold text-slate-800 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Alamat
                                </h4>
                            </div>
                            <div class="p-6">
                                <!-- Alamat 2 Kolom -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                                    <!-- KOLOM KIRI -->
                                    <div class="space-y-4">
                                        <!-- Alamat Sesuai KTP -->
                                        @if ($pendaftaran->alamat)
                                            <div>
                                                <label class="text-xs font-semibold text-slate-400 uppercase">Alamat
                                                    Sesuai KTP</label>
                                                <p class="text-slate-800 font-medium mt-1">{{ $pendaftaran->alamat }}
                                                </p>
                                            </div>
                                        @endif

                                        <!-- Desa/Kelurahan -->
                                        @if ($pendaftaran->desa_kelurahan && $pendaftaran->desa_kelurahan != 'NULL')
                                            <div>
                                                <label
                                                    class="text-xs font-semibold text-slate-400 uppercase">Desa/Kelurahan</label>
                                                <p class="text-slate-800 font-medium mt-1">
                                                    {{ $pendaftaran->desa_kelurahan }}</p>
                                            </div>
                                        @endif

                                        <!-- Kabupaten/Kota -->
                                        @if ($pendaftaran->kab_kota && $pendaftaran->kab_kota != 'NULL')
                                            <div>
                                                <label
                                                    class="text-xs font-semibold text-slate-400 uppercase">Kabupaten/Kota</label>
                                                <p class="text-slate-800 font-medium mt-1">
                                                    {{ $pendaftaran->kab_kota }}</p>
                                            </div>
                                        @endif

                                        <!-- Kode Pos -->
                                        @if ($pendaftaran->kode_pos && $pendaftaran->kode_pos != 'NULL')
                                            <div>
                                                <label class="text-xs font-semibold text-slate-400 uppercase">Kode
                                                    Pos</label>
                                                <p class="text-slate-800 font-medium mt-1">
                                                    {{ $pendaftaran->kode_pos }}</p>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- KOLOM KANAN -->
                                    <div class="space-y-4">
                                        <!-- Kecamatan -->
                                        @if ($pendaftaran->kecamatan && $pendaftaran->kecamatan != 'NULL')
                                            <div>
                                                <label
                                                    class="text-xs font-semibold text-slate-400 uppercase">Kecamatan</label>
                                                <p class="text-slate-800 font-medium mt-1">
                                                    {{ $pendaftaran->kecamatan }}</p>
                                            </div>
                                        @endif

                                        <!-- Provinsi -->
                                        @if ($pendaftaran->provinsi && $pendaftaran->provinsi != 'NULL')
                                            <div>
                                                <label
                                                    class="text-xs font-semibold text-slate-400 uppercase">Provinsi</label>
                                                <p class="text-slate-800 font-medium mt-1">
                                                    {{ $pendaftaran->provinsi }}</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Alamat Lainnya/Domisili (jika ada) -->
                                @if ($pendaftaran->alamat_lain && $pendaftaran->alamat_lain != 'NULL' && $pendaftaran->alamat_lain != '')
                                    <div class="mt-6 pt-4 border-t border-slate-100">
                                        <label class="text-xs font-semibold text-slate-400 uppercase">Alamat
                                            Lainnya/Domisili</label>
                                        <p class="text-slate-800 font-medium mt-1">{{ $pendaftaran->alamat_lain }}</p>
                                    </div>
                                @endif

                                <!-- Alamat Pengiriman Modul -->
                                @if ($pendaftaran->alamat_pengirim_modul)
    <div class="mt-6 pt-4 border-t border-slate-100">
        <div class="bg-blue-50 p-5 rounded-xl border border-blue-100">
            <div class="flex items-start gap-2 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <label class="text-sm font-bold text-blue-800">Alamat Pengiriman Modul</label>
            </div>
            
            <div class="pl-7">
                @php
                    $alamatPengiriman = $pendaftaran->alamat_pengirim_modul;
                    $alamatText = '';

                    if (strtolower($alamatPengiriman) == 'ya' || strtolower($alamatPengiriman) == 'y') {
                        // Jika pilih "Ya", tampilkan alamat KTP
                        if ($pendaftaran->alamat_lain && $pendaftaran->alamat_lain != 'NULL' && $pendaftaran->alamat_lain != '') {
                            $alamatText = nl2br(e($pendaftaran->alamat_lain));
                        } else {
                            $alamatParts = [];
                            if ($pendaftaran->alamat && $pendaftaran->alamat != 'NULL' && $pendaftaran->alamat != '') {
                                $alamatParts[] = e($pendaftaran->alamat);
                            }
                            if ($pendaftaran->desa_kelurahan && $pendaftaran->desa_kelurahan != 'NULL' && $pendaftaran->desa_kelurahan != '') {
                                $alamatParts[] = 'Kelurahan ' . e($pendaftaran->desa_kelurahan);
                            }
                            if ($pendaftaran->kecamatan && $pendaftaran->kecamatan != 'NULL' && $pendaftaran->kecamatan != '') {
                                $alamatParts[] = 'Kecamatan ' . e($pendaftaran->kecamatan);
                            }
                            if ($pendaftaran->kab_kota && $pendaftaran->kab_kota != 'NULL' && $pendaftaran->kab_kota != '') {
                                $alamatParts[] = '' . e($pendaftaran->kab_kota);
                            }
                            if ($pendaftaran->provinsi && $pendaftaran->provinsi != 'NULL' && $pendaftaran->provinsi != '') {
                                $alamatParts[] = 'Provinsi ' . e($pendaftaran->provinsi);
                            }
                            if ($pendaftaran->kode_pos && $pendaftaran->kode_pos != 'NULL' && $pendaftaran->kode_pos != '') {
                                $alamatParts[] = 'Kode Pos ' . e($pendaftaran->kode_pos);
                            }
                            $alamatText = implode(', ', $alamatParts);
                        }
                    } else {
                        // Jika pilih "Tidak", tampilkan isi dari alamat_lain
                        if ($pendaftaran->alamat_lain && $pendaftaran->alamat_lain != 'NULL' && $pendaftaran->alamat_lain != '') {
                            $alamatText = nl2br(e($pendaftaran->alamat_lain));
                        } else {
                            $alamatText = '<span class="text-red-500 italic">Belum diisi</span>';
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
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                            <div class="px-6 py-4 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100">
                                <h4 class="font-bold text-slate-800 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                    Lokasi Ujian
                                </h4>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @if ($pendaftaran->lokasi_ujian_provinsi)
                                        <div>
                                            <label class="text-xs font-semibold text-slate-400 uppercase">Provinsi
                                                Ujian</label>
                                            <p class="text-slate-800 font-medium mt-1">
                                                {{ $pendaftaran->lokasi_ujian_provinsi }}</p>
                                        </div>
                                    @endif
                                    @if ($pendaftaran->lokasi_ujian_kab_kota)
                                        <div>
                                            <label class="text-xs font-semibold text-slate-400 uppercase">Kab/Kota
                                                Ujian</label>
                                            <p class="text-slate-800 font-medium mt-1">
                                                {{ $pendaftaran->lokasi_ujian_kab_kota }}</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Dokumen -->
                    <!-- Dokumen -->
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
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                            <div class="px-6 py-4 bg-gradient-to-r from-slate-50 to-white border-b border-slate-100">
                                <h4 class="font-bold text-slate-800 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Dokumen yang Diupload
                                </h4>
                            </div>
                            <div class="p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                    <!-- DOKUMEN WAJIB (SEMUA JALUR) -->

                                    @if ($pendaftaran->file_foto)
                                        <div>
                                            <label class="text-xs font-semibold text-slate-400 uppercase">Pas Foto
                                                Resmi</label>
                                            <p class="mt-1">
                                                <a href="{{ asset('storage/' . $pendaftaran->file_foto) }}"
                                                    target="_blank"
                                                    class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Lihat Pas Foto
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                    @if ($pendaftaran->file_ktp)
                                        <div>
                                            <label class="text-xs font-semibold text-slate-400 uppercase">Scan KTP
                                                Asli</label>
                                            <p class="mt-1">
                                                <a href="{{ asset('storage/' . $pendaftaran->file_ktp) }}"
                                                    target="_blank"
                                                    class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Lihat KTP
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                    @if ($pendaftaran->file_ijazah)
                                        <div>
                                            <label class="text-xs font-semibold text-slate-400 uppercase">Scan Ijazah
                                                Terakhir</label>
                                            <p class="mt-1">
                                                <a href="{{ asset('storage/' . $pendaftaran->file_ijazah) }}"
                                                    target="_blank"
                                                    class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Lihat Ijazah
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                    @if ($pendaftaran->file_transkrip)
                                        <div>
                                            <label class="text-xs font-semibold text-slate-400 uppercase">Transkrip
                                                Nilai / SKHUN</label>
                                            <p class="mt-1">
                                                <a href="{{ asset('storage/' . $pendaftaran->file_transkrip) }}"
                                                    target="_blank"
                                                    class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Lihat Transkrip
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                    @if ($pendaftaran->file_bukti_pembayaran)
                                        <div>
                                            <label class="text-xs font-semibold text-slate-400 uppercase">Bukti
                                                Transfer Pembayaran</label>
                                            <p class="mt-1">
                                                <a href="{{ asset('storage/' . $pendaftaran->file_bukti_pembayaran) }}"
                                                    target="_blank"
                                                    class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Lihat Bukti Bayar
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                    @if ($pendaftaran->surat_pernyataan)
                                        <div>
                                            <label class="text-xs font-semibold text-slate-400 uppercase">Surat
                                                Pernyataan Keabsahan Berkas</label>
                                            <p class="mt-1">
                                                <a href="{{ asset('storage/' . $pendaftaran->surat_pernyataan) }}"
                                                    target="_blank"
                                                    class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Lihat Surat Pernyataan
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                    <!-- DOKUMEN KHUSUS RPL -->

                                    @if ($pendaftaran->file_ss_pddikti)
                                        <div>
                                            <label class="text-xs font-semibold text-slate-400 uppercase">Screenshot
                                                PDDIKTI</label>
                                            <p class="mt-1">
                                                <a href="{{ asset('storage/' . $pendaftaran->file_ss_pddikti) }}"
                                                    target="_blank"
                                                    class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Lihat SS PDDikti
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                    @if ($pendaftaran->file_cv)
                                        <div>
                                            <label class="text-xs font-semibold text-slate-400 uppercase">Daftar
                                                Riwayat Hidup (CV)</label>
                                            <p class="mt-1">
                                                <a href="{{ asset('storage/' . $pendaftaran->file_cv) }}"
                                                    target="_blank"
                                                    class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Lihat CV
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                    @if ($pendaftaran->file_rpl_pembelajaran)
                                        <div>
                                            <label class="text-xs font-semibold text-slate-400 uppercase">Dokumen
                                                Perangkat Pembelajaran</label>
                                            <p class="mt-1">
                                                <a href="{{ asset('storage/' . $pendaftaran->file_rpl_pembelajaran) }}"
                                                    target="_blank"
                                                    class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Lihat Dokumen
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                    @if ($pendaftaran->file_rpl_administrasi)
                                        <div>
                                            <label class="text-xs font-semibold text-slate-400 uppercase">Dokumen
                                                Administrasi Kelas</label>
                                            <p class="mt-1">
                                                <a href="{{ asset('storage/' . $pendaftaran->file_rpl_administrasi) }}"
                                                    target="_blank"
                                                    class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Lihat Dokumen
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                    @if ($pendaftaran->file_rpl_ekstrakulikuler)
                                        <div>
                                            <label class="text-xs font-semibold text-slate-400 uppercase">Dokumen
                                                Pembina Ekstrakurikuler</label>
                                            <p class="mt-1">
                                                <a href="{{ asset('storage/' . $pendaftaran->file_rpl_ekstrakulikuler) }}"
                                                    target="_blank"
                                                    class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Lihat Dokumen
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                    @if ($pendaftaran->file_rpl_prestasi)
                                        <div>
                                            <label class="text-xs font-semibold text-slate-400 uppercase">Sertifikat
                                                Penghargaan / Prestasi</label>
                                            <p class="mt-1">
                                                <a href="{{ asset('storage/' . $pendaftaran->file_rpl_prestasi) }}"
                                                    target="_blank"
                                                    class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Lihat Sertifikat
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                    @if ($pendaftaran->surat_keterangan_pindah)
                                        <div>
                                            <label class="text-xs font-semibold text-slate-400 uppercase">Surat
                                                Keterangan Pindah (Dari Kampus Asal)</label>
                                            <p class="mt-1">
                                                <a href="{{ asset('storage/' . $pendaftaran->surat_keterangan_pindah) }}"
                                                    target="_blank"
                                                    class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                    </svg>
                                                    Lihat Surat
                                                </a>
                                            </p>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <!-- Belum Mendaftar -->
                    <div class="bg-white rounded-2xl p-12 shadow-sm border border-slate-100 text-center">
                        <div class="w-20 h-20 mx-auto bg-amber-100 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-amber-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-2">Belum Melakukan Pendaftaran</h3>
                        <p class="text-slate-500 mb-6">Anda belum mengisi formulir pendaftaran. Silakan lengkapi data
                            diri Anda terlebih dahulu.</p>
                        <a href="{{ route('pendaftaran') }}"
                            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Isi Formulir Pendaftaran
                        </a>
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
            }).then((result) => {
                // Refresh halaman atau biarkan saja
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('Alert ditutup otomatis');
                }
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

            // Jika tidak ada error spesifik, tampilkan error pertama
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
