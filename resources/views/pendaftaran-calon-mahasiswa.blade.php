<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Calon Mahasiswa - SALUT Kota Bandung</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        outfit: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f4ff',
                            100: '#d9e2ff',
                            200: '#bacaff',
                            300: '#8ca7ff',
                            400: '#597bff',
                            500: '#3b5cff',
                            600: '#253dff',
                            700: '#1d2ee6',
                            800: '#1724bf',
                            900: '#131e9c',
                            950: '#0b105c',
                        },
                        gold: {
                            50: '#fdfbeb',
                            100: '#faf3c7',
                            200: '#f4e38c',
                            300: '#edcd4c',
                            400: '#e5b51d',
                            500: '#cca014',
                            600: '#a37c0f',
                            700: '#805d10',
                            800: '#664a13',
                            900: '#543d15',
                            950: '#302008',
                        }
                    }
                }
            }
        }
    </script>
    <link rel="shortcut icon" href="{{ asset('images/icon-web.png') }}">
    <style>
        .step-transition {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glassmorphism {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .glass-dark {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        input[type="radio"]:checked + label {
            border-color: #3b5cff;
            background-color: #f0f4ff;
        }

        /* === FILE PREVIEW STYLES === */
        .file-upload-wrapper {
            position: relative;
        }
        .preview-btn {
            display: none;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 10px;
            padding: 6px 14px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
            cursor: pointer;
            transition: all 0.2s;
        }
        .preview-btn:hover {
            background: #dbeafe;
            color: #1d4ed8;
        }
        .preview-btn.show {
            display: inline-flex;
        }

        /* === MODAL OVERLAY === */
        #file-preview-modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(0,0,0,0.75);
            backdrop-filter: blur(6px);
            align-items: center;
            justify-content: center;
            padding: 16px;
        }
        #file-preview-modal.open {
            display: flex;
        }
        #file-preview-modal .modal-box {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            width: 100%;
            max-width: 860px;
            max-height: 92vh;
            display: flex;
            flex-direction: column;
            box-shadow: 0 25px 60px rgba(0,0,0,0.4);
            animation: modalIn 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }
        @keyframes modalIn {
            from { opacity: 0; transform: scale(0.93) translateY(16px); }
            to   { opacity: 1; transform: scale(1) translateY(0); }
        }
        #file-preview-modal .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 16px 20px;
            border-bottom: 1px solid #f1f5f9;
            background: #f8fafc;
        }
        #file-preview-modal .modal-body {
            flex: 1;
            overflow: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0f172a;
            min-height: 300px;
        }
        #file-preview-modal iframe {
            width: 100%;
            height: 70vh;
            border: none;
        }
        #file-preview-modal img {
            max-width: 100%;
            max-height: 70vh;
            object-fit: contain;
        }
    </style>

</head>

<body class="bg-slate-50 text-slate-800 font-sans min-h-screen flex flex-col antialiased">

    <x-navbar />

    <!-- Header Hero Section -->
    <section class="relative bg-gradient-to-r from-brand-950 to-brand-800 text-white py-16 overflow-hidden">
        <div class="absolute inset-0 opacity-15">
            <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-gold-400 blur-3xl"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full bg-brand-400 blur-3xl"></div>
            <div class="w-full h-full bg-[radial-gradient(#ffffff_1px,transparent_1px)] [background-size:24px_24px]"></div>
        </div>
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <span class="inline-flex items-center space-x-2 bg-brand-700/50 text-gold-300 text-xs font-semibold px-4 py-1.5 rounded-full mb-4 border border-brand-500/30 uppercase tracking-widest">
                Formulir Pendaftaran
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold font-outfit tracking-tight mb-4 text-white">Pendaftaran Calon Mahasiswa</h1>
            <p class="text-lg text-slate-200 max-w-2xl mx-auto font-light leading-relaxed">
                Silakan isi data diri Anda secara lengkap dan unggah berkas persyaratan yang diperlukan melalui sistem pendaftaran pintar di bawah.
            </p>
        </div>
    </section>

    <!-- Main Registration Container -->
    <main class="flex-1 max-w-5xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-12 -mt-10 relative z-20">
        
        <!-- Registration Form Card -->
        <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden">
            
            <!-- Steps Progress Stepper -->
            <div class="bg-slate-50/80 border-b border-slate-100 px-6 py-6 sm:px-10">
                <div class="flex items-center justify-between relative max-w-3xl mx-auto">
                    <!-- Line behind the steps -->
                    <div class="absolute left-0 right-0 top-1/2 -translate-y-1/2 h-1 bg-slate-200 z-0"></div>
                    <div id="step-bar" class="absolute left-0 top-1/2 -translate-y-1/2 h-1 bg-brand-500 z-0 transition-all duration-500" style="width: 0%;"></div>

                    <!-- Step 1 Indicator -->
                    <div class="relative z-10 flex flex-col items-center step-node active" data-step="1">
                        <div class="w-10 h-10 rounded-full bg-brand-600 text-white flex items-center justify-center font-bold shadow-md transition duration-300 ring-4 ring-brand-100">1</div>
                        <span class="text-xs font-semibold text-slate-800 mt-2 hidden sm:block">Profil Diri</span>
                    </div>

                    <!-- Step 2 Indicator -->
                    <div class="relative z-10 flex flex-col items-center step-node" data-step="2">
                        <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold transition duration-300">2</div>
                        <span class="text-xs font-semibold text-slate-500 mt-2 hidden sm:block">Kontak</span>
                    </div>

                    <!-- Step 3 Indicator -->
                    <div class="relative z-10 flex flex-col items-center step-node" data-step="3">
                        <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold transition duration-300">3</div>
                        <span class="text-xs font-semibold text-slate-500 mt-2 hidden sm:block">Jalur Program</span>
                    </div>

                    <!-- Step 4 Indicator -->
                    <div class="relative z-10 flex flex-col items-center step-node" data-step="4">
                        <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold transition duration-300">4</div>
                        <span class="text-xs font-semibold text-slate-500 mt-2 hidden sm:block">Unggah Berkas</span>
                    </div>

                    <!-- Step 5 Indicator -->
                    <div class="relative z-10 flex flex-col items-center step-node" data-step="5">
                        <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold transition duration-300">5</div>
                        <span class="text-xs font-semibold text-slate-500 mt-2 hidden sm:block">Pembayaran</span>
                    </div>
                </div>
            </div>

            <!-- Form Start -->
            <form action="{{ route('pendaftaran.store') }}" method="POST" enctype="multipart/form-data" id="registrationForm" class="p-6 sm:p-10">
                @csrf

                <!-- STEP 1: Profil Calon Mahasiswa -->
                <div class="step-pane step-transition" id="step1">
                    <div class="border-b border-slate-100 pb-4 mb-6">
                        <h2 class="text-2xl font-bold font-outfit text-slate-800">Langkah 1: Informasi Profil Calon Mahasiswa</h2>
                        <p class="text-sm text-slate-500">Masukkan detail data pribadi Anda sesuai dengan dokumen resmi (KTP/Ijazah).</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Lengkap -->
                        <div>
                            <label for="nama" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap (Sesuai Ijazah) <span class="text-red-500">*</span></label>
                            <input type="text" id="nama" name="nama" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition" placeholder="Masukkan nama lengkap Anda">
                        </div>

                        <!-- NIK -->
                        <div>
                            <label for="nik" class="block text-sm font-semibold text-slate-700 mb-2">Nomor Induk Kependudukan (NIK) <span class="text-red-500">*</span></label>
                            <input type="text" id="nik" name="nik" required minlength="16" maxlength="16" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition" placeholder="Masukkan 16 digit NIK">
                        </div>

                        <!-- Tempat Lahir -->
                        <div>
                            <label for="tempat_lahir" class="block text-sm font-semibold text-slate-700 mb-2">Tempat Lahir <span class="text-red-500">*</span></label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition" placeholder="Contoh: Bandung">
                        </div>

                        <!-- Tanggal Lahir -->
                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-semibold text-slate-700 mb-2">Tanggal Lahir <span class="text-red-500">*</span></label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition">
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label for="gender" class="block text-sm font-semibold text-slate-700 mb-2">Jenis Kelamin <span class="text-red-500">*</span></label>
                            <select id="gender" name="gender" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition bg-white">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <!-- Agama -->
                        <div>
                            <label for="agama" class="block text-sm font-semibold text-slate-700 mb-2">Agama <span class="text-red-500">*</span></label>
                            <select id="agama" name="agama" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition bg-white">
                                <option value="">Pilih Agama</option>
                                <option value="islam">Islam</option>
                                <option value="kristen">Kristen</option>
                                <option value="katolik">Katolik</option>
                                <option value="hindu">Hindu</option>
                                <option value="buddha">Buddha</option>
                                <option value="konghucu">Konghucu</option>
                            </select>
                        </div>

                        <!-- Status Perkawinan -->
                        <div>
                            <label for="status" class="block text-sm font-semibold text-slate-700 mb-2">Status Perkawinan <span class="text-red-500">*</span></label>
                            <select id="status" name="status" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition bg-white">
                                <option value="">Pilih Status</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                        </div>

                        <!-- Nama Ibu Kandung -->
                        <div>
                            <label for="nama_ibu_kandung" class="block text-sm font-semibold text-slate-700 mb-2">Nama Ibu Kandung <span class="text-red-500">*</span></label>
                            <input type="text" id="nama_ibu_kandung" name="nama_ibu_kandung" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition" placeholder="Masukkan nama ibu kandung">
                        </div>

                        <!-- Ukuran Almamater -->
                        <div>
                            <label for="ukuran_almat" class="block text-sm font-semibold text-slate-700 mb-2">Ukuran Jas Almamater <span class="text-red-500">*</span></label>
                            <select id="ukuran_almat" name="ukuran_almat" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition bg-white">
                                <option value="">Pilih Ukuran</option>
                                <option value="S">S (Small)</option>
                                <option value="M">M (Medium)</option>
                                <option value="L">L (Large)</option>
                                <option value="XL">XL (Extra Large)</option>
                                <option value="XXL">XXL (Double Extra Large)</option>
                                <option value="XXXL">XXXL (Triple Extra Large)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: Alamat & Kontak -->
                <div class="step-pane step-transition hidden" id="step2">
                    <div class="border-b border-slate-100 pb-4 mb-6">
                        <h2 class="text-2xl font-bold font-outfit text-slate-800">Langkah 2: Alamat Lengkap & Informasi Kontak</h2>
                        <p class="text-sm text-slate-500">Tentukan alamat domisili pengiriman modul pembelajaran serta nomor kontak aktif Anda.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Provinsi -->
                        <div>
                            <label for="provinsi" class="block text-sm font-semibold text-slate-700 mb-2">Provinsi <span class="text-red-500">*</span></label>
                            <select id="provinsi" name="provinsi" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition bg-white">
                                <option value="">Memuat provinsi...</option>
                            </select>
                        </div>

                        <!-- Kabupaten / Kota -->
                        <div>
                            <label for="kab_kota" class="block text-sm font-semibold text-slate-700 mb-2">Kabupaten / Kota <span class="text-red-500">*</span></label>
                            <select id="kab_kota" name="kab_kota" required disabled class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition bg-white disabled:bg-slate-100 disabled:text-slate-400">
                                <option value="">Pilih Provinsi Dahulu</option>
                            </select>
                        </div>

                        <!-- Kecamatan -->
                        <div>
                            <label for="kecamatan" class="block text-sm font-semibold text-slate-700 mb-2">Kecamatan <span class="text-red-500">*</span></label>
                            <select id="kecamatan" name="kecamatan" required disabled class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition bg-white disabled:bg-slate-100 disabled:text-slate-400">
                                <option value="">Pilih Kabupaten/Kota Dahulu</option>
                            </select>
                        </div>

                        <!-- Kelurahan / Desa -->
                        <div>
                            <label for="desa_kelurahan" class="block text-sm font-semibold text-slate-700 mb-2">Kelurahan / Desa <span class="text-red-500">*</span></label>
                            <select id="desa_kelurahan" name="desa_kelurahan" required disabled class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition bg-white disabled:bg-slate-100 disabled:text-slate-400">
                                <option value="">Pilih Kecamatan Dahulu</option>
                            </select>
                        </div>

                        <!-- Kode Pos -->
                        <div>
                            <label for="kode_pos" class="block text-sm font-semibold text-slate-700 mb-2">Kode Pos <span class="text-red-500">*</span></label>
                            <input type="text" id="kode_pos" name="kode_pos" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition" placeholder="Masukkan 5 digit kode pos">
                        </div>
                    </div>

                    <!-- Alamat Lengkap -->
                    <div class="mb-6">
                        <label for="alamat" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Lengkap Rumah (Sesuai KTP) <span class="text-red-500">*</span></label>
                        <textarea id="alamat" name="alamat" required rows="3" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition" placeholder="Tuliskan jalan, nomor rumah, RT/RW lengkap..."></textarea>
                    </div>

                    <!-- Alamat Pengiriman Modul (Radio) -->
                    <div class="mb-6 bg-slate-50 p-6 rounded-2xl border border-slate-100">
                        <label class="block text-sm font-semibold text-slate-700 mb-3">Apakah alamat pengiriman modul kuliah sama dengan alamat KTP? <span class="text-red-500">*</span></label>
                        <div class="flex space-x-6">
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="radio" name="alamat_pengirim_modul" value="ya" id="alamat_pengirim_modul_ya" checked class="h-4 w-4 text-brand-600 border-slate-300 focus:ring-brand-500">
                                <span class="text-sm font-medium text-slate-700">Ya, sama dengan KTP</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="radio" name="alamat_pengirim_modul" value="tidak" id="alamat_pengirim_modul_tidak" class="h-4 w-4 text-brand-600 border-slate-300 focus:ring-brand-500">
                                <span class="text-sm font-medium text-slate-700">Tidak, kirim ke alamat lain</span>
                            </label>
                        </div>

                        <!-- Alamat Pengiriman Modul Lain (Conditional) -->
                        <div id="alamat_lain_field" class="mt-4 hidden transition duration-300">
                            <label for="alamat_lain_input" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Pengiriman Modul Lainnya <span class="text-red-500">*</span></label>
                            <textarea id="alamat_lain_input" name="alamat_lain" rows="3" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition bg-white" placeholder="Masukkan alamat lengkap tujuan pengiriman buku modul..."></textarea>
                        </div>
                    </div>

                    <!-- Kontak Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Nomor HP -->
                        <div>
                            <label for="no_hp" class="block text-sm font-semibold text-slate-700 mb-2">Nomor HP (WhatsApp Aktif) <span class="text-red-500">*</span></label>
                            <input type="text" id="no_hp" name="no_hp" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition" placeholder="Contoh: 08123456789">
                        </div>

                        <!-- Nomor HP Alternatif -->
                        <div>
                            <label for="no_hp_alternatif" class="block text-sm font-semibold text-slate-700 mb-2">Nomor HP Kerabat / Alternatif <span class="text-red-500">*</span></label>
                            <input type="text" id="no_hp_alternatif" name="no_hp_alternatif" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition" placeholder="Nomor kontak darurat">
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Email Aktif <span class="text-red-500">*</span></label>
                            <input type="email" id="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition" placeholder="nama@email.com">
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Jalur Program & Lokasi -->
                <div class="step-pane step-transition hidden" id="step3">
                    <div class="border-b border-slate-100 pb-4 mb-6">
                        <h2 class="text-2xl font-bold font-outfit text-slate-800">Langkah 3: Pilihan Jalur Program & Lokasi Kuliah</h2>
                        <p class="text-sm text-slate-500">Pilihlah tipe pendaftaran Anda (RPL atau Reguler Non-RPL) dan tempat pelaksanaan ujian.</p>
                    </div>

                    <!-- Jalur Program Pilihan Cards -->
                    <div class="mb-8">
                        <label class="block text-sm font-bold text-slate-700 mb-4">Jalur Pendaftaran Program <span class="text-red-500">*</span></label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            
                            <!-- RPL Card -->
                            <div class="relative border-2 border-slate-200 rounded-2xl p-6 cursor-pointer hover:border-brand-300 transition duration-300" id="card_jalur_rpl">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="jalur_program_rpl" name="jalur_program" type="radio" value="RPL" required class="focus:ring-brand-500 h-5 w-5 text-brand-600 border-slate-300">
                                    </div>
                                    <label for="jalur_program_rpl" class="ml-3 cursor-pointer">
                                        <span class="block text-lg font-bold text-brand-900 font-outfit">Jalur RPL (Rekognisi Pembelajaran Lampau)</span>
                                        <span class="block text-xs text-slate-500 mt-1 leading-relaxed">
                                            Bagi calon pendaftar lulusan D1/D2/D3/S1 atau yang memiliki pengalaman kerja formal untuk dikonversi menjadi sks perkuliahan.
                                        </span>
                                        <span class="inline-block mt-3 bg-brand-50 text-brand-700 text-xs font-bold px-2.5 py-1 rounded-md">Uang Kuliah Mulai Rp 400.000 s/d Rp 2.200.000 + Biaya Adm UT</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Non-RPL Card -->
                            <div class="relative border-2 border-slate-200 rounded-2xl p-6 cursor-pointer hover:border-brand-300 transition duration-300" id="card_jalur_nonrpl">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="jalur_program_nonrpl" name="jalur_program" type="radio" value="Non-RPL" checked class="focus:ring-brand-500 h-5 w-5 text-brand-600 border-slate-300">
                                    </div>
                                    <label for="jalur_program_nonrpl" class="ml-3 cursor-pointer">
                                        <span class="block text-lg font-bold text-slate-800 font-outfit">Jalur Reguler (Non-RPL / Lulusan SMA Baru)</span>
                                        <span class="block text-xs text-slate-500 mt-1 leading-relaxed">
                                            Bagi lulusan baru SMA/SMK/MA/Paket C sederajat yang memulai kuliah reguler dari semester 1 tanpa transfer sks.
                                        </span>
                                        <span class="inline-block mt-3 bg-slate-100 text-slate-700 text-xs font-bold px-2.5 py-1 rounded-md">Uang Kuliah Mulai Rp 1.300.000 s/d Rp 2.200.000</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Fee Deskripsi Box -->
                    <div id="rpl_description" class="hidden mb-8 p-6 rounded-2xl bg-amber-50 border border-amber-200/60 text-slate-700">
                        <h4 class="font-bold text-amber-800 mb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            Informasi Skema Biaya Pendaftaran Jalur RPL (Alih Kredit):
                        </h4>
                        <ul class="list-disc list-inside text-sm space-y-1.5 ml-1 text-slate-600">
                            <li>Uang Kuliah Per Semester: Rp 400.000 - Rp 2.200.000 (Tergantung Skema Layanan SIPAS/Non-SIPAS)</li>
                            <li>Adm. Alih Kredit UT: Rp 300.000 (Sekali bayar di awal)</li>
                            <li>Adm. Pendaftaran UT: Rp 100.000 (Sekali bayar di awal)</li>
                            <li>Adm. Jasa Layanan SALUT: Rp 200.000 (Pendampingan & verifikasi di SALUT Bandung)</li>
                        </ul>
                    </div>

                    <div id="non_rpl_description" class="mb-8 p-6 rounded-2xl bg-brand-50 border border-brand-100 text-slate-700">
                        <h4 class="font-bold text-brand-800 mb-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            Informasi Skema Biaya Pendaftaran Jalur Reguler (Non-RPL):
                        </h4>
                        <ul class="list-disc list-inside text-sm space-y-1.5 ml-1 text-slate-600">
                            <li>Uang Kuliah Per Semester: Rp 1.300.000 - Rp 2.200.000 (Tergantung Program Studi Pilihan)</li>
                            <li>Adm. Pendaftaran UT: Rp 100.000 (Sekali bayar di awal)</li>
                            <li>Adm. Jasa Layanan SALUT: Rp 200.000 (Pendampingan registrasi & verifikasi dokumen di SALUT Bandung)</li>
                        </ul>
                    </div>

                    <!-- Ujian & Ijazah Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Lokasi Ujian Provinsi -->
                        <div>
                            <label for="lokasi_ujian_provinsi" class="block text-sm font-semibold text-slate-700 mb-2">Lokasi Tempat Ujian (Provinsi) <span class="text-red-500">*</span></label>
                            <select id="lokasi_ujian_provinsi" name="lokasi_ujian_provinsi" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition bg-white">
                                <option value="">Pilih Provinsi Ujian</option>
                            </select>
                        </div>

                        <!-- Lokasi Ujian Kab/Kota -->
                        <div>
                            <label for="lokasi_ujian_kab_kota" class="block text-sm font-semibold text-slate-700 mb-2">Lokasi Tempat Ujian (Kabupaten/Kota) <span class="text-red-500">*</span></label>
                            <select id="lokasi_ujian_kab_kota" name="lokasi_ujian_kab_kota" required disabled class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition bg-white disabled:bg-slate-100 disabled:text-slate-400">
                                <option value="">Pilih Provinsi Ujian Dahulu</option>
                            </select>
                        </div>

                        <!-- Nomor Ijazah -->
                        <div>
                            <label for="no_ijazah" class="block text-sm font-semibold text-slate-700 mb-2">Nomor Ijazah Kelulusan Terakhir <span class="text-red-500">*</span></label>
                            <input type="text" id="no_ijazah" name="no_ijazah" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition" placeholder="Masukkan nomor ijazah">
                        </div>

                        <!-- IPK (RPL Only) -->
                        <div id="ipk_field_wrapper" class="hidden">
                            <label for="ipk" class="block text-sm font-semibold text-slate-700 mb-2">Nilai IPK Kelulusan (Alih Kredit) <span class="text-red-500">*</span></label>
                            <input type="number" step="0.01" id="ipk" name="ipk" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition" placeholder="Contoh: 3.50">
                        </div>
                    </div>
                </div>

                <!-- STEP 4: Unggah Berkas Persyaratan -->
                <div class="step-pane step-transition hidden" id="step4">
                    <div class="border-b border-slate-100 pb-4 mb-6">
                        <h2 class="text-2xl font-bold font-outfit text-slate-800">Langkah 4: Unggah Berkas Persyaratan Terintegrasi</h2>
                        <p class="text-sm text-slate-500">Unggah salinan dokumen resmi Anda dalam format yang ditentukan. Maksimum ukuran per berkas adalah **2 MB**.</p>
                    </div>

                    <!-- Mandatory File Upload Area -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        
                        <!-- File Pas Foto -->
                        <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                            <span class="block text-sm font-bold text-slate-700 mb-1">Pas Foto Resmi <span class="text-red-500">*</span></span>
                            <span class="block text-xs text-slate-400 mb-3">Format: JPG, JPEG, PNG (Maks 2MB). Background biru/merah, rapi dan formal.</span>
                            <input type="file" name="file_foto" id="file_foto" required class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition">
                        </div>

                        <!-- File KTP -->
                        <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                            <span class="block text-sm font-bold text-slate-700 mb-1">Foto / Scan KTP Asli <span class="text-red-500">*</span></span>
                            <span class="block text-xs text-slate-400 mb-3">Format: JPG, JPEG, PNG (Maks 2MB). Pastikan NIK dan tulisan terbaca jelas.</span>
                            <input type="file" name="file_ktp" id="file_ktp" required class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition">
                        </div>

                        <!-- File Ijazah -->
                        <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                            <span class="block text-sm font-bold text-slate-700 mb-1" id="label_file_ijazah">Scan Ijazah Terakhir <span class="text-red-500">*</span></span>
                            <span class="block text-xs text-slate-400 mb-3">Format: PDF Asli / Fotokopi (Legalisir Cap Basah) (Maks 2MB).</span>
                            <input type="file" name="file_ijazah" id="file_ijazah" required class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition">
                        </div>

                        <!-- File Transkrip -->
                        <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                            <span class="block text-sm font-bold text-slate-700 mb-1" id="label_file_transkrip">Scan Transkrip Nilai / SKHUN <span class="text-red-500">*</span></span>
                            <span class="block text-xs text-slate-400 mb-3">Format: PDF Asli / Fotokopi (Legalisir Cap Basah) (Maks 2MB).</span>
                            <input type="file" name="file_transkrip" id="file_transkrip" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition">
                        </div>

                        <!-- Surat Pernyataan Keabsahan -->
                        <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                            <div class="flex justify-between items-start mb-1">
                                <span class="block text-sm font-bold text-slate-700">Surat Pernyataan Keabsahan Berkas <span class="text-red-500">*</span></span>
                                <a href="https://salutbandung.com/pernyataan-keabsahan" target="_blank" class="text-xs text-brand-600 hover:underline font-bold flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg> Unduh Template
                                </a>
                            </div>
                            <span class="block text-xs text-slate-400 mb-3">Format: PDF (Maks 2MB). Cetak, isi data, tanda tangan materai 10rb, dan scan.</span>
                            <input type="file" name="surat_pernyataan" id="surat_pernyataan" required class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition">
                        </div>

                        <!-- Form Tanda Tangan -->
                        <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                            <div class="flex justify-between items-start mb-1">
                                <span class="block text-sm font-bold text-slate-700">Form Tanda Tangan Calon Mahasiswa <span class="text-red-500">*</span></span>
                                <a href="https://salutbandung.com/form-tandatangan" target="_blank" class="text-xs text-brand-600 hover:underline font-bold flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg> Unduh Template
                                </a>
                            </div>
                            <span class="block text-xs text-slate-400 mb-3">Format: PDF (Maks 2MB). Cetak, berikan tanda tangan dengan pulpen hitam, dan scan.</span>
                            <input type="file" name="form_tanda_tangan" id="form_tanda_tangan" required class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition">
                        </div>

                    </div>

                    <!-- RPL SPECIFIC EXTRA FILES (Conditional Grid) -->
                    <div id="rpl_file_section" class="hidden border-t border-slate-100 pt-8 mt-6">
                        <div class="mb-6">
                            <h3 class="text-lg font-bold text-brand-900 font-outfit">Berkas Khusus Tambahan Alih Kredit (RPL)</h3>
                            <p class="text-xs text-slate-400">Berkas-berkas di bawah ini diwajibkan khusus untuk verifikasi alih kredit mahasiswa alihan / lulusan diploma.</p>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- File Screenshot PDDIKTI -->
                            <div class="border border-amber-100 bg-amber-50/20 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                                <span class="block text-sm font-bold text-slate-700 mb-1">Tangkapan Layar (Screenshot) PDDIKTI <span class="text-red-500">*</span></span>
                                <span class="block text-xs text-slate-400 mb-3">Format: JPG, JPEG, PNG (Maks 2MB). Status terdaftar aktif / lulus di Universitas lama.</span>
                                <input type="file" name="file_ss_pddikti" id="file_ss_pddikti" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition bg-white">
                            </div>

                            <!-- Unggah CV -->
                            <div class="border border-amber-100 bg-amber-50/20 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                                <div class="flex justify-between items-start mb-1">
                                    <span class="block text-sm font-bold text-slate-700">Daftar Riwayat Hidup (CV) <span class="text-red-500">*</span></span>
                                    <a href="{{ asset('files/Formulir_Daftar_Riwayat_Hidup_Pemohon_0.docx') }}" download class="text-xs text-brand-600 hover:underline font-bold flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg> Unduh Formulir CV
                                    </a>
                                </div>
                                <span class="block text-xs text-slate-400 mb-3">Format: PDF (Maks 2MB). Unduh formulir di atas, isi lengkap riwayat Anda, simpan sebagai PDF.</span>
                                <input type="file" name="file_cv" id="file_cv" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition bg-white">
                            </div>

                            <!-- Surat Keterangan Pindah (Optional) -->
                            <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300 col-span-1 md:col-span-2">
                                <span class="block text-sm font-bold text-slate-700 mb-1">Surat Keterangan Pindah (Dari Kampus Asal) <span class="text-xs text-slate-400 font-normal">(Opsional)</span></span>
                                <span class="block text-xs text-slate-400 mb-3">Format: PDF (Maks 2MB). Hanya bagi calon mahasiswa pindahan antar universitas.</span>
                                <input type="file" name="surat_keterangan_pindah" id="surat_keterangan_pindah" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition">
                            </div>

                            <!-- RPL Pengalaman Kerja Header -->
                            <div class="col-span-1 md:col-span-2 border-t border-dashed border-slate-200 pt-6 mt-4">
                                <h4 class="text-sm font-bold text-slate-700 mb-1">Dokumen Pendukung Portofolio RPL (Khusus Alih Kredit Berbasis Kerja)</h4>
                                <p class="text-xs text-slate-400 mb-4">Unggah dokumen di bawah ini jika Anda ingin mengklaim mata kuliah dari portofolio pengalaman kerja (Opsional).</p>
                            </div>

                            <!-- File RPL Pembelajaran -->
                            <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                                <span class="block text-sm font-bold text-slate-700 mb-1">Dokumen Perangkat Pembelajaran <span class="text-xs text-slate-400 font-normal">(Opsional)</span></span>
                                <span class="block text-xs text-slate-400 mb-3">Format: PDF (Maks 2MB). RPP, Silabus, modul buatan sendiri, atau instrumen evaluasi.</span>
                                <input type="file" name="file_rpl_pembelajaran" id="file_rpl_pembelajaran" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition">
                            </div>

                            <!-- File RPL Administrasi -->
                            <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                                <span class="block text-sm font-bold text-slate-700 mb-1">Dokumen Administrasi Kelas <span class="text-xs text-slate-400 font-normal">(Opsional)</span></span>
                                <span class="block text-xs text-slate-400 mb-3">Format: PDF (Maks 2MB). Surat keputusan pembagian tugas mengajar, daftar nilai siswa, absensi.</span>
                                <input type="file" name="file_rpl_administrasi" id="file_rpl_administrasi" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition">
                            </div>

                            <!-- File RPL Ekstrakurikuler -->
                            <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                                <span class="block text-sm font-bold text-slate-700 mb-1">Dokumen Pembina Ekstrakurikuler <span class="text-xs text-slate-400 font-normal">(Opsional)</span></span>
                                <span class="block text-xs text-slate-400 mb-3">Format: PDF (Maks 2MB). SK Pembimbing/Pelatih Ekskul, laporan program kerja ekskul pramuka/lainnya.</span>
                                <input type="file" name="file_rpl_ekstrakulikuler" id="file_rpl_ekstrakulikuler" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition">
                            </div>

                            <!-- File RPL Prestasi -->
                            <div class="border border-slate-200 rounded-2xl p-5 hover:bg-slate-50 transition duration-300">
                                <span class="block text-sm font-bold text-slate-700 mb-1">Sertifikat Penghargaan / Prestasi <span class="text-xs text-slate-400 font-normal">(Opsional)</span></span>
                                <span class="block text-xs text-slate-400 mb-3">Format: PDF (Maks 2MB). Sertifikat pelatihan, piagam kejuaraan, atau penghargaan keahlian kerja.</span>
                                <input type="file" name="file_rpl_prestasi" id="file_rpl_prestasi" class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 5: Pembayaran & Finalisasi -->
                <div class="step-pane step-transition hidden" id="step5">
                    <div class="border-b border-slate-100 pb-4 mb-6">
                        <h2 class="text-2xl font-bold font-outfit text-slate-800">Langkah 5: Informasi Jasa Layanan & Bukti Pembayaran</h2>
                        <p class="text-sm text-slate-500">Selesaikan biaya administrasi pendampingan pendaftaran di SALUT Kota Bandung untuk memproses berkas Anda ke pusat.</p>
                    </div>

                    <!-- Payment Information Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-gradient-to-br from-slate-900 to-slate-800 text-white rounded-2xl p-6 shadow-md border border-slate-700 flex flex-col justify-between">
                            <div>
                                <span class="block text-xs text-slate-400 font-semibold uppercase tracking-wider mb-1">Transfer Bank Resmi</span>
                                <span class="block text-2xl font-extrabold font-outfit text-gold-300">BRI (Bank Rakyat Indonesia)</span>
                            </div>
                            <div class="mt-6">
                                <span class="block text-xs text-slate-400">Nomor Rekening:</span>
                                <span class="block text-xl font-bold font-mono text-white tracking-widest mt-0.5">3260-01-026857-53-7</span>
                                <span class="block text-xs text-slate-400 mt-2">Atas Nama:</span>
                                <span class="block text-sm font-semibold text-slate-200">UGAN SUGANDA</span>
                            </div>
                        </div>

                        <div class="bg-white border border-slate-200 rounded-2xl p-6 flex flex-col justify-between md:col-span-2">
                            <div>
                                <h3 class="text-base font-bold text-slate-800 mb-2 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Biaya Administrasi Jasa Layanan SALUT
                                </h3>
                                <p class="text-xs text-slate-500 leading-relaxed">
                                    Biaya jasa layanan pendaftaran dan pendampingan registrasi di SALUT Bandung adalah sebesar **Rp 200.000**. Setelah Anda mentransfer jumlah tersebut ke rekening di samping, silakan unggah foto/scan tanda bukti transfer yang sah di bagian bawah halaman ini.
                                </p>
                            </div>
                            <div class="border-t border-slate-100 pt-4 mt-4 flex items-center space-x-2 text-slate-600 text-xs">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <span class="font-medium">Transaksi dijamin aman, diverifikasi oleh sistem audit keuangan SALUT Bandung.</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment File Upload Area -->
                    <div class="border-2 border-dashed border-brand-200 rounded-3xl p-6 sm:p-8 bg-brand-50/20 text-center mb-8 hover:bg-brand-50/40 transition duration-300">
                        <div class="max-w-md mx-auto">
                            <div class="w-12 h-12 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center mx-auto mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span class="block text-base font-bold text-slate-800 mb-1">Unggah Tanda Bukti Transfer Pembayaran <span class="text-red-500">*</span></span>
                            <span class="block text-xs text-slate-400 mb-4">Format berkas: JPG, JPEG, PNG (Maksimal 2 MB).</span>
                            <input type="file" name="file_bukti_pembayaran" id="file_bukti_pembayaran" required class="w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-5 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-brand-600 file:text-white hover:file:bg-brand-700 transition">
                        </div>
                    </div>

                    <!-- Declaration Checkbox -->
                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5 mb-8 flex items-start space-x-3 text-slate-700 text-sm">
                        <input type="checkbox" id="declaration_check" required class="h-5 w-5 rounded text-brand-600 border-slate-300 focus:ring-brand-500 mt-0.5">
                        <label for="declaration_check" class="leading-relaxed cursor-pointer font-medium">
                            Saya dengan ini menyatakan bahwa seluruh informasi dan berkas dokumen yang saya masukkan ke dalam formulir pendaftaran ini adalah **benar, sah, dan dapat dipertanggungjawabkan**. Apabila di kemudian hari ditemukan kecurangan/pemalsuan data, saya bersedia menerima sanksi pembatalan status kemahasiswaan dari Universitas Terbuka.
                        </label>
                    </div>
                </div>

                <!-- Footer Navigation Buttons -->
                <div class="flex justify-between items-center border-t border-slate-100 pt-6 mt-8">
                    <!-- Prev Button -->
                    <button type="button" id="prevBtn" class="invisible inline-flex items-center space-x-2 border border-slate-200 bg-white hover:bg-slate-50 text-slate-700 font-bold px-6 py-3 rounded-2xl transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        <span>Kembali</span>
                    </button>

                    <!-- Next / Submit Button -->
                    <button type="button" id="nextBtn" class="inline-flex items-center space-x-2 bg-brand-600 hover:bg-brand-700 text-white font-bold px-8 py-3 rounded-2xl transition duration-300 shadow-md shadow-brand-500/20">
                        <span>Lanjutkan</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </button>
                </div>

            </form>
            <!-- Form End -->

        </div>

    </main>

    <x-footer />

    <!-- WIZARD INTERACTIVE SCRIPTS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Menu Toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }

            // Region Fetching API Setup
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

            // Fetch Provinces
            fetch(GITHUB_URL + 'provinsi.json')
                .then(response => response.json())
                .then(data => {
                    populateDropdown(provinsiDropdown, data, 'Pilih Provinsi');
                    populateDropdown(lokasiUjianProvinsiDropdown, data, 'Pilih Provinsi Ujian');
                })
                .catch(err => {
                    provinsiDropdown.innerHTML = '<option value="">Gagal memuat data provinsi</option>';
                });

            // Province Change Event
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
                        });
                }
            });

            // Exam Province Change Event
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
                        });
                }
            });

            // City Change Event
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
                        });
                }
            });

            // District Change Event
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
                        });
                }
            });

            // --- Multi-Step Wizard Navigation Logic ---
            let currentStep = 1;
            const totalSteps = 5;
            const form = document.getElementById('registrationForm');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            function getStepPane(step) {
                return document.getElementById('step' + step);
            }

            function updateWizardUI() {
                // Show/hide correct step panel
                for (let i = 1; i <= totalSteps; i++) {
                    const pane = getStepPane(i);
                    if (i === currentStep) {
                        pane.classList.remove('hidden');
                    } else {
                        pane.classList.add('hidden');
                    }
                }

                // Update Stepper Indicator Active States
                document.querySelectorAll('.step-node').forEach((node) => {
                    const stepNum = parseInt(node.dataset.step);
                    const circle = node.querySelector('div');
                    const text = node.querySelector('span');

                    if (stepNum < currentStep) {
                        // Completed Step
                        circle.className = "w-10 h-10 rounded-full bg-emerald-500 text-white flex items-center justify-center font-bold shadow-sm transition duration-300 ring-4 ring-emerald-50";
                        circle.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" /></svg>`;
                        if (text) {
                            text.classList.remove('text-slate-500', 'text-brand-600');
                            text.classList.add('text-emerald-600', 'font-bold');
                        }
                    } else if (stepNum === currentStep) {
                        // Current Step
                        circle.className = "w-10 h-10 rounded-full bg-brand-600 text-white flex items-center justify-center font-bold shadow-md transition duration-300 ring-4 ring-brand-100";
                        circle.innerHTML = stepNum;
                        if (text) {
                            text.classList.remove('text-slate-500', 'text-emerald-600');
                            text.classList.add('text-brand-600', 'font-bold');
                        }
                    } else {
                        // Upcoming Step
                        circle.className = "w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex items-center justify-center font-bold transition duration-300";
                        circle.innerHTML = stepNum;
                        if (text) {
                            text.classList.remove('text-brand-600', 'text-emerald-600', 'font-bold');
                            text.classList.add('text-slate-500');
                        }
                    }
                });

                // Update Progress Line width
                const stepBar = document.getElementById('step-bar');
                const progressPercent = ((currentStep - 1) / (totalSteps - 1)) * 100;
                stepBar.style.width = progressPercent + '%';

                // Toggle Button Visibilities
                if (currentStep === 1) {
                    prevBtn.classList.add('invisible');
                } else {
                    prevBtn.classList.remove('invisible');
                }

                if (currentStep === totalSteps) {
                    nextBtn.innerHTML = `
                        <span>Kirim Pendaftaran</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                        </svg>
                    `;
                    nextBtn.className = "inline-flex items-center space-x-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold px-8 py-3 rounded-2xl transition duration-300 shadow-md shadow-emerald-500/20";
                } else {
                    nextBtn.innerHTML = `
                        <span>Lanjutkan</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    `;
                    nextBtn.className = "inline-flex items-center space-x-2 bg-brand-600 hover:bg-brand-700 text-white font-bold px-8 py-3 rounded-2xl transition duration-300 shadow-md shadow-brand-500/20";
                }
            }

            function validateCurrentStep() {
                const activePane = getStepPane(currentStep);
                const inputs = activePane.querySelectorAll('input, select, textarea');
                
                let stepValid = true;
                for (let i = 0; i < inputs.length; i++) {
                    const el = inputs[i];
                    
                    // Skip checking if it is disabled
                    if (el.disabled) continue;

                    if (!el.checkValidity()) {
                        el.reportValidity();
                        stepValid = false;
                        break;
                    }
                }
                return stepValid;
            }

            // Next / Submit Button Click Handlers
            nextBtn.addEventListener('click', function(e) {
                if (validateCurrentStep()) {
                    if (currentStep < totalSteps) {
                        currentStep++;
                        updateWizardUI();
                        window.scrollTo({ top: 150, behavior: 'smooth' });
                    } else {
                        // Submit the actual form
                        if (confirm('Apakah Anda yakin seluruh berkas dan data diri sudah terisi dengan benar?')) {
                            form.submit();
                        }
                    }
                }
            });

            // Prev Button Click Handler
            prevBtn.addEventListener('click', function() {
                if (currentStep > 1) {
                    currentStep--;
                    updateWizardUI();
                    window.scrollTo({ top: 150, behavior: 'smooth' });
                }
            });

            // --- Dynamic Radio Toggle RPL / Non-RPL Logic ---
            const rplRadio = document.getElementById('jalur_program_rpl');
            const nonRplRadio = document.getElementById('jalur_program_nonrpl');
            const rplDescription = document.getElementById('rpl_description');
            const nonRplDescription = document.getElementById('non_rpl_description');
            const ipkFieldWrapper = document.getElementById('ipk_field_wrapper');
            const ipkInput = document.getElementById('ipk');
            const rplFileSection = document.getElementById('rpl_file_section');

            // RPL-only files
            const rplSS = document.getElementById('file_ss_pddikti');
            const rplCv = document.getElementById('file_cv');

            function handleJalurChange() {
                const isRpl = rplRadio.checked;
                
                // Style cards
                const cardRpl = document.getElementById('card_jalur_rpl');
                const cardNonRpl = document.getElementById('card_jalur_nonrpl');

                if (isRpl) {
                    cardRpl.className = "relative border-2 border-brand-500 bg-brand-50/10 rounded-2xl p-6 cursor-pointer transition duration-300";
                    cardNonRpl.className = "relative border border-slate-200 rounded-2xl p-6 cursor-pointer hover:border-brand-300 transition duration-300";

                    // Descriptions
                    rplDescription.classList.remove('hidden');
                    nonRplDescription.classList.add('hidden');

                    // Inputs toggle
                    ipkFieldWrapper.classList.remove('hidden');
                    ipkInput.disabled = false;
                    ipkInput.required = true;

                    // Files section toggle
                    rplFileSection.classList.remove('hidden');
                    rplSS.disabled = false;
                    rplSS.required = true;
                    rplCv.disabled = false;
                    rplCv.required = true;

                    // Labels change
                    document.getElementById('label_file_ijazah').innerHTML = 'Scan Ijazah Diploma/S1 (Asli/Legalisir) <span class="text-red-500">*</span>';
                    document.getElementById('label_file_transkrip').innerHTML = 'Scan Transkrip Nilai Terakhir (Legalisir) <span class="text-red-500">*</span>';
                    document.getElementById('file_transkrip').required = true;
                } else {
                    cardRpl.className = "relative border border-slate-200 rounded-2xl p-6 cursor-pointer hover:border-brand-300 transition duration-300";
                    cardNonRpl.className = "relative border-2 border-brand-500 bg-brand-50/10 rounded-2xl p-6 cursor-pointer transition duration-300";

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

                    document.getElementById('label_file_ijazah').innerHTML = 'Scan Ijazah SMA/SMK Sederajat (Asli/Legalisir) <span class="text-red-500">*</span>';
                    document.getElementById('label_file_transkrip').innerHTML = 'Scan SKHUN / Transkrip Nilai <span class="text-xs text-slate-400 font-normal">(Opsional)</span>';
                    document.getElementById('file_transkrip').required = false;
                }
            }

            rplRadio.addEventListener('change', handleJalurChange);
            nonRplRadio.addEventListener('change', handleJalurChange);
            handleJalurChange(); // Initial load call

            // Card click behavior trigger
            document.getElementById('card_jalur_rpl').addEventListener('click', function() {
                rplRadio.checked = true;
                handleJalurChange();
            });
            document.getElementById('card_jalur_nonrpl').addEventListener('click', function() {
                nonRplRadio.checked = true;
                handleJalurChange();
            });

            // --- Alamat Pengiriman Modul Toggle ---
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
            handleAlamatChange(); // Initial load call

            // File format checks on change event
            const imageInputs = [document.getElementById('file_foto'), document.getElementById('file_ktp'), document.getElementById('file_ss_pddikti'), document.getElementById('file_bukti_pembayaran')];
            imageInputs.forEach(input => {
                if (input) {
                    input.addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            const allowedMimes = ['image/jpeg', 'image/png', 'image/jpg'];
                            if (!allowedMimes.includes(file.type) && !file.name.toLowerCase().endsWith('.jpg') && !file.name.toLowerCase().endsWith('.jpeg') && !file.name.toLowerCase().endsWith('.png')) {
                                alert('Format tidak sesuai! Silakan unggah berkas foto berformat JPG, JPEG, atau PNG.');
                                this.value = '';
                            } else if (file.size > 2 * 1024 * 1024) {
                                alert('Ukuran file terlalu besar! Ukuran berkas maksimum adalah 2 Megabytes (2 MB).');
                                this.value = '';
                            }
                        }
                    });
                }
            });

            const pdfInputs = [
                document.getElementById('file_ijazah'),
                document.getElementById('file_transkrip'),
                document.getElementById('surat_pernyataan'),
                document.getElementById('form_tanda_tangan'),
                document.getElementById('file_cv'),
                document.getElementById('surat_keterangan_pindah'),
                document.getElementById('file_rpl_pembelajaran'),
                document.getElementById('file_rpl_administrasi'),
                document.getElementById('file_rpl_ekstrakulikuler'),
                document.getElementById('file_rpl_prestasi')
            ];
            pdfInputs.forEach(input => {
                if (input) {
                    input.addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            if (!file.name.toLowerCase().endsWith('.pdf') && file.type !== 'application/pdf') {
                                alert('Format tidak sesuai! Silakan unggah berkas berformat PDF.');
                                this.value = '';
                            } else if (file.size > 2 * 1024 * 1024) {
                                alert('Ukuran file terlalu besar! Ukuran berkas maksimum adalah 2 Megabytes (2 MB).');
                                this.value = '';
                            }
                        }
                    });
                }
            });

        });
    </script>

    <!-- ===== FILE PREVIEW MODAL (Desktop) ===== -->
    <div id="file-preview-modal" role="dialog" aria-modal="true" aria-label="Preview Berkas">
        <div class="modal-box">
            <!-- Header -->
            <div class="modal-header">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-brand-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-brand-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-medium">Preview Berkas</p>
                        <p id="modal-file-name" class="text-sm font-bold text-slate-800 truncate max-w-xs">—</p>
                    </div>
                </div>
                <button id="close-preview-modal" class="w-9 h-9 rounded-xl bg-slate-100 hover:bg-slate-200 flex items-center justify-center text-slate-500 hover:text-slate-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <!-- Body -->
            <div class="modal-body" id="modal-content-area">
                <!-- Content injected by JS -->
            </div>
        </div>
    </div>

    <script>
    // ===== FILE PREVIEW LOGIC =====
    (function() {
        // All file input IDs to attach preview buttons to
        const fileInputIds = [
            'file_foto', 'file_ktp', 'file_ijazah', 'file_transkrip',
            'surat_pernyataan', 'form_tanda_tangan', 'file_bukti_pembayaran',
            'file_ss_pddikti', 'file_cv', 'surat_keterangan_pindah',
            'file_rpl_pembelajaran', 'file_rpl_administrasi',
            'file_rpl_ekstrakulikuler', 'file_rpl_prestasi'
        ];

        const modal       = document.getElementById('file-preview-modal');
        const closeBtn    = document.getElementById('close-preview-modal');
        const contentArea = document.getElementById('modal-content-area');
        const modalName   = document.getElementById('modal-file-name');

        // Detect if user is on a mobile/touch device
        function isMobile() {
            return /Mobi|Android|iPhone|iPad|iPod|Opera Mini|IEMobile|WPDesktop/i.test(navigator.userAgent)
                   || window.matchMedia('(max-width: 767px)').matches;
        }

        function openPreview(file, btn) {
            if (!file) return;
            const url = URL.createObjectURL(file);
            const isImage = file.type.startsWith('image/');

            if (isMobile()) {
                // Mobile: open in new tab — browser will render the file natively
                const a = document.createElement('a');
                a.href = url;
                a.target = '_blank';
                a.rel = 'noopener noreferrer';
                // Do NOT set 'download' attribute — prevents auto-download
                a.click();
                // Revoke after a short delay so the tab can load
                setTimeout(() => URL.revokeObjectURL(url), 5000);
            } else {
                // Desktop: open in modal
                modalName.textContent = file.name;
                contentArea.innerHTML = '';

                if (isImage) {
                    const img = document.createElement('img');
                    img.src = url;
                    img.alt = file.name;
                    img.style.padding = '16px';
                    contentArea.appendChild(img);
                } else {
                    // PDF — embed in iframe (no download prompt when no download attr)
                    const iframe = document.createElement('iframe');
                    // Append #toolbar=0 to suppress Chrome's download button in PDF viewer
                    iframe.src = url + '#toolbar=0&navpanes=0&scrollbar=1';
                    iframe.title = file.name;
                    contentArea.appendChild(iframe);
                }

                modal.classList.add('open');

                // Revoke object URL when modal closes
                closeBtn._revokeUrl = () => URL.revokeObjectURL(url);
            }
        }

        // Close modal
        function closeModal() {
            modal.classList.remove('open');
            contentArea.innerHTML = '';
            modalName.textContent = '—';
            if (closeBtn._revokeUrl) {
                closeBtn._revokeUrl();
                closeBtn._revokeUrl = null;
            }
        }

        closeBtn.addEventListener('click', closeModal);

        // Click outside modal-box to close
        modal.addEventListener('click', function(e) {
            if (e.target === modal) closeModal();
        });

        // Escape key to close
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && modal.classList.contains('open')) closeModal();
        });

        // Attach preview buttons to all file inputs
        fileInputIds.forEach(id => {
            const input = document.getElementById(id);
            if (!input) return;

            // Create preview button
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'preview-btn';
            btn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                Lihat Berkas
            `;

            // Insert button right after the input
            input.insertAdjacentElement('afterend', btn);

            // Show/hide button based on file selection
            input.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    btn.classList.add('show');
                    // Bind current file to button click
                    btn.onclick = () => openPreview(this.files[0], btn);
                } else {
                    btn.classList.remove('show');
                    btn.onclick = null;
                }
            });
        });
    })();
    </script>

</body>

</html>
