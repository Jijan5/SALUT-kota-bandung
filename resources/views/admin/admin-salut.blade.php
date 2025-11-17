<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Salut</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
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
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div x-data="{ sidebarOpen: true }">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white transform transition-transform duration-300 ease-in-out z-30"
            :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }">
            <div class="p-4 text-lg font-bold flex items-center justify-between">
                <span>Admin Dashboard</span>
            </div>
            <div class="p-4">
                <img src="{{ asset('images/salut-kota-bandung.jpg') }}" alt="Logo" class="w-full">
            </div>
            <nav class="flex-1">
                <a href="#" class="block px-4 py-2 hover:bg-gray-700">Dashboard</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700">Pendaftar</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-700">Pengaturan</a>
            </nav>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col transition-all duration-300 ease-in-out"
            :class="sidebarOpen ? 'ml-64' : 'ml-0'">
            <header class="bg-white shadow p-4 flex items-center">
                <button @click.stop="sidebarOpen = !sidebarOpen" class="text-gray-800 p-2 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16">
                        </path>
                    </svg>
                </button>
                <h1 class="text-xl font-bold ml-4">Data Pendaftar</h1>
            </header>

            <main class="flex-1 overflow-x-auto overflow-y-auto bg-blue-900">
                <div class="container mx-auto px-6 py-8">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        @if (session('success'))
                            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                                x-transition:enter="transform ease-out duration-300 transition"
                                x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                                x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                class="fixed top-0 right-0 mt-4 mr-4 bg-green-500 text-white p-4 rounded-lg shadow-lg z-50">
                                <p>{{ session('success') }}</p>
                            </div>
                        @endif
                        <!-- Search and Export -->
                        <div class="flex justify-between items-center mb-6">
                            <form action="{{ route('admin.index') }}" method="GET" class="w-full max-w-md">
                                <input type="text" name="search"
                                    class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Search..." value="{{ request('search') }}">
                                <div class="absolute top-0 left-0 inline-flex items-center p-2">
                                    <button type="submit">
                                        <span class="material-icons-outlined text-gray-400">search</span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Data Table -->
                        <div class="overflow-x-auto">
                            <table class="w-full divide-y divide-gray-200">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th scope="col"
                                            class="sticky left-0 bg-gray-800 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider w-12">
                                            No</th>
                                        <th scope="col"
                                            class="sticky left-12 bg-gray-800 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Nama</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Tempat Lahir</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Tanggal Lahir</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Email</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Agama</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Gender</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Status</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            NIK</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Provinsi</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Kab/Kota</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Kecamatan</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Desa/Kelurahan</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Kode Pos</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Alamat</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Alamat Pengirim Modul</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Alamat Lain</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Ukuran Almamater</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Nama Ibu Kandung</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            No. HP</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            No. HP Alternatif</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Jalur Program</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            File Ijazah</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            No. Ijazah</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            File Transkrip</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            IPK</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            File Foto</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            File KTP</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            File SS PDDIKTI</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Form Tanda Tangan</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Surat Pernyataan</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Surat Keterangan Pindah</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            File RPL Pembelajaran</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            File RPL Administrasi</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            File RPL Ekstrakulikuler</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            File RPL Prestasi</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            File CV</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            File Bukti Pembayaran</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                            Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($datapendaftar as $index => $pendaftar)
                                        <tr>
                                            <td
                                                class="sticky left-0 bg-white px-6 py-4 whitespace-nowrap text-sm text-gray-500 w-12">
                                                {{ $datapendaftar->firstItem() + $index }}</td>
                                            <td
                                                class="sticky left-12 bg-white px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $pendaftar->nama }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->tempat_lahir }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->tanggal_lahir }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->email }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->agama }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->gender }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->status }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->nik }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->provinsi }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->kab_kota }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->kecamatan }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->desa_kelurahan }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->kode_pos }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->alamat }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $pendaftar->alamat_pengirim_modul }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->alamat_lain }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->ukuran_almat }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->nama_ibu_kandung }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->no_hp }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->no_hp_alternatif }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->jalur_program }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($pendaftar->file_ijazah)
                                                    <a href="{{ asset('storage/' . $pendaftar->file_ijazah) }}"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        Lihat File
                                                    </a>
                                                @else
                                                    <span class="text-gray-400"> tidak ada file</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->no_ijazah }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($pendaftar->file_transkrip)
                                                    <a href="{{ asset('storage/' . $pendaftar->file_transkrip) }}"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        Lihat File
                                                    </a>
                                                @else
                                                    <span class="text-gray-400"> tidak ada file</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->ipk }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($pendaftar->file_foto)
                                                    <a href="{{ asset('storage/' . $pendaftar->file_foto) }}"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        Lihat File
                                                    </a>
                                                @else
                                                    <span class="text-gray-400"> tidak ada file</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($pendaftar->file_ktp)
                                                    <a href="{{ asset('storage/' . $pendaftar->file_ktp) }}"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        Lihat File
                                                    </a>
                                                @else
                                                    <span class="text-gray-400"> tidak ada file</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($pendaftar->file_ss_pddikti)
                                                    <a href="{{ asset('storage/' . $pendaftar->file_ss_pddikti) }}"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        Lihat File
                                                    </a>
                                                @else
                                                    <span class="text-gray-400"> tidak ada file</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($pendaftar->form_tanda_tangan)
                                                    <a href="{{ asset('storage/' . $pendaftar->form_tanda_tangan) }}"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        Lihat File
                                                    </a>
                                                @else
                                                    <span class="text-gray-400"> tidak ada file</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($pendaftar->surat_pernyataan)
                                                    <a href="{{ asset('storage/' . $pendaftar->surat_pernyataan) }}"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        Lihat File
                                                    </a>
                                                @else
                                                    <span class="text-gray-400"> tidak ada file</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($pendaftar->surat_keterangan_pindah)
                                                    <a href="{{ asset('storage/' . $pendaftar->surat_keterangan_pindah) }}"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        Lihat File
                                                    </a>
                                                @else
                                                    <span class="text-gray-400"> tidak ada file</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($pendaftar->file_rpl_pembelajaran)
                                                    <a href="{{ asset('storage/' . $pendaftar->file_rpl_pembelajaran) }}"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        Lihat File
                                                    </a>
                                                @else
                                                    <span class="text-gray-400"> tidak ada file</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($pendaftar->file_rpl_administrasi)
                                                    <a href="{{ asset('storage/' . $pendaftar->file_rpl_administrasi) }}"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        Lihat File
                                                    </a>
                                                @else
                                                    <span class="text-gray-400"> tidak ada file</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($pendaftar->file_rpl_ekstrakulikuler)
                                                    <a href="{{ asset('storage/' . $pendaftar->file_rpl_ekstrakulikuler) }}"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        Lihat File
                                                    </a>
                                                @else
                                                    <span class="text-gray-400"> tidak ada file</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($pendaftar->file_rpl_prestasi)
                                                    <a href="{{ asset('storage/' . $pendaftar->file_rpl_prestasi) }}"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        Lihat File
                                                    </a>
                                                @else
                                                    <span class="text-gray-400"> tidak ada file</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($pendaftar->file_cv)
                                                    <a href="{{ asset('storage/' . $pendaftar->file_cv) }}"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        Lihat File
                                                    </a>
                                                @else
                                                    <span class="text-gray-400"> tidak ada file</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($pendaftar->file_bukti_pembayaran)
                                                    <a href="{{ asset('storage/' . $pendaftar->file_bukti_pembayaran) }}"
                                                        target="_blank" class="text-blue-500 hover:underline">
                                                        Lihat File
                                                    </a>
                                                @else
                                                    <span class="text-gray-400"> tidak ada file</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <div class="flex items-center justify-center gap-2">
                                                    <a href="{{ route('admin.edit', $pendaftar->id) }}"
                                                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1.5 rounded-md text-xs font-medium transition shadow">
                                                        ✏️ Edit
                                                    </a>

                                                    <form action="{{ route('admin.delete', $pendaftar->id) }}"
                                                        method="POST" class="inline-block"
                                                        onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-md text-xs font-medium transition shadow">
                                                            🗑️ Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="44" class="text-center py-4">No data available.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- Pagination --}}
                        <div class="mt-6 flex flex-col sm:flex-row justify-between items-center text-gray-600 text-sm">
                            <div class="mb-3 sm:mb-0">
                                Menampilkan <span class="font-semibold">{{ $datapendaftar->firstItem() ?? 0 }}</span>
                                -
                                <span class="font-semibold">{{ $datapendaftar->lastItem() ?? 0 }}</span> dari
                                <span class="font-semibold">{{ $datapendaftar->total() }}</span> data
                            </div>
                            <div>
                                {{ $datapendaftar->appends(request()->only('search'))->links('pagination::tailwind') }}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
