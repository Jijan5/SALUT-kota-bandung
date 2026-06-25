<x-admin-layout>
    <x-slot name="title">Edit Data Pendaftar</x-slot>

    <div class="max-w-full">
        <!-- Header -->
        <div
            class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5 mb-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <h2 class="font-outfit text-xl font-bold text-slate-800">Edit Data Pendaftar</h2>
                    <span
                        class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wide {{ $data->jalur_program === 'RPL' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                        JALUR {{ $data->jalur_program }}
                    </span>
                </div>
                <p class="text-xs text-slate-500 mt-0.5">Perbarui informasi dan berkas pendaftar ({{ $data->nama }})
                </p>
            </div>
            <a href="{{ route('admin.index') }}"
                class="inline-flex items-center space-x-2 text-sm font-semibold text-slate-500 hover:text-slate-700 transition bg-slate-50 border border-slate-200 px-4 py-2 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span>Kembali</span>
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden p-6 md:p-8">

            <form action="{{ route('admin.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Personal Data -->
                    <div>
                        <label for="nama" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap
                            (Sesuai Ijazah)</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $data->nama) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="nik" class="block text-sm font-semibold text-slate-700 mb-2">NIK</label>
                        <input type="text" name="nik" id="nik" value="{{ old('nik', $data->nik) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="tempat_lahir" class="block text-sm font-semibold text-slate-700 mb-2">Tempat
                            Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                            value="{{ old('tempat_lahir', $data->tempat_lahir) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-semibold text-slate-700 mb-2">Tanggal
                            Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $data->tanggal_lahir ? date('Y-m-d', strtotime($data->tanggal_lahir)) : '') }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="gender" class="block text-sm font-semibold text-slate-700 mb-2">Jenis
                            Kelamin</label>
                        <select name="gender" id="gender"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                            <option value="laki-laki" @if (old('gender', $data->gender) == 'laki-laki') selected @endif>Laki-laki
                            </option>
                            <option value="perempuan" @if (old('gender', $data->gender) == 'perempuan') selected @endif>Perempuan
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="agama" class="block text-sm font-semibold text-slate-700 mb-2">Agama</label>
                        <select name="agama" id="agama"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                            @foreach (['islam', 'kristen', 'katolik', 'hindu', 'buddha', 'konghucu'] as $agama)
                                <option value="{{ $agama }}" @if (old('agama', $data->agama) == $agama) selected @endif>
                                    {{ ucfirst($agama) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-semibold text-slate-700 mb-2">Status
                            Perkawinan</label>
                        <select name="status" id="status"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                            <option value="Kawin" @if (old('status', $data->status) == 'Kawin') selected @endif>Kawin</option>
                            <option value="Belum Kawin" @if (old('status', $data->status) == 'Belum Kawin') selected @endif>Belum Kawin
                            </option>
                            <option value="Cerai Hidup" @if (old('status', $data->status) == 'Cerai Hidup') selected @endif>Cerai Hidup
                            </option>
                            <option value="Cerai Mati" @if (old('status', $data->status) == 'Cerai Mati') selected @endif>Cerai Mati
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                        <input type="email" name="email" id="email"
                            value="{{ old('email', $data->user->email ?? '') }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="no_hp" class="block text-sm font-semibold text-slate-700 mb-2">No. HP (WhatsApp
                            Aktif)</label>
                        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $data->no_hp) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="no_hp_alternatif" class="block text-sm font-semibold text-slate-700 mb-2">No. HP
                            Alternatif / Kerabat</label>
                        <input type="text" name="no_hp_alternatif" id="no_hp_alternatif"
                            value="{{ old('no_hp_alternatif', $data->no_hp_alternatif) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="nama_ibu_kandung" class="block text-sm font-semibold text-slate-700 mb-2">Nama Ibu
                            Kandung</label>
                        <input type="text" name="nama_ibu_kandung" id="nama_ibu_kandung"
                            value="{{ old('nama_ibu_kandung', $data->nama_ibu_kandung) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="no_ijazah" class="block text-sm font-semibold text-slate-700 mb-2">Nomor
                            Ijazah</label>
                        <input type="text" name="no_ijazah" id="no_ijazah"
                            value="{{ old('no_ijazah', $data->no_ijazah) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                    </div>
                    <div id="ipk_field_wrapper">
                        <label for="ipk" class="block text-sm font-semibold text-slate-700 mb-2">IPK (khusus
                            RPL)</label>
                        <input type="text" name="ipk" id="ipk" value="{{ old('ipk', $data->ipk) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                    </div>
                </div>

                <div class="h-px bg-slate-100 my-8"></div>

                <!-- Alamat Sesuai KTP -->
                <h3 class="text-lg font-bold text-slate-800 font-outfit mb-4">Alamat Sesuai KTP</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="provinsi" class="block text-sm font-semibold text-slate-700 mb-2">Provinsi</label>
                        <select name="provinsi" id="provinsi"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                            <option value="">Pilih Provinsi</option>
                        </select>
                    </div>
                    <div>
                        <label for="kab_kota"
                            class="block text-sm font-semibold text-slate-700 mb-2">Kabupaten/Kota</label>
                        <select name="kab_kota" id="kab_kota"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                            <option value="">Pilih Kab/Kota</option>
                        </select>
                    </div>
                    <div>
                        <label for="kecamatan"
                            class="block text-sm font-semibold text-slate-700 mb-2">Kecamatan</label>
                        <select name="kecamatan" id="kecamatan"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                            <option value="">Pilih Kecamatan</option>
                        </select>
                    </div>
                    <div>
                        <label for="desa_kelurahan"
                            class="block text-sm font-semibold text-slate-700 mb-2">Kelurahan/Desa</label>
                        <select name="desa_kelurahan" id="desa_kelurahan"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                            <option value="">Pilih Desa/Kelurahan</option>
                        </select>
                    </div>
                    <div>
                        <label for="kode_pos" class="block text-sm font-semibold text-slate-700 mb-2">Kode Pos</label>
                        <input type="text" name="kode_pos" id="kode_pos"
                            value="{{ old('kode_pos', $data->kode_pos) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                    </div>
                    <div class="md:col-span-2">
                        <label for="alamat" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Lengkap
                            (Jalan, RT/RW, No. Rumah)</label>
                        <textarea name="alamat" id="alamat" rows="3"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">{{ old('alamat', $data->alamat) }}</textarea>
                    </div>
                </div>

                <div class="h-px bg-slate-100 my-8"></div>

                <!-- Alamat Pengiriman Modul -->
                <h3 class="text-lg font-bold text-slate-800 font-outfit mb-4">Alamat Pengiriman Modul</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-slate-700 mb-3">Apakah alamat pengiriman modul
                            kuliah sama dengan alamat KTP?</label>
                        <div class="flex space-x-6">
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="radio" name="alamat_pengirim_modul" value="ya"
                                    id="alamat_pengirim_modul_ya"
                                    {{ old('alamat_pengirim_modul', $data->alamat_pengirim_modul) == 'ya' ? 'checked' : '' }}
                                    class="h-4 w-4 text-blue-600 border-slate-300 focus:ring-blue-500">
                                <span class="text-sm font-medium text-slate-700">Ya, kirim ke alamat KTP</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="radio" name="alamat_pengirim_modul" value="tidak"
                                    id="alamat_pengirim_modul_tidak"
                                    {{ old('alamat_pengirim_modul', $data->alamat_pengirim_modul) == 'tidak' ? 'checked' : '' }}
                                    class="h-4 w-4 text-blue-600 border-slate-300 focus:ring-blue-500">
                                <span class="text-sm font-medium text-slate-700">Tidak, kirim ke alamat lain</span>
                            </label>
                        </div>
                    </div>
                    <div class="md:col-span-2" id="alamat_lain_wrapper"
                        style="display: {{ old('alamat_pengirim_modul', $data->alamat_pengirim_modul) == 'tidak' ? 'block' : 'none' }};">
                        <label for="alamat_lain" class="block text-sm font-semibold text-slate-700 mb-2">Alamat
                            Pengiriman Modul Lainnya</label>
                        <textarea name="alamat_lain" id="alamat_lain" rows="3"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700"
                            {{ old('alamat_pengirim_modul', $data->alamat_pengirim_modul) == 'tidak' ? '' : 'disabled' }}>{{ old('alamat_lain', $data->alamat_lain) }}</textarea>
                    </div>
                </div>

                <div class="h-px bg-slate-100 my-8"></div>

                <!-- Lokasi Ujian -->
                <h3 class="text-lg font-bold text-slate-800 font-outfit mb-4">Lokasi Ujian</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="lokasi_ujian_provinsi"
                            class="block text-sm font-semibold text-slate-700 mb-2">Provinsi Ujian</label>
                        <select name="lokasi_ujian_provinsi" id="lokasi_ujian_provinsi"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                            <option value="">Pilih Provinsi Ujian</option>
                        </select>
                    </div>
                    <div>
                        <label for="lokasi_ujian_kab_kota"
                            class="block text-sm font-semibold text-slate-700 mb-2">Kab/Kota Ujian</label>
                        <select name="lokasi_ujian_kab_kota" id="lokasi_ujian_kab_kota"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                            <option value="">Pilih Kab/Kota Ujian</option>
                        </select>
                    </div>
                </div>

                <div class="h-px bg-slate-100 my-8"></div>

                <!-- Jalur Program -->
                <h3 class="text-lg font-bold text-slate-800 font-outfit mb-4">Jalur Program & Kelengkapan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="jalur_program" class="block text-sm font-semibold text-slate-700 mb-2">Jalur
                            Program</label>
                        <select name="jalur_program" id="jalur_program" disabled
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-100 text-slate-500 focus:outline-none transition text-sm cursor-not-allowed">
                            <option value="RPL" @if (old('jalur_program', $data->jalur_program) == 'RPL') selected @endif>RPL (Rekognisi
                                Pembelajaran Lampau)</option>
                            <option value="Non-RPL" @if (old('jalur_program', $data->jalur_program) == 'Non-RPL') selected @endif>Reguler (Non-RPL)
                            </option>
                        </select>
                        <p class="text-xs text-red-500 font-medium mt-2">🔒 Jalur program tidak dapat diubah setelah mendaftar.</p>
                    </div>
                    <div>
                        <label for="ukuran_almat" class="block text-sm font-semibold text-slate-700 mb-2">Ukuran Jas
                            Almamater</label>
                        <select name="ukuran_almat" id="ukuran_almat"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition text-sm text-slate-700">
                            <option value="">Pilih Ukuran</option>
                            <option value="S" @if (old('ukuran_almat', $data->ukuran_almat) == 'S') selected @endif>S (Small)</option>
                            <option value="M" @if (old('ukuran_almat', $data->ukuran_almat) == 'M') selected @endif>M (Medium)
                            </option>
                            <option value="L" @if (old('ukuran_almat', $data->ukuran_almat) == 'L') selected @endif>L (Large)
                            </option>
                            <option value="XL" @if (old('ukuran_almat', $data->ukuran_almat) == 'XL') selected @endif>XL (Extra Large)
                            </option>
                            <option value="XXL" @if (old('ukuran_almat', $data->ukuran_almat) == 'XXL') selected @endif>XXL (Double
                                Extra Large)</option>
                            <option value="XXXL" @if (old('ukuran_almat', $data->ukuran_almat) == 'XXXL') selected @endif>XXXL (Triple
                                Extra Large)</option>
                        </select>
                    </div>
                </div>

                <!-- File Inputs -->
                <div class="mt-10">
                    <h3 class="text-lg font-bold text-slate-800 font-outfit mb-4">Dokumen Pendukung</h3>

                    <!-- DOKUMEN WAJIB (SEMUA JALUR) -->
                    <div class="mb-8">
                        <h5
                            class="text-md font-semibold text-slate-800 mb-4 pb-2 border-b border-slate-200 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-green-600"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Dokumen Wajib (Semua Jalur)
                        </h5>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                            <!-- Pas Foto - JPG/PNG saja (sesuai validasi) -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Pas Foto Resmi</label>
                                @if ($data->file_foto)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $data->file_foto) }}" target="_blank"
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
                                <input type="file" name="file_foto" accept=".jpg,.jpeg,.png"
                                    class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                                <p class="text-xs text-slate-500 mt-1">Format: JPG/PNG. Maks 25MB</p>
                            </div>

                            <!-- Scan KTP - JPG,JPEG,PNG,PDF (sesuai validasi) -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Scan KTP Asli</label>
                                @if ($data->file_ktp)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $data->file_ktp) }}" target="_blank"
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
                                <input type="file" name="file_ktp" accept=".pdf"
                                    class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                                <p class="text-xs text-slate-500 mt-1">Format: JPG/PNG/PDF. Maks 25MB</p>
                            </div>

                            <!-- Scan Ijazah - PDF saja (sesuai validasi) -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Scan Ijazah</label>
                                @if ($data->file_ijazah)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $data->file_ijazah) }}" target="_blank"
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
                                <input type="file" name="file_ijazah" accept=".pdf"
                                    class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                                <p class="text-xs text-slate-500 mt-1">Format: PDF. Maks 25MB</p>
                            </div>

                            <!-- Transkrip Nilai - PDF saja (sesuai validasi) -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Transkrip Nilai /
                                    SKHUN</label>
                                @if ($data->file_transkrip)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $data->file_transkrip) }}" target="_blank"
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
                                <input type="file" name="file_transkrip" accept=".pdf"
                                    class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                                <p class="text-xs text-slate-500 mt-1">Format: PDF. Maks 25MB</p>
                            </div>

                            <!-- Bukti Pembayaran - JPG/PNG saja (sesuai validasi) -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Bukti Transfer
                                    Pembayaran</label>
                                @if ($data->file_bukti_pembayaran)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $data->file_bukti_pembayaran) }}"
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
                                <input type="file" name="file_bukti_pembayaran" accept=".jpg,.jpeg,.png"
                                    class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                                <p class="text-xs text-slate-500 mt-1">Format: JPG/PNG. Maks 25MB</p>
                            </div>

                            <!-- Surat Pernyataan - PDF saja (sesuai validasi) -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Surat Pernyataan
                                    Keabsahan Berkas</label>
                                @if ($data->surat_pernyataan)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $data->surat_pernyataan) }}" target="_blank"
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
                                <input type="file" name="surat_pernyataan" accept=".pdf"
                                    class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                                <p class="text-xs text-slate-500 mt-1">Format: PDF. Maks 25MB</p>
                            </div>

                        </div>
                    </div>

                    <!-- DOKUMEN KHUSUS RPL -->
                    <div id="rpl_documents_section" class="{{ $data->jalur_program == 'RPL' ? '' : 'hidden' }}">
                        <h5
                            class="text-md font-semibold text-slate-800 mb-4 pb-2 border-b border-slate-200 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-amber-600"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            Berkas Khusus Tambahan Alih Kredit (RPL)
                        </h5>
                        <p class="text-xs text-amber-600 mb-4">Berkas-berkas di bawah ini diwajibkan khusus untuk
                            verifikasi alih kredit mahasiswa alihan / lulusan diploma.</p>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                            <!-- Screenshot PDDIKTI - JPG/PNG saja (sesuai validasi) -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Screenshot
                                    PDDIKTI</label>
                                @if ($data->file_ss_pddikti)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $data->file_ss_pddikti) }}" target="_blank"
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
                                <input type="file" name="file_ss_pddikti" accept=".jpg,.jpeg,.png"
                                    class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                                <p class="text-xs text-slate-500 mt-1">Format: JPG/PNG. Maks 25MB</p>
                            </div>

                            <!-- CV - PDF saja (sesuai validasi) -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Daftar Riwayat Hidup
                                    (CV)</label>
                                @if ($data->file_cv)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $data->file_cv) }}" target="_blank"
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
                                <input type="file" name="file_cv" accept=".pdf"
                                    class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                                <p class="text-xs text-slate-500 mt-1">Format: PDF. Maks 25MB</p>
                            </div>

                            <!-- Dokumen Perangkat Pembelajaran - PDF saja -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Dokumen Perangkat
                                    Pembelajaran</label>
                                @if ($data->file_rpl_pembelajaran)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $data->file_rpl_pembelajaran) }}"
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
                                <input type="file" name="file_rpl_pembelajaran" accept=".pdf"
                                    class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                                <p class="text-xs text-slate-500 mt-1">Format: PDF. Maks 25MB</p>
                            </div>

                            <!-- Dokumen Administrasi Kelas - PDF saja -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Dokumen Administrasi
                                    Kelas</label>
                                @if ($data->file_rpl_administrasi)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $data->file_rpl_administrasi) }}"
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
                                <input type="file" name="file_rpl_administrasi" accept=".pdf"
                                    class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                                <p class="text-xs text-slate-500 mt-1">Format: PDF. Maks 25MB</p>
                            </div>

                            <!-- Dokumen Pembina Ekstrakurikuler - PDF saja -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Dokumen Pembina
                                    Ekstrakurikuler</label>
                                @if ($data->file_rpl_ekstrakulikuler)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $data->file_rpl_ekstrakulikuler) }}"
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
                                <input type="file" name="file_rpl_ekstrakulikuler" accept=".pdf"
                                    class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                                <p class="text-xs text-slate-500 mt-1">Format: PDF. Maks 25MB</p>
                            </div>

                            <!-- Sertifikat Prestasi - PDF saja -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Sertifikat Penghargaan /
                                    Prestasi</label>
                                @if ($data->file_rpl_prestasi)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $data->file_rpl_prestasi) }}" target="_blank"
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
                                <input type="file" name="file_rpl_prestasi" accept=".pdf"
                                    class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                                <p class="text-xs text-slate-500 mt-1">Format: PDF. Maks 25MB</p>
                            </div>

                            <!-- Surat Keterangan Pindah - PDF saja -->
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Surat Keterangan Pindah
                                    (Dari Kampus Asal)</label>
                                @if ($data->surat_keterangan_pindah)
                                    <div class="mb-2">
                                        <a href="{{ asset('storage/' . $data->surat_keterangan_pindah) }}"
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
                                <input type="file" name="surat_keterangan_pindah" accept=".pdf"
                                    class="w-full px-3 py-2 border rounded-lg file:mr-3 file:py-2 file:px-4 file:rounded-lg file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700">
                                <p class="text-xs text-slate-500 mt-1">Format: PDF. Maks 25MB</p>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="mt-10">
                    <div class="border-b border-slate-200 pb-3 mb-6">
                        <h2 class="text-xl font-bold text-slate-800 font-outfit flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Akun & Keamanan
                        </h2>
                        <p class="text-sm text-slate-500 mt-1">Gunakan bagian ini jika pendaftar meminta reset password via WhatsApp.</p>
                    </div>

                    <div class="bg-blue-50/50 p-5 rounded-xl border border-blue-100">
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Reset Password Pendaftar (Opsional)</label>
                        <input type="text" name="reset_password"
                            class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                            placeholder="Ketik password baru (Biarkan kosong jika tidak diubah)">
                        <p class="text-xs text-slate-500 mt-2 flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-slate-400 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Mengisi kolom ini akan langsung mengubah password login pendaftar.</span>
                        </p>
                    </div>
                </div>

                <div class="mt-10 pt-6 border-t border-slate-100 flex justify-end items-center space-x-3">
                    <a href="{{ route('admin.index') }}"
                        class="px-6 py-2.5 rounded-xl border border-slate-200 text-slate-700 font-semibold hover:bg-slate-50 transition text-sm">Batal</a>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-md transition text-sm">Update
                        Data</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const GITHUB_URL = 'https://raw.githubusercontent.com/ibnux/data-indonesia/master/';

            const provinsiDropdown = document.getElementById('provinsi');
            const kabKotaDropdown = document.getElementById('kab_kota');
            const kecamatanDropdown = document.getElementById('kecamatan');
            const desaKelurahanDropdown = document.getElementById('desa_kelurahan');
            const lokasiUjianProvinsiDropdown = document.getElementById('lokasi_ujian_provinsi');
            const lokasiUjianKabKotaDropdown = document.getElementById('lokasi_ujian_kab_kota');
            const jalurProgramSelect = document.getElementById('jalur_program');
            const rplDocumentsSection = document.getElementById('rpl_documents_section');
            const ipkFieldWrapper = document.getElementById('ipk_field_wrapper');
            const ipkInput = document.querySelector('input[name="ipk"]');

            function toggleJalurProgram() {
                const isRpl = jalurProgramSelect && jalurProgramSelect.value === 'RPL';

                if (rplDocumentsSection) {
                    if (isRpl) {
                        rplDocumentsSection.classList.remove('hidden');
                    } else {
                        rplDocumentsSection.classList.add('hidden');
                    }
                }

                if (ipkFieldWrapper) {
                    if (isRpl) {
                        ipkFieldWrapper.style.display = 'block';
                        if (ipkInput) ipkInput.required = true;
                    } else {
                        ipkFieldWrapper.style.display = 'none';
                        if (ipkInput) ipkInput.required = false;
                        if (ipkInput) ipkInput.value = '';
                    }
                }
            }

            if (jalurProgramSelect) {
                jalurProgramSelect.addEventListener('change', toggleJalurProgram);
                toggleJalurProgram(); // Panggil saat load
            }

            const existingProvinsi = "{{ old('provinsi', $data->provinsi) }}";
            const existingKabKota = "{{ old('kab_kota', $data->kab_kota) }}";
            const existingKecamatan = "{{ old('kecamatan', $data->kecamatan) }}";
            const existingDesaKelurahan = "{{ old('desa_kelurahan', $data->desa_kelurahan) }}";
            const existingLokasiUjianProvinsi = "{{ old('lokasi_ujian_provinsi', $data->lokasi_ujian_provinsi) }}";
            const existingLokasiUjianKabKota = "{{ old('lokasi_ujian_kab_kota', $data->lokasi_ujian_kab_kota) }}";

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

            // Fetch and populate Provinsi
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

            function handleAlamatChange() {
                if (alamatTidak && alamatTidak.checked) {
                    if (alamatLainWrapper) alamatLainWrapper.style.display = 'block';
                    if (alamatLainTextarea) {
                        alamatLainTextarea.disabled = false;
                    }
                } else {
                    if (alamatLainWrapper) alamatLainWrapper.style.display = 'none';
                    if (alamatLainTextarea) {
                        alamatLainTextarea.disabled = true;
                    }
                }
            }

            if (alamatYa && alamatTidak) {
                alamatYa.addEventListener('change', handleAlamatChange);
                alamatTidak.addEventListener('change', handleAlamatChange);
                handleAlamatChange();
            }
        });
    </script>
</x-admin-layout>
