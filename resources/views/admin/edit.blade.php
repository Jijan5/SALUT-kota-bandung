<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Pendaftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">
</head>

<body class="bg-blue-800 font-sans leading-normal tracking-normal">
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-2xl font-bold mb-6 text-white">Edit Data Pendaftar</h1>

        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="{{ route('admin.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Personal Data -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $data->nama) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                            value="{{ old('tempat_lahir', $data->tempat_lahir) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal
                            Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                        <select name="agama" id="agama"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @foreach (['islam', 'kristen', 'katolik', 'hindu', 'buddha', 'konghucu'] as $agama)
                                <option value="{{ $agama }}" @if (old('agama', $data->agama) == $agama) selected @endif>
                                    {{ ucfirst($agama) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select name="gender" id="gender"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="laki-laki" @if (old('gender', $data->gender) == 'laki-laki') selected @endif>Laki-laki
                            </option>
                            <option value="perempuan" @if (old('gender', $data->gender) == 'perempuan') selected @endif>Perempuan
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="single" @if (old('status', $data->status) == 'single') selected @endif>Single</option>
                            <option value="menikah" @if (old('status', $data->status) == 'menikah') selected @endif>Menikah</option>
                            <option value="duda" @if (old('status', $data->status) == 'duda') selected @endif>Duda</option>
                            <option value="janda" @if (old('status', $data->status) == 'janda') selected @endif>Janda</option>
                        </select>
                    </div>
                    <div>
                        <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                        <input type="text" name="nik" id="nik" value="{{ old('nik', $data->nik) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $data->email) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="no_hp" class="block text-sm font-medium text-gray-700">No. HP</label>
                        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $data->no_hp) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="no_hp_alternatif" class="block text-sm font-medium text-gray-700">No. HP
                            Alternatif</label>
                        <input type="text" name="no_hp_alternatif" id="no_hp_alternatif"
                            value="{{ old('no_hp_alternatif', $data->no_hp_alternatif) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="nama_ibu_kandung" class="block text-sm font-medium text-gray-700">Nama Ibu
                            Kandung</label>
                        <input type="text" name="nama_ibu_kandung" id="nama_ibu_kandung"
                            value="{{ old('nama_ibu_kandung', $data->nama_ibu_kandung) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

                <hr class="my-8">

                <!-- Address -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('alamat', $data->alamat) }}</textarea>
                    </div>
                    <div>
                        <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                        <select name="provinsi" id="provinsi"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">Pilih Provinsi</option>
                        </select>
                    </div>
                    <div>
                        <label for="kab_kota" class="block text-sm font-medium text-gray-700">Kab/Kota</label>
                        <select name="kab_kota" id="kab_kota"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">Pilih Kab/Kota</option>
                        </select>
                    </div>
                    <div>
                        <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                        <select name="kecamatan" id="kecamatan"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">Pilih Kecamatan</option>
                        </select>
                    </div>
                    <div>
                        <label for="desa_kelurahan"
                            class="block text-sm font-medium text-gray-700">Desa/Kelurahan</label>
                        <select name="desa_kelurahan" id="desa_kelurahan"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            <option value="">Pilih Desa/Kelurahan</option>
                        </select>
                    </div>
                    <div>
                        <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode Pos</label>
                        <input type="text" name="kode_pos" id="kode_pos"
                            value="{{ old('kode_pos', $data->kode_pos) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

                <hr class="my-8">

                <!-- Program and Files -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="jalur_program" class="block text-sm font-medium text-gray-700">Jalur
                            Program</label>
                        <input type="text" name="jalur_program" id="jalur_program"
                            value="{{ old('jalur_program', $data->jalur_program) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="ukuran_almat" class="block text-sm font-medium text-gray-700">Ukuran
                            Almamater</label>
                        <input type="text" name="ukuran_almat" id="ukuran_almat"
                            value="{{ old('ukuran_almat', $data->ukuran_almat) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="no_ijazah" class="block text-sm font-medium text-gray-700">No. Ijazah</label>
                        <input type="text" name="no_ijazah" id="no_ijazah"
                            value="{{ old('no_ijazah', $data->no_ijazah) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="ipk" class="block text-sm font-medium text-gray-700">IPK</label>
                        <input type="text" name="ipk" id="ipk" value="{{ old('ipk', $data->ipk) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>
                </div>

                <!-- File Inputs -->
                <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $fileFields = [
                            'file_ijazah' => 'File Ijazah',
                            'file_transkrip' => 'File Transkrip',
                            'file_foto' => 'File Foto',
                            'file_ktp' => 'File KTP',
                            'file_ss_pddikti' => 'File SS PDDIKTI',
                            'form_tanda_tangan' => 'Form Tanda Tangan',
                            'surat_pernyataan' => 'Surat Pernyataan',
                            'surat_keterangan_pindah' => 'Surat Keterangan Pindah',
                            'file_rpl_pembelajaran' => 'File RPL Pembelajaran',
                            'file_rpl_administrasi' => 'File RPL Administrasi',
                            'file_rpl_ekstrakulikuler' => 'File RPL Ekstrakulikuler',
                            'file_rpl_prestasi' => 'File RPL Prestasi',
                            'file_cv' => 'File CV',
                            'file_bukti_pembayaran' => 'File Bukti Pembayaran',
                        ];
                    @endphp

                    @foreach ($fileFields as $field => $label)
                        <div>
                            <label for="{{ $field }}"
                                class="block text-sm font-medium text-gray-700">{{ $label }}</label>
                            @if ($data->$field)
                                <div class="mt-1">
                                    <a href="{{ asset('storage/' . $data->$field) }}" target="_blank"
                                        class="text-blue-500 hover:underline">Lihat File Saat Ini</a>
                                </div>
                            @endif
                            <input type="file" name="{{ $field }}" id="{{ $field }}"
                                class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100">
                        </div>
                    @endforeach
                </div>


                <div class="mt-8 flex justify-end">
                    <a href="{{ route('admin.index') }}"
                        class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Batal</a>
                    <button type="submit"
                        class="ml-3 bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Update
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

            const existingProvinsi = "{{ old('provinsi', $data->provinsi) }}";
            const existingKabKota = "{{ old('kab_kota', $data->kab_kota) }}";
            const existingKecamatan = "{{ old('kecamatan', $data->kecamatan) }}";
            const existingDesaKelurahan = "{{ old('desa_kelurahan', $data->desa_kelurahan) }}";

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
                            populateDropdown(desaKelurahanDropdown, data,
                                'Pilih Desa/Kelurahan', existingDesaKelurahan);
                            desaKelurahanDropdown.disabled = false;
                        });
                }
            });
        });
    </script>
</body>

</html>
