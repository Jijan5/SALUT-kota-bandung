<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran Calon Mahasiswa - SALUT Kota Bandung</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/icon-web.png') }}">
    <style>
        html,
        body {
            background-color: rgba(32, 79, 168, 1);
            min-height: 100vh;
        }

        ol[role="list"].fi-fo-wizard-header {
            display: none;
        }

        div.fi-fo-wizard-step {
            padding: 0;
        }

        body>div.container.mx-auto>div>div>div>div>form:nth-child(1)>div>div>div>div.flex.items-center.justify-between.gap-x-3.px-6.pb-6 {
            padding: 1.5rem 0 0;
        }

        .button-submit {
            height: 2rem !important;
            min-height: 2rem !important;
            padding: 0.5rem 0.75rem;
        }

        #registerStudentForm {
            max-width: 540px;
            min-height: 100vh;
        }

        #data-diri>div>div.fi-section-content,
        #riwayat-pekerjaan-dan-pendidikan>div>div.fi-section-content,
        #pemilihan-prodi>div>div.fi-section-content,
        #persyaratan>div>div.fi-section-content {
            display: none;
        }

        @media (max-width: 540px) {
            #registerStudentForm {
                max-width: 100%;
            }

            #registerStudentForm>div>div.card {
                border-radius: 0px;
            }
        }
    </style>
</head>

<body class="bg-white-700 min-h-screen flex items-center justify-center">
    @if (session('success'))
        <div id="flash-message" class="fixed top-5 right-5 bg-green-500 text-white py-2 px-4 rounded-lg shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif
    <script>
        // Remove the flash message after 3 seconds
        setTimeout(() => {
            const flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                flashMessage.remove();
            }
        }, 3000);
    </script>
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-gray-100 shadow-lg rounded-lg overflow-hidden">
            <div class="bg-white-700 text-gray-800 text-center py-4">
                <img src="{{ asset('images/salut-kota-bandung.jpg') }}" alt="Logo SALUT Kota Bandung"
                    class="w-80 mx-auto mb-2">
                <h1 class="text-2xl font-bold">Pendaftaran Calon Mahasiswa</h1>
                <p class="text-2xl font-bold">SALUT Kota Bandung</p>
            </div>
            <div class="p-10">
                <form action="/pendaftaran-calon-mahasiswa" method="POST" class="space-y-6"
                    enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="bg-red-500/20 border border-red-400 text-red-900 px-4 py-3 rounded mb-4">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Personal Information -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="nama" name="nama"
                            class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-base"
                            placeholder="Masukkan Nama">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat
                                Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir"
                                class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Masukkan Tempat Lahir">
                        </div>
                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal
                                Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div>
                        <label for="nik" class="block text-sm font-medium text-gray-700">Masukan NIK</label>
                        <input type="text" id="nik" name="nik"
                            class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-base"
                            placeholder="Masukkan NIK">
                    </div>
                    <div>
                        <label for="nama_ibu_kandung" class="block text-sm font-medium text-gray-700">Nama Ibu
                            Kandung</label>
                        <input type="text" id="nama_ibu_kandung" name="nama_ibu_kandung"
                            class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-base"
                            placeholder="Masukkan Nama Ibu Kandung">
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="status" name="status"
                            class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="single">Single</option>
                            <option value="menikah">Menikah</option>
                            <option value="duda">Duda</option>
                            <option value="janda">Janda</option>
                        </select>
                    </div>
                    <div>
                        <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                        <select id="agama" name="agama"
                            class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="islam">Islam</option>
                            <option value="kristen">Kristen</option>
                            <option value="katolik">Katolik</option>
                            <option value="hindu">Hindu</option>
                            <option value="buddha">Buddha</option>
                            <option value="konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select id="gender" name="gender"
                            class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <!-- Address Information -->
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="3"
                            class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div>
                        <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode Pos</label>
                        <input type="text" id="kode_pos" name="kode_pos"
                            class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Masukkan Kode Pos">
                    </div>

                    <label class="block text-sm font-medium text-gray-700">Alamat Pengirim Modul Sama Seperti Di Kolom
                        Alamat?</label>
                    <div class="mt-2 flex space-x-4">
                        <div class="flex items-center">
                            <input id="alamat_pengirim_modul_ya" name="alamat_pengirim_modul" type="radio"
                                value="ya" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500"
                                checked>
                            <label for="alamat_pengirim_modul_ya" class="ml-2 block text-sm text-gray-900">Ya</label>
                        </div>
                        <div class="flex items-center">
                            <input id="alamat_pengirim_modul_tidak" name="alamat_pengirim_modul" type="radio"
                                value="tidak" class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                            <label for="alamat_pengirim_modul_tidak"
                                class="ml-2 block text-sm text-gray-900">Tidak</label>
                        </div>
                    </div>
                    <div id="alamat_lain_field" class="hidden">
                        <label for="alamat_lain_input" class="block text-sm font-medium text-gray-700"> Masukan Alamat
                            Lain</label>
                        <textarea id="alamat_lain_input" name="alamat_lain" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Masukkan Alamat Lain"></textarea>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                            <select id="provinsi" name="provinsi"
                                class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Pilih Provinsi">
                            </select>
                        </div>
                        <div>
                            <label for="kab_kota" class="block text-sm font-medium text-gray-700">Kab/Kota</label>
                            <select id="kab_kota" name="kab_kota"
                                class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Pilih Kab/Kota">
                                <option value="">Pilih Kab/Kota</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                            <select id="kecamatan" name="kecamatan"
                                class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Pilih Kecamatan">
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div>
                            <label for="desa_kelurahan"
                                class="block text-sm font-medium text-gray-700">Desa/Kelurahan</label>
                            <select id="desa_kelurahan" name="desa_kelurahan"
                                class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Pilih Desa/Kelurahan">
                                <option value="">Pilih Desa/Kelurahan</option>
                            </select>
                        </div>
                    </div>
                    <!-- script for provinsi, kab/kota, kecamatan, desa/kelurahan -->
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const GITHUB_URL = 'https://raw.githubusercontent.com/ibnux/data-indonesia/master/';

                            const provinsiDropdown = document.getElementById('provinsi');
                            const kabKotaDropdown = document.getElementById('kab_kota');
                            const kecamatanDropdown = document.getElementById('kecamatan');
                            const desaKelurahanDropdown = document.getElementById('desa_kelurahan');

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

                            // Fetch and populate Provinsi
                            fetch(GITHUB_URL + 'provinsi.json')
                                .then(response => response.json())
                                .then(data => {
                                    populateDropdown(provinsiDropdown, data, 'Pilih Provinsi');
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
                                        });
                                }
                            });
                        });
                    </script>

                    <!-- Contact Information -->
                    <div>
                        <label for="ukuran_almat" class="block text-sm font-medium text-gray-700">Ukuran
                            Almamater</label>
                        <select id="ukuran_almat" name="ukuran_almat"
                            class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Pilih Ukuran Almamater">
                            <option value="">-- Pilih Ukuran Almamater --</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                            <option value="XXXL">XXXL</option>
                        </select>
                    </div>
                    <div>
                        <label for="no_hp" class="block text-sm font-medium text-gray-700">No. HP</label>
                        <input type="text" id="no_hp" name="no_hp"
                            class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Masukkan No. HP">
                    </div>
                    <div>
                        <label for="no_hp_alternatif" class="block text-sm font-medium text-gray-700">No. HP
                            Alternatif</label>
                        <input type="text" id="no_hp_alternatif" name="no_hp_alternatif"
                            class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Masukkan No. HP Alternatif">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Masukkan Email">
                    </div>
                    <!-- Program Selection -->
                    <div>
                        <label for="jalur_program" class="block text-sm font-medium text-gray-700">Jalur
                            Program</label>
                        <div class="mt-2 flex items-center space-x-6">
                            <label for="jalur_program" class="flex items-center">
                                <input id="jalur_program_rpl" name="jalur_program" type="radio" value="RPL"
                                    class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500" checked>
                                <span class="ml-2 text-sm text-gray-700">RPL</span>
                            </label>
                            <label for="jalur_program_nonrpl" class="flex items-center">
                                <input id="jalur_program_nonrpl" name="jalur_program" type="radio" value="Non-RPL"
                                    class="h-4 w-4 border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Non-RPL</span>
                            </label>
                        </div>
                        <!-- Hidden input kept for existing validation script (id="jalur_program") -->
                        {{-- <input type="hidden" id="jalur_program" name="jalur_program" value="RPL"> --}}
                        <!-- jalur RPL -->
                        <div id="rpl_fields" class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Upload Ijazah</label>
                                <p class="text-sm text-gray-800">Upload File Ijazah D2/D3/D4/S1 Format: PDF Maks. 2MB
                                    (Legalisir Cap Basah)</p>
                                <input type="file" id="file_ijazah_rpl" name="file_ijazah"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".pdf" required>
                            </div>
                            <div>
                                <label for="no_ijazah" class="block text-sm font-medium text-gray-700">Nomor
                                    Ijazah</label>
                                <input type="text" id="no_ijazah" name="no_ijazah"
                                    class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Masukkan Nomor Ijazah" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Upload Transkrip Nilai</label>
                                <p class="text-sm text-gray-800">Upload File Transkrip Nilai Teakhir Format: PDF Maks.
                                    2MB (Legalisir Cap Basah)</p>
                                <input type="file" id="file_transkrip_rpl" name="file_transkrip"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".pdf" required>
                            </div>
                            <div>
                                <label for="ipk" class="block text-sm font-medium text-gray-700">IPK</label>
                                <input type="number" step="0.01" min="0.00" max="4.00" id="ipk"
                                    name="ipk"
                                    class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Contoh: 3.79">
                            </div>
                            <div>
                                <a href="https://www.ut.ac.id/wp-content/uploads/2024/11/Surat-Pernyataan-Kebenaran-dan-Keabsahan-Dokumen.pdf"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-600 mb-2 inline-block">
                                    Download surat pernyataan kebenaran dan keabsahan dokumen
                                </a>
                                <p class="text-sm text-gray-800">Upload File Surat Pernyataan Kebenaran dan Keabsahan
                                    Dokumen Format: PDF Maks. 2MB</p>
                                <input type="file" id="surat_pernyataan" name="surat_pernyataan"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".pdf" required>
                            </div>
                            <div>
                                <a href="https://www.ut.ac.id/wp-content/uploads/2015/01/FORM_TANDA_TANGAN.pdf"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-600 mb-2 inline-block">
                                    Download form tanda tangan
                                </a>
                                <p class="text-sm text-gray-800">Upload File Form Tanda Tangan Format: PDF Maks.
                                    2MB</p>
                                <input type="file" id="form_tanda_tangan" name="form_tanda_tangan"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".pdf" required>
                            </div>
                            <div>
                                <a href="https://pddikti.kemdiktisaintek.go.id/"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-600 mb-2 inline-block">
                                    Cek PDDIKTI
                                </a>
                                <p class="text-sm text-gray-800">Upload Bukti Tangkap Layar PDDIKTI Format: JPG, PNG
                                    Maks.
                                    2MB</p>
                                <input type="file" id="file_ss_pddikti" name="file_ss_pddikti"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".jpg,.png,.jpeg">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Upload Foto (3x4/4x6)</label>
                                <p class="text-sm text-gray-800">Upload File Foto Format: JPG, PNG Maks. 2MB</p>
                                <input type="file" id="file_foto" name="file_foto"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".jpg,.png,.jpeg" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Upload KTP</label>
                                <p class="text-sm text-gray-800">Upload File KTP Format: JPG, PNG Maks. 2MB</p>
                                <input type="file" id="file_ktp" name="file_ktp"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".jpg,.png,.jpeg" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Surat Keterangan Pindah
                                    (OPSIONAL)</label>
                                <p class="text-sm text-gray-800">Upload File Surat Keterangan Pindah Format: PDF Maks.
                                    2MB</p>
                                <input type="file" id="surat_keterangan_pindah" name="surat_keterangan_pindah"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".pdf">
                            </div>
                            <div class="border border-gray-400 rounded-md p-4 space-y-4">
                                <h2 class="text-lg font-medium text-gray-900 mb-2">Khusus Untuk RPL Pengalaman Kerja
                                    (OPSIONAL)</h2>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Perangkat Pembelajaran (RPP,
                                        Media, Bahan Pembelajaran)</label>
                                    <p class="text-sm text-gray-800">Bukti Perangkat Pembelajaran Format: PDF Maks. 2MB
                                    </p>
                                    <input type="file" id="file_rpl_pembelajaran" name="file_rpl_pembelajaran"
                                        class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                        accept=".pdf">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Administrasi Kelas (Buku
                                        Catatan)</label>
                                    <p class="text-sm text-gray-800">Bukti Administrasi Kelas Format: PDF Maks. 2MB</p>
                                    <input type="file" id="file_rpl_administrasi" name="file_rpl_administrasi"
                                        class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                        accept=".pdf">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Ekstrakurikuler (Surat
                                        Keterangan Pembina Ekstrakurikuler)</label>
                                    <p class="text-sm text-gray-800">Bukti Ekstrakurikuler Format: PDF Maks. 2MB
                                    </p>
                                    <input type="file" id="file_rpl_ekstrakulikuler"
                                        name="file_rpl_ekstrakulikuler"
                                        class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                        accept=".pdf">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Bukti Prestasi (Jika tidak
                                        ada,
                                        unggah kertas dengan tulisan tidak memiliki bukti prestasi)</label>
                                    <p class="text-sm text-gray-800">Bukti Prestasi Format: PDF Maks. 2MB
                                    </p>
                                    <input type="file" id="file_rpl_prestasi" name="file_rpl_prestasi"
                                        class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                        accept=".pdf">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Unggah CV</label>
                                <p class="text-sm text-gray-800">CV Format: PDF Maks. 2MB</p>
                                <a href="{{ asset('files/Formulir_Daftar_Riwayat_Hidup_Pemohon_0.docx') }}" download
                                    class="inline-block mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                    Unduh Formulir
                                </a>
                                <input type="file" id="file_cv" name="file_cv"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".pdf">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Upload Bukti Pembayaran</label>
                                <p class="text-sm text-gray-800">Upload File Bukti Pembayaran Format: JPG, PNG Maks.
                                    2MB</p>
                                <input type="file" id="file_bukti_pembayaran_rpl" name="file_bukti_pembayaran"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".jpg,.png,.jpeg" required>
                            </div>
                        </div>

                        <!-- jalur Non-RPL -->
                        <div id="non_rpl_fields" class="space-y-6 hidden">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Upload Ijazah</label>
                                <p class="text-sm text-gray-800">Upload File Ijazah SMA/K Format: PDF Maks. 2MB
                                    (Legalisir Cap Basah)</p>
                                <input type="file" id="file_ijazah" name="file_ijazah"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".pdf" required>
                            </div>
                            <div>
                                <label for="no_ijazah" class="block text-sm font-medium text-gray-700">Nomor
                                    Ijazah</label>
                                <input type="text" id="no_ijazah" name="no_ijazah"
                                    class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    placeholder="Masukkan Nomor Ijazah" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Upload Transkrip Nilai</label>
                                <p class="text-sm text-gray-800">Upload File Transkrip Nilai Teakhir Format: PDF, JPG,
                                    JPEG, PNG Maks. 2MB (Legalisir Cap Basah)</p>
                                <input type="file" id="file_transkrip_nonrpl" name="file_transkrip"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".pdf" required>
                            </div>
                            <div>
                                <a href="https://www.ut.ac.id/wp-content/uploads/2024/11/Surat-Pernyataan-Kebenaran-dan-Keabsahan-Dokumen.pdf"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-600 mb-2 inline-block">
                                    Download surat pernyataan kebenaran dan keabsahan dokumen
                                </a>
                                <p class="text-sm text-gray-800">Upload File Surat Pernyataan Kebenaran dan Keabsahan
                                    Dokumen Format: PDF, JPG Maks. 2MB</p>
                                <input type="file" id="surat_pernyataan" name="surat_pernyataan"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".pdf" required>
                            </div>
                            <div>
                                <a href="https://www.ut.ac.id/wp-content/uploads/2015/01/FORM_TANDA_TANGAN.pdf"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-600 mb-2 inline-block">
                                    Download form tanda tangan
                                </a>
                                <p class="text-sm text-gray-800">Upload File Form Tanda Tangan Format: PDF, JPG Maks.
                                    2MB</p>
                                <input type="file" id="form_tanda_tangan" name="form_tanda_tangan"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".pdf" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Upload Foto (3x4/4x6)</label>
                                <p class="text-sm text-gray-800">Upload File Foto Format: JPG, PNG Maks. 2MB</p>
                                <input type="file" id="file_foto" name="file_foto"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".jpg,.png,.jpeg" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Upload KTP</label>
                                <p class="text-sm text-gray-800">Upload File KTP Format: JPG, PNG Maks. 2MB</p>
                                <input type="file" id="file_ktp" name="file_ktp"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".jpg,.png,.jpeg" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Upload Bukti Pembayaran Format:
                                    JPG, PNG Maks. 2MB</label>
                                <input type="file" id="file_bukti_pembayaran" name="file_bukti_pembayaran"
                                    class="mt-1 block w-full h-20 bg-gray-200 rounded-md border-gray-900 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm cursor-pointer"
                                    accept=".jpg,.png,.jpeg" required>
                            </div>
                        </div>
                        <div class="border border-gray-400 rounded-md p-4 mt-6">
                            <h2 class="text-xl font-semibold text-gray-900 mb-2">SALUT (Sentra layanan Universitas
                                Terbuka)</h2>
                            <p class="text-gray-700 mb-4 leading-relaxed">
                                adalah kepanjangan tangan untuk membantu teknis operasional di UT Bandung. SALUT Mitra
                                Priangan berlokasi di Kota Bandung.<br>
                                Alamat Kantor: Jl. Pungkur No.151, Balonggede, Kec. Regol, Kota Bandung, Jawa Barat
                                40251.
                            </p>
                            <h2 class="text-xl font-semibold text-gray-900 mb-2">Bukti Pembayaran Jasa Layanan SALUT
                                transfer ke PIC SALUT:</h2>
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">
                                Bank BRI*
                                an. Ugan Suganda
                                400201017687536
                                Konfirmasi bukti pembayaran ke no Cs :\
                                081211121855.
                                Serta upload juga bukti pembayaran pada form pendaftaran diatas.
                            </p>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit"
                            class="w-full bg-blue-700 text-white py-2 px-4 rounded-md shadow hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const radios = document.getElementsByName('jalur_program');
            const rplFields = document.getElementById('rpl_fields');
            const nonRplFields = document.getElementById('non_rpl_fields');

            // Helper to set disabled/required based on visibility and a marker attribute.
            // Use data-required-when-visible on inputs that must be required when their section is visible.
            function setControlsForSection(sectionEl, visible) {
                const controls = sectionEl.querySelectorAll('input, select, textarea');
                controls.forEach(el => {
                    if (el.type === 'hidden') return;

                    // When a section is hidden, disable its controls so browser won't validate them.
                    el.disabled = !visible;

                    // Only make required when visible AND the control is explicitly marked to be required.
                    if (visible && el.hasAttribute('data-required-when-visible')) {
                        el.required = true;
                    } else {
                        el.required = false;
                    }
                });
            }

            function toggleProgramFields() {
                if (document.getElementById('jalur_program_rpl').checked) {
                    rplFields.classList.remove('hidden');
                    nonRplFields.classList.add('hidden');

                    setControlsForSection(rplFields, true);
                    setControlsForSection(nonRplFields, false);
                } else {
                    rplFields.classList.add('hidden');
                    nonRplFields.classList.remove('hidden');

                    setControlsForSection(rplFields, false);
                    setControlsForSection(nonRplFields, true);
                }
            }

            Array.from(radios).forEach(radio => {
                radio.addEventListener('change', toggleProgramFields);
            });

            // Initial call
            toggleProgramFields();

            // --- Alamat Lain Toggle ---
            const alamatPengirimModulRadios = document.getElementsByName('alamat_pengirim_modul');
            const alamatLainDiv = document.getElementById('alamat_lain_field');
            const alamatLainTextarea = document.getElementById('alamat_lain_input');

            function toggleAlamatLain() {
                if (document.getElementById('alamat_pengirim_modul_tidak').checked) {
                    alamatLainDiv.classList.remove('hidden');
                    alamatLainTextarea.required = true;
                } else {
                    alamatLainDiv.classList.add('hidden');
                    alamatLainTextarea.required = false;
                }
            }

            Array.from(alamatPengirimModulRadios).forEach(radio => {
                radio.addEventListener('change', toggleAlamatLain);
            });

            // Initial call to set the correct state on page load
            toggleAlamatLain();

            // --- Photo format validation (jpg, jpeg, png) ---
            function isValidImageFile(file) {
                if (!file) return false;
                const allowedMime = ['image/jpeg', 'image/png'];
                const allowedExt = ['jpg', 'jpeg', 'png'];
                const mimeOk = allowedMime.includes(file.type);
                const parts = file.name.split('.');
                const ext = parts.length > 1 ? parts.pop().toLowerCase() : '';
                const extOk = allowedExt.includes(ext);
                return mimeOk || extOk;
            }

            // Select all photo file inputs by name (handles duplicated ids in form)
            const photoInputs = document.querySelectorAll(
                'input[type="file"][name="file_foto", "file_ktp", "file_ss_pddikti", "file_bukti_pembayaran", "file_bukti_pembayaran_rpl"]'
                );
            photoInputs.forEach(input => {
                input.addEventListener('change', function(e) {
                    const file = this.files && this.files[0];
                    if (!file) return;
                    if (!isValidImageFile(file)) {
                        alert('Format foto tidak valid. Harap unggah file JPG, JPEG, atau PNG.');
                        // Clear the invalid file
                        try {
                            this.value = '';
                        } catch (err) {
                            // fallback for some browsers
                            const form = this.form;
                            const newInput = this.cloneNode(true);
                            this.parentNode.replaceChild(newInput, this);
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
