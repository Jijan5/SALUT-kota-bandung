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
                                <option>Aceh</option>
                                <option>Sumatera Utara</option>
                                <option>Sumatera Barat</option>
                                <option>Sumatera Selatan</option>
                                <option>Riau</option>
                                <option>Kepulauan Riau</option>
                                <option>Jambi</option>
                                <option>Bengkulu</option>
                                <option>Lampung</option>
                                <option>Bangka Belitung</option>
                                <option>DKI Jakarta</option>
                                <option>Banten</option>
                                <option>Jawa Barat</option>
                                <option>Jawa Tengah</option>
                                <option>DI Yogyakarta</option>
                                <option>Jawa Timur</option>
                                <option>Bali</option>
                                <option>Kalimantan Utara</option>
                                <option>Kalimantan Timur</option>
                                <option>Kalimantan Barat</option>
                                <option>Kalimantan Selatan</option>
                                <option>Kalimantan Tengah</option>
                                <option>Nusa Tenggara Barat</option>
                                <option>Nusa Tenggara Timur</option>
                                <option>Sulawesi Utara</option>
                                <option>Sulawesi Tengah</option>
                                <option>Sulawesi Selatan</option>
                                <option>Sulawesi Tenggara</option>
                                <option>Gorontalo</option>
                                <option>Sulawesi Barat</option>
                                <option>Maluku</option>
                                <option>Maluku Utara</option>
                                <option>Papua</option>
                                <option>Papua Barat</option>
                            </select>
                        </div>
                        <div>
                            <label for="kab/kota" class="block text-sm font-medium text-gray-700">Kab/Kota</label>
                            <input type="text" id="kab/kota" name="kab/kota"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Masukkan Kab/Kota">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                            <input type="text" id="kecamatan" name="kecamatan"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Masukkan Kecamatan">
                        </div>
                        <div>
                            <label for="desa_kelurahan"
                                class="block text-sm font-medium text-gray-700">Desa/Kelurahan</label>
                            <input type="text" id="desa/kelurahan" name="desa/kelurahan"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Masukkan Desa/Kelurahan">
                        </div>
                    </div>
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
