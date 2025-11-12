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
    <style>
        :root {
            --danger-50: 254, 242, 242;
            --danger-100: 254, 226, 226;
            --danger-200: 254, 202, 202;
            --danger-300: 252, 165, 165;
            --danger-400: 248, 113, 113;
            --danger-500: 239, 68, 68;
            --danger-600: 220, 38, 38;
            --danger-700: 185, 28, 28;
            --danger-800: 153, 27, 27;
            --danger-900: 127, 29, 29;
            --danger-950: 69, 10, 10;
            --gray-50: 250, 250, 250;
            --gray-100: 244, 244, 245;
            --gray-200: 228, 228, 231;
            --gray-300: 212, 212, 216;
            --gray-400: 161, 161, 170;
            --gray-500: 113, 113, 122;
            --gray-600: 82, 82, 91;
            --gray-700: 63, 63, 70;
            --gray-800: 39, 39, 42;
            --gray-900: 24, 24, 27;
            --gray-950: 9, 9, 11;
            --info-50: 239, 246, 255;
            --info-100: 219, 234, 254;
            --info-200: 191, 219, 254;
            --info-300: 147, 197, 253;
            --info-400: 96, 165, 250;
            --info-500: 59, 130, 246;
            --info-600: 37, 99, 235;
            --info-700: 29, 78, 216;
            --info-800: 30, 64, 175;
            --info-900: 30, 58, 138;
            --info-950: 23, 37, 84;
            --primary-50: 255, 251, 235;
            --primary-100: 254, 243, 199;
            --primary-200: 253, 230, 138;
            --primary-300: 252, 211, 77;
            --primary-400: 251, 191, 36;
            --primary-500: 245, 158, 11;
            --primary-600: 217, 119, 6;
            --primary-700: 180, 83, 9;
            --primary-800: 146, 64, 14;
            --primary-900: 120, 53, 15;
            --primary-950: 69, 26, 3;
            --success-50: 240, 253, 244;
            --success-100: 220, 252, 231;
            --success-200: 187, 247, 208;
            --success-300: 134, 239, 172;
            --success-400: 74, 222, 128;
            --success-500: 34, 197, 94;
            --success-600: 22, 163, 74;
            --success-700: 21, 128, 61;
            --success-800: 22, 101, 52;
            --success-900: 20, 83, 45;
            --success-950: 5, 46, 22;
            --warning-50: 255, 251, 235;
            --warning-100: 254, 243, 199;
            --warning-200: 253, 230, 138;
            --warning-300: 252, 211, 77;
            --warning-400: 251, 191, 36;
            --warning-500: 245, 158, 11;
            --warning-600: 217, 119, 6;
            --warning-700: 180, 83, 9;
            --warning-800: 146, 64, 14;
            --warning-900: 120, 53, 15;
            --warning-950: 69, 26, 3;
        }
    </style>
    <style>
        [wire\:loading][wire\:loading],
        [wire\:loading\.delay][wire\:loading\.delay],
        [wire\:loading\.inline-block][wire\:loading\.inline-block],
        [wire\:loading\.inline][wire\:loading\.inline],
        [wire\:loading\.block][wire\:loading\.block],
        [wire\:loading\.flex][wire\:loading\.flex],
        [wire\:loading\.table][wire\:loading\.table],
        [wire\:loading\.grid][wire\:loading\.grid],
        [wire\:loading\.inline-flex][wire\:loading\.inline-flex] {
            display: none;
        }

        [wire\:loading\.delay\.none][wire\:loading\.delay\.none],
        [wire\:loading\.delay\.shortest][wire\:loading\.delay\.shortest],
        [wire\:loading\.delay\.shorter][wire\:loading\.delay\.shorter],
        [wire\:loading\.delay\.short][wire\:loading\.delay\.short],
        [wire\:loading\.delay\.default][wire\:loading\.delay\.default],
        [wire\:loading\.delay\.long][wire\:loading\.delay\.long],
        [wire\:loading\.delay\.longer][wire\:loading\.delay\.longer],
        [wire\:loading\.delay\.longest][wire\:loading\.delay\.longest] {
            display: none;
        }

        [wire\:offline][wire\:offline] {
            display: none;
        }

        [wire\:dirty]:not(textarea):not(input):not(select) {
            display: none;
        }

        :root {
            --livewire-progress-bar-color: #2299dd;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
    <style>
        /* Make clicks pass-through */

        #nprogress {
            pointer-events: none;
        }

        #nprogress .bar {
            background: var(--livewire-progress-bar-color, #29d);

            position: fixed;
            z-index: 1031;
            top: 0;
            left: 0;

            width: 100%;
            height: 2px;
        }

        /* Fancy blur effect */
        #nprogress .peg {
            display: block;
            position: absolute;
            right: 0px;
            width: 100px;
            height: 100%;
            box-shadow: 0 0 10px var(--livewire-progress-bar-color, #29d), 0 0 5px var(--livewire-progress-bar-color, #29d);
            opacity: 1.0;

            -webkit-transform: rotate(3deg) translate(0px, -4px);
            -ms-transform: rotate(3deg) translate(0px, -4px);
            transform: rotate(3deg) translate(0px, -4px);
        }

        /* Remove these to get rid of the spinner */
        #nprogress .spinner {
            display: block;
            position: fixed;
            z-index: 1031;
            top: 15px;
            right: 15px;
        }

        #nprogress .spinner-icon {
            width: 18px;
            height: 18px;
            box-sizing: border-box;

            border: solid 2px transparent;
            border-top-color: var(--livewire-progress-bar-color, #29d);
            border-left-color: var(--livewire-progress-bar-color, #29d);
            border-radius: 50%;

            -webkit-animation: nprogress-spinner 400ms linear infinite;
            animation: nprogress-spinner 400ms linear infinite;
        }

        .nprogress-custom-parent {
            overflow: hidden;
            position: relative;
        }

        .nprogress-custom-parent #nprogress .spinner,
        .nprogress-custom-parent #nprogress .bar {
            position: absolute;
        }

        @-webkit-keyframes nprogress-spinner {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes nprogress-spinner {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <style id="dark-reader-style" type="text/css">
        @media screen {
            html {
                -webkit-transition: -webkit-filter 300ms linear;
            }
        }
    </style>

</head>

<body class="bg-white-700 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto bg-gray-100 shadow-lg rounded-lg overflow-hidden">
            <div class="bg-white-700 text-gray-800 text-center py-4">
                <img src="{{ asset('images/salut-kota-bandung.jpg') }}" alt="Logo SALUT Kota Bandung"
                    class="w-80 mx-auto mb-2">
                <h1 class="text-2xl font-bold">Pendaftaran Calon Mahasiswa</h1>
                <p class="text-2xl font-bold">SALUT Kota Bandung</p>
            </div>
            <div class="p-6">
                <form action="/pendaftaran-calon-mahasiswa" method="POST" class="space-y-6">
                    @csrf
                    <!-- Personal Information -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="nama" name="nama"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Masukkan Nama">
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat
                                Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Masukkan Tempat Lahir">
                        </div>
                        <div>
                            <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal
                                Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                    </div>
                    <div>
                        <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                        <select id="agama" name="agama"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
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
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <!-- Address Information -->
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea id="alamat" name="alamat" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                            <select id="provinsi" name="provinsi"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Pilih Provinsi">
                                <option value="aceh">Aceh</option>
                                <option value="sumatera_utara">Sumatera Utara</option>
                                <option value="sumatera_barat">Sumatera Barat</option>
                                <option value="sumatera_selatan">Sumatera Selatan</option>
                                <option value="riau">Riau</option>
                                <option value="kepulauan_riau">Kepulauan Riau</option>
                                <option value="jambi">Jambi</option>
                                <option value="bengkulu">Bengkulu</option>
                                <option value="lampung">Lampung</option>
                                <option value="kepulauan_bangka_belitung">Bangka Belitung</option>
                                <option value="dki_jakarta">DKI Jakarta</option>
                                <option value="banten">Banten</option>
                                <option value="jawa_barat">Jawa Barat</option>
                                <option value="jawa_tengah">Jawa Tengah</option>
                                <option value="di_yogyakarta">DI Yogyakarta</option>
                                <option value="jawa_timur">Jawa Timur</option>
                                <option value="bali">Bali</option>
                                <option value="kalimantan_utara">Kalimantan Utara</option>
                                <option value="kalimantan_timur">Kalimantan Timur</option>
                                <option value="kalimantan_barat">Kalimantan Barat</option>
                                <option value="kalimantan_selatan">Kalimantan Selatan</option>
                                <option value="kalimantan_tengah">Kalimantan Tengah</option>
                                <option value="nusa_tenggara_barat">Nusa Tenggara Barat</option>
                                <option value="nusa_tenggara_timur">Nusa Tenggara Timur</option>
                                <option value="sulawesi_utara">Sulawesi Utara</option>
                                <option value="sulawesi_tengah">Sulawesi Tengah</option>
                                <option value="sulawesi_selatan">Sulawesi Selatan</option>
                                <option value="sulawesi_tenggara">Sulawesi Tenggara</option>
                                <option value="gorontalo">Gorontalo</option>
                                <option value="sulawesi_barat">Sulawesi Barat</option>
                                <option value="maluku">Maluku</option>
                                <option value="maluku_utara">Maluku Utara</option>
                                <option value="papua">Papua</option>
                                <option value="papua_barat">Papua Barat</option>
                            </select>
                        </div>
                        <div>
                            <label for="kab_kota" class="block text-sm font-medium text-gray-700">Kab/Kota</label>
                            <select id="kab_kota" name="kab_kota"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Pilih Kab/Kota">
                                <option value="">Pilih Kab/Kota</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                            <select id="kecamatan" name="kecamatan"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Pilih Kecamatan">
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>
                        <div>
                            <label for="desa_kelurahan"
                                class="block text-sm font-medium text-gray-700">Desa/Kelurahan</label>
                            <select id="desa_kelurahan" name="desa_kelurahan"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Pilih Desa/Kelurahan">
                                <option value="">Pilih Desa/Kelurahan</option>
                            </select>
                        </div>
                    </div>
                    <script>
                        const kabKotaOptions = {
                            aceh: [
                                "Kab. Aceh Selatan",
                                "Kab. Aceh Tenggara",
                                "Kab. Aceh Timur",
                                "Kab. Aceh Tengah",
                                "Kab. Aceh Barat",
                                "Kab. Aceh Besar",
                                "Kab. Pidie",
                                "Kab. Aceh Utara",
                                "Kab. Simeulue",
                                "Kab. Aceh Singkil",
                                "Kab. Bireuen",
                                "Kab. Aceh Barat daya",
                                "Kab. Gayo Lues",
                                "Kab. Aceh Jaya",
                                "Kab. Nagan Raya",
                                "Kab. Aceh Tamiang",
                                "Kab. Bener Meriah",
                                "Kab. Pidie Jaya",
                                "Kota Banda Aceh",
                                "Kota Sabang",
                                "Kota Langsa",
                                "Kota Lhokseumawe",
                                "Kota Subulussalam"
                            ],
                            sumatera_utara: [
                                "Kab. Asahan",
                                "Kab. Batu Bara",
                                "Kab. Dairi",
                                "Kab. Deli serdang",
                                "Kab. Humbang Hasundutan",
                                "Kab. Karo",
                                "Kab. Labuhanbatu",
                                "Kab. Labuhanbatu Selatan",
                                "Kab. Labuhanbatu Utara",
                                "Kab. Langkat",
                                "Kab. Mandailing Natal",
                                "Kab. Nias",
                                "Kab. Nias Barat",
                                "Kab. Nias Selatan",
                                "Kab. Nias Utara",
                                "Kab. Padang Lawas",
                                "Kab. Padang Lawas Utara",
                                "Kab. Pakpak Bharat",
                                "Kab. Samosir",
                                "Kab. Serdang Bedagai",
                                "Kab. Simalungun",
                                "Kab. Tapanuli Selatan",
                                "Kab. Tapanuli Tengah",
                                "Kab. Tapanuli Utara",
                                "Kab. Toba",
                                "Kota Binjai",
                                "Kota Gunungsitoli",
                                "Kota Medan",
                                "Kota Padang Sidempuan",
                                "Kota Pematang Siantar",
                                "Kota Sibolga",
                                "Kota Tanjung Balai",
                                "Kota Tebing Tinggi"
                            ],
                            sumatera_barat: [
                                "Kab. Agam",
                                "Kab. Dharmasraya",
                                "Kab. Kepulauan Mentawai",
                                "Kab. Lima Puluh Kota",
                                "Kab. Padang Pariaman",
                                "Kab. Pasaman",
                                "Kab. Pasaman Barat",
                                "Kab. Pesisir Selatan",
                                "Kab. Sijunjung",
                                "Kab. Solok",
                                "Kab. Solok Selatan",
                                "Kab. Tanah Datar",
                                "Kota Bukittinggi",
                                "Kota Padang",
                                "Kota Padang Panjang",
                                "Kota Pariaman",
                                "Kota Payakumbuh",
                                "Kota Sawahlunto",
                                "Kota Solok"
                            ],
                            sumatera_selatan: [
                                "Kab. Banyuasin",
                                "Kab. Empat Lawang",
                                "Kab. Lahat",
                                "Kab. Muara Enim",
                                "Kab. Musi Banyuasin",
                                "Kab. Musi Rawas",
                                "Kab. Musi Rawas Utara",
                                "Kab. Ogan Ilir",
                                "Kab. Ogan Komering Ilir",
                                "Kab. Ogan Komering Ulu",
                                "Kab. Ogan Komering Ulu Selatan",
                                "Kab. Ogan Komering Ulu Timur",
                                "Kab. Penukal Abab Lematang Ilir",
                                "Kota Lubuk Linggau",
                                "Kota Pagar Alam",
                                "Kota Palembang",
                                "Kota Prabumulih"
                            ],
                            riau: [
                                "Kab. Bengkalis",
                                "Kab. Indragiri Hilir",
                                "Kab. Indragiri Hulu",
                                "Kab. Kampar",
                                "Kab. Kepulauan Meranti",
                                "Kab. Kuantan Singingi",
                                "Kab. Pelalawan",
                                "Kab. Rokan Hilir",
                                "Kab. Rokan Hulu",
                                "Kab. Siak",
                                "Kota Dumai",
                                "Kota Pekanbaru"
                            ],
                            kepulauan_riau: [
                                "Kab. Bintan",
                                "Kab. Karimun",
                                "Kab. Kepulauan Anambas",
                                "Kab. Lingga",
                                "Kab. Natuna",
                                "Kota Batam",
                                "Kota Tanjung Pinang"
                            ],
                            jambi: [
                                "Kab. Batang Hari",
                                "Kab. Bungo",
                                "Kab. Kerinci",
                                "Kab. Merangin",
                                "Kab. Muaro Jambi",
                                "Kab. Sarolangun",
                                "Kab. Tanjung Jabung Barat",
                                "Kab. Tanjung Jabung Timur",
                                "Kab. Tebo",
                                "Kota Jambi",
                                "Kota Sungai Penuh"
                            ],
                            bengkulu: [
                                "Kab. Bengkulu Selatan",
                                "Kab. Bengkulu Tengah",
                                "Kab. Bengkulu Utara",
                                "Kab. Kaur",
                                "Kab. Kepahiang",
                                "Kab. Lebong",
                                "Kab. Muko-muko",
                                "Kab. Rejang Lebong",
                                "Kab. Seluma",
                                "Kota Bengkulu"
                            ],
                            lampung: [
                                "Kab. Lampung Barat",
                                "Kab. Lampung Selatan",
                                "Kab. Lampung Tengah",
                                "Kab. Lampung Timur",
                                "Kab. Lampung Utara",
                                "Kab. Mesuji",
                                "Kab. Pesawaran",
                                "Kab. Pesisir Barat",
                                "Kab. Pringsewu",
                                "Kab. Tanggamus",
                                "Kab. Tulang Bawang",
                                "Kab. Tulang Bawang Barat",
                                "Kab. Way Kanan",
                                "Kota Bandar Lampung",
                                "Kota Metro"
                            ],
                            kepulauan_bangka_belitung: [
                                "Kab. Bangka",
                                "Kab. Bangka Barat",
                                "Kab. Bangka Selatan",
                                "Kab. Bangka Tengah",
                                "Kab. Belitung",
                                "Kab. Belitung Timur",
                                "Kota Pangkal Pinang"
                            ],
                            dki_jakarta: [
                                "Kab. Kepulauan Seribu",
                                "Kota Jakarta Pusat",
                                "Kota Jakarta Utara",
                                "Kota Jakarta Barat",
                                "Kota Jakarta Selatan",
                                "Kota Jakarta Timur"
                            ],
                            banten: [
                                "Kab. Lebak",
                                "Kab. Pandeglang",
                                "Kab. Serang",
                                "Kab. Tangerang",
                                "Kota Cilegon",
                                "Kota Serang",
                                "Kota Tangerang",
                                "Kota Tangerang Selatan"
                            ],
                            jawa_barat: [
                                "Kab. Bandung",
                                "Kab. Bandung Barat",
                                "Kab. Bekasi",
                                "Kab. Bogor",
                                "Kab. Ciamis",
                                "Kab. Cianjur",
                                "Kab. Cirebon",
                                "Kab. Garut",
                                "Kab. Indramayu",
                                "Kab. Karawang",
                                "Kab. Kuningan",
                                "Kab. Majalengka",
                                "Kab. Pangandaran",
                                "Kab. Purwakarta",
                                "Kab. Subang",
                                "Kab. Sukabumi",
                                "Kab. Sumedang",
                                "Kab. Tasikmalaya",
                                "Kota Bandung",
                                "Kota Banjar",
                                "Kota Bekasi",
                                "Kota Bogor",
                                "Kota Cimahi",
                                "Kota Cirebon",
                                "Kota Depok",
                                "Kota Sukabumi",
                                "Kota Tasikmalaya"
                            ],
                            jawa_tengah: [
                                "Kab. Banjarnegara",
                                "Kab. Banyumas",
                                "Kab. Batang",
                                "Kab. Blora",
                                "Kab. Boyolali",
                                "Kab. Brebes",
                                "Kab. Cilacap",
                                "Kab. Demak",
                                "Kab. Grobogan",
                                "Kab. Jepara",
                                "Kab. Karanganyar",
                                "Kab. Kebumen",
                                "Kab. Kendal",
                                "Kab. Klaten",
                                "Kab. Kudus",
                                "Kab. Magelang",
                                "Kab. Pati",
                                "Kab. Pekalongan",
                                "Kab. Pemalang",
                                "Kab. Purbalingga",
                                "Kab. Purwejo",
                                "Kab. Rembang",
                                "Kab. Sragen",
                                "Kab. Semarang",
                                "Kab. Sukoharjo",
                                "Kab. Temanggung",
                                "Kab. Tegal",
                                "Kab. Wonosobo",
                                "Kab. Wonogiri",
                                "Kota Magelang",
                                "Kota Pekalongan",
                                "Kota Surakarta",
                                "Kota Salatiga",
                                "Kota Semarang",
                                "Kota Tegal"
                            ],
                            di_yogyakarta: [
                                "Kab. Bantul",
                                "Kab. Gunungkidul",
                                "Kab. Kulon Progo",
                                "Kab. Sleman",
                                "Kota Yogyakarta"
                            ],
                            jawa_timur: [
                                "Kab. Bangkalan",
                                "Kab. Banyuwangi",
                                "Kab. Blitar",
                                "Kab. Bojonegoro",
                                "Kab. Bondowoso",
                                "Kab. Gresik",
                                "Kab. Jember",
                                "Kab. Jombang",
                                "Kab. Kediri",
                                "Kab. Lamongan",
                                "Kab. Lumajang",
                                "Kab. Madiun",
                                "Kab. Magetan",
                                "Kab. Malang",
                                "Kab. Mojokerto",
                                "Kab. Nganjuk",
                                "Kab. Ngawi",
                                "Kab. Pacitan",
                                "Kab. Pamekasan",
                                "Kab. Pasuruan",
                                "Kab. Ponorogo",
                                "Kab. Probolinggo",
                                "Kab. Sampang",
                                "Kab. Sidoarjo",
                                "Kab. Situbondo",
                                "Kab. Sumenep",
                                "Kab. Trenggalek",
                                "Kab. Tuban",
                                "Kab. Tulungagung",
                                "Kota Batu",
                                "Kota Blitar",
                                "Kota Kediri",
                                "Kota Madiun",
                                "Kota Malang",
                                "Kota Mojokerto",
                                "Kota Pasuruan",
                                "Kota Probolinggo",
                                "Kota Surabaya"
                            ],
                            bali: [
                                "Kab. Badung",
                                "Kab. Bangli",
                                "Kab. Buleleng",
                                "Kab. Gianyar",
                                "Kab. Jembrana",
                                "Kab. Karangasem",
                                "Kab. Klungkung",
                                "Kab. Tabanan",
                                "Kota Denpasar"
                            ],
                            kalimantan_utara: [
                                "Kab. Bulungan",
                                "Kab. Malinau",
                                "Kab. Nunukan",
                                "Kab. Tana Tidung",
                                "Kota Tarakan"
                            ],
                            kalimantan_timur: [
                                "Kab. Berau",
                                "Kab. Kutai Barat",
                                "Kab. Kutai Kartanegara",
                                "Kab. Kutai Timur",
                                "Kab. Mahakam Ulu",
                                "Kab. Paser",
                                "Kab. Penajam Paser Utara",
                                "Kota Balikpapan",
                                "Kota Bontang",
                                "Kota Samarinda"
                            ],
                            kalimantan_barat: [
                                "Kab. Bengkayang",
                                "Kab. Kapuas Hulu",
                                "Kab. Kayong Utara",
                                "Kab. Ketapang",
                                "Kab. Kubu Raya",
                                "Kab. Landak",
                                "Kab. Melawi",
                                "Kab. Mempawah",
                                "Kab. Sambas",
                                "Kab. Sanggau",
                                "Kab. Sekadau",
                                "Kab. Sintang",
                                "Kota Pontianak",
                                "Kota Singkawang"
                            ],
                            kalimantan_selatan: [
                                "Kab. Balangan",
                                "Kab. Banjar",
                                "Kab. Barito Kuala",
                                "Kab. Hulu Sungai Selatan",
                                "Kab. Hulu Sungai Tengah",
                                "Kab. Hulu Sungai Utara",
                                "Kab. Kotabaru",
                                "Kab. Tabalong",
                                "Kab. Tanah Bumbu",
                                "Kab. Tanah Laut",
                                "Kab. Tapin",
                                "Kota Banjarbaru",
                                "Kota Banjarmasin"
                            ],
                            kalimantan_tengah: [
                                "Kab. Barito Selatan",
                                "Kab. Barito Timur",
                                "Kab. Barito Utara",
                                "Kab. Gunung Mas",
                                "Kab. Kapuas",
                                "Kab. Katingan",
                                "Kab. Kotawaringin Barat",
                                "Kab. Kotawaringin Timur",
                                "Kab. Lamandau",
                                "Kab. Murung Raya",
                                "Kab. Pulang Pisau",
                                "Kab. Sukamara",
                                "Kab. Seruyan",
                                "Kota Palangka Raya"
                            ],
                            nusa_tenggara_barat: [
                                "Kab. Bima",
                                "Kab. Dompu",
                                "Kab. Lombok Barat",
                                "Kab. Lombok Tengah",
                                "Kab. Lombok Timur",
                                "Kab. Lombok Utara",
                                "Kab. Sumbawa",
                                "Kab. Sumbawa Barat",
                                "Kota Bima",
                                "Kota Mataram"
                            ],
                            nusa_tenggara_timur: [
                                "Kab. Alor",
                                "Kab. Belu",
                                "Kab. Ende",
                                "Kab. Flores Timur",
                                "Kab. Kupang",
                                "Kab. Lembata",
                                "Kab. Malaka",
                                "Kab. Manggarai",
                                "Kab. Manggarai Barat",
                                "Kab. Manggarai Timur",
                                "Kab. Nagekeo",
                                "Kab. Ngada",
                                "Kab. Rote Ndao",
                                "Kab. Sabu Raijua",
                                "Kab. Sikka",
                                "Kab. Sumba Barat",
                                "Kab. Sumba Barat Daya",
                                "Kab. Sumba Tengah",
                                "Kab. Sumba Timur",
                                "Kab. Timor Tengah Selatan",
                                "Kab. Timor Tengah Utara",
                                "Kota Kupang"
                            ],
                            sulawesi_utara: [
                                "Kab. Bolaang Mongondow",
                                "Kab. Bolaang Mongondow Selatan",
                                "Kab. Bolaang Mongondow Timur",
                                "Kab. Bolaang Mongondow Utara",
                                "Kab. Kepulauan Sangihe",
                                "Kab. Kepulauan Talaud",
                                "Kab. Minahasa",
                                "Kab. Minahasa Selatan",
                                "Kab. Minahasa Tenggara",
                                "Kab. Minahasa Utara",
                                "Kota Bitung",
                                "Kota Kotamobagu",
                                "Kota Manado",
                                "Kota Tomohon"
                            ],
                            sulawesi_tengah: [
                                "Kab. Banggai",
                                "Kab. Banggai Kepulauan",
                                "Kab. Banggai Laut",
                                "Kab. Buol",
                                "Kab. Donggala",
                                "Kab. Morowali",
                                "Kab. Morowali Utara",
                                "Kab. Parigi Moutong",
                                "Kab. Poso",
                                "Kab. Sigi",
                                "Kab. Tojo Una-Una",
                                "Kab. Tolitoli",
                                "Kota Palu"
                            ],
                            sulawesi_selatan: [
                                "Kab. Bantaeng",
                                "Kab. Barru",
                                "Kab. Bone",
                                "Kab. Bulukumba",
                                "Kab. Enrekang",
                                "Kab. Gowa",
                                "Kab. Jeneponto",
                                "Kab. Kepulauan Selayar",
                                "Kab. Luwu",
                                "Kab. Luwu Timur",
                                "Kab. Luwu Utara",
                                "Kab. Maros",
                                "Kab. Pangkajane dan Kepulauan",
                                "Kab. Pinrang",
                                "Kab. Sidenreng Rappang",
                                "Kab. Sinjai",
                                "Kab. Soppeng",
                                "Kab. Takalar",
                                "Kab. Tana Toraja",
                                "Kab. Toraja Utara",
                                "Kab. Wajo",
                                "Kota Makassar",
                                "Kota Palopo",
                                "Kota Parepare"
                            ],
                            sulawesi_tenggara: [
                                "Kab. Kolaka",
                                "Kab. Konawe",
                                "Kab. Muna",
                                "Kab. Buton",
                                "Kab. Konawe Selatan",
                                "Kab. Bombana",
                                "Kab. Wakatobi",
                                "Kab. Kolaka Utara",
                                "Kab. Konawe Utara",
                                "Kab. Buton Utara",
                                "Kab. Kolaka Timur",
                                "Kab. Konawe Kepulauan",
                                "Kab. Muna Barat",
                                "Kab. Buton Tengah",
                                "Kab. Buton Selatan",
                                "Kota Kendari",
                                "Kota Baubau"
                            ],
                            gorontalo: [
                                "Kab. Boalemo",
                                "Kab. Bone Bolango",
                                "Kab. Gorontalo",
                                "Kab. Gorontalo Utara",
                                "Kab. Pohuwato",
                                "Kota Gorontalo"
                            ],
                            sulawesi_barat: [
                                "Kab. Mamuju",
                                "Kab. Pasangkayu",
                                "Kab. Polewali Mandar",
                                "Kab. Mamasa",
                                "Kab. Majene",
                                "Kab. Mamuju"
                            ],
                            maluku: [
                                "Kab. Buru",
                                "Kab. Buru Selatan",
                                "Kab. Kepulauan Aru",
                                "Kab. Maluku Barat Daya",
                                "Kab. Maluku Tengah",
                                "Kab. Maluku Tenggara",
                                "Kab. Kepulauan Tanimbar",
                                "Kab. Seram Bagian Barat",
                                "Kab. Seram Bagian Timur",
                                "Kota Ambon",
                                "Kota Tual"
                            ],
                            maluku_utara: [
                                "Kab. Halmahera Barat",
                                "Kab. Halmahera Tengah",
                                "Kab. Halmahera Utara",
                                "Kab. Halmahera Selatan",
                                "Kab. Halmahera Tengah",
                                "Kab. Halmahera Timur",
                                "Kab. Kepulauan Sula",
                                "Kab. Pulau Taliabau",
                                "Kab. Pulau Morotai",
                                "Kab. Tidore Kepulauan",
                                "Kota Ternate"
                            ],
                            papua: [
                                "Kab. Biak Numfor",
                                "Kab. Jayapura",
                                "Kab. Keerom",
                                "Kab. Kepulauan Yapen",
                                "Kab. Mamberamo Raya",
                                "Kab. Sarmi",
                                "Kab. Supiori",
                                "Kab. Waropen",
                                "Kota Jayapura"
                            ],
                            papua_barat: [
                                "Kab. Fakfak",
                                "Kab. Kaimana",
                                "Kab. Manokwari",
                                "Kab. Manokwari Selatan",
                                "Kab. Pegunungan Arfak",
                                "Kab. Teluk Bintuni",
                                "Kab. Teluk Wondama"
                            ]
                        };

                        const kecamatanOptions = {
                            Bandung: ["Coblong", "Cidadap", "Sukajadi"],
                            Bogor: ["Bogor Utara", "Bogor Selatan"],
                            Bekasi: ["Bekasi Timur", "Bekasi Barat"],
                            Depok: ["Beji", "Cimanggis"],
                            Semarang: ["Tembalang", "Banyumanik"],
                            Solo: ["Laweyan", "Serengan"],
                            Magelang: ["Magelang Utara", "Magelang Selatan"],
                            Surabaya: ["Wonokromo", "Rungkut"],
                            Malang: ["Klojen", "Lowokwaru"],
                            Blitar: ["Sananwetan", "Sutojayan"]
                        };

                        const desaKelurahanOptions = {
                            Coblong: ["Dago", "Lebak Siliwangi"],
                            Cidadap: ["Ciumbuleuit", "Hegarmanah"],
                            Sukajadi: ["Pasteur", "Cipedes"],
                            // Add more options for other kecamatan
                        };

                        document.getElementById("provinsi").addEventListener("change", function() {
                            const provinsi = this.value;
                            const kabKotaDropdown = document.getElementById("kab_kota");
                            kabKotaDropdown.innerHTML = '<option value="">Pilih Kab/Kota</option>';
                            kabKotaDropdown.disabled = !provinsi;

                            if (provinsi && kabKotaOptions[provinsi]) {
                                kabKotaOptions[provinsi].forEach(kab_kota => {
                                    const option = document.createElement("option");
                                    option.value = kab_kota;
                                    option.textContent = kab_kota;
                                    kabKotaDropdown.appendChild(option);
                                });
                            }
                        });

                        document.getElementById("kab_kota").addEventListener("change", function() {
                            const kabKota = this.value;
                            const kecamatanDropdown = document.getElementById("kecamatan");
                            kecamatanDropdown.innerHTML = '<option value="">Pilih Kecamatan</option>';
                            kecamatanDropdown.disabled = !kabKota;

                            if (kabKota && kecamatanOptions[kabKota]) {
                                kecamatanOptions[kabKota].forEach(kecamatan => {
                                    const option = document.createElement("option");
                                    option.value = kecamatan;
                                    option.textContent = kecamatan;
                                    kecamatanDropdown.appendChild(option);
                                });
                            }
                        });

                        document.getElementById("kecamatan").addEventListener("change", function() {
                            const kecamatan = this.value;
                            const desaKelurahanDropdown = document.getElementById("desa_kelurahan");
                            desaKelurahanDropdown.innerHTML = '<option value="">Pilih Desa/Kelurahan</option>';
                            desaKelurahanDropdown.disabled = !kecamatan;

                            if (kecamatan && desaKelurahanOptions[kecamatan]) {
                                desaKelurahanOptions[kecamatan].forEach(desa_kelurahan => {
                                    const option = document.createElement("option");
                                    option.value = desa_kelurahan;
                                    option.textContent = desa_kelurahan;
                                    desaKelurahanDropdown.appendChild(option);
                                });
                            }
                        });
                    </script>
                    <!-- Contact Information -->
                    <div>
                        <label for="no_hp" class="block text-sm font-medium text-gray-700">No. HP</label>
                        <input type="text" id="no_hp" name="no_hp"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Masukkan No. HP">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                            placeholder="Masukkan Email">
                    </div>
                    <!-- Program Selection -->
                    <div>
                        <label for="jalur_program" class="block text-sm font-medium text-gray-700">Jalur
                            Program</label>
                        <select id="jalur_program" name="jalur_program"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
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
</body>

</html>
