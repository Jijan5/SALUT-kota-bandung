<x-user-layout>
    <x-slot name="title">Edit Profil Lengkap</x-slot>

    <div class="max-w-7xl mx-auto space-y-6">
        <!-- Header Baru (Design Admin) -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5 mb-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <h2 class="font-outfit text-xl font-bold text-slate-800">Edit Profil Lengkap</h2>
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wide {{ ($pendaftaran->jalur_program ?? 'Non-RPL') === 'RPL' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                        JALUR {{ $pendaftaran->jalur_program ?? 'Non-RPL' }}
                    </span>
                </div>
                <p class="text-xs text-slate-500 mt-0.5">Perbarui semua informasi data diri dan dokumen Anda</p>
            </div>
            <a href="{{ route('user.profile') }}"
                class="inline-flex items-center space-x-2 text-sm font-semibold text-slate-500 hover:text-slate-700 transition bg-slate-50 border border-slate-200 px-4 py-2 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali</span>
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 rounded-xl p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Terjadi kesalahan:</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden p-6 md:p-8">
            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Data Pribadi -->
                <h3 class="text-lg font-bold text-slate-800 font-outfit mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Data Pribadi
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- SEMUA INPUT DATA PRIBADI SAMA PERSIS DENGAN KODE ASLI ANDA -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap (Sesuai Ijazah) <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nama" value="{{ old('nama', $pendaftaran->nama ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">NIK <span
                                class="text-red-500">*</span></label>
                        <input type="text" name="nik" value="{{ old('nik', $pendaftaran->nik ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir"
                            value="{{ old('tempat_lahir', $pendaftaran->tempat_lahir ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $pendaftaran->tanggal_lahir ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Jenis Kelamin</label>
                        <select name="gender" class="w-full px-4 py-2 border rounded-lg">
                            <option value="">Pilih</option>
                            <option value="laki-laki"
                                {{ old('gender', $pendaftaran->gender ?? '') == 'laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="perempuan"
                                {{ old('gender', $pendaftaran->gender ?? '') == 'perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Agama</label>
                        <select name="agama" class="w-full px-4 py-2 border rounded-lg">
                            <option value="">Pilih</option>
                            @foreach (['islam', 'kristen', 'katolik', 'hindu', 'buddha', 'konghucu'] as $agama)
                                <option value="{{ $agama }}"
                                    {{ old('agama', $pendaftaran->agama ?? '') == $agama ? 'selected' : '' }}>
                                    {{ ucfirst($agama) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Status Perkawinan</label>
                        <select name="status" class="w-full px-4 py-2 border rounded-lg">
                            <option value="">Pilih Status</option>
                            <option value="Kawin"
                                {{ old('status', $pendaftaran->status ?? '') == 'Kawin' ? 'selected' : '' }}>Kawin
                            </option>
                            <option value="Belum Kawin"
                                {{ old('status', $pendaftaran->status ?? '') == 'Belum Kawin' ? 'selected' : '' }}>
                                Belum Kawin</option>
                            <option value="Cerai Hidup"
                                {{ old('status', $pendaftaran->status ?? '') == 'Cerai Hidup' ? 'selected' : '' }}>
                                Cerai Hidup</option>
                            <option value="Cerai Mati"
                                {{ old('status', $pendaftaran->status ?? '') == 'Cerai Mati' ? 'selected' : '' }}>Cerai
                                Mati</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">No. HP (WhatsApp Aktif)</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp', $pendaftaran->no_hp ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">No. HP Alternatif / Kerabat</label>
                        <input type="text" name="no_hp_alternatif"
                            value="{{ old('no_hp_alternatif', $pendaftaran->no_hp_alternatif ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Nama Ibu Kandung</label>
                        <input type="text" name="nama_ibu_kandung"
                            value="{{ old('nama_ibu_kandung', $pendaftaran->nama_ibu_kandung ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Ukuran Jas Almamater
                            (Opsional)</label>
                        <select name="ukuran_almat" class="w-full px-4 py-2 border rounded-lg">
                            <option value="">Pilih Ukuran</option>
                            <option value="S"
                                {{ old('ukuran_almat', $pendaftaran->ukuran_almat ?? '') == 'S' ? 'selected' : '' }}>S
                                (Small)</option>
                            <option value="M"
                                {{ old('ukuran_almat', $pendaftaran->ukuran_almat ?? '') == 'M' ? 'selected' : '' }}>M
                                (Medium)</option>
                            <option value="L"
                                {{ old('ukuran_almat', $pendaftaran->ukuran_almat ?? '') == 'L' ? 'selected' : '' }}>L
                                (Large)</option>
                            <option value="XL"
                                {{ old('ukuran_almat', $pendaftaran->ukuran_almat ?? '') == 'XL' ? 'selected' : '' }}>
                                XL (Extra Large)</option>
                            <option value="XXL"
                                {{ old('ukuran_almat', $pendaftaran->ukuran_almat ?? '') == 'XXL' ? 'selected' : '' }}>
                                XXL (Double Extra Large)</option>
                            <option value="XXXL"
                                {{ old('ukuran_almat', $pendaftaran->ukuran_almat ?? '') == 'XXXL' ? 'selected' : '' }}>
                                XXXL (Triple Extra Large)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Nomor Ijazah Kelulusan
                            Terakhir</label>
                        <input type="text" name="no_ijazah"
                            value="{{ old('no_ijazah', $pendaftaran->no_ijazah ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div id="ipk_field_wrapper">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Nilai IPK Kelulusan (khusus RPL /
                            Alih Kredit)</label>
                        <input type="text" name="ipk" value="{{ old('ipk', $pendaftaran->ipk ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg">
                    </div>
                </div>

                <div class="h-px bg-slate-100 my-8"></div>

                <!-- Alamat Sesuai KTP -->
                <h3 class="text-lg font-bold text-slate-800 font-outfit mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    </svg>
                    Alamat Sesuai KTP
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Provinsi <span
                                class="text-red-500">*</span></label>
                        <select id="provinsi" name="provinsi" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Provinsi</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Kabupaten/Kota <span
                                class="text-red-500">*</span></label>
                        <select id="kab_kota" name="kab_kota" required disabled
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 disabled:bg-slate-100">
                            <option value="">Pilih Provinsi Dahulu</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Kecamatan <span
                                class="text-red-500">*</span></label>
                        <select id="kecamatan" name="kecamatan" required disabled
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 disabled:bg-slate-100">
                            <option value="">Pilih Kabupaten/Kota Dahulu</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Kelurahan/Desa <span
                                class="text-red-500">*</span></label>
                        <select id="desa_kelurahan" name="desa_kelurahan" required disabled
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 disabled:bg-slate-100">
                            <option value="">Pilih Kecamatan Dahulu</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Kode Pos <span
                                class="text-red-500">*</span></label>
                        <input type="text" id="kode_pos" name="kode_pos" required
                            value="{{ old('kode_pos', $pendaftaran->kode_pos ?? '') }}"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Alamat Lengkap (Jalan, RT/RW, No.
                            Rumah) <span class="text-red-500">*</span></label>
                        <textarea name="alamat" id="alamat" rows="3" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('alamat', $pendaftaran->alamat ?? '') }}</textarea>
                    </div>
                    <div class="md:col-span-2 bg-slate-50 p-5 rounded-xl border border-slate-100">
                        <label class="block text-sm font-semibold text-slate-700 mb-3">Apakah alamat pengiriman modul
                            kuliah sama dengan alamat KTP? <span class="text-red-500">*</span></label>
                        <div class="flex space-x-6">
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="radio" name="alamat_pengirim_modul" value="ya"
                                    id="alamat_pengirim_modul_ya"
                                    {{ old('alamat_pengirim_modul', $pendaftaran->alamat_pengirim_modul ?? '') == 'ya' ? 'checked' : '' }}
                                    class="h-4 w-4 text-blue-600 border-slate-300 focus:ring-blue-500">
                                <span class="text-sm font-medium text-slate-700">Ya, sama dengan KTP</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="radio" name="alamat_pengirim_modul" value="tidak"
                                    id="alamat_pengirim_modul_tidak"
                                    {{ old('alamat_pengirim_modul', $pendaftaran->alamat_pengirim_modul ?? '') == 'tidak' ? 'checked' : '' }}
                                    class="h-4 w-4 text-blue-600 border-slate-300 focus:ring-blue-500">
                                <span class="text-sm font-medium text-slate-700">Tidak, kirim ke alamat lain</span>
                            </label>
                        </div>
                    </div>
                    <div class="md:col-span-2" id="alamat_lain_wrapper"
                        style="display: {{ old('alamat_pengirim_modul', $pendaftaran->alamat_pengirim_modul ?? '') == 'tidak' ? 'block' : 'none' }};">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Alamat Pengiriman Modul Lainnya
                            <span id="alamat_lain_required"
                                class="text-red-500 {{ old('alamat_pengirim_modul', $pendaftaran->alamat_pengirim_modul ?? '') == 'tidak' ? '' : 'hidden' }}">*</span>
                        </label>
                        <textarea name="alamat_lain" id="alamat_lain" rows="3"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            {{ old('alamat_pengirim_modul', $pendaftaran->alamat_pengirim_modul ?? '') == 'tidak' ? '' : 'disabled' }}>{{ old('alamat_lain', $pendaftaran->alamat_lain ?? '') }}</textarea>
                    </div>
                </div>

                <div class="h-px bg-slate-100 my-8"></div>

                <!-- Jalur Program & Lokasi Ujian -->
                <h3 class="text-lg font-bold text-slate-800 font-outfit mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    Jalur Program & Lokasi Ujian
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Jalur Pendaftaran Program</label>
                        <select name="jalur_program" id="jalur_program_select"
                            class="w-full px-4 py-2 border rounded-lg">
                            <option value="">Pilih Jalur</option>
                            <option value="RPL"
                                {{ old('jalur_program', $pendaftaran->jalur_program ?? '') == 'RPL' ? 'selected' : '' }}>
                                RPL (Rekognisi Pembelajaran Lampau)</option>
                            <option value="Non-RPL"
                                {{ old('jalur_program', $pendaftaran->jalur_program ?? '') == 'Non-RPL' ? 'selected' : '' }}>
                                Reguler (Non-RPL / Lulusan SMA Baru)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Lokasi Tempat Ujian (Provinsi)
                            <span class="text-red-500">*</span></label>
                        <select id="lokasi_ujian_provinsi" name="lokasi_ujian_provinsi" required
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Pilih Provinsi Ujian</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Lokasi Tempat Ujian
                            (Kabupaten/Kota) <span class="text-red-500">*</span></label>
                        <select id="lokasi_ujian_kab_kota" name="lokasi_ujian_kab_kota" required disabled
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 disabled:bg-slate-100">
                            <option value="">Pilih Provinsi Ujian Dahulu</option>
                        </select>
                    </div>
                </div>

                <div class="h-px bg-slate-100 my-8"></div>

                <!-- Dokumen Pendukung - SAMA PERSIS DENGAN KODE ASLI ANDA -->
                <h3 class="text-lg font-bold text-slate-800 font-outfit mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Dokumen Pendukung
                </h3>

                <!-- DOKUMEN WAJIB (SEMUA JALUR) -->
                <div class="mb-8">
                    <h5
                        class="text-md font-semibold text-slate-800 mb-4 pb-2 border-b border-slate-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Dokumen Wajib (Semua Jalur)
                    </h5>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Pas Foto Resmi -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Pas Foto Resmi <span
                                    class="text-red-500">*</span></label>
                            <p class="text-xs text-slate-400 mb-2">Format: JPG, JPEG, PNG (Maks 2MB). Background
                                biru/merah, rapi dan formal.</p>
                            @if ($pendaftaran && $pendaftaran->file_foto)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $pendaftaran->file_foto) }}" target="_blank"
                                        class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat file saat ini
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="file_foto" accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                                class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                            <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin mengganti file. Maks 2MB
                            </p>
                        </div>

                        <!-- Scan KTP -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Foto / Scan KTP Asli <span
                                    class="text-red-500">*</span></label>
                            <p class="text-xs text-slate-400 mb-2">Format: JPG, JPEG, PNG (Maks 2MB). Pastikan NIK dan
                                tulisan terbaca jelas.</p>
                            @if ($pendaftaran && $pendaftaran->file_ktp)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $pendaftaran->file_ktp) }}" target="_blank"
                                        class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat file saat ini
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="file_ktp" accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                                class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                            <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin mengganti file. Maks 2MB
                            </p>
                        </div>

                        <!-- Scan Ijazah -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2" id="label_file_ijazah">Scan
                                Ijazah Terakhir <span class="text-red-500">*</span></label>
                            <p class="text-xs text-slate-400 mb-2">Format: PDF (Maks 2MB). Ijazah asli atau fotokopi
                                yang sudah dilegalisir.</p>
                            @if ($pendaftaran && $pendaftaran->file_ijazah)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $pendaftaran->file_ijazah) }}" target="_blank"
                                        class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat file saat ini
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="file_ijazah" accept=".pdf,application/pdf"
                                class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                            <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin mengganti file. Maks 2MB
                            </p>
                        </div>

                        <!-- Scan Transkrip Nilai -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2"
                                id="label_file_transkrip">Scan Transkrip Nilai / SKHUN</label>
                            <p class="text-xs text-slate-400 mb-2">Format: PDF (Maks 2MB). Transkrip nilai atau SKHUN
                                dari jenjang pendidikan terakhir.</p>
                            @if ($pendaftaran && $pendaftaran->file_transkrip)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $pendaftaran->file_transkrip) }}" target="_blank"
                                        class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat file saat ini
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="file_transkrip" accept=".pdf,application/pdf"
                                class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                            <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin mengganti file. Maks 2MB
                            </p>
                        </div>

                        <!-- Bukti Pembayaran -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Bukti Transfer Pembayaran
                                <span class="text-red-500">*</span></label>
                            <p class="text-xs text-slate-400 mb-2">Format: JPG, JPEG, PNG (Maks 2MB). Foto/scan bukti
                                transfer biaya pendaftaran.</p>
                            @if ($pendaftaran && $pendaftaran->file_bukti_pembayaran)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $pendaftaran->file_bukti_pembayaran) }}"
                                        target="_blank"
                                        class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat file saat ini
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="file_bukti_pembayaran"
                                accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                                class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                            <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin mengganti file. Maks 2MB
                            </p>
                        </div>

                        <!-- Surat Pernyataan Keabsahan Berkas -->
                        <div>
                            <div class="flex justify-between items-start mb-1">
                                <label class="block text-sm font-medium text-slate-700">Surat Pernyataan Keabsahan
                                    Berkas <span class="text-red-500">*</span></label>
                                <a href="https://salutbandung.com/pernyataan-keabsahan" target="_blank"
                                    class="text-xs text-blue-600 hover:underline font-bold flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Unduh Formulir
                                </a>
                            </div>
                            <p class="text-xs text-slate-400 mb-2">Format: PDF (Maks 2MB). Cetak, isi data, tanda
                                tangan materai 10rb, dan scan.</p>
                            @if ($pendaftaran && $pendaftaran->surat_pernyataan)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $pendaftaran->surat_pernyataan) }}"
                                        target="_blank"
                                        class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat file saat ini
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="surat_pernyataan" accept=".pdf,application/pdf"
                                class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                            <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin mengganti file. Maks 2MB
                            </p>
                        </div>
                    </div>
                </div>

                <!-- DOKUMEN KHUSUS RPL -->
                <div id="rpl_documents_section"
                    class="{{ ($pendaftaran->jalur_program ?? 'Non-RPL') == 'RPL' ? '' : 'hidden' }}">
                    <h5
                        class="text-md font-semibold text-slate-800 mb-4 pb-2 border-b border-slate-200 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-amber-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        Berkas Khusus Tambahan Alih Kredit (RPL)
                    </h5>
                    <p class="text-xs text-amber-600 mb-4">Berkas-berkas di bawah ini diwajibkan khusus untuk
                        verifikasi alih kredit mahasiswa alihan / lulusan diploma.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Screenshot PDDIKTI -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Tangkapan Layar (Screenshot)
                                PDDIKTI <span class="text-red-500">*</span></label>
                            <p class="text-xs text-slate-400 mb-2">Format: JPG, JPEG, PNG (Maks 2MB). Status terdaftar
                                aktif / lulus di Universitas lama.</p>
                            @if ($pendaftaran && $pendaftaran->file_ss_pddikti)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $pendaftaran->file_ss_pddikti) }}" target="_blank"
                                        class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat file saat ini
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="file_ss_pddikti"
                                accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                                class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                            <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin mengganti file. Maks 2MB
                            </p>
                        </div>

                        <!-- CV -->
                        <div>
                            <div class="flex justify-between items-start mb-1">
                                <label class="block text-sm font-medium text-slate-700">Daftar Riwayat Hidup (CV) <span
                                        class="text-red-500">*</span></label>
                                <a href="{{ asset('files/Formulir_Daftar_Riwayat_Hidup_Pemohon_0.docx') }}" download
                                    class="text-xs text-blue-600 hover:underline font-bold flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                    Unduh Formulir CV
                                </a>
                            </div>
                            <p class="text-xs text-slate-400 mb-2">Format: PDF (Maks 2MB). Unduh formulir di atas, isi
                                lengkap riwayat Anda, simpan sebagai PDF.</p>
                            @if ($pendaftaran && $pendaftaran->file_cv)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $pendaftaran->file_cv) }}" target="_blank"
                                        class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat file saat ini
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="file_cv" accept=".pdf,application/pdf"
                                class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                            <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin mengganti file. Maks 2MB
                            </p>
                        </div>

                        <!-- RPL Pembelajaran -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Dokumen Perangkat Pembelajaran
                                <span class="text-xs text-slate-400 font-normal">(Opsional)</span></label>
                            <p class="text-xs text-slate-400 mb-2">Format: PDF (Maks 2MB). RPP, Silabus, modul buatan
                                sendiri, atau instrumen evaluasi.</p>
                            @if ($pendaftaran && $pendaftaran->file_rpl_pembelajaran)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $pendaftaran->file_rpl_pembelajaran) }}"
                                        target="_blank"
                                        class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat file saat ini
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="file_rpl_pembelajaran" accept=".pdf,application/pdf"
                                class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                            <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin mengganti file. Maks 2MB
                            </p>
                        </div>

                        <!-- RPL Administrasi -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Dokumen Administrasi Kelas
                                <span class="text-xs text-slate-400 font-normal">(Opsional)</span></label>
                            <p class="text-xs text-slate-400 mb-2">Format: PDF (Maks 2MB). Surat keputusan pembagian
                                tugas mengajar, daftar nilai siswa, absensi.</p>
                            @if ($pendaftaran && $pendaftaran->file_rpl_administrasi)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $pendaftaran->file_rpl_administrasi) }}"
                                        target="_blank"
                                        class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat file saat ini
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="file_rpl_administrasi" accept=".pdf,application/pdf"
                                class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                            <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin mengganti file. Maks 2MB
                            </p>
                        </div>

                        <!-- RPL Ekstrakurikuler -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Dokumen Pembina
                                Ekstrakurikuler <span
                                    class="text-xs text-slate-400 font-normal">(Opsional)</span></label>
                            <p class="text-xs text-slate-400 mb-2">Format: PDF (Maks 2MB). SK Pembimbing/Pelatih
                                Ekskul, laporan program kerja ekskul.</p>
                            @if ($pendaftaran && $pendaftaran->file_rpl_ekstrakulikuler)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $pendaftaran->file_rpl_ekstrakulikuler) }}"
                                        target="_blank"
                                        class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat file saat ini
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="file_rpl_ekstrakulikuler" accept=".pdf,application/pdf"
                                class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                            <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin mengganti file. Maks 2MB
                            </p>
                        </div>

                        <!-- RPL Prestasi -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Sertifikat Penghargaan /
                                Prestasi <span class="text-xs text-slate-400 font-normal">(Opsional)</span></label>
                            <p class="text-xs text-slate-400 mb-2">Format: PDF (Maks 2MB). Sertifikat pelatihan, piagam
                                kejuaraan, atau penghargaan keahlian kerja.</p>
                            @if ($pendaftaran && $pendaftaran->file_rpl_prestasi)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $pendaftaran->file_rpl_prestasi) }}"
                                        target="_blank"
                                        class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat file saat ini
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="file_rpl_prestasi" accept=".pdf,application/pdf"
                                class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                            <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin mengganti file. Maks 2MB
                            </p>
                        </div>

                        <!-- Surat Keterangan Pindah -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Surat Keterangan Pindah (Dari
                                Kampus Asal) <span class="text-xs text-slate-400 font-normal">(Opsional)</span></label>
                            <p class="text-xs text-slate-400 mb-2">Format: PDF (Maks 2MB). Hanya bagi calon mahasiswa
                                pindahan antar universitas.</p>
                            @if ($pendaftaran && $pendaftaran->surat_keterangan_pindah)
                                <div class="mb-2">
                                    <a href="{{ asset('storage/' . $pendaftaran->surat_keterangan_pindah) }}"
                                        target="_blank"
                                        class="text-blue-600 hover:text-blue-700 text-sm flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Lihat file saat ini
                                    </a>
                                </div>
                            @endif
                            <input type="file" name="surat_keterangan_pindah" accept=".pdf,application/pdf"
                                class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                            <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin mengganti file. Maks 2MB
                            </p>
                        </div>
                    </div>
                </div>

                <div class="h-px bg-slate-100 my-8"></div>

                <!-- Keamanan Akun -->
<h3 class="text-lg font-bold text-slate-800 font-outfit mb-4 flex items-center gap-2">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
    </svg>
    Keamanan Akun
</h3>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-2">Nama Pengguna</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2 border rounded-lg">
    </div>
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-2">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2 border rounded-lg">
    </div>
    
    <!-- Password Saat Ini dengan Ikon Mata -->
    <div class="relative">
        <label class="block text-sm font-medium text-slate-700 mb-2">Password Saat Ini</label>
        <div class="relative">
            <input type="password" name="current_password" id="current_password" class="w-full px-4 py-2 border rounded-lg pr-10">
            <button type="button" onclick="togglePassword('current_password')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
                <svg id="eye_current_password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </button>
        </div>
        <p class="text-xs text-slate-500 mt-1">Kosongkan jika tidak ingin mengganti password</p>
    </div>
    
    <!-- Password Baru dengan Ikon Mata -->
    <div class="relative">
        <label class="block text-sm font-medium text-slate-700 mb-2">Password Baru</label>
        <div class="relative">
            <input type="password" name="new_password" id="new_password" class="w-full px-4 py-2 border rounded-lg pr-10">
            <button type="button" onclick="togglePassword('new_password')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
                <svg id="eye_new_password" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </button>
        </div>
    </div>
    
    <!-- Konfirmasi Password Baru dengan Ikon Mata -->
    <div class="relative">
        <label class="block text-sm font-medium text-slate-700 mb-2">Konfirmasi Password Baru</label>
        <div class="relative">
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="w-full px-4 py-2 border rounded-lg pr-10">
            <button type="button" onclick="togglePassword('new_password_confirmation')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
                <svg id="eye_new_password_confirmation" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </button>
        </div>
    </div>
</div>

                <!-- Submit Button -->
                <div class="mt-10 pt-6 border-t border-slate-100 flex justify-end items-center space-x-3">
                    <a href="{{ route('user.profile') }}"
                        class="px-6 py-2.5 rounded-xl border border-slate-200 text-slate-700 font-semibold hover:bg-slate-50 transition text-sm">Batal</a>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-md transition text-sm">Simpan
                        Semua Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Alert untuk semua error (NIK, No HP, Email) dalam SATU MODAL -->
@if ($errors->any() && ($errors->has('nik') || $errors->has('no_hp') || $errors->has('email')))
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

        let errorText = errorMessages.join('\n');

        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            html: errorText.replace(/\n/g, '<br>'),
            confirmButtonColor: '#dc2626',
            confirmButtonText: 'OK'
        });
    </script>
@endif

    <!-- Alert untuk error password -->
    @if ($errors->has('current_password'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ $errors->first('current_password') }}',
                confirmButtonColor: '#dc2626',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if ($errors->has('new_password'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ $errors->first('new_password') }}',
                confirmButtonColor: '#dc2626',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if (session('password_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('password_success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ========== DATA WILAYAH INDONESIA ==========
            const GITHUB_URL = 'https://raw.githubusercontent.com/ibnux/data-indonesia/master/';

            const provinsiDropdown = document.getElementById('provinsi');
            const kabKotaDropdown = document.getElementById('kab_kota');
            const kecamatanDropdown = document.getElementById('kecamatan');
            const desaKelurahanDropdown = document.getElementById('desa_kelurahan');
            const lokasiUjianProvinsiDropdown = document.getElementById('lokasi_ujian_provinsi');
            const lokasiUjianKabKotaDropdown = document.getElementById('lokasi_ujian_kab_kota');

            const existingProvinsi = "{{ old('provinsi', $pendaftaran->provinsi ?? '') }}";
            const existingKabKota = "{{ old('kab_kota', $pendaftaran->kab_kota ?? '') }}";
            const existingKecamatan = "{{ old('kecamatan', $pendaftaran->kecamatan ?? '') }}";
            const existingDesaKelurahan = "{{ old('desa_kelurahan', $pendaftaran->desa_kelurahan ?? '') }}";
            const existingLokasiUjianProvinsi =
                "{{ old('lokasi_ujian_provinsi', $pendaftaran->lokasi_ujian_provinsi ?? '') }}";
            const existingLokasiUjianKabKota =
                "{{ old('lokasi_ujian_kab_kota', $pendaftaran->lokasi_ujian_kab_kota ?? '') }}";

            function populateDropdown(dropdown, data, defaultOptionText, selectedValue) {
                dropdown.innerHTML = `<option value="">${defaultOptionText}</option>`;
                let selectedId = null;
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.nama;
                    option.textContent = item.nama;
                    option.dataset.id = item.id;
                    if (item.nama === selectedValue) {
                        option.selected = true;
                        selectedId = item.id;
                    }
                    dropdown.appendChild(option);
                });
                return selectedId;
            }

            fetch(GITHUB_URL + 'provinsi.json')
                .then(response => response.json())
                .then(data => {
                    const selectedProvinsiId = populateDropdown(provinsiDropdown, data, 'Pilih Provinsi',
                        existingProvinsi);
                    if (selectedProvinsiId) {
                        provinsiDropdown.dispatchEvent(new Event('change'));
                    }
                    const selectedLokasiUjianProvinsiId = populateDropdown(lokasiUjianProvinsiDropdown, data,
                        'Pilih Provinsi Ujian', existingLokasiUjianProvinsi);
                    if (selectedLokasiUjianProvinsiId) {
                        lokasiUjianProvinsiDropdown.dispatchEvent(new Event('change'));
                    }
                });

            provinsiDropdown.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const selectedProvinsiId = selectedOption.dataset.id;

                kabKotaDropdown.innerHTML = '<option value="">Pilih Kab/Kota</option>';
                kecamatanDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';
                desaKelurahanDropdown.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';

                kabKotaDropdown.disabled = true;
                kecamatanDropdown.disabled = true;
                desaKelurahanDropdown.disabled = true;

                if (selectedProvinsiId) {
                    fetch(`${GITHUB_URL}kabupaten/${selectedProvinsiId}.json`)
                        .then(response => response.json())
                        .then(data => {
                            const selectedKabKotaId = populateDropdown(kabKotaDropdown, data,
                                'Pilih Kab/Kota', existingKabKota);
                            kabKotaDropdown.disabled = false;
                            if (selectedKabKotaId) {
                                kabKotaDropdown.dispatchEvent(new Event('change'));
                            }
                        });
                }
            });

            kabKotaDropdown.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const selectedKabKotaId = selectedOption.dataset.id;

                kecamatanDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';
                desaKelurahanDropdown.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';

                kecamatanDropdown.disabled = true;
                desaKelurahanDropdown.disabled = true;

                if (selectedKabKotaId) {
                    fetch(`${GITHUB_URL}kecamatan/${selectedKabKotaId}.json`)
                        .then(response => response.json())
                        .then(data => {
                            const selectedKecamatanId = populateDropdown(kecamatanDropdown, data,
                                'Pilih Kecamatan', existingKecamatan);
                            kecamatanDropdown.disabled = false;
                            if (selectedKecamatanId) {
                                kecamatanDropdown.dispatchEvent(new Event('change'));
                            }
                        });
                }
            });

            kecamatanDropdown.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const selectedKecamatanId = selectedOption.dataset.id;

                desaKelurahanDropdown.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';
                desaKelurahanDropdown.disabled = true;

                if (selectedKecamatanId) {
                    fetch(`${GITHUB_URL}kelurahan/${selectedKecamatanId}.json`)
                        .then(response => response.json())
                        .then(data => {
                            populateDropdown(desaKelurahanDropdown, data, 'Pilih Desa/Kelurahan',
                                existingDesaKelurahan);
                            desaKelurahanDropdown.disabled = false;
                        });
                }
            });

            lokasiUjianProvinsiDropdown.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const selectedProvinsiId = selectedOption.dataset.id;

                lokasiUjianKabKotaDropdown.innerHTML = '<option value="">Pilih Kab/Kota Ujian</option>';
                lokasiUjianKabKotaDropdown.disabled = true;

                if (selectedProvinsiId) {
                    fetch(`${GITHUB_URL}kabupaten/${selectedProvinsiId}.json`)
                        .then(response => response.json())
                        .then(data => {
                            populateDropdown(lokasiUjianKabKotaDropdown, data, 'Pilih Kab/Kota Ujian',
                                existingLokasiUjianKabKota);
                            lokasiUjianKabKotaDropdown.disabled = false;
                        });
                }
            });

            // ========== ALAMAT PENGIRIMAN MODUL TOGGLE ==========
            const alamatYa = document.getElementById('alamat_pengirim_modul_ya');
            const alamatTidak = document.getElementById('alamat_pengirim_modul_tidak');
            const alamatLainWrapper = document.getElementById('alamat_lain_wrapper');
            const alamatLainTextarea = document.getElementById('alamat_lain');
            const alamatLainRequired = document.getElementById('alamat_lain_required');

            function handleAlamatChange() {
                if (alamatTidak && alamatTidak.checked) {
                    if (alamatLainWrapper) alamatLainWrapper.style.display = 'block';
                    if (alamatLainTextarea) {
                        alamatLainTextarea.disabled = false;
                        alamatLainTextarea.required = true;
                    }
                    if (alamatLainRequired) alamatLainRequired.classList.remove('hidden');
                } else {
                    if (alamatLainWrapper) alamatLainWrapper.style.display = 'none';
                    if (alamatLainTextarea) {
                        alamatLainTextarea.disabled = true;
                        alamatLainTextarea.required = false;
                    }
                    if (alamatLainRequired) alamatLainRequired.classList.add('hidden');
                }
            }

            if (alamatYa && alamatTidak) {
                alamatYa.addEventListener('change', handleAlamatChange);
                alamatTidak.addEventListener('change', handleAlamatChange);
                handleAlamatChange();
            }

            // ========== JALUR PROGRAM TOGGLE ==========
            const jalurProgramSelect = document.getElementById('jalur_program_select');
            const ipkWrapper = document.getElementById('ipk_field_wrapper');
            const ipkInput = document.querySelector('input[name="ipk"]');
            const rplDocumentsSection = document.getElementById('rpl_documents_section');
            const labelIjazah = document.getElementById('label_file_ijazah');
            const labelTranskrip = document.getElementById('label_file_transkrip');

            // Cek apakah file sudah ada di database
            const hasExistingTranskrip = {{ $pendaftaran && $pendaftaran->file_transkrip ? 'true' : 'false' }};
            const hasExistingScreenshot = {{ $pendaftaran && $pendaftaran->file_ss_pddikti ? 'true' : 'false' }};
            const hasExistingCv = {{ $pendaftaran && $pendaftaran->file_cv ? 'true' : 'false' }};

            function toggleJalurProgram() {
                const isRpl = jalurProgramSelect && jalurProgramSelect.value === 'RPL';

                // Toggle IPK field
                if (ipkWrapper) {
                    if (isRpl) {
                        ipkWrapper.style.display = 'block';
                        if (ipkInput) ipkInput.required = true;
                    } else {
                        ipkWrapper.style.display = 'none';
                        if (ipkInput) ipkInput.required = false;
                    }
                }

                // Toggle seluruh section dokumen RPL
                if (rplDocumentsSection) {
                    if (isRpl) {
                        rplDocumentsSection.classList.remove('hidden');
                    } else {
                        rplDocumentsSection.classList.add('hidden');
                    }
                }

                // Update label Ijazah
                if (labelIjazah) {
                    if (isRpl) {
                        labelIjazah.innerHTML =
                            'Scan Ijazah Diploma/S1 (Asli/Legalisir) <span class="text-red-500">*</span>';
                    } else {
                        labelIjazah.innerHTML =
                            'Scan Ijazah SMA/SMK Sederajat (Asli/Legalisir) <span class="text-red-500">*</span>';
                    }
                }

                // Update label Transkrip - TANPA required dari JavaScript
                if (labelTranskrip) {
                    if (isRpl) {
                        labelTranskrip.innerHTML =
                            'Scan Transkrip Nilai Terakhir (Legalisir) <span class="text-red-500">*</span>';
                        // JANGAN set required=true di sini!
                    } else {
                        labelTranskrip.innerHTML =
                            'Scan SKHUN / Transkrip Nilai <span class="text-xs text-slate-400 font-normal">(Opsional)</span>';
                        document.querySelector('input[name="file_transkrip"]').required = false;
                    }
                }
            }

            if (jalurProgramSelect) {
                jalurProgramSelect.addEventListener('change', toggleJalurProgram);
                toggleJalurProgram();
            }

            // ========== VALIDASI SEBELUM SUBMIT ==========
            const form = document.querySelector('form');

            form.addEventListener('submit', function(e) {
                const isRpl = jalurProgramSelect && jalurProgramSelect.value === 'RPL';

                if (isRpl) {
                    const fileTranskripInput = document.querySelector('input[name="file_transkrip"]');
                    const isUploadingTranskrip = fileTranskripInput && fileTranskripInput.files.length > 0;

                    // Validasi file transkrip
                    if (!hasExistingTranskrip && !isUploadingTranskrip) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Perhatian!',
                            text: 'File Transkrip Nilai wajib diupload untuk jalur RPL!',
                            confirmButtonColor: '#dc2626',
                            confirmButtonText: 'OK'
                        });
                        return false;
                    }

                    // Validasi file screenshot PDDIKTI
                    const fileSsPddiktiInput = document.querySelector('input[name="file_ss_pddikti"]');
                    const isUploadingSsPddikti = fileSsPddiktiInput && fileSsPddiktiInput.files.length > 0;

                    if (!hasExistingScreenshot && !isUploadingSsPddikti) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Perhatian!',
                            text: 'File Screenshot PDDIKTI wajib diupload untuk jalur RPL!',
                            confirmButtonColor: '#dc2626',
                            confirmButtonText: 'OK'
                        });
                        return false;
                    }

                    // Validasi file CV
                    const fileCvInput = document.querySelector('input[name="file_cv"]');
                    const isUploadingCv = fileCvInput && fileCvInput.files.length > 0;

                    if (!hasExistingCv && !isUploadingCv) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Perhatian!',
                            text: 'File CV / Daftar Riwayat Hidup wajib diupload untuk jalur RPL!',
                            confirmButtonColor: '#dc2626',
                            confirmButtonText: 'OK'
                        });
                        return false;
                    }
                }

                return true;
            });
        });

        // ========== TOGGLE PASSWORD VISIBILITY ==========
function togglePassword(fieldId) {
    const input = document.getElementById(fieldId);
    const eyeIcon = document.getElementById(`eye_${fieldId}`);
    
    if (input.type === 'password') {
        input.type = 'text';
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
        `;
    } else {
        input.type = 'password';
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        `;
    }
}
    </script>
</x-user-layout>
