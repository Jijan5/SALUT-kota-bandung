<x-admin-layout>
    <x-slot name="title">Edit Data Pendaftar</x-slot>

    <div class="max-w-full">
        <!-- Header -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5 mb-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <h2 class="font-outfit text-xl font-bold text-slate-800">Edit Data Pendaftar</h2>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-[10px] font-bold uppercase tracking-wide {{ $data->jalur_program === 'RPL' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700' }}">
                        JALUR {{ $data->jalur_program }}
                    </span>
                </div>
                <p class="text-xs text-slate-500 mt-0.5">Perbarui informasi dan berkas pendaftar ({{ $data->nama }})</p>
            </div>
            <a href="{{ route('admin.index') }}" class="inline-flex items-center space-x-2 text-sm font-semibold text-slate-500 hover:text-slate-700 transition bg-slate-50 border border-slate-200 px-4 py-2 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
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
                        <label for="nama" class="block text-sm font-semibold text-slate-700 mb-2">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $data->nama) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="tempat_lahir" class="block text-sm font-semibold text-slate-700 mb-2">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                            value="{{ old('tempat_lahir', $data->tempat_lahir) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-semibold text-slate-700 mb-2">Tanggal
                            Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="agama" class="block text-sm font-semibold text-slate-700 mb-2">Agama</label>
                        <select name="agama" id="agama"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                            @foreach (['islam', 'kristen', 'katolik', 'hindu', 'buddha', 'konghucu'] as $agama)
                                <option value="{{ $agama }}" @if (old('agama', $data->agama) == $agama) selected @endif>
                                    {{ ucfirst($agama) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="gender" class="block text-sm font-semibold text-slate-700 mb-2">Gender</label>
                        <select name="gender" id="gender"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                            <option value="laki-laki" @if (old('gender', $data->gender) == 'laki-laki') selected @endif>Laki-laki
                            </option>
                            <option value="perempuan" @if (old('gender', $data->gender) == 'perempuan') selected @endif>Perempuan
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-semibold text-slate-700 mb-2">Status</label>
                        <select name="status" id="status"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                            <option value="single" @if (old('status', $data->status) == 'single') selected @endif>Single</option>
                            <option value="menikah" @if (old('status', $data->status) == 'menikah') selected @endif>Menikah</option>
                            <option value="duda" @if (old('status', $data->status) == 'duda') selected @endif>Duda</option>
                            <option value="janda" @if (old('status', $data->status) == 'janda') selected @endif>Janda</option>
                        </select>
                    </div>
                    <div>
                        <label for="nik" class="block text-sm font-semibold text-slate-700 mb-2">NIK</label>
                        <input type="text" name="nik" id="nik" value="{{ old('nik', $data->nik) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $data->email) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="no_hp" class="block text-sm font-semibold text-slate-700 mb-2">No. HP</label>
                        <input type="text" name="no_hp" id="no_hp" value="{{ old('no_hp', $data->no_hp) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="no_hp_alternatif" class="block text-sm font-semibold text-slate-700 mb-2">No. HP
                            Alternatif</label>
                        <input type="text" name="no_hp_alternatif" id="no_hp_alternatif"
                            value="{{ old('no_hp_alternatif', $data->no_hp_alternatif) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="nama_ibu_kandung" class="block text-sm font-semibold text-slate-700 mb-2">Nama Ibu
                            Kandung</label>
                        <input type="text" name="nama_ibu_kandung" id="nama_ibu_kandung"
                            value="{{ old('nama_ibu_kandung', $data->nama_ibu_kandung) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                    </div>
                </div>

                <div class="h-px bg-slate-100 my-8"></div>

                <!-- Address -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="alamat" class="block text-sm font-semibold text-slate-700 mb-2">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">{{ old('alamat', $data->alamat) }}</textarea>
                    </div>
                    <div>
                        <label for="provinsi" class="block text-sm font-semibold text-slate-700 mb-2">Provinsi</label>
                        <select name="provinsi" id="provinsi"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                            <option value="">Pilih Provinsi</option>
                        </select>
                    </div>
                    <div>
                        <label for="kab_kota" class="block text-sm font-semibold text-slate-700 mb-2">Kab/Kota</label>
                        <select name="kab_kota" id="kab_kota"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                            <option value="">Pilih Kab/Kota</option>
                        </select>
                    </div>
                    <div>
                        <label for="kecamatan" class="block text-sm font-semibold text-slate-700 mb-2">Kecamatan</label>
                        <select name="kecamatan" id="kecamatan"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                            <option value="">Pilih Kecamatan</option>
                        </select>
                    </div>
                    <div>
                        <label for="desa_kelurahan"
                            class="block text-sm font-semibold text-slate-700 mb-2">Desa/Kelurahan</label>
                        <select name="desa_kelurahan" id="desa_kelurahan"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                            <option value="">Pilih Desa/Kelurahan</option>
                        </select>
                    </div>
                    <div>
                        <label for="kode_pos" class="block text-sm font-semibold text-slate-700 mb-2">Kode Pos</label>
                        <input type="text" name="kode_pos" id="kode_pos"
                            value="{{ old('kode_pos', $data->kode_pos) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                    </div>
                </div>

                <div class="h-px bg-slate-100 my-8"></div>

                <!-- Lokasi Ujian -->
                <h3 class="text-lg font-bold text-brand-900 font-outfit mb-4">Lokasi Ujian</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="lokasi_ujian_provinsi" class="block text-sm font-semibold text-slate-700 mb-2">Provinsi
                            Ujian</label>
                        <select name="lokasi_ujian_provinsi" id="lokasi_ujian_provinsi"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                            <option value="">Pilih Provinsi Ujian</option>
                        </select>
                    </div>
                    <div>
                        <label for="lokasi_ujian_kab_kota" class="block text-sm font-semibold text-slate-700 mb-2">Kab/Kota
                            Ujian</label>
                        <select name="lokasi_ujian_kab_kota" id="lokasi_ujian_kab_kota"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                            <option value="">Pilih Kab/Kota Ujian</option>
                        </select>
                    </div>
                </div>

                <div class="h-px bg-slate-100 my-8"></div>

                <!-- Program and Files -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="jalur_program" class="block text-sm font-semibold text-slate-700 mb-2">Jalur
                            Program</label>
                        <input type="text" name="jalur_program" id="jalur_program"
                            value="{{ old('jalur_program', $data->jalur_program) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="ukuran_almat" class="block text-sm font-semibold text-slate-700 mb-2">Ukuran
                            Almamater</label>
                        <input type="text" name="ukuran_almat" id="ukuran_almat"
                            value="{{ old('ukuran_almat', $data->ukuran_almat) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="no_ijazah" class="block text-sm font-semibold text-slate-700 mb-2">No. Ijazah</label>
                        <input type="text" name="no_ijazah" id="no_ijazah"
                            value="{{ old('no_ijazah', $data->no_ijazah) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                    </div>
                    <div>
                        <label for="ipk" class="block text-sm font-semibold text-slate-700 mb-2">IPK</label>
                        <input type="text" name="ipk" id="ipk" value="{{ old('ipk', $data->ipk) }}"
                            class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition text-sm text-slate-700">
                    </div>
                </div>

                <!-- File Inputs -->
                <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @php
                        $fileFields = [
                            'file_ijazah' => ['label' => 'File Ijazah', 'rpl' => false],
                            'file_transkrip' => ['label' => 'File Transkrip', 'rpl' => false],
                            'file_foto' => ['label' => 'File Foto', 'rpl' => false],
                            'file_ktp' => ['label' => 'File KTP', 'rpl' => false],
                            'file_ss_pddikti' => ['label' => 'File SS PDDIKTI', 'rpl' => true],
                            'surat_pernyataan' => ['label' => 'Surat Pernyataan', 'rpl' => false],
                            'surat_keterangan_pindah' => ['label' => 'Surat Keterangan Pindah', 'rpl' => true],
                            'file_rpl_pembelajaran' => ['label' => 'File RPL Pembelajaran', 'rpl' => true],
                            'file_rpl_administrasi' => ['label' => 'File RPL Administrasi', 'rpl' => true],
                            'file_rpl_ekstrakulikuler' => ['label' => 'File RPL Ekstrakulikuler', 'rpl' => true],
                            'file_rpl_prestasi' => ['label' => 'File RPL Prestasi', 'rpl' => true],
                            'file_cv' => ['label' => 'File CV', 'rpl' => true],
                            'file_bukti_pembayaran' => ['label' => 'File Bukti Pembayaran', 'rpl' => false],
                        ];
                    @endphp

                    @foreach ($fileFields as $field => $config)
                        @php
                            $isRplField = $config['rpl'];
                            $isDisabled = $isRplField && $data->jalur_program !== 'RPL';
                        @endphp
                        <div class="{{ $isDisabled ? 'opacity-50 grayscale pointer-events-none' : '' }}">
                            <label for="{{ $field }}" class="block text-sm font-semibold text-slate-700 mb-2">
                                {{ $config['label'] }}
                                @if($isRplField) 
                                    <span class="text-[10px] text-slate-400 font-normal ml-1">(Khusus RPL)</span> 
                                @endif
                            </label>
                            @if ($data->$field)
                                <div class="mt-1">
                                    <a href="{{ asset('storage/' . $data->$field) }}" target="_blank"
                                        class="text-blue-500 hover:underline">Lihat File Saat Ini</a>
                                </div>
                            @endif
                            <input type="file" name="{{ $field }}" id="{{ $field }}" {{ $isDisabled ? 'disabled' : '' }}
                                class="mt-3 block w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition">
                        </div>
                    @endforeach
                </div>


                <div class="mt-10 pt-6 border-t border-slate-100 flex justify-end items-center space-x-3">
                    <a href="{{ route('admin.index') }}"
                        class="px-6 py-2.5 rounded-xl border border-slate-200 text-slate-700 font-semibold hover:bg-slate-50 transition text-sm">Batal</a>
                    <button type="submit"
                        class="px-6 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white bg-blue-950 font-semibold shadow-md shadow-brand-500/20 transition text-sm">Update
                        Data</button>
                </div>
            </form>
            </div>
</x-admin-layout>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const GITHUB_URL = 'https://raw.githubusercontent.com/ibnux/data-indonesia/master/';

            const provinsiDropdown = document.getElementById('provinsi');
            const kabKotaDropdown = document.getElementById('kab_kota');
            const kecamatanDropdown = document.getElementById('kecamatan');
            const desaKelurahanDropdown = document.getElementById('desa_kelurahan');
            const lokasiUjianProvinsiDropdown = document.getElementById('lokasi_ujian_provinsi');
            const lokasiUjianKabKotaDropdown = document.getElementById('lokasi_ujian_kab_kota');

            const existingProvinsi = "{{ old('provinsi', $data->provinsi) }}";
            const existingKabKota = "{{ old('kab_kota', $data->kab_kota) }}";
            const existingKecamatan = "{{ old('kecamatan', $data->kecamatan) }}";
            const existingDesaKelurahan = "{{ old('desa_kelurahan', $data->desa_kelurahan) }}";
            const existingLokasiUjianProvinsi =
                "{{ old('lokasi_ujian_provinsi', $data->lokasi_ujian_provinsi) }}";
            const existingLokasiUjianKabKota =
                "{{ old('lokasi_ujian_kab_kota', $data->lokasi_ujian_kab_kota) }}";

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
                    const selectedLokasiUjianProvinsiId = populateDropdown(lokasiUjianProvinsiDropdown,
                        data, 'Pilih Provinsi Ujian', existingLokasiUjianProvinsi);
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
                            populateDropdown(desaKelurahanDropdown, data,
                                'Pilih Desa/Kelurahan', existingDesaKelurahan);
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
                            populateDropdown(lokasiUjianKabKotaDropdown, data,
                                'Pilih Kab/Kota Ujian', existingLokasiUjianKabKota);
                            lokasiUjianKabKotaDropdown.disabled = false;
                        });
                }
            });
        });
    </script>
</body>

</html>
