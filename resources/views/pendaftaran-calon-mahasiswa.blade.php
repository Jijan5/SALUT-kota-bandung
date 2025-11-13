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
                <form action="/pendaftaran-calon-mahasiswa" method="POST" class="space-y-6">
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
                    <div id="alamat_lain" class="hidden">
                        <label for="alamat_lain" class="block text-sm font-medium text-gray-700"> Masukan Alamat
                            Lain</label>
                        <textarea id="alamat_lain" name="alamat_lain" rows="3"
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
                        <select id="jalur_program" name="jalur_program"
                            class="mt-1 block w-full h-10 rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="RPL">RPL</option>
                            <option value="Non-RPL">Non-RPL</option>
                        </select>
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
            const flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                setTimeout(() => {
                    flashMessage.style.display = 'none';
                }, 3000);
            }

            const radioYa = document.getElementById('alamat_pengirim_modul_ya');
            const radioTidak = document.getElementById('alamat_pengirim_modul_tidak');
            const alamatLainContainer = document.getElementById('alamat_lain');

            function toggleAlamatLain() {
                if (radioTidak.checked) {
                    alamatLainContainer.classList.remove('hidden');
                } else {
                    alamatLainContainer.classList.add('hidden');
                }
            }

            radioYa.addEventListener('change', toggleAlamatLain);
            radioTidak.addEventListener('change', toggleAlamatLain);
            toggleAlamatLain(); // Check on page load

            const form = document.querySelector('form');
            form.addEventListener('submit', function(event) {
                const requiredFields = [
                    'nama', 'tempat_lahir', 'tanggal_lahir', 'agama', 'gender', 'alamat', 'provinsi',
                    'nik', 'nama_ibu_kandung', 'status',
                    'kab_kota', 'kecamatan', 'desa_kelurahan', 'no_hp', 'email', 'jalur_program',
                    'ukuran_almat', 'no_hp_alternatif', 'kode_pos'
                ];

                let firstInvalidField = null;

                for (const fieldId of requiredFields) {
                    const field = document.getElementById(fieldId);
                    if (field && !field.value) {
                        firstInvalidField = field;
                        break;
                    }
                }

                if (!firstInvalidField) {
                    const radio = document.querySelector('input[name="alamat_pengirim_modul"]:checked');
                    if (!radio) {
                        firstInvalidField = document.getElementById('alamat_pengirim_modul_ya');
                    }
                }

                if (firstInvalidField) {
                    event.preventDefault();
                    firstInvalidField.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    firstInvalidField.focus();
                    // Add a visual indicator for the invalid field
                    firstInvalidField.classList.add('border-red-500');
                    setTimeout(() => {
                        firstInvalidField.classList.remove('border-red-500');
                    }, 3000);
                }
            });
        });
    </script>
</body>

</html>
