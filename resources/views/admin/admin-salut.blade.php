<x-admin-layout>
    <x-slot name="title">
        Data Pendaftar - Admin Salut
    </x-slot>
    <div x-data="{ showConfirmModal: false, pendaftarToDeleteName: '', pendaftarToDeleteUrl: '' }" class="container mx-auto px-6 py-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            @if (session('success'))
                <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
                    x-transition:enter="transform ease-out duration-300 transition"
                    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                    x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
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
                </form>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.export.excel') }}"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Export Excel↗
                    </a>
                    <a href="{{ route('admin.export.pdf') }}"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Export PDF↗
                    </a>
                </div>
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
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Tempat Lahir</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Tanggal Lahir</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Email</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Agama</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Gender</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                NIK</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Provinsi</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Kab/Kota</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Kecamatan</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Desa/Kelurahan</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Kode Pos</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Alamat</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Alamat Pengirim Modul</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Alamat Lain</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Lokasi Ujian Provinsi</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Lokasi Ujian Kab/Kota</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Ukuran Almamater</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Nama Ibu Kandung</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                No. HP</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                No. HP Alternatif</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Jalur Program</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                File Ijazah</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                No. Ijazah</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                File Transkrip</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                IPK</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                File Foto</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                File KTP</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                File SS PDDIKTI</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Form Tanda Tangan</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Surat Pernyataan</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
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
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($datapendaftar as $index => $pendaftar)
                            <tr>
                                <td
                                    class="sticky left-0 bg-white px-6 py-4 whitespace-nowrap text-sm text-gray-500 w-12">
                                    {{ $datapendaftar->firstItem() + $index }}</td>
                                <td class="sticky left-12 bg-white px-6 py-4 whitespace-nowrap text-sm text-gray-500">
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
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->lokasi_ujian_provinsi }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $pendaftar->lokasi_ujian_kab_kota }}</td>
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
                                        <a href="{{ asset('storage/' . $pendaftar->file_ijazah) }}" target="_blank"
                                            class="text-blue-500 hover:underline">
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
                                        <a href="{{ asset('storage/' . $pendaftar->file_foto) }}" target="_blank"
                                            class="text-blue-500 hover:underline">
                                            Lihat File
                                        </a>
                                    @else
                                        <span class="text-gray-400"> tidak ada file</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($pendaftar->file_ktp)
                                        <a href="{{ asset('storage/' . $pendaftar->file_ktp) }}" target="_blank"
                                            class="text-blue-500 hover:underline">
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
                                        <a href="{{ asset('storage/' . $pendaftar->file_cv) }}" target="_blank"
                                            class="text-blue-500 hover:underline">
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

                                        <button
                                            @click.prevent="
                                            showConfirmModal = true;
                                            pendaftarToDeleteName = '{{ addslashes($pendaftar->nama) }}';
                                            pendaftarToDeleteUrl = '{{ route('admin.delete', $pendaftar->id) }}';
                                        "
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1.5 rounded-md text-xs font-medium transition shadow">
                                            🗑️ Hapus
                                        </button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form action="{{ route('admin.terima', $pendaftar->id) }}" method="POST"
                                        class="inline-block">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit"
                                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1.5 rounded-md text-xs font-medium transition shadow">
                                            ✓ Terima
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="47" class="text-center py-4">No data available.</td>
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
        <!-- Confirmation Modal -->
        <div x-show="showConfirmModal" x-cloak
            class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center z-50"
            @keydown.escape.window="showConfirmModal = false">
            <div @click.away="showConfirmModal = false"
                class="bg-white p-8 rounded-lg shadow-xl w-full max-w-md mx-auto">
                <h2 class="text-xl font-bold mb-4">Konfirmasi Hapus</h2>
                <p class="mb-6">Yakin ingin menghapus data <strong x-text="pendaftarToDeleteName"></strong>?</p>
                <div class="flex justify-end space-x-4">
                    <button @click="showConfirmModal = false"
                        class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none">Tidak</button>
                    <form :action="pendaftarToDeleteUrl" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none">Ya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
