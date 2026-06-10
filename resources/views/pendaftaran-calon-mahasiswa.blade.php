<x-user-layout>
    <x-slot name="title">Pendaftaran Calon Mahasiswa</x-slot>

    <div class="max-w-7xl mx-auto space-y-6">
        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 relative overflow-hidden">
            <div
                class="absolute inset-0 opacity-5 bg-[radial-gradient(circle,_#3b5cff_1px,_transparent_1px)] [background-size:22px_22px]">
            </div>

            <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h2 class="font-outfit text-xl font-bold text-slate-800 flex items-center gap-2">
                        Pendaftaran Calon Mahasiswa
                        <span class="text-xl">📝</span>
                    </h2>
                    <p class="text-sm text-slate-500 mt-0.5">
                        Silakan isi data diri Anda secara lengkap dan unggah berkas persyaratan yang diperlukan
                    </p>
                </div>

                <a href="{{ route('user.dashboard') }}"
                    class="group inline-flex items-center gap-2 bg-slate-100 hover:bg-slate-200 text-slate-700 px-5 py-2.5 rounded-xl transition-all duration-300 shadow-sm hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    <span class="font-semibold text-sm">Kembali ke Dashboard</span>
                </a>
            </div>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 rounded-xl p-4">
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

        <!-- Registration Form Card -->
        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">

            <!-- Steps Progress Stepper -->
            <div class="bg-slate-50/80 border-b border-slate-100 px-6 py-6 sm:px-10">
                <div class="flex items-center justify-between relative max-w-3xl mx-auto">
                    <div class="absolute left-0 right-0 top-1/2 -translate-y-1/2 h-1 bg-slate-200 z-0"></div>
                    <div id="step-bar"
                        class="absolute left-0 top-1/2 -translate-y-1/2 h-1 bg-blue-600 z-0 transition-all duration-500"
                        style="width: 0%;"></div>

                    <div class="relative z-10 flex flex-col items-center step-node active" data-step="1">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold shadow-md transition duration-300 ring-4 ring-blue-100">
                            1</div>
                        <span class="text-xs font-semibold text-slate-800 mt-2 hidden sm:block">Profil Diri</span>
                    </div>

                    <div class="relative z-10 flex flex-col items-center step-node" data-step="2">
                        <div
                            class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold transition duration-300">
                            2</div>
                        <span class="text-xs font-semibold text-slate-500 mt-2 hidden sm:block">Alamat & Kontak</span>
                    </div>

                    <div class="relative z-10 flex flex-col items-center step-node" data-step="3">
                        <div
                            class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold transition duration-300">
                            3</div>
                        <span class="text-xs font-semibold text-slate-500 mt-2 hidden sm:block">Jalur Program</span>
                    </div>

                    <div class="relative z-10 flex flex-col items-center step-node" data-step="4">
                        <div
                            class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold transition duration-300">
                            4</div>
                        <span class="text-xs font-semibold text-slate-500 mt-2 hidden sm:block">Unggah Berkas</span>
                    </div>

                    <div class="relative z-10 flex flex-col items-center step-node" data-step="5">
                        <div
                            class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold transition duration-300">
                            5</div>
                        <span class="text-xs font-semibold text-slate-500 mt-2 hidden sm:block">Pembayaran</span>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data"
                id="registrationForm" class="p-6 sm:p-10">
                @csrf

                <!-- STEP 1: Profil Calon Mahasiswa -->
                <div class="step-pane step-transition" id="step1">
                    <div class="border-b border-slate-100 pb-4 mb-6">
                        <h2 class="text-2xl font-bold font-outfit text-slate-800">Langkah 1: Informasi Profil Calon
                            Mahasiswa</h2>
                        <p class="text-sm text-slate-500">Masukkan detail data pribadi Anda sesuai dengan dokumen resmi
                            (KTP/Ijazah).</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nama" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap
                                (Sesuai Ijazah) <span class="text-red-500">*</span></label>
                            <input type="text" id="nama" name="nama" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                placeholder="Masukkan nama lengkap Anda">
                        </div>
                        <div>
                            <label for="nik" class="block text-sm font-semibold text-slate-700 mb-2">Nomor Induk
                                Kependudukan (NIK) <span class="text-red-500">*</span></label>
                            <input type="text" id="nik" name="nik" required minlength="16" maxlength="16"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                placeholder="Masukkan 16 digit NIK">
                        </div>
                        <div>
                            <label for="tempat_lahir" class="block text-sm font-semibold text-slate-700 mb-2">Tempat
                                Lahir <span class="text-red-500">*</span></label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                placeholder="Contoh: Bandung">
                        </div>
                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-semibold text-slate-700 mb-2">Tanggal
                                Lahir <span class="text-red-500">*</span></label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                        </div>
                        <div>
                            <label for="gender" class="block text-sm font-semibold text-slate-700 mb-2">Jenis
                                Kelamin <span class="text-red-500">*</span></label>
                            <select id="gender" name="gender" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label for="agama" class="block text-sm font-semibold text-slate-700 mb-2">Agama <span
                                    class="text-red-500">*</span></label>
                            <select id="agama" name="agama" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white">
                                <option value="">Pilih Agama</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katolik">Katolik</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div>
                            <label for="status" class="block text-sm font-semibold text-slate-700 mb-2">Status
                                Perkawinan <span class="text-red-500">*</span></label>
                            <select id="status" name="status" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white">
                                <option value="">Pilih Status</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                        </div>
                        <div>
                            <label for="nama_ibu_kandung" class="block text-sm font-semibold text-slate-700 mb-2">Nama
                                Ibu Kandung <span class="text-red-500">*</span></label>
                            <input type="text" id="nama_ibu_kandung" name="nama_ibu_kandung" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                placeholder="Masukkan nama ibu kandung">
                        </div>
                    </div>
                </div>

                <!-- STEP 2: Alamat & Kontak -->
                <div class="step-pane step-transition hidden" id="step2">
                    <div class="border-b border-slate-100 pb-4 mb-6">
                        <h2 class="text-2xl font-bold font-outfit text-slate-800">Langkah 2: Alamat Lengkap & Informasi
                            Kontak</h2>
                        <p class="text-sm text-slate-500">Tentukan alamat domisili pengiriman modul pembelajaran serta
                            nomor kontak aktif Anda.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="provinsi" class="block text-sm font-semibold text-slate-700 mb-2">Provinsi
                                <span class="text-red-500">*</span></label>
                            <select id="provinsi" name="provinsi" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white">
                                <option value="">Memuat provinsi...</option>
                            </select>
                        </div>
                        <div>
                            <label for="kab_kota" class="block text-sm font-semibold text-slate-700 mb-2">Kabupaten /
                                Kota <span class="text-red-500">*</span></label>
                            <select id="kab_kota" name="kab_kota" required disabled
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white disabled:bg-slate-100 disabled:text-slate-400">
                                <option value="">Pilih Provinsi Dahulu</option>
                            </select>
                        </div>
                        <div>
                            <label for="kecamatan" class="block text-sm font-semibold text-slate-700 mb-2">Kecamatan
                                <span class="text-red-500">*</span></label>
                            <select id="kecamatan" name="kecamatan" required disabled
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white disabled:bg-slate-100 disabled:text-slate-400">
                                <option value="">Pilih Kabupaten/Kota Dahulu</option>
                            </select>
                        </div>
                        <div>
                            <label for="desa_kelurahan"
                                class="block text-sm font-semibold text-slate-700 mb-2">Kelurahan / Desa <span
                                    class="text-red-500">*</span></label>
                            <select id="desa_kelurahan" name="desa_kelurahan" required disabled
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white disabled:bg-slate-100 disabled:text-slate-400">
                                <option value="">Pilih Kecamatan Dahulu</option>
                            </select>
                        </div>
                        <div>
                            <label for="kode_pos" class="block text-sm font-semibold text-slate-700 mb-2">Kode Pos
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="kode_pos" name="kode_pos" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                placeholder="Masukkan 5 digit kode pos">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="alamat" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Lengkap
                            Rumah (Sesuai KTP) <span class="text-red-500">*</span></label>
                        <textarea id="alamat" name="alamat" required rows="3"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                            placeholder="Tuliskan jalan, nomor rumah, RT/RW lengkap..."></textarea>
                    </div>
                    <div class="mb-6 bg-slate-50 p-6 rounded-2xl border border-slate-100">
                        <label class="block text-sm font-semibold text-slate-700 mb-3">Apakah alamat pengiriman modul
                            kuliah sama dengan alamat KTP? <span class="text-red-500">*</span></label>
                        <div class="flex space-x-6">
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="radio" name="alamat_pengirim_modul" value="ya"
                                    id="alamat_pengirim_modul_ya" checked
                                    class="h-4 w-4 text-blue-600 border-slate-300 focus:ring-blue-500">
                                <span class="text-sm font-medium text-slate-700">Ya, sama dengan KTP</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="radio" name="alamat_pengirim_modul" value="tidak"
                                    id="alamat_pengirim_modul_tidak"
                                    class="h-4 w-4 text-blue-600 border-slate-300 focus:ring-blue-500">
                                <span class="text-sm font-medium text-slate-700">Tidak, kirim ke alamat lain</span>
                            </label>
                        </div>
                        <div id="alamat_lain_field" class="mt-4 hidden transition duration-300">
                            <label for="alamat_lain_input"
                                class="block text-sm font-semibold text-slate-700 mb-2">Alamat Pengiriman Modul Lainnya
                                <span class="text-red-500">*</span></label>
                            <textarea id="alamat_lain_input" name="alamat_lain" rows="3"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white"
                                placeholder="Masukkan alamat lengkap tujuan pengiriman buku modul..."></textarea>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="no_hp" class="block text-sm font-semibold text-slate-700 mb-2">Nomor HP
                                (WhatsApp Aktif) <span class="text-red-500">*</span></label>
                            <input type="text" id="no_hp" name="no_hp" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                placeholder="Contoh: 08123456789">
                        </div>
                        <div>
                            <label for="no_hp_alternatif"
                                class="block text-sm font-semibold text-slate-700 mb-2">Nomor HP Kerabat / Alternatif
                                <span class="text-red-500">*</span></label>
                            <input type="text" id="no_hp_alternatif" name="no_hp_alternatif" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                placeholder="Nomor kontak darurat">
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Jalur Program & Lokasi -->
                <div class="step-pane step-transition hidden" id="step3">
                    <div class="border-b border-slate-100 pb-4 mb-6">
                        <h2 class="text-2xl font-bold font-outfit text-slate-800">Langkah 3: Pilihan Jalur Program &
                            Lokasi Kuliah</h2>
                        <p class="text-sm text-slate-500">Pilihlah tipe pendaftaran Anda (RPL atau Reguler Non-RPL) dan
                            tempat pelaksanaan ujian.</p>
                    </div>
                    <div class="mb-8">
                        <label class="block text-sm font-bold text-slate-700 mb-4">Jalur Pendaftaran Program <span
                                class="text-red-500">*</span></label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <!-- CARD RPL -->
                            <div id="card_jalur_rpl"
                                class="relative border-2 border-blue-500 rounded-2xl p-6 cursor-pointer transition duration-300 bg-white">

                                <label for="jalur_program_rpl" class="cursor-pointer block h-full">
                                    <div class="flex items-start gap-4">

                                        <!-- RADIO -->
                                        <div class="pt-1">
                                            <input id="jalur_program_rpl" name="jalur_program" type="radio"
                                                value="RPL" required
                                                class="h-5 w-5 text-blue-600 border-slate-300 focus:ring-blue-500">
                                        </div>

                                        <!-- CONTENT -->
                                        <div class="flex-1">

                                            <h3 class="text-[18px] font-bold text-blue-900 leading-snug font-outfit">
                                                Jalur RPL (Rekognisi Pembelajaran Lampau)
                                            </h3>

                                            <p class="text-sm text-slate-500 leading-relaxed mt-3">
                                                Bagi calon pendaftar lulusan D1/D2/D3/S1 atau yang memiliki
                                                pengalaman kerja formal untuk dikonversi menjadi sks
                                                perkuliahan.
                                            </p>

                                            <!-- PRICE -->
                                            <div class="mt-5 space-y-2">
                                                <div
                                                    class="inline-block bg-blue-50 text-blue-700 text-sm font-semibold px-4 py-2 rounded-lg">
                                                    Uang Pendaftaran + Jasa Layanan SALUT Rp. 800.000
                                                </div>

                                                <div
                                                    class="inline-block bg-blue-50 text-blue-700 text-sm font-semibold px-4 py-2 rounded-lg">
                                                    Uang Kuliah Mulai Rp 1.300.000 s/d Rp 2.200.000
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </label>
                            </div>

                            <!-- CARD NON RPL -->
                            <div id="card_jalur_nonrpl"
                                class="relative border-2 border-slate-200 rounded-2xl p-6 cursor-pointer hover:border-blue-300 transition duration-300 bg-white">

                                <label for="jalur_program_nonrpl" class="cursor-pointer block h-full">
                                    <div class="flex items-start gap-4">

                                        <!-- RADIO -->
                                        <div class="pt-1">
                                            <input id="jalur_program_nonrpl" name="jalur_program" type="radio"
                                                value="Non-RPL" checked
                                                class="h-5 w-5 text-blue-600 border-slate-300 focus:ring-blue-500">
                                        </div>

                                        <!-- CONTENT -->
                                        <div class="flex-1">

                                            <h3 class="text-[18px] font-bold text-slate-800 leading-snug font-outfit">
                                                Jalur Reguler (Non-RPL / Lulusan SMA Baru)
                                            </h3>

                                            <p class="text-sm text-slate-500 leading-relaxed mt-3">
                                                Bagi lulusan baru SMA/SMK/MA/Paket C sederajat yang
                                                memulai kuliah reguler dari semester 1 tanpa transfer sks.
                                            </p>

                                            <!-- PRICE -->
                                            <div class="mt-5 space-y-2">
                                                <div
                                                    class="inline-block bg-slate-100 text-slate-700 text-sm font-semibold px-4 py-2 rounded-lg">
                                                    Uang Pendaftaran + Jasa Layanan SALUT Rp. 500.000
                                                </div>

                                                <div
                                                    class="inline-block bg-slate-100 text-slate-700 text-sm font-semibold px-4 py-2 rounded-lg">
                                                    Uang Kuliah Mulai Rp 1.300.000 s/d Rp 2.200.000
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </label>
                            </div>

                        </div>
                    </div>
                    <!-- Fee Deskripsi Box -->
                    <div id="rpl_description"
                        class="hidden mb-8 p-6 rounded-2xl bg-amber-50 border border-amber-200/60 text-slate-700">
                        <h4 class="font-bold text-amber-800 mb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            Informasi Skema Biaya Pendaftaran Jalur RPL (Rekognisi Pendidikan Lampau):
                        </h4>
                        <ul class="list-disc list-inside text-sm space-y-1.5 ml-1 text-slate-600">
                            <li>Jasa Layanan SALUT Rp 400.000 (Admisi pendaftaran Registrasi Pendampingan & verifikasi
                                dokumen aktivasi sampai menjadi Mahasiswa UT serta layanan akademik lainya)</li>
                            <li>Uang Kuliah Per Semester: Rp 1.300.000 - Rp 2.200.000 (Tergantung Program Studi Pilihan)
                            </li>
                        </ul>
                    </div>

                    <div id="non_rpl_description"
                        class="mb-8 p-6 rounded-2xl bg-blue-50 border border-blue-100 text-slate-700">
                        <h4 class="font-bold text-blue-800 mb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                            Informasi Skema Biaya Pendaftaran Jalur Reguler (Non-RPL):
                        </h4>
                        <ul class="list-disc list-inside text-sm space-y-1.5 ml-1 text-slate-600">
                            <li>Untuk Jalur Non-RPL biaya Rp 100.000</li>
                            <li>Uang Kuliah Per Semester: Rp 1.300.000 - Rp 2.200.000 (Tergantung Program Studi Pilihan)
                            </li>
                        </ul>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="lokasi_ujian_provinsi"
                                class="block text-sm font-semibold text-slate-700 mb-2">Lokasi Tempat Ujian (Provinsi)
                                <span class="text-red-500">*</span></label>
                            <select id="lokasi_ujian_provinsi" name="lokasi_ujian_provinsi" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white">
                                <option value="">Pilih Provinsi Ujian</option>
                            </select>
                        </div>
                        <div>
                            <label for="lokasi_ujian_kab_kota"
                                class="block text-sm font-semibold text-slate-700 mb-2">Lokasi Tempat Ujian
                                (Kabupaten/Kota) <span class="text-red-500">*</span></label>
                            <select id="lokasi_ujian_kab_kota" name="lokasi_ujian_kab_kota" required disabled
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white disabled:bg-slate-100 disabled:text-slate-400">
                                <option value="">Pilih Provinsi Ujian Dahulu</option>
                            </select>
                        </div>
                        <div>
                            <label for="no_ijazah" class="block text-sm font-semibold text-slate-700 mb-2">Nomor
                                Ijazah Kelulusan Terakhir <span class="text-red-500">*</span></label>
                            <input type="text" id="no_ijazah" name="no_ijazah" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                placeholder="Masukkan nomor ijazah">
                        </div>
                        <div id="ipk_field_wrapper" class="hidden">
                            <label for="ipk" class="block text-sm font-semibold text-slate-700 mb-2">Nilai IPK
                                Kelulusan (Alih Kredit) <span class="text-red-500">*</span></label>
                            <input type="number" step="0.01" id="ipk" name="ipk"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                placeholder="Contoh: 3.50">
                        </div>
                    </div>
                </div>

                <!-- STEP 4: Unggah Berkas Persyaratan -->
                <div class="step-pane step-transition hidden" id="step4">
                    <div class="border-b border-slate-100 pb-4 mb-6">
                        <h2 class="text-2xl font-bold font-outfit text-slate-800">Langkah 4: Unggah Berkas Persyaratan
                            Terintegrasi</h2>
                        <p class="text-sm text-slate-500">Unggah salinan dokumen resmi Anda dalam format yang
                            ditentukan. Maksimum ukuran per berkas adalah 25 MB.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                            <span class="block text-sm font-bold text-slate-700 mb-1">Pas Foto Resmi <span
                                    class="text-red-500">*</span></span>
                            <span class="block text-xs text-slate-400 mb-3">Format: JPG, JPEG, PNG (Maks 25MB).
                                Background biru/merah, rapi dan formal.</span>
                            <input type="file" name="file_foto" id="file_foto" required
                                accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                                class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                        </div>
                        <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                            <span class="block text-sm font-bold text-slate-700 mb-1">Foto / Scan KTP Asli <span
                                    class="text-red-500">*</span></span>
                            <span class="block text-xs text-slate-400 mb-3">Format: JPG, JPEG, PNG (Maks 25MB).
                                Pastikan NIK dan tulisan terbaca jelas.</span>
                            <input type="file" name="file_ktp" id="file_ktp" required
                                accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                                class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                        </div>
                        <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                            <span class="block text-sm font-bold text-slate-700 mb-1" id="label_file_ijazah">Scan
                                Ijazah Terakhir <span class="text-red-500">*</span></span>
                            <span class="block text-xs text-slate-400 mb-3">Format: PDF Asli / Fotokopi (Legalisir Cap
                                Basah) (Maks 25MB).</span>
                            <input type="file" name="file_ijazah" id="file_ijazah" required
                                accept=".pdf,application/pdf"
                                class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                        </div>
                        <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                            <span class="block text-sm font-bold text-slate-700 mb-1" id="label_file_transkrip">Scan
                                Transkrip Nilai / SKHUN <span class="text-red-500">*</span></span>
                            <span class="block text-xs text-slate-400 mb-3">Format: PDF Asli / Fotokopi (Legalisir Cap
                                Basah) (Maks 25MB).</span>
                            <input type="file" name="file_transkrip" id="file_transkrip"
                                accept=".pdf,application/pdf"
                                class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                        </div>
                        <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                            <div class="flex justify-between items-start mb-1">
                                <span class="block text-sm font-bold text-slate-700">Surat Pernyataan Keabsahan Berkas
                                    <span class="text-red-500">*</span></span>
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
                            <span class="block text-xs text-slate-400 mb-3">Format: PDF (Maks 25MB). Cetak, isi data,
                                tanda tangan materai 10rb, dan scan.</span>
                            <input type="file" name="surat_pernyataan" id="surat_pernyataan" required
                                accept=".pdf,application/pdf"
                                class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                        </div>
                    </div>

                    <!-- RPL SPECIFIC EXTRA FILES (Conditional Grid) -->
                    <div id="rpl_file_section" class="hidden border-t border-slate-100 pt-8 mt-6">
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-blue-900 font-outfit">Berkas Khusus Tambahan Alih Kredit
                                (RPL)</h3>
                            <p class="text-xs text-slate-400">Berkas-berkas di bawah ini diwajibkan khusus untuk
                                verifikasi alih kredit mahasiswa alihan / lulusan diploma.</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div
                                class="border border-amber-100 bg-amber-50/20 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                                <span class="block text-sm font-bold text-slate-700 mb-1">Tangkapan Layar (Screenshot)
                                    PDDIKTI <span class="text-red-500">*</span></span>
                                <span class="block text-xs text-slate-400 mb-3">Format: JPG, JPEG, PNG (Maks
                                    25MB).</span>
                                <input type="file" name="file_ss_pddikti" id="file_ss_pddikti"
                                    accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                                    class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition bg-white">
                            </div>
                            <div
                                class="border border-amber-100 bg-amber-50/20 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                                <div class="flex justify-between items-start mb-1">
                                    <span class="block text-sm font-bold text-slate-700">Daftar Riwayat Hidup (CV)
                                        <span class="text-red-500">*</span></span>
                                    <a href="{{ asset('files/Formulir_Daftar_Riwayat_Hidup_Pemohon_0.docx') }}"
                                        download
                                        class="text-xs text-blue-600 hover:underline font-bold flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        Unduh Formulir CV
                                    </a>
                                </div>
                                <span class="block text-xs text-slate-400 mb-3">Format: PDF (Maks 25MB).</span>
                                <input type="file" name="file_cv" id="file_cv" accept=".pdf,application/pdf"
                                    class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition bg-white">
                            </div>
                            <div
                                class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300 col-span-1 md:col-span-2">
                                <span class="block text-sm font-bold text-slate-700 mb-1">Surat Keterangan Pindah (Dari
                                    Kampus Asal) <span
                                        class="text-xs text-slate-400 font-normal">(Opsional)</span></span>
                                <input type="file" name="surat_keterangan_pindah" id="surat_keterangan_pindah"
                                    accept=".pdf,application/pdf"
                                    class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                            </div>
                        </div>

                        <!-- RPL Pengalaman Kerja Header -->
                        <div class="mb-6 mt-6">
                            <h3 class="text-lg font-bold text-blue-900 font-outfit">Dokumen Pendukung Portofolio RPL
                                (Khusus Alih Kredit Berbasis Kerja)</h3>
                            <p class="text-xs text-slate-400">Unggah dokumen di bawah ini jika Anda ingin mengklaim
                                mata kuliah dari portofolio pengalaman kerja (Opsional).</p>
                        </div>

                        <!-- GRID 2 KOLOM UNTUK 4 FILE RPL -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div
                                class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                                <span class="block text-sm font-bold text-slate-700 mb-1">Dokumen Perangkat
                                    Pembelajaran <span
                                        class="text-xs text-slate-400 font-normal">(Opsional)</span></span>
                                <span class="block text-xs text-slate-400 mb-3">Format: PDF (Maks 25MB). RPP, Silabus,
                                    modul buatan sendiri, atau instrumen evaluasi.</span>
                                <input type="file" name="file_rpl_pembelajaran" id="file_rpl_pembelajaran"
                                    accept=".pdf,application/pdf"
                                    class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                            </div>
                            <div
                                class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                                <span class="block text-sm font-bold text-slate-700 mb-1">Dokumen Administrasi Kelas
                                    <span class="text-xs text-slate-400 font-normal">(Opsional)</span></span>
                                <span class="block text-xs text-slate-400 mb-3">Format: PDF (Maks 25MB). Surat
                                    keputusan pembagian tugas mengajar, daftar nilai siswa, absensi.</span>
                                <input type="file" name="file_rpl_administrasi" id="file_rpl_administrasi"
                                    accept=".pdf,application/pdf"
                                    class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                            </div>
                            <div
                                class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                                <span class="block text-sm font-bold text-slate-700 mb-1">Dokumen Pembina
                                    Ekstrakurikuler <span
                                        class="text-xs text-slate-400 font-normal">(Opsional)</span></span>
                                <span class="block text-xs text-slate-400 mb-3">Format: PDF (Maks 25MB). SK
                                    Pembimbing/Pelatih Ekskul, laporan program kerja ekskul pramuka/lainnya.</span>
                                <input type="file" name="file_rpl_ekstrakulikuler" id="file_rpl_ekstrakulikuler"
                                    accept=".pdf,application/pdf"
                                    class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                            </div>
                            <div
                                class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                                <span class="block text-sm font-bold text-slate-700 mb-1">Sertifikat Penghargaan /
                                    Prestasi <span class="text-xs text-slate-400 font-normal">(Opsional)</span></span>
                                <span class="block text-xs text-slate-400 mb-3">Format: PDF (Maks 25MB). Sertifikat
                                    pelatihan, piagam kejuaraan, atau penghargaan keahlian kerja.</span>
                                <input type="file" name="file_rpl_prestasi" id="file_rpl_prestasi"
                                    accept=".pdf,application/pdf"
                                    class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 5: Pembayaran & Finalisasi -->
                <div class="step-pane step-transition hidden" id="step5">
                    <div class="border-b border-slate-100 pb-4 mb-6">
                        <h2 class="text-2xl font-bold font-outfit text-slate-800">Langkah 5: Informasi Jasa Layanan &
                            Bukti Pembayaran</h2>
                        <p class="text-sm text-slate-500">Selesaikan biaya administrasi pendampingan pendaftaran di
                            SALUT Kota Bandung untuk memproses berkas Anda ke pusat.</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div
                            class="bg-gradient-to-br from-slate-900 to-slate-800 text-white rounded-2xl p-6 shadow-md border border-slate-700 flex flex-col justify-between">
                            <div>
                                <span
                                    class="block text-xs text-slate-400 font-semibold uppercase tracking-wider mb-1">Transfer
                                    Bank Resmi</span>
                                <span class="block text-2xl font-extrabold font-outfit text-gold-300">BRI</span>
                            </div>
                            <div class="mt-6">
                                <span class="block text-xs text-slate-400">Nomor Rekening:</span>
                                <span
                                    class="block text-xl font-bold font-mono text-white tracking-widest mt-0.5">3260-01-026857-53-7</span>
                                <span class="block text-xs text-slate-400 mt-2">Atas Nama:</span>
                                <span class="block text-sm font-semibold text-slate-200">UGAN SUGANDA</span>
                            </div>
                        </div>
                        <div
                            class="bg-white border border-slate-200 rounded-2xl p-6 flex flex-col justify-between md:col-span-2">
                            <div>
                                <h3 class="text-base font-bold text-slate-800 mb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-600"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Biaya Administrasi Jasa Layanan SALUT
                                </h3>
                                <p class="text-xs text-slate-500 leading-relaxed">Biaya jasa layanan pendaftaran dan
                                    pendampingan registrasi di SALUT Bandung adalah sebesar **Rp 400.000**. Setelah Anda
                                    mentransfer jumlah tersebut ke rekening di samping, silakan unggah foto/scan tanda
                                    bukti transfer yang sah di bagian bawah halaman ini.</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-8">
                        <label for="ukuran_almat" class="block text-sm font-semibold text-slate-700 mb-2">Ukuran Jas
                            Almamater (Opsional)</label>
                        <select id="ukuran_almat" name="ukuran_almat"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition bg-white">
                            <option value="">Pilih Ukuran</option>
                            <option value="S">S (Small)</option>
                            <option value="M">M (Medium)</option>
                            <option value="L">L (Large)</option>
                            <option value="XL">XL (Extra Large)</option>
                            <option value="XXL">XXL (Double Extra Large)</option>
                            <option value="XXXL">XXXL (Triple Extra Large)</option>
                        </select>
                    </div>
                    <div
                        class="border-2 border-dashed border-blue-200 rounded-3xl p-6 sm:p-8 bg-blue-50/20 text-center mb-8 hover:bg-blue-50/40 transition duration-300">
                        <div class="max-w-md mx-auto">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span class="block text-base font-bold text-slate-800 mb-1">Unggah Tanda Bukti Transfer
                                Pembayaran <span class="text-red-500">*</span></span>
                            <span class="block text-xs text-slate-400 mb-4">Format berkas: JPG, JPEG, PNG (Maksimal 25
                                MB).</span>
                            <input type="file" name="file_bukti_pembayaran" id="file_bukti_pembayaran" required
                                accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                                class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-5 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 transition">
                        </div>
                    </div>
                    <div
                        class="bg-slate-50 border border-slate-200 rounded-2xl p-5 mb-8 flex items-start space-x-3 text-slate-700 text-sm">
                        <input type="checkbox" id="declaration_check" required
                            class="h-5 w-5 rounded text-blue-600 border-slate-300 focus:ring-blue-500 mt-0.5">
                        <label for="declaration_check" class="leading-relaxed cursor-pointer font-medium">Saya dengan
                            ini menyatakan bahwa seluruh informasi dan berkas dokumen yang saya masukkan ke dalam
                            formulir pendaftaran ini adalah **benar, sah, dan dapat dipertanggungjawabkan**. Apabila di
                            kemudian hari ditemukan kecurangan/pemalsuan data, saya bersedia menerima sanksi pembatalan
                            status kemahasiswaan dari Universitas Terbuka.</label>
                    </div>
                </div>

                <!-- ========================================= -->
                <!-- FOOTER NAVIGATION BUTTONS - DI SINI! -->
                <!-- ========================================= -->
                <div class="flex justify-between items-center border-t border-slate-100 pt-6 mt-8">
                    <button type="button" id="prevBtn"
                        class="invisible inline-flex items-center space-x-2 border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 font-bold px-6 py-3 rounded-2xl transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span>Kembali</span>
                    </button>
                    <button type="button" id="nextBtn"
                        class="inline-flex items-center space-x-2 bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-3 rounded-2xl transition duration-300 shadow-md shadow-blue-500/20">
                        <span>Lanjutkan</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>

            </form>
        </div>
    </div>

    <!-- WIZARD INTERACTIVE SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let savedData = JSON.parse(sessionStorage.getItem('salut_form_data') || '{}');
            let currentStep = parseInt(sessionStorage.getItem('salut_current_step')) || 1;
            let maxReachedStep = parseInt(sessionStorage.getItem('salut_max_step')) || 1;

            function saveFormData() {
                const formData = {};
                document.querySelectorAll(
                    '#registrationForm input, #registrationForm select, #registrationForm textarea').forEach(
                    el => {
                        if (el.type === 'file' || el.type === 'submit' || el.type === 'hidden') return;
                        if (el.name) {
                            if (el.type === 'checkbox' || el.type === 'radio') {
                                if (el.checked) formData[el.name] = el.value;
                            } else {
                                formData[el.name] = el.value;
                            }
                        }
                    });
                sessionStorage.setItem('salut_form_data', JSON.stringify(formData));
                sessionStorage.setItem('salut_current_step', currentStep);
                sessionStorage.setItem('salut_max_step', maxReachedStep);
            }

            document.getElementById('registrationForm').addEventListener('input', saveFormData);
            document.getElementById('registrationForm').addEventListener('change', saveFormData);

            document.querySelectorAll(
                '#registrationForm input, #registrationForm select, #registrationForm textarea').forEach(el => {
                if (el.type === 'file' || el.type === 'submit' || el.type === 'hidden') return;
                if (el.name && savedData[el.name] !== undefined) {
                    if (el.type === 'checkbox' || el.type === 'radio') {
                        if (el.value === savedData[el.name]) el.checked = true;
                    } else {
                        el.value = savedData[el.name];
                    }
                }
            });

            const GITHUB_URL = 'https://raw.githubusercontent.com/ibnux/data-indonesia/master/';
            const provinsiDropdown = document.getElementById('provinsi');
            const kabKotaDropdown = document.getElementById('kab_kota');
            const kecamatanDropdown = document.getElementById('kecamatan');
            const desaKelurahanDropdown = document.getElementById('desa_kelurahan');
            const lokasiUjianProvinsiDropdown = document.getElementById('lokasi_ujian_provinsi');
            const lokasiUjianKabKotaDropdown = document.getElementById('lokasi_ujian_kab_kota');




            function populateDropdown(dropdown, data, defaultOptionText) {
                dropdown.innerHTML = `<option value="">${defaultOptionText}</option>`;
                data.forEach(item => {
                    const option = document.createElement('option');
                    option.value = item.nama;
                    option.textContent = item.nama;
                    option.dataset.id = item.id;
                    dropdown.appendChild(option);
                });
            }

            fetch(GITHUB_URL + 'provinsi.json')
                .then(response => response.json())
                .then(data => {
                    populateDropdown(provinsiDropdown, data, 'Pilih Provinsi');
                    populateDropdown(lokasiUjianProvinsiDropdown, data, 'Pilih Provinsi Ujian');
                    if (savedData['provinsi']) {
                        provinsiDropdown.value = savedData['provinsi'];
                        provinsiDropdown.dispatchEvent(new Event('change'));
                    }
                    if (savedData['lokasi_ujian_provinsi']) {
                        lokasiUjianProvinsiDropdown.value = savedData['lokasi_ujian_provinsi'];
                        lokasiUjianProvinsiDropdown.dispatchEvent(new Event('change'));
                    }
                }).catch(err => {
                    provinsiDropdown.innerHTML = '<option value="">Gagal memuat data provinsi</option>';
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
                            populateDropdown(kabKotaDropdown, data, 'Pilih Kab/Kota');
                            kabKotaDropdown.disabled = false;
                            if (savedData['kab_kota']) {
                                const optionExists = Array.from(kabKotaDropdown.options).some(opt => opt
                                    .value === savedData['kab_kota']);
                                if (optionExists) {
                                    kabKotaDropdown.value = savedData['kab_kota'];
                                    kabKotaDropdown.dispatchEvent(new Event('change'));
                                }
                            }
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
                            populateDropdown(lokasiUjianKabKotaDropdown, data, 'Pilih Kab/Kota Ujian');
                            lokasiUjianKabKotaDropdown.disabled = false;
                            if (savedData['lokasi_ujian_kab_kota']) {
                                const optionExists = Array.from(lokasiUjianKabKotaDropdown.options)
                                    .some(opt => opt.value === savedData['lokasi_ujian_kab_kota']);
                                if (optionExists) {
                                    lokasiUjianKabKotaDropdown.value = savedData[
                                        'lokasi_ujian_kab_kota'];
                                }
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
                            populateDropdown(kecamatanDropdown, data, 'Pilih Kecamatan');
                            kecamatanDropdown.disabled = false;
                            if (savedData['kecamatan']) {
                                const optionExists = Array.from(kecamatanDropdown.options).some(opt =>
                                    opt.value === savedData['kecamatan']);
                                if (optionExists) {
                                    kecamatanDropdown.value = savedData['kecamatan'];
                                    kecamatanDropdown.dispatchEvent(new Event('change'));
                                }
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
                            populateDropdown(desaKelurahanDropdown, data, 'Pilih Desa/Kelurahan');
                            desaKelurahanDropdown.disabled = false;
                            if (savedData['desa_kelurahan']) {
                                const optionExists = Array.from(desaKelurahanDropdown.options).some(
                                    opt => opt.value === savedData['desa_kelurahan']);
                                if (optionExists) {
                                    desaKelurahanDropdown.value = savedData['desa_kelurahan'];
                                }
                            }
                        });
                }
            });

            const totalSteps = 5;
            const form = document.getElementById('registrationForm');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            if (currentStep > 1) {
                setTimeout(() => {
                    updateWizardUI();
                    window.scrollTo({
                        top: 150,
                        behavior: 'smooth'
                    });
                }, 100);
            }

            function getStepPane(step) {
                return document.getElementById('step' + step);
            }

            function updateWizardUI() {
                for (let i = 1; i <= totalSteps; i++) {
                    const pane = getStepPane(i);
                    if (i === currentStep) {
                        pane.classList.remove('hidden');
                    } else {
                        pane.classList.add('hidden');
                    }
                }

                document.querySelectorAll('.step-node').forEach((node) => {
                    const stepNum = parseInt(node.dataset.step);
                    const circle = node.querySelector('div');
                    const text = node.querySelector('span');

                    if (stepNum <= maxReachedStep) {
                        node.style.cursor = 'pointer';
                        node.title = 'Klik untuk menuju ke langkah ini';
                    } else {
                        node.style.cursor = 'not-allowed';
                        node.title = 'Anda harus menyelesaikan langkah sebelumnya';
                    }

                    if (stepNum < currentStep) {
                        circle.className =
                            "w-10 h-10 rounded-full bg-emerald-500 text-white flex items-center justify-center font-bold shadow-sm transition duration-300 ring-4 ring-emerald-50";
                        circle.innerHTML =
                            `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>`;
                        if (text) {
                            text.classList.remove('text-slate-500', 'text-blue-600');
                            text.classList.add('text-emerald-600', 'font-bold');
                        }
                    } else if (stepNum === currentStep) {
                        circle.className =
                            "w-10 h-10 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold shadow-md transition duration-300 ring-4 ring-blue-100";
                        circle.innerHTML = stepNum;
                        if (text) {
                            text.classList.remove('text-slate-500', 'text-emerald-600');
                            text.classList.add('text-blue-600', 'font-bold');
                        }
                    } else {
                        circle.className =
                            "w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold transition duration-300";
                        circle.innerHTML = stepNum;
                        if (text) {
                            text.classList.remove('text-blue-600', 'text-emerald-600', 'font-bold');
                            text.classList.add('text-slate-500');
                        }
                    }
                });

                const stepBar = document.getElementById('step-bar');
                const progressPercent = ((currentStep - 1) / (totalSteps - 1)) * 100;
                stepBar.style.width = progressPercent + '%';

                if (currentStep === 1) {
                    prevBtn.classList.add('invisible');
                } else {
                    prevBtn.classList.remove('invisible');
                }

                if (currentStep === totalSteps) {
                    nextBtn.innerHTML =
                        `<span>Kirim Pendaftaran</span><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" /></svg>`;
                    nextBtn.className =
                        "inline-flex items-center space-x-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-8 py-3 rounded-2xl transition duration-300 shadow-md shadow-emerald-500/20";
                } else {
                    nextBtn.innerHTML =
                        `<span>Lanjutkan</span><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>`;
                    nextBtn.className =
                        "inline-flex items-center space-x-2 bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-3 rounded-2xl transition duration-300 shadow-md shadow-blue-500/20";
                }
            }

            function validateCurrentStep() {
                const activePane = getStepPane(currentStep);
                const inputs = activePane.querySelectorAll('input, select, textarea');
                let stepValid = true;
                for (let i = 0; i < inputs.length; i++) {
                    const el = inputs[i];
                    if (el.disabled) continue;
                    if (!el.checkValidity()) {
                        el.reportValidity();
                        stepValid = false;
                        break;
                    }
                }
                return stepValid;
            }

            nextBtn.addEventListener('click', function(e) {
                if (validateCurrentStep()) {
                    if (currentStep < totalSteps) {
                        currentStep++;
                        maxReachedStep = Math.max(maxReachedStep, currentStep);
                        saveFormData();
                        updateWizardUI();
                        window.scrollTo({
                            top: 150,
                            behavior: 'smooth'
                        });
                    } else {
                        Swal.fire({
                            title: 'Konfirmasi Pendaftaran',
                            text: 'Apakah Anda yakin seluruh berkas dan data diri sudah terisi dengan benar?',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#2563eb',
                            cancelButtonColor: '#64748b',
                            confirmButtonText: 'Ya, Kirim Pendaftaran!',
                            cancelButtonText: 'Batal',
                            reverseButtons: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: 'Sedang Memproses...',
                                    text: 'Mohon tunggu, data Anda sedang kami simpan.',
                                    icon: 'info',
                                    allowOutsideClick: false,
                                    showConfirmButton: false,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    }
                                });
                                sessionStorage.removeItem('salut_form_data');
                                sessionStorage.removeItem('salut_current_step');
                                sessionStorage.removeItem('salut_max_step');
                                form.submit();
                            }
                        });
                    }
                }
            });

            prevBtn.addEventListener('click', function() {
                if (currentStep > 1) {
                    currentStep--;
                    saveFormData();
                    updateWizardUI();
                    window.scrollTo({
                        top: 150,
                        behavior: 'smooth'
                    });
                }
            });

            document.querySelectorAll('.step-node').forEach((node) => {
                node.addEventListener('click', function() {
                    const stepNum = parseInt(this.dataset.step);
                    if (stepNum <= maxReachedStep && stepNum !== currentStep) {
                        if (stepNum > currentStep) {
                            if (!validateCurrentStep()) return;
                        }
                        currentStep = stepNum;
                        saveFormData();
                        updateWizardUI();
                        window.scrollTo({
                            top: 150,
                            behavior: 'smooth'
                        });
                    }
                });
            });

            const rplRadio = document.getElementById('jalur_program_rpl');
            const nonRplRadio = document.getElementById('jalur_program_nonrpl');
            const ipkFieldWrapper = document.getElementById('ipk_field_wrapper');
            const ipkInput = document.getElementById('ipk');
            const rplFileSection = document.getElementById('rpl_file_section');
            const rplSS = document.getElementById('file_ss_pddikti');
            const rplCv = document.getElementById('file_cv');
            const rplDescription = document.getElementById('rpl_description');
            const nonRplDescription = document.getElementById('non_rpl_description');

            function handleJalurChange() {
                const isRpl = rplRadio.checked;
                const cardRpl = document.getElementById('card_jalur_rpl');
                const cardNonRpl = document.getElementById('card_jalur_nonrpl');

                if (isRpl) {
                    cardRpl.className =
                        "relative border-2 border-blue-500 bg-blue-50/10 rounded-2xl p-6 cursor-pointer transition duration-300";
                    cardNonRpl.className =
                        "relative border border-slate-200 rounded-2xl p-6 cursor-pointer hover:border-blue-300 transition duration-300";

                    // Toggle descriptions - TAMBAHKAN INI
                    rplDescription.classList.remove('hidden');
                    nonRplDescription.classList.add('hidden');

                    ipkFieldWrapper.classList.remove('hidden');
                    ipkInput.disabled = false;
                    ipkInput.required = true;
                    rplFileSection.classList.remove('hidden');
                    rplSS.disabled = false;
                    rplSS.required = true;
                    rplCv.disabled = false;
                    rplCv.required = true;
                    document.getElementById('label_file_ijazah').innerHTML =
                        'Scan Ijazah Diploma/S1 (Asli/Legalisir) <span class="text-red-500">*</span>';
                    document.getElementById('label_file_transkrip').innerHTML =
                        'Scan Transkrip Nilai Terakhir (Legalisir) <span class="text-red-500">*</span>';
                    document.getElementById('file_transkrip').required = true;
                } else {
                    cardRpl.className =
                        "relative border border-slate-200 rounded-2xl p-6 cursor-pointer hover:border-blue-300 transition duration-300";
                    cardNonRpl.className =
                        "relative border-2 border-blue-500 bg-blue-50/10 rounded-2xl p-6 cursor-pointer transition duration-300";

                    // Toggle descriptions - TAMBAHKAN INI
                    rplDescription.classList.add('hidden');
                    nonRplDescription.classList.remove('hidden');

                    ipkFieldWrapper.classList.add('hidden');
                    ipkInput.disabled = true;
                    ipkInput.required = false;
                    rplFileSection.classList.add('hidden');
                    rplSS.disabled = true;
                    rplSS.required = false;
                    rplCv.disabled = true;
                    rplCv.required = false;
                    document.getElementById('label_file_ijazah').innerHTML =
                        'Scan Ijazah SMA/SMK Sederajat (Asli/Legalisir) <span class="text-red-500">*</span>';
                    document.getElementById('label_file_transkrip').innerHTML =
                        'Scan SKHUN / Transkrip Nilai <span class="text-xs text-slate-400 font-normal">(Opsional)</span>';
                    document.getElementById('file_transkrip').required = false;
                }
            }

            rplRadio.addEventListener('change', handleJalurChange);
            nonRplRadio.addEventListener('change', handleJalurChange);
            handleJalurChange();

            document.getElementById('card_jalur_rpl').addEventListener('click', function() {
                rplRadio.checked = true;
                handleJalurChange();
            });
            document.getElementById('card_jalur_nonrpl').addEventListener('click', function() {
                nonRplRadio.checked = true;
                handleJalurChange();
            });

            const alamatYa = document.getElementById('alamat_pengirim_modul_ya');
            const alamatTidak = document.getElementById('alamat_pengirim_modul_tidak');
            const alamatLainDiv = document.getElementById('alamat_lain_field');
            const alamatLainInput = document.getElementById('alamat_lain_input');

            function handleAlamatChange() {
                if (alamatTidak.checked) {
                    alamatLainDiv.classList.remove('hidden');
                    alamatLainInput.disabled = false;
                    alamatLainInput.required = true;
                } else {
                    alamatLainDiv.classList.add('hidden');
                    alamatLainInput.disabled = true;
                    alamatLainInput.required = false;
                }
            }

            alamatYa.addEventListener('change', handleAlamatChange);
            alamatTidak.addEventListener('change', handleAlamatChange);
            handleAlamatChange();

            const imageInputs = [document.getElementById('file_foto'), document.getElementById('file_ktp'), document
                .getElementById('file_ss_pddikti'), document.getElementById('file_bukti_pembayaran')
            ];
            imageInputs.forEach(input => {
                if (input) {
                    input.addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            const allowedMimes = ['image/jpeg', 'image/png', 'image/jpg'];
                            if (!allowedMimes.includes(file.type) && !file.name.toLowerCase()
                                .endsWith('.jpg') && !file.name.toLowerCase().endsWith('.jpeg') && !
                                file.name.toLowerCase().endsWith('.png')) {
                                alert(
                                    'Format tidak sesuai! Silakan unggah berkas foto berformat JPG, JPEG, atau PNG.'
                                );
                                this.value = '';
                            } else if (file.size > 25 * 1024 * 1024) {
                                alert(
                                    'Ukuran file terlalu besar! Ukuran berkas maksimum adalah 25 Megabytes (25 MB).'
                                );
                                this.value = '';
                            }
                        }
                    });
                }
            });

            const pdfInputs = [document.getElementById('file_ijazah'), document.getElementById('file_transkrip'),
                document.getElementById('surat_pernyataan'), document.getElementById('file_cv'), document
                .getElementById('surat_keterangan_pindah'), document.getElementById('file_rpl_pembelajaran'),
                document.getElementById('file_rpl_administrasi'), document.getElementById(
                    'file_rpl_ekstrakulikuler'), document.getElementById('file_rpl_prestasi')
            ];
            pdfInputs.forEach(input => {
                if (input) {
                    input.addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            if (!file.name.toLowerCase().endsWith('.pdf') && file.type !==
                                'application/pdf') {
                                alert('Format tidak sesuai! Silakan unggah berkas berformat PDF.');
                                this.value = '';
                            } else if (file.size > 25 * 1024 * 1024) {
                                alert(
                                    'Ukuran file terlalu besar! Ukuran berkas maksimum adalah 25 Megabytes (25 MB).'
                                );
                                this.value = '';
                            }
                        }
                    });
                }
            });
        });
    </script>

    <!-- Alert untuk error pendaftaran -->
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
            @if ($errors->has('provinsi'))
                errorMessages.push('• {{ $errors->first('provinsi') }}');
            @endif
            @if ($errors->has('kab_kota'))
                errorMessages.push('• {{ $errors->first('kab_kota') }}');
            @endif
            @if ($errors->has('kecamatan'))
                errorMessages.push('• {{ $errors->first('kecamatan') }}');
            @endif
            @if ($errors->has('desa_kelurahan'))
                errorMessages.push('• {{ $errors->first('desa_kelurahan') }}');
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
                    !$errors->has('file_bukti_pembayaran') &&
                    !$errors->has('provinsi') &&
                    !$errors->has('kab_kota') &&
                    !$errors->has('kecamatan') &&
                    !$errors->has('desa_kelurahan'))
                errorMessages.push('• {{ $errors->first() }}');
            @endif
            let errorText = errorMessages.join('\n');
            Swal.fire({
                icon: 'error',
                title: 'Gagal Mendaftar!',
                html: errorText.replace(/\n/g, '<br>'),
                confirmButtonColor: '#dc2626',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        </script>
    @endif
</x-user-layout>
